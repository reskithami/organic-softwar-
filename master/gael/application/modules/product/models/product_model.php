<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MY_Sublimemodel class */
require_once APPPATH."core/MY_Sublimemodel.php";

class Product_model extends MY_Sublimemodel {
	
    protected $_table = 'product';
    protected $primary_key = 'product_id';
	
    function __construct() {
            parent::__construct();
            $this->setTable($this->_table, $this->primary_key);
    }

    public function product_info()
    {
        $this->db->join('manufacturer', 'manufacturer.manufacturer_id = product.manufacturer_id', 'LEFT')
		->join('tax', 'tax.tax_class_id = product.tax_class_id', 'LEFT')
		->select('product.*, tax.name AS tax_name, manufacturer.name AS manufacturer_name');

        return $this;
    }
    
    function product_distinct($fild)
    {
        $this->db->distinct(true)->select($fild);
        return $this;
    }
    
    function get_cours_from($month, $year)
    {
        $month = (int)$month;
        $year = (int)$year;
        $this->db->where("MONTH(start_date) = " . $month . " AND YEAR(start_date)" . $year . "");
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
                                        "rules"   => "trim|required"
                                    );
		$config_validation[] = array(
                                        "field"   => "type",
                                        "label"   => $this->lang->line('type'),
                                        "rules"   => "trim|required"
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
                                        "field"   => "status",
                                        "label"   => $this->lang->line('status'),
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
                                        "field"   => "tax_class_id",
                                        "label"   => $this->lang->line('tax_class'),
                                        "rules"   => "trim|required"
                                    );
		
            return $config_validation;
        }


}
?>