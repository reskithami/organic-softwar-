<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimecontroller.php";

class Order extends MY_Sublimecontroller {

	function __construct() {
		parent::__construct();
		$model_name = 'order_model';
		$this->setModel($model_name);
		$this->lang->load('modules');
	}
	
	function _success (){
            echo $this->lang->line('success');
	}
	
	function _index()
	{
            $this->load->helper(array('encode','number'));
            $q = $this->input->post('q');
            if($q === '')
                $q = urldecode($this->uri->segment(4)); 

            $date_start = $this->input->post('date_start');
            if($date_start === '')
                $date_start = urldecode($this->uri->segment(5)); 

            $date_end = $this->input->post('date_end');
            if($date_end === '')
                $date_end = urldecode($this->uri->segment(6)); 

            $start = intval($this->uri->segment(7));
            $config["uri_segment"] = 7;

            if(!$q)
               $q = '-----';
            if(!$date_start)
               $date_start = date('Y-m-d');
            if(!$date_end)
               $date_end = date('Y-m-d');

            $config["base_url"] = base_url() . "order/index/" . urlencode($q) . '/' . urlencode($date_start) . '/' . urlencode($date_end) . '/';
            $config["first_url"] = base_url() . "order/index/" . urlencode($q) . '/' . urlencode($date_start) . '/' . urlencode($date_end) . '/';

            if($q === '-----')
                $q = '';

            $config["per_page"] = 10;
            $where = array(
                        'DATE(date_added) >= ' => $date_start,
                        'DATE(date_added) <= ' => $date_end          
                            );

            $config["total_rows"] = $this->order_model->total_rows($q, $where);
            $config["total_price"] = $this->order_model->total_price($q, $where);

            $order = $this->order_model->get_limit_data($config["per_page"], $start, $q, $where);

            $this->load->library("pagination");
            $this->pagination->initialize($config);
            
            $data = array(
                "order_records" => $order,
                "q" => $q,
                "date_start" => $date_start,
                "date_end" => $date_end,
                "total_rows" => $config["total_rows"],
                "total_price" => $config["total_price"],
                "start" => $start,
            );
            $this->load->view("order_list", $data);
	}

	function _read_order($order_id = NULL, $hash_id = NULL)
	{
            $this->load->helper('encode');
            // test var from url 
            if($order_id == NULL || $hash_id == NULL){// if one or more are not set 
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('order');
                exit;
            }

            if(!decode_ajax_id($order_id, $hash_id)){
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('order');
                exit;
            }

            $query = $this->order_model->order_info()->get('order_id');
            if($query->num_rows() > 0)
            {
                // success
                $this->load->view('read_order',array('row'=>$query->first_row("array"),'order_id'=>$order_id));
            }
            else
            {
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('order');
                exit;
            }

	}

	function _update_total($order_id, $total)
        {
            $this->order_model->_update($order_id, array('total' => $total));
        }
        
	function _add_order($cart, $customer, $saller_id, $invoce_pefix = 'ABC')
        {
            
		$this->load->library('user_agent');
		
		$invoice_no = $invoce_pefix;
		$invoice_prefix = $this->input->post('invoice_prefix');
		$order_status_array_id = 1;
		$customer_id = $customer->id;
		$firstname = $customer->first_name;
		$lastname = $customer->last_name;
		$email = $customer->email;
		$phone = $customer->phone;
		$payment_firstname = $customer->first_name;
		$payment_lastname = $customer->last_name;
		$payment_company = $customer->company;
		$payment_address_1 = '';
		$payment_address_2 = '';
		$payment_city = '';
		$payment_zip = '';
		$payment_country = '';
		$payment_method = '';
		$payment_code = '';
		$comment = '';
		$total ='';
		$affiliate_id = '';
		$commission = '';
		$tracking = '';
		$language_code = $this->lang->lang();
		$currency_id = '';
		$currency_code = '';
		$currency_value = '';
		$ip = $this->input->ip_address();
		$forwarded_ip = '';                
		$user_agent = $this->agent->browser();
		$accept_language = implode(",",$this->agent->languages());
		$date_added = date('Y-m-d H:i:s');
		$date_modified = '0000-00-00 00:00:00';
		

		$data = array('invoice_no'=>$invoice_no,'invoice_prefix'=>$invoice_prefix,'order_status_array_id'=>$order_status_array_id,'customer_id'=>$customer_id,'saller_id'=>$saller_id,'firstname'=>$firstname,'lastname'=>$lastname,'email'=>$email,'phone'=>$phone,'payment_firstname'=>$payment_firstname,'payment_lastname'=>$payment_lastname,'payment_company'=>$payment_company,'payment_address_1'=>$payment_address_1,'payment_address_2'=>$payment_address_2,'payment_city'=>$payment_city,'payment_zip'=>$payment_zip,'payment_country'=>$payment_country,'payment_method'=>$payment_method,'payment_code'=>$payment_code,'comment'=>$comment,'total'=>$total,'affiliate_id'=>$affiliate_id,'commission'=>$commission,'tracking'=>$tracking,'language_code'=>$language_code,'currency_id'=>$currency_id,'currency_code'=>$currency_code,'currency_value'=>$currency_value,'ip'=>$ip,'forwarded_ip'=>$forwarded_ip,'user_agent'=>$user_agent,'accept_language'=>$accept_language,'date_added'=>$date_added,'date_modified'=>$date_modified);

		if(($last_id = $this->order_model->_insert($data)))
		{
			return $last_id;
		}
		else
		{
			return FALSE;
		}
	}

