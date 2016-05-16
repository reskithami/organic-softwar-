<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MY_Sublimemodel class */
require_once APPPATH."core/MY_Sublimemodel.php";

class Manufacturer_model extends MY_Sublimemodel {
	
	protected $_table = 'manufacturer';
	protected $primary_key = 'manufacturer_id';
	
	function __construct() 
	{
		parent::__construct();
		$this->setTable($this->_table, $this->primary_key);
	}

	public function manufacturer_info()
	{

        return $this;
	}
	
	function like_all_filds($q) 
	{
		
		 $this->db->like("manufacturer.name", $q);
		 $this->db->or_like("manufacturer.logo", $q);

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
		return $this->manufacturer_info()->get()->result();
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
                                        "field"   => "logo",
                                        "label"   => $this->lang->line('logo'),
                                        "rules"   => "trim"
                                    );
		
            return $config_validation;
        }


}
?>