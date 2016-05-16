<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MY_Sublimemodel class */
require_once APPPATH."core/MY_Sublimemodel.php";

class Users_model extends MY_Sublimemodel {
	
	protected $_table = 'users';
	protected $primary_key = 'id';
	
	function __construct() {
		parent::__construct();
		$this->setTable($this->_table, $this->primary_key);
	}

	public function or_like($match)
        {
            $this->db->or_like($match)
                    ->select('CONCAT_WS(" ",first_name, last_name, email) AS value, id AS user_id');
            return $this;
        }

	public function users_info()
        {
            return $this;
        }
    
 function set_validation_rules()
        {
            $config_validation = array();
		$config_validation[] = array(
                                        "field"   => "username",
                                        "label"   => $this->lang->line('username'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "password",
                                        "label"   => $this->lang->line('password'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "email",
                                        "label"   => $this->lang->line('email'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "active",
                                        "label"   => $this->lang->line('active'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "first_name",
                                        "label"   => $this->lang->line('first_name'),
                                        "rules"   => "trim|required"
                                    );
		$config_validation[] = array(
                                        "field"   => "last_name",
                                        "label"   => $this->lang->line('last_name'),
                                        "rules"   => "trim|required"
                                    );
		$config_validation[] = array(
                                        "field"   => "company",
                                        "label"   => $this->lang->line('company'),
                                        "rules"   => "trim"
                                    );
		$config_validation[] = array(
                                        "field"   => "phone",
                                        "label"   => $this->lang->line('phone'),
                                        "rules"   => "trim"
                                    );
		
            return $config_validation;
        }


}
?>