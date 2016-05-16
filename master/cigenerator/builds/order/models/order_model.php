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
        $this->db->join('tb_order', 'tb_order.order_status_array_id = order.order_status_array_id');
        $this->db->join('tb_customer', 'tb_customer.customer_id = order.customer_id');
        $this->db->join('tb_saller', 'tb_saller.saller_id = order.saller_id');
        $this->db->join('tb_affiliate', 'tb_affiliate.affiliate_id = order.affiliate_id');
        $this->db->join('tb_currency', 'tb_currency.currency_id = order.currency_id');

        return $this;
	}
	
	function like_all_filds($q) 
	{
		
		 $this->db->like("order.invoice_no", $q);
		 $this->db->or_like("order.invoice_prefix", $q);
		 $this->db->or_like("order.order_status_array_id", $q);
		 $this->db->or_like("order.customer_id", $q);
		 $this->db->or_like("order.saller_id", $q);
		 $this->db->or_like("order.firstname", $q);
		 $this->db->or_like("order.lastname", $q);
		 $this->db->or_like("order.email", $q);
		 $this->db->or_like("order.phone", $q);
		 $this->db->or_like("order.payment_firstname", $q);
		 $this->db->or_like("order.payment_lastname", $q);
		 $this->db->or_like("order.payment_company", $q);
		 $this->db->or_like("order.payment_address_1", $q);
		 $this->db->or_like("order.payment_address_2", $q);
		 $this->db->or_like("order.payment_city", $q);
		 $this->db->or_like("order.payment_zip", $q);
		 $this->db->or_like("order.payment_country", $q);
		 $this->db->or_like("order.payment_method", $q);
		 $this->db->or_like("order.payment_code", $q);
		 $this->db->or_like("order.comment", $q);
		 $this->db->or_like("order.total", $q);
		 $this->db->or_like("order.affiliate_id", $q);
		 $this->db->or_like("order.commission", $q);
		 $this->db->or_like("order.tracking", $q);
		 $this->db->or_like("order.language_code", $q);
		 $this->db->or_like("order.currency_id", $q);
		 $this->db->or_like("order.currency_code", $q);
		 $this->db->or_like("order.currency_value", $q);
		 $this->db->or_like("order.ip", $q);
		 $this->db->or_like("order.forwarded_ip", $q);
		 $this->db->or_like("order.user_agent", $q);
		 $this->db->or_like("order.accept_language", $q);
		 $this->db->or_like("order.date_added", $q);
		 $this->db->or_like("order.date_modified", $q);

		return $this;
	}
	
    // get total rows
    function total_rows($q = NULL) 
	{
		$this->db->from($this->_table);
		$this->like_all_filds($q);
		return $this->db->count_all_results();
	}
	
    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) 
	{		
		$this->like_all_filds($q);
		$this->db->limit($limit, $start);
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
                                        "field"   => "affiliate_id",
                                        "label"   => $this->lang->line('affiliate'),
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
                                        "field"   => "currency_id",
                                        "label"   => $this->lang->line('currency'),
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