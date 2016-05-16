<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimecontroller.php";


class Address extends MY_Sublimecontroller {

	function __construct() {
		parent::__construct();
		$model_name = 'address_model';
		$this->setModel($model_name);
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper(array('url','form','language'));
		$this->lang->load('modules');
	}
	
	function success (){
		echo $this->lang->line('success');
	}
	
	function index($offset = 0, $limit = 10)
	{
		$this->load->helper('encode');
		
		$data = array();

		$address_records = $this->address_model->address_info()->get_with_limit($limit, $offset, 'address_id')->result();

		$data['address_records'] = $address_records;

		$this->load->view('address_list.php',$data);
	}
	
	function all()
	{
		$this->load->helper('encode');
		
		$data = array();

		$address_records = $this->address_model->address_info()->get('address_id')->result();

		$data['address_records'] = $address_records;

		$this->load->view('address_list.php',$data);
	}

	function add_address()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('address_type', $this->lang->line('address_type'), 'trim|required');
		$this->form_validation->set_rules('foreign_key', $this->lang->line('foreign_key'), 'trim|required');
		$this->form_validation->set_rules('foreign_type', $this->lang->line('foreign_type'), 'trim|required');
		$this->form_validation->set_rules('address', $this->lang->line('address'), 'trim');
		$this->form_validation->set_rules('address2', $this->lang->line('address2'), 'trim');
		$this->form_validation->set_rules('phone', $this->lang->line('phone'), 'trim');
		$this->form_validation->set_rules('phone2', $this->lang->line('phone2'), 'trim');
		$this->form_validation->set_rules('city', $this->lang->line('city'), 'trim');
		$this->form_validation->set_rules('country', $this->lang->line('country'), 'trim');
		$this->form_validation->set_rules('country_code', $this->lang->line('country_code'), 'trim');
		$this->form_validation->set_rules('zip', $this->lang->line('zip'), 'trim');
		$this->form_validation->set_rules('lat', $this->lang->line('lat'), 'trim');
		$this->form_validation->set_rules('lon', $this->lang->line('lon'), 'trim');
		

