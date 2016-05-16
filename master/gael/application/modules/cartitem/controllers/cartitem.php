<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimecontroller.php";


class Cartitem extends MY_Sublimecontroller {

	function __construct() {
				
		parent::__construct();
		$model_name = 'cartitem_model';
		$this->setModel($model_name);
		$this->lang->load('modules');
		
	}
	
	function success ()
	{
		echo $this->lang->line('success');
	}
        
        function _get_items_form_cart($cart_id = NULL)
        {
            if($cart_id)
                return $this->cartitem_model->item_info()->get_where('cart_id' , $cart_id)->result();
            return false;
        }
        
        function _get_price_for_cartid($cart_id = NULL)
        {
            if($cart_id)
                return $this->cartitem_model->select_sum('total')->get_where('cart_id' , $cart_id)->row()->total;
            return false;
        }
                
	function _cart_item_list($cart = NULL)
	{
            if ($cart == NULL)
                return false;
            
            $this->load->helper(array('encode','number'));

            $data = array();

            $data['cart_records'] = $cart;

            $data['item_records'] = $this->_get_items_form_cart($cart->cart_id);

            $this->load->view('item_list.php',$data);
	}
	
	function _add_item($product_id = NULL, $quantity = NULL)
	{
		if($product_id == NULL || $quantity == NULL )
			return false;
                $date_start = '0000-00-00 00:00:00';
                $date_end = '0000-00-00 00:00:00';
                $prof_id = '';
                $price = NULL;
                if($_SERVER['REQUEST_METHOD'] == 'PUT') 
                {
                    parse_str(file_get_contents("php://input"),$post_vars);
                    $date_start = $post_vars['date_start'] != '' ? date('Y-m-d H:i:s', strtotime ($post_vars['date_start'])): '';
                    $date_end = $post_vars['date_end'] != '' ? date('Y-m-d H:i:s', strtotime (($post_vars['date_end']))): '';
                    $prof_id = $post_vars['prof_id'];
                    $price = $post_vars['price'];
                    $type = $post_vars['type'];
                }
                elseif($_SERVER['REQUEST_METHOD'] == 'POST') 
                {
                    $date_start = $this->input->post('date_start') != '' ? date('Y-m-d H:i:s', strtotime (($this->input->post('date_start')))): '';
                    $date_end = $this->input->post('date_end') != '' ? date('Y-m-d H:i:s', strtotime (($this->input->post('date_end')))): '';
                    $prof_id = $this->input->post('prof_id');
                    $price = $this->input->post('price');
                    $type = $this->input->post('type');
                }
                
		$cart_id =  Modules::run('cart/_get_cart_id');
		$date_added = date("Y-m-d H:i:s");
		$product_id = (int)$product_id;
		$quantity = (int)$quantity;
		$data = array(
                    'cart_id' => $cart_id,
                    'product_id' => $product_id,
                    'type_product' => $type,
                    'quantity' => $quantity,
                    'price' => $price,
                    'date_added' => $date_added,
                    'start_date' => $date_start,
                    'end_date' => $date_end,
                    'teacher' => $prof_id
                        );
                $data['total'] = $this->_set_price_item($data);

		if(! ($cart_item = $this->_get_item_from_product($data)))
		{
			return $this->cartitem_model->_insert($data);
		}
		else
		{
                        $data['quantity'] = $cart_item->quantity + $data['quantity'];
                        $data['total'] = $this->_set_price_item($data);
			return $this->cartitem_model->_update($cart_item->cart_item_id, $data);
		}
	}
        function _set_price_item ($data)
        {
                if($data['price'] == NULL)
                    return false;
            
                $quantity = $data['quantity'];
                $price = $data['price'];

                if($data['type_product'] == 'location' && $data['end_date'] == '0000-00-00 00:00:00' )
                {
                    $price = 0;
                }
                elseif ($data['type_product'] == 'location' || $data['type_product'] == 'cours') 
                {
                    $diff = strtotime($data['end_date']) - strtotime($data['start_date']);
                    $price_in_minute = $price/(3600);
                    $price = round($diff * $price_in_minute);
                }

                $total = $price * $quantity;
                return $total;
        }
	
	function get_quantity($product_id = NULL)
	{
		if($product_id == NULL)
			return false;
		
		$cart_id =  Modules::run('cart/_get_cart_id');
		
		$cart_item = $this->_get_item_from_product($cart_id, $product_id);
		
		echo $cart_item->quantity;
	}
	
	function _get_item_from_product($data = NULL)
	{		
		if($data['cart_id'] == NULL || $data['product_id'] == NULL )
			return false;
		
		$where = array(
                    'cart_id' => $data['cart_id'],
                    'product_id' => $data['product_id'],
                    'start_date'=>$data['start_date'],
                    'end_date'=>$data['end_date']                    
			);
		$query = $this->cartitem_model->get_where($where);
		if($query->num_rows() > 0)
		{
			// success
			return $query->first_row();
		}
		else{
			return false;
		}
	}
	

