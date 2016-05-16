<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MY_Sublimemodel class */
require_once APPPATH."core/MY_Sublimemodel.php";

class Product_model extends MY_Sublimemodel {
	
	protected $_table = 'product';
	protected $primary_key = 'product_id';
	
	function __construct() 
	{
		parent::__construct();
		$this->setTable($this->_table, $this->primary_key);
	}

	public function product_info()
	{
        $this->db->join('manufacturer', 'manufacturer.manufacturer_id = product.manufacturer_id');
        $this->db->join('tb_parent', 'tb_parent.parent_id = product.parent_id');
        $this->db->join('tax', 'tax.tax_class_id = product.tax_class_id');

        return $this;
	}
	
	function like_all_filds($q) 
	{
		
		 $this->db->like("product.model", $q);
		 $this->db->or_like("product.name", $q);
		 $this->db->or_like("product.type", $q);
		 $this->db->or_like("product.sku", $q);
		 $this->db->or_like("product.upc", $q);
		 $this->db->or_like("product.ean", $q);
		 $this->db->or_like("product.jan", $q);
		 $this->db->or_like("product.isbn", $q);
		 $this->db->or_like("product.mpn", $q);
		 $this->db->or_like("product.quantity", $q);
		 $this->db->or_like("product.shipping", $q);
		 $this->db->or_like("product.sale_price", $q);
		 $this->db->or_like("product.suggested_price", $q);
		 $this->db->or_like("product.buy_price", $q);
		 $this->db->or_like("product.special_price", $q);
		 $this->db->or_like("product.points", $q);
		 $this->db->or_like("product.date_available", $q);
		 $this->db->or_like("product.weight", $q);
		 $this->db->or_like("product.length", $q);
		 $this->db->or_like("product.width", $q);
		 $this->db->or_like("product.height", $q);
		 $this->db->or_like("product.subtract", $q);
		 $this->db->or_like("product.minimum", $q);
		 $this->db->or_like("product.status", $q);
		 $this->db->or_like("product.buyed", $q);
		 $this->db->or_like("product.date_added", $q);
		 $this->db->or_like("product.special_price_date_start", $q);
		 $this->db->or_like("product.special_price_date_end", $q);
		 $this->db->or_like("product.manufacturer_id", $q);
		 $this->db->or_like("product.ingroup", $q);
		 $this->db->or_like("product.parent_id", $q);
		 $this->db->or_like("product.tax_class_id", $q);

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
		return $this->product_info()->get()->result();
	}
	
	function set_validation_rules()
        {
            $config_validation = array();
		$config_validation[] = array(
                                        "field"   => "model",
                                        "label"   => $this->lang->line('model'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "name",
                                        "label"   => $this->lang->line('name'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "type",
                                        "label"   => $this->lang->line('type'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "sku",
                                        "label"   => $this->lang->line('sku'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "upc",
                                        "label"   => $this->lang->line('upc'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "ean",
                                        "label"   => $this->lang->line('ean'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "jan",
                                        "label"   => $this->lang->line('jan'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "isbn",
                                        "label"   => $this->lang->line('isbn'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "mpn",
                                        "label"   => $this->lang->line('mpn'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "quantity",
                                        "label"   => $this->lang->line('quantity'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "shipping",
                                        "label"   => $this->lang->line('shipping'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "sale_price",
                                        "label"   => $this->lang->line('sale_price'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "suggested_price",
                                        "label"   => $this->lang->line('suggested_price'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "buy_price",
                                        "label"   => $this->lang->line('buy_price'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "special_price",
                                        "label"   => $this->lang->line('special_price'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "points",
                                        "label"   => $this->lang->line('points'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "date_available",
                                        "label"   => $this->lang->line('date_available'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "weight",
                                        "label"   => $this->lang->line('weight'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "length",
                                        "label"   => $this->lang->line('length'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "width",
                                        "label"   => $this->lang->line('width'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "height",
                                        "label"   => $this->lang->line('height'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "subtract",
                                        "label"   => $this->lang->line('subtract'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "minimum",
                                        "label"   => $this->lang->line('minimum'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "status",
                                        "label"   => $this->lang->line('status'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "buyed",
                                        "label"   => $this->lang->line('buyed'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "date_added",
                                        "label"   => $this->lang->line('date_added'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "special_price_date_start",
                                        "label"   => $this->lang->line('special_price_date_start'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "special_price_date_end",
                                        "label"   => $this->lang->line('special_price_date_end'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "manufacturer_id",
                                        "label"   => $this->lang->line('manufacturer'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "ingroup",
                                        "label"   => $this->lang->line('ingroup'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "parent_id",
                                        "label"   => $this->lang->line('parent'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "tax_class_id",
                                        "label"   => $this->lang->line('tax_class'),
                                        "rules"   => "trim"
                                    );
		
            return $config_validation;
        }


}
?>