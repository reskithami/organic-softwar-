<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimecontroller.php";

class Users extends MY_Sublimecontroller {

	function __construct() {
		parent::__construct();
		$model_name = 'users_model';
		$this->setModel($model_name);
		$this->lang->load('modules');
	}
	
	function success ($last_id = ''){
            echo $this->lang->line('success').$last_id;
	}
	
	function index()
	{
            return true;
	}
	
	function _get_user($user_id)
        {
		$where = array(
			'id' => $user_id
		);
		$query = $this->users_model->get_where($where);
		if($query->num_rows() > 0)
		{
			// success
			return $query->first_row();
		}
		return false;
	}
	
	function _get_user_from_group($group = NULL)
        {
            $data['users'] = $this->_get_user_from_group_objet($group);
            
            $this->load->view('useronselect', $data);
	}
	
	function _get_user_from_group_objet($group = NULL)
        {
            if($group == NULL)
                return false;
            
            
            $this->load->library(array('ion_auth'));
            return $this->ion_auth->users($group)->result();            
	}

        function _search_users($searchstring = NULL)
        {
            if($searchstring === NULL)
            {
                $this->load->view('search_users');
            }
            else
            {
                $array = array('username' => $searchstring, 'first_name' => $searchstring, 'last_name' => $searchstring, 'email' => $searchstring);
                $result = $this->users_model->users_info()->or_like($array)->get('id')->result();
                echo json_encode($result);
            }
        }
	function _read_users($users_id = NULL, $hash_id = NULL)
	{
            $this->load->helper('encode');
            // test var from url 
            if($users_id == NULL || $hash_id == NULL){// if one or more are not set 
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('users');
                exit;
            }

            if(!decode_ajax_id($users_id, $hash_id)){
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('users');
                exit;
            }

            $query = $this->users_model->users_info()->get('users_id');
            if($query->num_rows() > 0)
            {
                // success
                $this->load->view('read_users',array('row'=>$query->first_row("array"),'users_id'=>$users_id));
            }
            else
            {
                $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                redirect('users');
                exit;
            }

	}
	
	function _list($offset = 0, $limit = 10)
	{
            $this->load->helper('encode');

            $data = array();

            $users_records = $this->users_model->users_info()->get_with_limit($limit, $offset, 'users_id')->result();

            $data['users_records'] = $users_records;

            $this->load->view('users_list.php',$data);
	}

	function _add_users()
        {
            $this->form_validation->set_rules($this->users_model->set_validation_rules());

            if($this->form_validation->run() == TRUE)
            {

                $ip_address = $this->input->post('ip_address');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$salt = $this->input->post('salt');
				$email = $this->input->post('email');
				$activation_code = $this->input->post('activation_code');
				$forgotten_password_code = $this->input->post('forgotten_password_code');
				$forgotten_password_time = $this->input->post('forgotten_password_time');
				$remember_code = $this->input->post('remember_code');
				$created_on = $this->input->post('created_on');
				$last_login = $this->input->post('last_login');
				$active = $this->input->post('active');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$company = $this->input->post('company');
				$phone = $this->input->post('phone');
				

                $data = array('ip_address'=>$ip_address,'username'=>$username,'password'=>$password,'salt'=>$salt,'email'=>$email,'activation_code'=>$activation_code,'forgotten_password_code'=>$forgotten_password_code,'forgotten_password_time'=>$forgotten_password_time,'remember_code'=>$remember_code,'created_on'=>$created_on,'last_login'=>$last_login,'active'=>$active,'first_name'=>$first_name,'last_name'=>$last_name,'company'=>$company,'phone'=>$phone);

                if(($last_id = $this->users_model->users_info()->_insert($data)))
                {                    
                    $this->load->library(array('ion_auth'));
                    $this->ion_auth->add_to_group(array(3), $last_id);
                    
                    exit( $this->lang->line('success').$last_id );
                }
                else
                {
                    $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                    redirect('users/add_users');
                }
            }
            else //if page initial load or form validation false
            {
                $this->load->view('add_users.php');
	    }
	}

	function _edit_users($users_id = NULL, $hash_id = NULL)
	{
            $this->load->helper('encode');
            $this->form_validation->set_rules($this->users_model->set_validation_rules());
            

            if($this->form_validation->run() == TRUE)
	    {
	    	$users_id = $this->input->post('users_id');
			$hash_id = $this->input->post('id');

	    	//check hash if the user edit it
	    	if(!decode_id($users_id, $hash_id)){
				$this->session->set_flashdata('msg', $this->lang->line('error_form'));
				redirect('users');
			}

	    	$ip_address = $this->input->post('ip_address');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$salt = $this->input->post('salt');
			$email = $this->input->post('email');
			$activation_code = $this->input->post('activation_code');
			$forgotten_password_code = $this->input->post('forgotten_password_code');
			$forgotten_password_time = $this->input->post('forgotten_password_time');
			$remember_code = $this->input->post('remember_code');
			$created_on = $this->input->post('created_on');
			$last_login = $this->input->post('last_login');
			$active = $this->input->post('active');
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$company = $this->input->post('company');
			$phone = $this->input->post('phone');
			

	    	$data = array('ip_address'=>$ip_address,'username'=>$username,'password'=>$password,'salt'=>$salt,'email'=>$email,'activation_code'=>$activation_code,'forgotten_password_code'=>$forgotten_password_code,'forgotten_password_time'=>$forgotten_password_time,'remember_code'=>$remember_code,'created_on'=>$created_on,'last_login'=>$last_login,'active'=>$active,'first_name'=>$first_name,'last_name'=>$last_name,'company'=>$company,'phone'=>$phone);

	    	if($this->users_model->users_info()->_update($users_id, $data))
                {
                    exit( $this->lang->line('success') );
                }
                else
                {
                    $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                    redirect("users/edit_users/$users_id/$hash");
                }
	    }
	    else //if page initial load or form validation false
	    {

	    	//means come from users list

	    	if($hash_id != NULL)
	    	{
                    if(!decode_id($users_id,$hash_id)){
                        $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                        redirect('users');
                    }
	    	}

	    	//means come from validation error

	    	if($this->input->post('users_id'))
	    	{
                    $users_id = $this->input->post('users_id');
                    $hash_id = $this->input->post('id');

                    //check hash if the user edit it
                    if(!decode_id($users_id, $hash_id)){
                        $this->session->set_flashdata('msg', $this->lang->line('error_form'));
                        redirect('users');
                    }
	    	}

	    	$data = array();

			
		
	    	$users_records = $this->users_model->users_info()->get_where('users_id', $users_id)->row();

	    	$data['users_records'] = $users_records;

		$this->load->view('edit_users',$data);
	    }
	}
	
	function _delete_users($users_id = NULL, $hash_id = NULL)
	{
		$this->load->helper('encode');
		// test var from url 
		if($users_id == NULL || $hash_id == NULL){// if one or more are not set 
			exit( '4' );
		}
		if(!decode_ajax_id($users_id, $hash_id)){
			exit( '3' );
		}

		if($this->users_model->users_info()->_delete($users_id))
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