	function _edit_order($order_id = NULL, $hash_id = NULL)
	{
            $this->load->helper('encode');
            $this->form_validation->set_rules($this->order_model->set_validation_rules());            

            if($this->form_validation->run() == TRUE)
	    {
	    	$order_id = $this->input->post('order_id');
			$hash_id = $this->input->post('id');

	    	//check hash if the user edit it
	    	if(!decode_id($order_id, $hash_id)){
				$this->session->set_flashdata('msg', $this->lang->line('error_form'));
				redirect('order');
			}

	    	$invoice_no = $this->input->post('invoice_no');
			$invoice_prefix = $this->input->post('invoice_prefix');
			$order_status_array_id = $this->input->post('order_status_array_id');
			$customer_id = $this->input->post('customer_id');
			$saller_id = $this->input->post('saller_id');
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$payment_firstname = $this->input->post('payment_firstname');
			$payment_lastname = $this->input->post('payment_lastname');
			$payment_company = $this->input->post('payment_company');
			$payment_address_1 = $this->input->post('payment_address_1');
			$payment_address_2 = $this->input->post('payment_address_2');
			$payment_city = $this->input->post('payment_city');
			$payment_zip = $this->input->post('payment_zip');
			$payment_country = $this->input->post('payment_country');
			$payment_method = $this->input->post('payment_method');
			$payment_code = $this->input->post('payment_code');
			$comment = $this->input->post('comment');
			$total = $this->input->post('total');
			$commission = $this->input->post('commission');
			$tracking = $this->input->post('tracking');
			$language_code = $this->input->post('language_code');
			$currency_code = $this->input->post('currency_code');
			$currency_value = $this->input->post('currency_value');
			$ip = $this->input->post('ip');
			$forwarded_ip = $this->input->post('forwarded_ip');
			$user_agent = $this->input->post('user_agent');
			$accept_language = $this->input->post('accept_language');
			$date_modified = date('Y-m-d H:i:s');
			

	    	$data = array('invoice_no'=>$invoice_no,'invoice_prefix'=>$invoice_prefix,'order_status_array_id'=>$order_status_array_id,'customer_id'=>$customer_id,'saller_id'=>$saller_id,'firstname'=>$firstname,'lastname'=>$lastname,'email'=>$email,'phone'=>$phone,'payment_firstname'=>$payment_firstname,'payment_lastname'=>$payment_lastname,'payment_company'=>$payment_company,'payment_address_1'=>$payment_address_1,'payment_address_2'=>$payment_address_2,'payment_city'=>$payment_city,'payment_zip'=>$payment_zip,'payment_country'=>$payment_country,'payment_method'=>$payment_method,'payment_code'=>$payment_code,'comment'=>$comment,'total'=>$total,'commission'=>$commission,'tracking'=>$tracking,'language_code'=>$language_code,'currency_code'=>$currency_code,'currency_value'=>$currency_value,'ip'=>$ip,'forwarded_ip'=>$forwarded_ip,'user_agent'=>$user_agent,'accept_language'=>$accept_language,'date_modified'=>$date_modified);

	    	if($this->order_model->order_info()->_update($order_id, $data))
                {
                    exit($this->lang->line('success')); // success
                }
                else
                {
                    $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                    redirect("order/_edit_order/$order_id/$hash_id");
                }
	    }
	    else //if page initial load or form validation false
	    {

	    	//means come from order list

	    	if($hash_id != NULL)
	    	{
                    if(!decode_id($order_id,$hash_id)){
                        $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                        redirect('order');
                    }
	    	}

	    	//means come from validation error

	    	if($this->input->post('order_id'))
	    	{
                    $order_id = $this->input->post('order_id');
                    $hash_id = $this->input->post('id');

                    //check hash if the user edit it
                    if(!decode_id($order_id, $hash_id)){
                        $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                        redirect('order');
                    }
	    	}

	    	$data = array();

			
		
	    	$order_records = $this->order_model->order_info()->get_where('order_id', $order_id)->row();

	    	$data['order_records'] = $order_records;
                $data['order_status_array_records'] = $this->arrayOrderStatus();
                $data['customer_records'] = Modules::run('users/_get_user_from_group_objet', 'customer');
                $data['saller_records'] = Modules::run('users/_get_user_from_group_objet', 'vendeur');

		$this->load->view('edit_order',$data);
	    }
	}
	
	function _delete_order($order_id = NULL, $hash_id = NULL)
	{
		$this->load->helper('encode');
		// test var from url 
		if($order_id == NULL || $hash_id == NULL){// if one or more are not set 
			exit( '4' );
		}
		if(!decode_ajax_id($order_id, $hash_id)){
			exit( '3' );
		}

		if($this->order_model->_delete($order_id))
		{
                    Modules::run('order_product/_delete_form_order', $order_id);
                    exit($this->lang->line('success')); // success
		}
		else
		{
			exit( '2' );
		}

	}
        
        function arrayOrderStatus()
        {
            return array(
                1 => $this->lang->line('New'),
                $this->lang->line('pending_payment'),
                $this->lang->line('processing'),
                $this->lang->line('complete'),
                $this->lang->line('closed'),
                $this->lang->line('canceled'),
                $this->lang->line('On Hold')
            );
        }

}
?>