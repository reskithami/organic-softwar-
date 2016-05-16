<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimecontroller.php";


class Cart extends MY_Sublimecontroller {

	function __construct() {
		parent::__construct();
		$model_name = 'cart_model';
		$this->setModel($model_name);
		$this->lang->load('modules');
	}
	
	function success (){
		echo $this->lang->line('success');
	}
	
	function _get_cookie ()
        {
		$this->cookie_name = 'special_cart_' . str_replace(array('/','http:','.'), '', ROOTPATHCART);
		$this->cookie_key = get_cookie($this->cookie_name);
		return $this->cookie_key;
	}
        
        function _set_cookie($cart_id)
        {
		$this->cookie_name = 'special_cart_' . str_replace(array('/','http:','.'), '', ROOTPATHCART);
                set_cookie($this->cookie_name, $cart_id, 60 * 60 * 24 );
        }
	
	function _get_cart(){
		
		$this->_get_cookie();
                
		$where = array(
			'cart_id' => $this->cookie_key,
			'status' => 'open'
		);
		$query = $this->cart_model->cart_customer()->get_where($where);
		if($query->num_rows() > 0)
		{
			// success
			return $query->first_row();
		}
                
		return false;
	}
	
	function _get_cart_from_customer($customer_id){
		
		$this->_get_cookie();
                
		$where = array(
			'customer_id' => $customer_id,
			'status' => 'open'
		);
		$query = $this->cart_model->cart_customer()->get_where($where);
		if($query->num_rows() > 0)
		{
			// success
			return $query->first_row()->cart_id;
		}
                
		return false;
	}
        
        function _get_cart_id()
        {
		$cart = $this->_get_cart();
                if($cart)
                    return $cart->cart_id;
                return FALSE;
        }

	function _add_cart($user_id)
	{
		$init_date = date("Y-m-d H:i:s", strtotime("now"));
		$data = array('init_date'=>$init_date,'customer_id'=>$user_id,'session_id'=>$user_id,'status'=>'open');

		if(($new_cart_id = $this->cart_model->_insert($data)))
		{
                        $this->_set_cookie($new_cart_id);
			return $new_cart_id;
		}
		else
		{
			return false;
		}
	}

	
	function index()
	{
		return false;
	}
	
	function _open_cart($offset = 0, $limit = 6)
	{		
		$data = array();                
                
		$where = array(
			'status' => 'open'
		);

		$cart_records = $this->cart_model->cart_customer()->get_where_limit($limit, $offset, $where, '', 'init_date');
                
		$data['cart_records'] = $cart_records->result();

		$this->load->view('read_multi_cart.php',$data);
	}
        
	function _del_cart_and_item($cart_id = NULL)
	{
            if($cart_id === NULL)
                return FALSE;
            if($this->cart_model->_del_cart_and_item($cart_id))
                return TRUE;
            return FALSE;
	}

}
?>