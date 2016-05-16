<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/* load the MX_Controller class */
require_once APPPATH."third_party/MX/Controller.php";


class MY_Sublimecontroller extends MX_Controller
{

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper(array('form', 'url', 'language'));
	}

	function setModel($model_name){
		$this->load->model($model_name);
	}
        
        function _get_all($model)
        {
            $model_name = $model . '_model';
            return $this->$model_name->get();
        }

}