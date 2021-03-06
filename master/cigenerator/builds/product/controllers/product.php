<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimecontroller.php";

class Product extends MY_Sublimecontroller {

	function __construct() {
		parent::__construct();
		$model_name = 'product_model';
		$this->setModel($model_name);
		$this->lang->load('modules');
	}
	
	function _success (){
            echo $this->lang->line('success');
	}
	
	function _index()
	{
        $this->load->helper('encode');
        $q = $this->input->post('q');
		if($q === '')
        {
            $q = urldecode($this->uri->segment(4));           
        }
		
        $start = intval($this->uri->segment(5));
        $config["uri_segment"] = 5;
        
        if(!$q)
        {
           $q = '-----';
        }
        $config["base_url"] = base_url() . "order/index/" . urlencode($q) . '/';
        $config["first_url"] = base_url() . "order/index/" . urlencode($q) . '/';
        
        if($q === '-----')
        {
            $q = '';
        }
        
        $config["per_page"] = 10;
        $config["total_rows"] = $this->product_model->total_rows($q);
        $product = $this->product_model->get_limit_data($config["per_page"], $start, $q);

        $this->load->library("pagination");
        $this->pagination->initialize($config);

        $data = array(
            "product_records" => $product,
            "q" => $q,
            "pagination" => $this->pagination->create_links(),
            "total_rows" => $config["total_rows"],
            "start" => $start,
        );
        $this->load->view("product_list", $data);
	}

	function _read_product($product_id = NULL, $hash_id = NULL)
	{
            $this->load->helper('encode');
            // test var from url 
            if($product_id == NULL || $hash_id == NULL){// if one or more are not set 
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('product');
                exit;
            }

            if(!decode_ajax_id($product_id, $hash_id)){
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('product');
                exit;
            }

            $query = $this->product_model->product_info()->get('product_id');
            if($query->num_rows() > 0)
            {
                // success
                $this->load->view('read_product',array('row'=>$query->first_row("array"),'product_id'=>$product_id));
            }
            else
            {
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('product');
                exit;
            }

	}

	function _add_product()
        {
            $this->form_validation->set_rules($this->product_model->set_validation_rules());


            if($this->form_validation->run() == TRUE)
            {
                $model = $this->input->post('model');
				$name = $this->input->post('name');
				$type = $this->input->post('type');
				$sku = $this->input->post('sku');
				$upc = $this->input->post('upc');
				$ean = $this->input->post('ean');
				$jan = $this->input->post('jan');
				$isbn = $this->input->post('isbn');
				$mpn = $this->input->post('mpn');
				$quantity = $this->input->post('quantity');
				$shipping = $this->input->post('shipping');
				$sale_price = $this->input->post('sale_price');
				$suggested_price = $this->input->post('suggested_price');
				$buy_price = $this->input->post('buy_price');
				$special_price = $this->input->post('special_price');
				$points = $this->input->post('points');
				$date_available = $this->input->post('date_available');
				$weight = $this->input->post('weight');
				$length = $this->input->post('length');
				$width = $this->input->post('width');
				$height = $this->input->post('height');
				$subtract = $this->input->post('subtract');
				$minimum = $this->input->post('minimum');
				$status = $this->input->post('status');
				$buyed = $this->input->post('buyed');
				$date_added = $this->input->post('date_added');
				$special_price_date_start = $this->input->post('special_price_date_start');
				$special_price_date_end = $this->input->post('special_price_date_end');
				$manufacturer_id = $this->input->post('manufacturer_id');
				$ingroup = $this->input->post('ingroup');
				$parent_id = $this->input->post('parent_id');
				$tax_class_id = $this->input->post('tax_class_id');
				

                $data = array('model'=>$model,'name'=>$name,'type'=>$type,'sku'=>$sku,'upc'=>$upc,'ean'=>$ean,'jan'=>$jan,'isbn'=>$isbn,'mpn'=>$mpn,'quantity'=>$quantity,'shipping'=>$shipping,'sale_price'=>$sale_price,'suggested_price'=>$suggested_price,'buy_price'=>$buy_price,'special_price'=>$special_price,'points'=>$points,'date_available'=>$date_available,'weight'=>$weight,'length'=>$length,'width'=>$width,'height'=>$height,'subtract'=>$subtract,'minimum'=>$minimum,'status'=>$status,'buyed'=>$buyed,'date_added'=>$date_added,'special_price_date_start'=>$special_price_date_start,'special_price_date_end'=>$special_price_date_end,'manufacturer_id'=>$manufacturer_id,'ingroup'=>$ingroup,'parent_id'=>$parent_id,'tax_class_id'=>$tax_class_id);

                if($this->product_model->_insert($data))
                {
                    exit($this->lang->line('success')); // success
                }
                else
                {
                    $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                    redirect('product/_add_product');
                }
            }
            else //if page initial load or form validation false
            {
                $this->load->view('add_product.php');
	    }
	}

