<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimemodel.php";


class Cartitem_model extends MY_Sublimemodel {
	
	protected $_table = 'cart_item';
	protected $primary_key = 'cart_item_id';
	
	function __construct() {
		parent::__construct();
		$this->setTable($this->_table, $this->primary_key);
	}

	public function item_info()
        {
            $this->db->join('product', 'product.product_id = cart_item.product_id' ,'LEFT')
                    ->select('cart_item.*,'
                            . ' product.name, product.model, '
                            . ' product.sale_price, product.type')
                    ->order_by('type');
            return $this;
        }

}
?>