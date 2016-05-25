<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimecontroller.php";

class  extends MY_Sublimecontroller {

	function __construct() {
		parent::__construct();
		$model_name = '';
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
        
		// todo find a more academics way
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
        $config["total_rows"] = $this->->total_rows($q);
        $ = $this->->get_limit_data($config["per_page"], $start, $q);

        $this->load->library("pagination");
        $this->pagination->initialize($config);

        $data = array(
            "_records" => $,
            "q" => $q,
            "pagination" => $this->pagination->create_links(),
            "total_rows" => $config["total_rows"],
            "start" => $start,
        );
        $this->load->view("_list", $data);
	}

	function _read_($_id = NULL, $hash_id = NULL)
	{
            $this->load->helper('encode');
            // test var from url 
            if($_id == NULL || $hash_id == NULL){// if one or more are not set 
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('');
                exit;
            }

            if(!decode_ajax_id($_id, $hash_id)){
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('');
                exit;
            }

            $query = $this->->_info()->get('_id');
            if($query->num_rows() > 0)
            {
                // success
                $this->load->view('read_',array('row'=>$query->first_row("array"),'_id'=>$_id));
            }
            else
            {
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('');
                exit;
            }

	}

	function _add_()
        {
            $this->form_validation->set_rules($this->->set_validation_rules());


            if($this->form_validation->run() == TRUE)
            {
                

                $data = array();

                if($this->->_insert($data))
                {
                    exit($this->lang->line('success')); // success
                }
                else
                {
                    $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                    redirect('/_add_');
                }
            }
            else //if page initial load or form validation false
            {
                $this->load->view('add_.php');
	    }
	}

	function _edit_($_id = NULL, $hash_id = NULL)
	{
            $this->load->helper('encode');
            $this->form_validation->set_rules($this->->set_validation_rules());
            

            if($this->form_validation->run() == TRUE)
	    {
	    	$_id = $this->input->post('_id');
			$hash_id = $this->input->post('id');

	    	//check hash if the user edit it
	    	if(!decode_id($_id, $hash_id)){
				$this->session->set_flashdata('msg', $this->lang->line('error_form'));
				redirect('');
			}

	    	

	    	$data = array();

	    	if($this->->_update($_id, $data))
                {
                    exit($this->lang->line('success')); // success
                }
                else
                {
                    $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                    redirect("/_edit_/$_id/$hash_id");
                }
	    }
	    else //if page initial load or form validation false
	    {

	    	//means come from  list

	    	if($hash_id != NULL)
	    	{
                    if(!decode_id($_id,$hash_id)){
                        $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                        redirect('');
                    }
	    	}

	    	//means come from validation error

	    	if($this->input->post('_id'))
	    	{
                    $_id = $this->input->post('_id');
                    $hash_id = $this->input->post('id');

                    //check hash if the user edit it
                    if(!decode_id($_id, $hash_id)){
                        $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                        redirect('');
                    }
	    	}

	    	$data = array();

			
		
	    	$_records = $this->->get_where('_id', $_id)->row();

	    	$data['_records'] = $_records;

		$this->load->view('edit_',$data);
	    }
	}
	
	function _delete_($_id = NULL, $hash_id = NULL)
	{
		$this->load->helper('encode');
		// test var from url 
		if($_id == NULL || $hash_id == NULL){// if one or more are not set 
			exit( '1' );
		}
		if(!decode_ajax_id($_id, $hash_id)){
			exit( '2' );
		}

		if($this->->_delete($_id))
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