		if($this->form_validation->run() == TRUE)
	    {
	    	$address_type = $this->input->post('address_type');
			$foreign_key = $this->input->post('foreign_key');
			$foreign_type = $this->input->post('foreign_type');
			$address = $this->input->post('address');
			$address2 = $this->input->post('address2');
			$phone = $this->input->post('phone');
			$phone2 = $this->input->post('phone2');
			$city = $this->input->post('city');
			$country = $this->input->post('country');
			$country_code = $this->input->post('country_code');
			$zip = $this->input->post('zip');
			$lat = $this->input->post('lat');
			$lon = $this->input->post('lon');
			

	    	$data = array('address_type'=>$address_type,'foreign_key'=>$foreign_key,'foreign_type'=>$foreign_type,'address'=>$address,'address2'=>$address2,'phone'=>$phone,'phone2'=>$phone2,'city'=>$city,'country'=>$country,'country_code'=>$country_code,'zip'=>$zip,'lat'=>$lat,'lon'=>$lon);

	    	if($this->address_model->address_info()->_insert($data))
			{
				redirect('address/success');
			}
			else
			{
				$this->session->set_flashdata('msg', $this->lang->line('error_form'));
				redirect('address/add_address');
			}
	    }
	    else //if page initial load or form validation false
	    {
	    	$data['address_records'] = array();

			
			$this->load->view('add_address.php',$data);
	    }
	}

	function edit_address($address_id = NULL, $hash_id = NULL)
	{
		$this->load->helper('encode');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('address_type', $this->lang->line('address_type'), 'trim|required');
		$this->form_validation->set_rules('foreign_key', $this->lang->line('foreign_key'), 'trim|required');
		$this->form_validation->set_rules('foreign_type', $this->lang->line('foreign_type'), 'trim|required');
		$this->form_validation->set_rules('address', $this->lang->line('address'), 'trim');
		$this->form_validation->set_rules('address2', $this->lang->line('address2'), 'trim');
		$this->form_validation->set_rules('phone', $this->lang->line('phone'), 'trim');
		$this->form_validation->set_rules('phone2', $this->lang->line('phone2'), 'trim');
		$this->form_validation->set_rules('city', $this->lang->line('city'), 'trim');
		$this->form_validation->set_rules('country', $this->lang->line('country'), 'trim');
		$this->form_validation->set_rules('country_code', $this->lang->line('country_code'), 'trim');
		$this->form_validation->set_rules('zip', $this->lang->line('zip'), 'trim');
		$this->form_validation->set_rules('lat', $this->lang->line('lat'), 'trim');
		$this->form_validation->set_rules('lon', $this->lang->line('lon'), 'trim');
		

		if($this->form_validation->run() == TRUE)
	    {
	    	$address_id = $this->input->post('address_id');
			$hash_id = $this->input->post('id');

	    	//check hash if the user edit it
	    	if(!decode_id($address_id, $hash_id)){
				$this->session->set_flashdata('msg', $this->lang->line('error_form'));
				redirect('address');
			}

	    	$address_type = $this->input->post('address_type');
			$foreign_key = $this->input->post('foreign_key');
			$foreign_type = $this->input->post('foreign_type');
			$address = $this->input->post('address');
			$address2 = $this->input->post('address2');
			$phone = $this->input->post('phone');
			$phone2 = $this->input->post('phone2');
			$city = $this->input->post('city');
			$country = $this->input->post('country');
			$country_code = $this->input->post('country_code');
			$zip = $this->input->post('zip');
			$lat = $this->input->post('lat');
			$lon = $this->input->post('lon');
			

	    	$data = array('address_type'=>$address_type,'foreign_key'=>$foreign_key,'foreign_type'=>$foreign_type,'address'=>$address,'address2'=>$address2,'phone'=>$phone,'phone2'=>$phone2,'city'=>$city,'country'=>$country,'country_code'=>$country_code,'zip'=>$zip,'lat'=>$lat,'lon'=>$lon);

	    	if($this->address_model->address_info()->_update($address_id, $data))
			{
				redirect('address/success');
			}
			else
			{
				$this->session->set_flashdata('msg', $this->lang->line('error_form'));
				redirect("address/edit_address/$address_id/$hash");
			}
	    }
	    else //if page initial load or form validation false
	    {

	    	//means come from address list

	    	if($hash_id != NULL)
	    	{
	    		if(!decode_id($address_id,$hash_id)){
					$this->session->set_flashdata('msg', $this->lang->line('error_form'));
					redirect('address');
				}
	    	}

	    	//means come from validation error

	    	if($this->input->post('address_id'))
	    	{
	    		$address_id = $this->input->post('address_id');
				$hash_id = $this->input->post('id');

				//check hash if the user edit it
				if(!decode_id($address_id, $hash_id)){
					$this->session->set_flashdata('msg', $this->lang->line('error_form'));
					redirect('address');
				}
	    	}

	    	$data = array();

			
		
	    	$address_records = $this->address_model->address_info()->get_where('address_id', $address_id)->row();

	    	$data['address_records'] = $address_records;

			$this->load->view('edit_address',$data);
	    }
	}

	
	function read_address($address_id = NULL, $hash_id = NULL)
	{
		$this->load->helper('encode');
		// test var from url 
		if($address_id == NULL || $hash_id == NULL){// if one or more are not set 
			$this->session->set_flashdata('msg', $this->lang->line('error_form'));
			redirect('address');
			exit;
		}
		
		if(!decode_ajax_id($address_id, $hash_id)){
			$this->session->set_flashdata('msg', $this->lang->line('error_form'));
			redirect('address');
			exit;
		}
		
		$query = $this->address_model->address_info()->get('address_id');
		if($query->num_rows() > 0)
		{
			// success
			$this->load->view('read_address',array('row'=>$query->first_row("array")));
		}
		else
		{
			$this->session->set_flashdata('msg', $this->lang->line('error_form'));
			redirect('address');
			exit;
		}

	}
	
	function ajax_delete_address($address_id = NULL, $hash_id = NULL)
	{
		$this->load->helper('encode');
		// test var from url 
		if($address_id == NULL || $hash_id == NULL){// if one or more are not set 
			exit( '4' );
		}
		if(!decode_ajax_id($address_id, $hash_id)){
			exit( '3' );
		}

		if($this->address_model->address_info()->_delete($address_id))
		{
			exit( 'success' ); // success
		}
		else
		{
			exit( '2' );
		}

	}

}
?>