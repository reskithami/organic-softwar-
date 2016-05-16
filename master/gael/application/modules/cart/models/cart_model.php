<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimemodel.php";


class Cart_model extends MY_Sublimemodel {
	
	protected $_table = 'cart';
	protected $primary_key = 'cart_id';
	
	function __construct() {
		parent::__construct();
		$this->setTable($this->_table, $this->primary_key);
	}

	public function cart_info()
        {
            return $this;
        }

	public function cart_customer()
        {
            $this->db->join('users', 'cart.customer_id = users.id')
                    ->select('cart.cart_id, users.first_name, users.last_name, users.email, users.id AS customer_id');
            return $this;
        }
        
        function _del_cart_and_item($cart_id)
        {
            $tables = array('cart', 'cart_item');
            $this->db->where('cart_id', $cart_id);
            $this->db->delete($tables);
        }

}
?>