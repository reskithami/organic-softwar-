<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MY_Sublimemodel class */
require_once APPPATH."core/MY_Sublimemodel.php";

class Order_model extends MY_Sublimemodel {
	
	protected $_table = 'order';
	protected $primary_key = 'order_id';
	
	function __construct() 
	{
		parent::__construct();
		$this->setTable($this->_table, $this->primary_key);
	}

	public function order_info()
	{
            $this->db->join('users AS customer', 'customer.id = order.customer_id','LEFT');
            $this->db->join('users AS saller', 'saller.id = order.saller_id', 'LEFT');
            $this->db->select('order.*, saller.first_name AS saller_first_name, saller.last_name AS saller_last_name, customer.first_name AS customer_first_name, customer.last_name AS customer_last_name');

            return $this;
	}
	public function order_sum($q = NULL, $where = NULL)
	{
            $this->db->join('order_product ', 'order.order_id = order_product.order_id','RIGHT');
            if ($q)
                $this->like_all_filds($q);
            if ($where)
                $this->db->where($where);

            return $this->db->select_sum('order_product.total')->get($this->_table)->row(); 
	}
	
	function like_all_filds($q) 
	{
		$this->db->group_start();
		$this->db->like("order.invoice_no", $q);
		$this->db->or_like("order.invoice_prefix", $q);
		$this->db->or_like("order.order_status_array_id", $q);
		$this->db->or_like("order.customer_id", $q);
		$this->db->or_like("order.firstname", $q);
		$this->db->or_like("order.lastname", $q);
		$this->db->or_like("order.email", $q);
		$this->db->or_like("order.phone", $q);
		$this->db->or_like("order.date_modified", $q);
		$this->db->group_end();

		return $this;
	}
	
    // get total rows
    function total_rows($q = NULL, $where = NULL) 
	{
		$this->db->from($this->_table);
			
                if ($q)
                    $this->like_all_filds($q);
                if ($where)
                    $this->db->where($where);
                
		return $this->db->count_all_results();
	}
        
         // get total rows
    function total_price($q = NULL, $where = NULL) 
	{
			
                if ($q)
                    $this->like_all_filds($q);
                if ($where)
                    $this->db->where($where);
                
		return $this->db->select_sum('total')->get($this->_table)->row();  
	}
	
    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL, $where = NULL) 
	{		
                if ($q)
                    $this->like_all_filds($q);
                if ($where)
                    $this->db->where($where);
		
                //$this->db->limit($limit, $start);
                
		return $this->order_info()->get()->result();
	}
	
	function set_validation_rules()
        {
            $config_validation = array();
		$config_validation[] = array(
                                        "field"   => "invoice_no",
                                        "label"   => $this->lang->line('invoice_no'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "invoice_prefix",
                                        "label"   => $this->lang->line('invoice_prefix'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "order_status_array_id",
                                        "label"   => $this->lang->line('order_status_array'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "customer_id",
                                        "label"   => $this->lang->line('customer'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "saller_id",
                                        "label"   => $this->lang->line('saller'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "firstname",
                                        "label"   => $this->lang->line('firstname'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "lastname",
                                        "label"   => $this->lang->line('lastname'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "email",
                                        "label"   => $this->lang->line('email'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "phone",
                                        "label"   => $this->lang->line('phone'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "payment_firstname",
                                        "label"   => $this->lang->line('payment_firstname'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "payment_lastname",
                                        "label"   => $this->lang->line('payment_lastname'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "payment_company",
                                        "label"   => $this->lang->line('payment_company'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "payment_address_1",
                                        "label"   => $this->lang->line('payment_address_1'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "payment_address_2",
                                        "label"   => $this->lang->line('payment_address_2'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "payment_city",
                                        "label"   => $this->lang->line('payment_city'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "payment_zip",
                                        "label"   => $this->lang->line('payment_zip'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "payment_country",
                                        "label"   => $this->lang->line('payment_country'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "payment_method",
                                        "label"   => $this->lang->line('payment_method'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "payment_code",
                                        "label"   => $this->lang->line('payment_code'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "comment",
                                        "label"   => $this->lang->line('comment'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "total",
                                        "label"   => $this->lang->line('total'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "commission",
                                        "label"   => $this->lang->line('commission'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "tracking",
                                        "label"   => $this->lang->line('tracking'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "language_code",
                                        "label"   => $this->lang->line('language_code'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "currency_code",
                                        "label"   => $this->lang->line('currency_code'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "currency_value",
                                        "label"   => $this->lang->line('currency_value'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "ip",
                                        "label"   => $this->lang->line('ip'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "forwarded_ip",
                                        "label"   => $this->lang->line('forwarded_ip'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "user_agent",
                                        "label"   => $this->lang->line('user_agent'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "accept_language",
                                        "label"   => $this->lang->line('accept_language'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "date_added",
                                        "label"   => $this->lang->line('date_added'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "date_modified",
                                        "label"   => $this->lang->line('date_modified'),
                                        "rules"   => "trim"
                                    );
		
            return $config_validation;
        }


}
?>