<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimemodel.php";


class Address_model extends MY_Sublimemodel {
	
	protected $_table = 'address';
	protected $primary_key = 'address_id';
	
	function __construct() {
		parent::__construct();
		$this->setTable($this->_table, $this->primary_key);
	}

	public function address_info()
    {

        return $this;
    }

}
?>