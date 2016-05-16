<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MY_Sublimemodel class */
require_once APPPATH."core/MY_Sublimemodel.php";

class Tax_model extends MY_Sublimemodel {
	
	protected $_table = 'tax';
	protected $primary_key = 'tax_class_id';
	
	function __construct() 
	{
		parent::__construct();
		$this->setTable($this->_table, $this->primary_key);
	}

	public function tax_info()
	{

        return $this;
	}
	
	function like_all_filds($q) 
	{
		
		 $this->db->like("tax.name", $q);
		 $this->db->or_like("tax.ratio", $q);

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
		return $this->tax_info()->get()->result();
	}
	
	function set_validation_rules()
        {
            $config_validation = array();
		$config_validation[] = array(
                                        "field"   => "name",
                                        "label"   => $this->lang->line('name'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "ratio",
                                        "label"   => $this->lang->line('ratio'),
                                        "rules"   => "trim"
                                    );
		
            return $config_validation;
        }


}
?>