	function _modify_itme ($cart_item_id)
	{		
                $date_start = '';
                $date_end = '';
                if($_SERVER['REQUEST_METHOD'] == 'PUT') {
                    parse_str(file_get_contents("php://input"),$post_vars);
                    $date_end = $post_vars['date_end'] != '' ? date('Y-m-d H:i:s', strtotime (($post_vars['date_end']))): '';
                }
                elseif($_SERVER['REQUEST_METHOD'] == 'POST') { '';
                    $date_end = $this->input->post('date_end') != '' ? date('Y-m-d H:i:s', strtotime (($this->input->post('date_end')))): '';
                }
		return $this->cartitem_model->_update($cart_item_id, array('end_date'=>$date_end));		
	}
        
        
	
	function edit_item($cart_item_id = NULL, $hash_id = NULL)
	{
		$this->load->helper('encode');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cart_id', $this->lang->line('cart'), 'trim|required');
		$this->form_validation->set_rules('product_id', $this->lang->line('product'), 'trim|required');
		$this->form_validation->set_rules('quantity', $this->lang->line('quantity'), 'trim|required');
		$this->form_validation->set_rules('date_added', $this->lang->line('date_added'), 'trim');
		

		if($this->form_validation->run() == TRUE)
	    {
	    	$cart_item_id = $this->input->post('item_id');
			$hash_id = $this->input->post('id');

	    	//check hash if the user edit it
	    	if(!decode_id($cart_item_id, $hash_id)){
				$this->session->set_flashdata('msg', $this->lang->line('error_form'));
				redirect('cartitem');
			}

	    	$cart_id = $this->input->post('cart_id');
			$product_id = $this->input->post('product_id');
			$quantity = $this->input->post('quantity');
			$date_added = $this->input->post('date_added');
			

	    	$data = array('cart_id'=>$cart_id,'product_id'=>$product_id,'quantity'=>$quantity,'date_added'=>$date_added);

	    	if($this->cartitem_model->item_info()->_update($cart_item_id, $data))
			{
				redirect('item/success');
			}
			else
			{
				$this->session->set_flashdata('msg', $this->lang->line('error_form'));
				redirect("item/edit_item/$cart_item_id/$hash");
			}
	    }
	    else //if page initial load or form validation false
	    {

	    	//means come from item list

	    	if($hash_id != NULL)
	    	{
	    		if(!decode_id($cart_item_id,$hash_id)){
					$this->session->set_flashdata('msg', $this->lang->line('error_form'));
					redirect('cartitem');
				}
	    	}

	    	//means come from validation error

	    	if($this->input->post('item_id'))
	    	{
	    		$cart_item_id = $this->input->post('item_id');
				$hash_id = $this->input->post('id');

				//check hash if the user edit it
				if(!decode_id($cart_item_id, $hash_id)){
					$this->session->set_flashdata('msg', $this->lang->line('error_form'));
					redirect('cartitem');
				}
	    	}

	    	$data = array();

			$cart_records = $this->cart_model->get_all();
			$data['cart_records'] = $cart_records;

			
		
	    	$item_records = $this->cartitem_model->address_info()->get_where('cart_item_id', $cart_item_id)->row();

	    	$data['item_records'] = $item_records;

			$this->load->view('edit_item',$data);
	    }
	}

	function read_item($cart_item_id = NULL, $hash_id = NULL)
	{
		$this->load->helper('encode');
		// test var from url 
		if($cart_item_id == NULL || $hash_id == NULL){// if one or more are not set 
			$this->session->set_flashdata('msg', $this->lang->line('error_form'));
			redirect('cartitem');
			exit;
		}
		
		if(!decode_ajax_id($cart_item_id, $hash_id)){
			$this->session->set_flashdata('msg', $this->lang->line('error_form'));
			redirect('cartitem');
			exit;
		}
		
		$query = $this->cartitem_model->item_info()->get('cart_item_id');
		if($query->num_rows() > 0)
		{
			// success
			$this->load->view('read_item',array('row'=>$query->first_row("array"),'cart_item_id'=>$cart_item_id));
		}
		else
		{
			$this->session->set_flashdata('msg', $this->lang->line('error_form'));
			redirect('cartitem');
			exit;
		}

	}
	
	
	function ajax_delete_item($cart_item_id = NULL, $hash_id = NULL)
	{
		$this->load->helper('encode');
		// test var from url 
		if($cart_item_id == NULL || $hash_id == NULL){// if one or more are not set 
			exit( '4' );
		}
		if(!decode_ajax_id($cart_item_id, $hash_id)){
			exit( '3' );
		}

		if($this->cartitem_model->item_info()->_delete($cart_item_id))
		{
			exit( 'success' ); // success
		}
		else
		{
			exit( '2' );
		}

	}

}
?>