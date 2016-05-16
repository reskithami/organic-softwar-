<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimecontroller.php";

class Manufacturer extends MY_Sublimecontroller {

	function __construct() {
		parent::__construct();
		$model_name = 'manufacturer_model';
		$this->setModel($model_name);
		$this->lang->load('modules');
	}
	
	function _success (){
            echo $this->lang->line('success');
	}
	
	function _index()
	{
        $this->load->helper('encode');
        $q = $this->input->post('q');
		if($q === '')
        {
            $q = urldecode($this->uri->segment(4));           
        }
		
        $start = intval($this->uri->segment(5));
        $config["uri_segment"] = 5;
        
        if(!$q)
        {
           $q = '-----';
        }
        $config["base_url"] = base_url() . "order/index/" . urlencode($q) . '/';
        $config["first_url"] = base_url() . "order/index/" . urlencode($q) . '/';
        
        if($q === '-----')
        {
            $q = '';
        }
        
        $config["per_page"] = 10;
        $config["total_rows"] = $this->manufacturer_model->total_rows($q);
        $manufacturer = $this->manufacturer_model->get_limit_data($config["per_page"], $start, $q);

        $this->load->library("pagination");
        $this->pagination->initialize($config);

        $data = array(
            "manufacturer_records" => $manufacturer,
            "q" => $q,
            "pagination" => $this->pagination->create_links(),
            "total_rows" => $config["total_rows"],
            "start" => $start,
        );
        $this->load->view("manufacturer_list", $data);
	}

	function _read_manufacturer($manufacturer_id = NULL, $hash_id = NULL)
	{
            $this->load->helper('encode');
            // test var from url 
            if($manufacturer_id == NULL || $hash_id == NULL){// if one or more are not set 
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('manufacturer');
                exit;
            }

            if(!decode_ajax_id($manufacturer_id, $hash_id)){
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('manufacturer');
                exit;
            }

            $query = $this->manufacturer_model->manufacturer_info()->get('manufacturer_id');
            if($query->num_rows() > 0)
            {
                // success
                $this->load->view('read_manufacturer',array('row'=>$query->first_row("array"),'manufacturer_id'=>$manufacturer_id));
            }
            else
            {
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('manufacturer');
                exit;
            }

	}

	function _add_manufacturer()
        {
            $this->form_validation->set_rules($this->manufacturer_model->set_validation_rules());


            if($this->form_validation->run() == TRUE)
            {
                $name = $this->input->post('name');
				$logo = $this->input->post('logo');
				

                $data = array('name'=>$name,'logo'=>$logo);

                if($this->manufacturer_model->_insert($data))
                {
                    exit($this->lang->line('success')); // success
                }
                else
                {
                    $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                    redirect('manufacturer/_add_manufacturer');
                }
            }
            else //if page initial load or form validation false
            {
                $this->load->view('add_manufacturer.php');
	    }
	}

	function _edit_manufacturer($manufacturer_id = NULL, $hash_id = NULL)
	{
            $this->load->helper('encode');
            $this->form_validation->set_rules($this->manufacturer_model->set_validation_rules());
            

            if($this->form_validation->run() == TRUE)
	    {
	    	$manufacturer_id = $this->input->post('manufacturer_id');
			$hash_id = $this->input->post('id');

	    	//check hash if the user edit it
	    	if(!decode_id($manufacturer_id, $hash_id)){
				$this->session->set_flashdata('msg', $this->lang->line('error_form'));
				redirect('manufacturer');
			}

	    	$name = $this->input->post('name');
			$logo = $this->input->post('logo');
			

	    	$data = array('name'=>$name,'logo'=>$logo);

	    	if($this->manufacturer_model->_update($manufacturer_id, $data))
                {
                    exit($this->lang->line('success')); // success
                }
                else
                {
                    $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                    redirect("manufacturer/_edit_manufacturer/$manufacturer_id/$hash_id");
                }
	    }
	    else //if page initial load or form validation false
	    {

	    	//means come from manufacturer list

	    	if($hash_id != NULL)
	    	{
                    if(!decode_id($manufacturer_id,$hash_id)){
                        $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                        redirect('manufacturer');
                    }
	    	}

	    	//means come from validation error

	    	if($this->input->post('manufacturer_id'))
	    	{
                    $manufacturer_id = $this->input->post('manufacturer_id');
                    $hash_id = $this->input->post('id');

                    //check hash if the user edit it
                    if(!decode_id($manufacturer_id, $hash_id)){
                        $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                        redirect('manufacturer');
                    }
	    	}

	    	$data = array();

			
		
	    	$manufacturer_records = $this->manufacturer_model->get_where('manufacturer_id', $manufacturer_id)->row();

	    	$data['manufacturer_records'] = $manufacturer_records;

		$this->load->view('edit_manufacturer',$data);
	    }
	}
	
	function _delete_manufacturer($manufacturer_id = NULL, $hash_id = NULL)
	{
		$this->load->helper('encode');
		// test var from url 
		if($manufacturer_id == NULL || $hash_id == NULL){// if one or more are not set 
			exit( '1' );
		}
		if(!decode_ajax_id($manufacturer_id, $hash_id)){
			exit( '2' );
		}

		if($this->manufacturer_model->_delete($manufacturer_id))
		{
			exit($this->lang->line('success')); // success
		}
		else
		{
			exit( '3' );
		}

	}

}
?>