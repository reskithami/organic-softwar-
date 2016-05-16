<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends MX_Controller
{

	function __construct() {
            parent::__construct();
            $this->load->driver('cache',array('adapter' => 'apc', 'backup' => 'file'));
            $this->load->helper(array('form', 'url'));
	}
	
	function index(){
            if ($this->_admin_pages())
            {	
                $data['panier'] = Modules::run('cart/_open_cart');
                
                $searchusers['searchusers'] = Modules::run('users/_search_users');
                $data['customer'] = Modules::run('ajaxme/ajaxmesearchusers',$searchusers);
                $formaddusers['formaddusers'] = Modules::run('users/_add_users');
                $data['customer'] .= Modules::run('ajaxme/ajaxmeaddusers',$formaddusers);
                
                $data['caisse'] = Modules::run('product/_type');
                $data['caisse'] .= Modules::run('product/_caisse_product');
                $cart_id =  Modules::run('cart/_get_cart_id');
                $carteitem['carteitem'] = Modules::run('cartitem/_cart_item_list', $cart_id); 
                $data['caisse'] .= Modules::run('ajaxme/ajaxmeproducttocart',  $carteitem);
                

                $this->load->view('general',$data);
            }
	}
        
        function ajaxsearchusers($match)
        {
            if ($this->_admin_pages())
            {
                echo Modules::run('users/_search_users', $match);                               
            }            
        }
        
        function ajaxaddusers()
        {
            if ($this->_admin_pages())
            {
                echo Modules::run('users/_add_users');                               
            }            
        }
        
        function ajaxcreatcart($user_id)
        {
            if ($this->_admin_pages())
            {
                echo Modules::run('cart/_add_cart', $user_id);                               
            }            
        }
        
        function ajaxselectecart($cart_id)
        {
            if ($this->_admin_pages())
            {
                Modules::run('cart/_set_cookie', $cart_id);                
            }            
        }
        
        function ajaxmodifyitem($cart_item_id)
        {
            if ($this->_admin_pages())
            {
                Modules::run('cartitem/_modify_itme', $cart_item_id);                
            }            
        }
        
        
	        
        function creatproduct()
        {
            if ($this->_admin_pages())
            {              
                $productdata['manufacturer_records'] = Modules::run('manufacturer/_get_all','manufacturer');
                $productdata['tax_records'] = Modules::run('tax/_get_all','tax');
                
                $productdata['productform'] = Modules::run('product/_add_product');
                
                $data['undercenter'] = Modules::run('ajaxme/ajaxmeaddproduct',$productdata);
                
                $data['uppercenter'] = ''; 
                $data['center'] = ''; 
                
                $this->load->view('general',$data);
                
            }
        }
        
        function ajaxaddproduct()
        {
            if ($this->_admin_pages())
            {
                echo Modules::run('product/_add_product');                               
            }            
        }
        
        function ajaxadditem($id, $code)
        {
            if ($this->_admin_pages())
            {
                Modules::run('cartitem/_add_item',$id, $code);                               
            }            
        }
        
        
        function ajaxcartitemlist()
        {
            if ($this->_admin_pages())
            {
                $cart_id =  Modules::run('cart/_get_cart_id');
                echo Modules::run('cartitem/_cart_item_list', $cart_id);                               
            }            
        }
        
        function _admin_pages()
        {
            $this->load->library(array('ion_auth'));
            if (!$this->ion_auth->logged_in())
            {
                //redirect them to the login page
                redirect('auth/login', 'refresh');
            }
            elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
            {
                //redirect them to the home page because they must be an administrator to view this
                return show_error('You must be an administrator to view this page.');
            }
            else
            {
                return true;
            }
        }


    public function upload()
    {
       $this->load->view('upload', array('error'=>''));
    }
    
    function do_upload()
    {        
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload');  
        $files = $_FILES;
        $cpt = count($_FILES['files']['name']);
        for($i=0; $i<$cpt; $i++)
        {           
            $_FILES['files']['name']= $files['files']['name'][$i];
            $_FILES['files']['type']= $files['files']['type'][$i];
            $_FILES['files']['tmp_name']= $files['files']['tmp_name'][$i];
            $_FILES['files']['error']= $files['files']['error'][$i];
            $_FILES['files']['size']= $files['files']['size'][$i];
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('files'))
            {  
                $error =['error' => $this->upload->display_errors()];
                var_dump($error);
            }
        }
    }
}