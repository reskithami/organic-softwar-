<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MX_Controller class */
require APPPATH."core/MY_Sublimemodel.php";

class Mdl_hello extends MY_Sublimemodel {

  function __construct() {
	  $tbl_name = 'test';
    parent::__construct($tbl_name);
  }
}