	function _edit_product($product_id = NULL, $hash_id = NULL)
	{
            $this->load->helper('encode');
            $this->form_validation->set_rules($this->product_model->set_validation_rules());
            

            if($this->form_validation->run() == TRUE)
	    {
	    	$product_id = $this->input->post('product_id');
			$hash_id = $this->input->post('id');

	    	//check hash if the user edit it
	    	if(!decode_id($product_id, $hash_id)){
				$this->session->set_flashdata('msg', $this->lang->line('error_form'));
				redirect('product');
			}

	    	$model = $this->input->post('model');
			$name = $this->input->post('name');
			$type = $this->input->post('type');
			$sku = $this->input->post('sku');
			$upc = $this->input->post('upc');
			$ean = $this->input->post('ean');
			$jan = $this->input->post('jan');
			$isbn = $this->input->post('isbn');
			$mpn = $this->input->post('mpn');
			$quantity = $this->input->post('quantity');
			$shipping = $this->input->post('shipping');
			$sale_price = $this->input->post('sale_price');
			$suggested_price = $this->input->post('suggested_price');
			$buy_price = $this->input->post('buy_price');
			$special_price = $this->input->post('special_price');
			$points = $this->input->post('points');
			$date_available = $this->input->post('date_available');
			$weight = $this->input->post('weight');
			$length = $this->input->post('length');
			$width = $this->input->post('width');
			$height = $this->input->post('height');
			$subtract = $this->input->post('subtract');
			$minimum = $this->input->post('minimum');
			$status = $this->input->post('status');
			$buyed = $this->input->post('buyed');
			$date_added = $this->input->post('date_added');
			$special_price_date_start = $this->input->post('special_price_date_start');
			$special_price_date_end = $this->input->post('special_price_date_end');
			$manufacturer_id = $this->input->post('manufacturer_id');
			$ingroup = $this->input->post('ingroup');
			$parent_id = $this->input->post('parent_id');
			$tax_class_id = $this->input->post('tax_class_id');
			

	    	$data = array('model'=>$model,'name'=>$name,'type'=>$type,'sku'=>$sku,'upc'=>$upc,'ean'=>$ean,'jan'=>$jan,'isbn'=>$isbn,'mpn'=>$mpn,'quantity'=>$quantity,'shipping'=>$shipping,'sale_price'=>$sale_price,'suggested_price'=>$suggested_price,'buy_price'=>$buy_price,'special_price'=>$special_price,'points'=>$points,'date_available'=>$date_available,'weight'=>$weight,'length'=>$length,'width'=>$width,'height'=>$height,'subtract'=>$subtract,'minimum'=>$minimum,'status'=>$status,'buyed'=>$buyed,'date_added'=>$date_added,'special_price_date_start'=>$special_price_date_start,'special_price_date_end'=>$special_price_date_end,'manufacturer_id'=>$manufacturer_id,'ingroup'=>$ingroup,'parent_id'=>$parent_id,'tax_class_id'=>$tax_class_id);

	    	if($this->product_model->_update($product_id, $data))
                {
                    exit($this->lang->line('success')); // success
                }
                else
                {
                    $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                    redirect("product/_edit_product/$product_id/$hash_id");
                }
	    }
	    else //if page initial load or form validation false
	    {

	    	//means come from product list

	    	if($hash_id != NULL)
	    	{
                    if(!decode_id($product_id,$hash_id)){
                        $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                        redirect('product');
                    }
	    	}

	    	//means come from validation error

	    	if($this->input->post('product_id'))
	    	{
                    $product_id = $this->input->post('product_id');
                    $hash_id = $this->input->post('id');

                    //check hash if the user edit it
                    if(!decode_id($product_id, $hash_id)){
                        $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                        redirect('product');
                    }
	    	}

	    	$data = array();

			
		
	    	$product_records = $this->product_model->get_where('product_id', $product_id)->row();

	    	$data['product_records'] = $product_records;

		$this->load->view('edit_product',$data);
	    }
	}
	
	function _delete_product($product_id = NULL, $hash_id = NULL)
	{
		$this->load->helper('encode');
		// test var from url 
		if($product_id == NULL || $hash_id == NULL){// if one or more are not set 
			exit( '1' );
		}
		if(!decode_ajax_id($product_id, $hash_id)){
			exit( '2' );
		}

		if($this->product_model->_delete($product_id))
		{
			exit($this->lang->line('success')); // success
		}
		else
		{
			exit( '3' );
		}

	}

}
?>