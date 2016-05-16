<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimecontroller.php";

class Tax extends MY_Sublimecontroller {

	function __construct() {
		parent::__construct();
		$model_name = 'tax_model';
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
        $config["total_rows"] = $this->tax_model->total_rows($q);
        $tax = $this->tax_model->get_limit_data($config["per_page"], $start, $q);

        $this->load->library("pagination");
        $this->pagination->initialize($config);

        $data = array(
            "tax_records" => $tax,
            "q" => $q,
            "pagination" => $this->pagination->create_links(),
            "total_rows" => $config["total_rows"],
            "start" => $start,
        );
        $this->load->view("tax_list", $data);
	}

	function _read_tax($tax_id = NULL, $hash_id = NULL)
	{
            $this->load->helper('encode');
            // test var from url 
            if($tax_id == NULL || $hash_id == NULL){// if one or more are not set 
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('tax');
                exit;
            }

            if(!decode_ajax_id($tax_id, $hash_id)){
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('tax');
                exit;
            }

            $query = $this->tax_model->tax_info()->get('tax_id');
            if($query->num_rows() > 0)
            {
                // success
                $this->load->view('read_tax',array('row'=>$query->first_row("array"),'tax_id'=>$tax_id));
            }
            else
            {
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('tax');
                exit;
            }

	}

	function _add_tax()
        {
            $this->form_validation->set_rules($this->tax_model->set_validation_rules());


            if($this->form_validation->run() == TRUE)
            {
                $name = $this->input->post('name');
				$ratio = $this->input->post('ratio');
				

                $data = array('name'=>$name,'ratio'=>$ratio);

                if($this->tax_model->_insert($data))
                {
                    exit($this->lang->line('success')); // success
                }
                else
                {
                    $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                    redirect('tax/_add_tax');
                }
            }
            else //if page initial load or form validation false
            {
                $this->load->view('add_tax.php');
	    }
	}

	function _edit_tax($tax_id = NULL, $hash_id = NULL)
	{
            $this->load->helper('encode');
            $this->form_validation->set_rules($this->tax_model->set_validation_rules());
            

            if($this->form_validation->run() == TRUE)
	    {
	    	$tax_id = $this->input->post('tax_id');
			$hash_id = $this->input->post('id');

	    	//check hash if the user edit it
	    	if(!decode_id($tax_id, $hash_id)){
				$this->session->set_flashdata('msg', $this->lang->line('error_form'));
				redirect('tax');
			}

	    	$name = $this->input->post('name');
			$ratio = $this->input->post('ratio');
			

	    	$data = array('name'=>$name,'ratio'=>$ratio);

	    	if($this->tax_model->_update($tax_id, $data))
                {
                    exit($this->lang->line('success')); // success
                }
                else
                {
                    $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                    redirect("tax/_edit_tax/$tax_id/$hash_id");
                }
	    }
	    else //if page initial load or form validation false
	    {

	    	//means come from tax list

	    	if($hash_id != NULL)
	    	{
                    if(!decode_id($tax_id,$hash_id)){
                        $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                        redirect('tax');
                    }
	    	}

	    	//means come from validation error

	    	if($this->input->post('tax_id'))
	    	{
                    $tax_id = $this->input->post('tax_id');
                    $hash_id = $this->input->post('id');

                    //check hash if the user edit it
                    if(!decode_id($tax_id, $hash_id)){
                        $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                        redirect('tax');
                    }
	    	}

	    	$data = array();

			
		
	    	$tax_records = $this->tax_model->get_where('tax_id', $tax_id)->row();

	    	$data['tax_records'] = $tax_records;

		$this->load->view('edit_tax',$data);
	    }
	}
	
	function _delete_tax($tax_id = NULL, $hash_id = NULL)
	{
		$this->load->helper('encode');
		// test var from url 
		if($tax_id == NULL || $hash_id == NULL){// if one or more are not set 
			exit( '1' );
		}
		if(!decode_ajax_id($tax_id, $hash_id)){
			exit( '2' );
		}

		if($this->tax_model->_delete($tax_id))
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