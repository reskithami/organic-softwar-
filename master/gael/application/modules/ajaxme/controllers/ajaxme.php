<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxme extends MX_Controller
{

	function __construct() {
		parent::__construct();
	}

	public function index($data)
	{
		echo 'Ajaxme controller is in action<hr>';
		$this->load->view('ajaxmeview',$data);
	}	

	public function simpleform($data)
	{
		$this->load->view('ajaxmesimpleform',$data);
	}	
	
	public function ajaxmecart($data)
	{
		$this->load->view('ajaxmecart',$data);
	}	
        
	public function ajaxmeproducttocart($data)
	{
		$this->load->view('ajaxmeproducttocart',$data);
	}
        
	public function ajaxmeaddproduct($data)
	{
		$this->load->view('ajaxmeaddproduct',$data);
	}	
        
	public function ajaxmeaddusers($data)
	{
		$this->load->view('ajaxmeaddusers',$data);
	}	
        
	public function ajaxmesearchusers($data)
	{
		$this->load->view('ajaxmesearchusers',$data);
	}	
        
	public function ajaxmesheduler($data)
	{
		$this->load->view('ajaxmesheduler',$data);
	}	
        
	public function ajaxmeAdminOrder($data)
	{
		$this->load->view('ajaxmeAdminOrder',$data);
	}	
        
	public function ajaxmeAdminProduct($data)
	{
		$this->load->view('ajaxmeAdminProduct',$data);
	}	
        
	public function ajaxmeAdminManufacturer($data)
	{
		$this->load->view('ajaxmeAdminManufacturer',$data);
	}	
        
        
	public function ajaxmeAddManufacturer($data)
	{
		$this->load->view('ajaxmeAddManufacturer',$data);
	}		
        
	public function ajaxmeAdminTax($data)
	{
		$this->load->view('ajaxmeAdminTax',$data);
	}	
        
        
	public function ajaxmeAddTax($data)
	{
		$this->load->view('ajaxmeAddTax',$data);
	}	
        
        
        

        
        
}