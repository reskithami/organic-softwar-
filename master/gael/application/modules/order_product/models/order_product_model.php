<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MY_Sublimemodel class */
require_once APPPATH."core/MY_Sublimemodel.php";

class Order_product_model extends MY_Sublimemodel {
	
	protected $_table = 'order_product';
	protected $primary_key = 'product_id';
	
	function __construct() {
		parent::__construct();
		$this->setTable($this->_table, $this->primary_key);
	}

	public function product_info()
    {
        $this->db->join('order', 'order.order_id = order_product.order_id');
        $this->db->join('product', 'product.product_id = order_product.product_id');

        return $this;
    }
    
    public function order_user()
    {
        $this->db->join('users', 'users.id = order_product.teacher');

        return $this;
    }
    
    function _multi_insert_data($data)
    {
        $this->db->insert_batch('order_product', $data);
        if($this->db->affected_rows()>0)
            return TRUE;
        return FALSE;
    }
    
 function set_validation_rules()
    {
        $config_validation = array();
            $config_validation[] = array(
                                    "field"   => "reward",
                                    "label"   => $this->lang->line('reward'),
                                    "rules"   => "trim"
                                );

        return $config_validation;
    }
    
    function _multi_delete_form_order($order_id)
    {        
        $this->db->where('order_id', $order_id);
        $this->db->delete($this->_table);
    }


}
?>