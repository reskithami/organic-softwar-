<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller
{

	function __construct() 
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
	}
	
	function index()
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {	
                $order['content'] = Modules::run('order/_index');                
                
                $data['header'] = '';
                $data['titelHeader'] = $this->lang->line('order');
                $data['content'] = Modules::run('ajaxme/ajaxmeAdminOrder',$order);
                
                
                $this->load->view('general',$data);
            }
	}
        
        function ajaxEditOrder($id = NULL, $code = NULL)
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {	
                echo Modules::run('order/_edit_order', $id, $code);
            }
        }
        
        function ajaxDeleteOrder($id = NULL, $code = NULL)
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {	
                echo Modules::run('order/_delete_order', $id, $code);
            }
        }
        
        /* ====================== product ====================== */
               
        function product()
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {              
                
                $product['content'] = Modules::run('product/_index'); 
                
                $data['header'] = '';
                $data['titelHeader'] = $this->lang->line('product');
                $data['content'] = Modules::run('ajaxme/ajaxmeAdminProduct',$product);
                
                
                $this->load->view('general',$data);
                
            }
        }
        
        function ajaxEditProduct($id = NULL, $code = NULL)
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {	
                echo Modules::run('product/_edit_product', $id, $code);
            }
        }
        
        function creatproduct()
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {              
                $productdata['manufacturer_records'] = Modules::run('manufacturer/_get_all','manufacturer');
                $productdata['tax_records'] = Modules::run('tax/_get_all','tax');
                
                $productdata['productform'] = Modules::run('product/_add_product');
                
                $data['header'] = '';
                $data['titelHeader'] = $this->lang->line('product');
                $data['content'] = Modules::run('ajaxme/ajaxmeaddproduct',$productdata);
                
                $this->load->view('general',$data);
                
            }
        }
        
        function ajaxaddproduct()
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {
                echo Modules::run('product/_add_product');                               
            }            
        }        
        
        function ajaxDeleteProduct($id = NULL, $code = NULL)
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {	
                echo Modules::run('product/_delete_product', $id, $code);
            }
        }
        
        /* ====================== Manufacturer ====================== */
               
        function manufacturer()
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {              
                
                $manufacturer['content'] = Modules::run('manufacturer/_index'); 
                
                $data['header'] = '';
                $data['titelHeader'] = $this->lang->line('manufacturer');
                $data['content'] = Modules::run('ajaxme/ajaxmeAdminManufacturer',$manufacturer);
                
                
                $this->load->view('general',$data);
                
            }
        }
        
        function ajaxEditManufacturer($id = NULL, $code = NULL)
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {	
                echo Modules::run('manufacturer/_edit_manufacturer', $id, $code);
            }
        }
        
        function creatManufacturer()
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {              
                $manufacturer['manufacturerform'] = Modules::run('manufacturer/_add_manufacturer');
                
                $data['header'] = '';
                $data['titelHeader'] = $this->lang->line('manufacturer');
                $data['content'] = Modules::run('ajaxme/ajaxmeAddManufacturer',$manufacturer);
                
                $this->load->view('general',$data);
                
            }
        }
        
        function ajaxaddManufacturer()
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {
                echo Modules::run('manufacturer/_add_manufacturer');                               
            }            
        }        
        
        function ajaxDeleteManufacturer($id = NULL, $code = NULL)
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {	
                echo Modules::run('manufacturer/_delete_manufacturer', $id, $code);
            }
        }
        
        
        /* ====================== TAX ====================== */
               
        function tax()
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {              
                
                $manufacturer['content'] = Modules::run('tax/_index'); 
                
                $data['header'] = '';
                $data['titelHeader'] = $this->lang->line('tax');
                $data['content'] = Modules::run('ajaxme/ajaxmeAdmintax',$manufacturer);
                
                
                $this->load->view('general',$data);
                
            }
        }
        
        function ajaxEditTax($id = NULL, $code = NULL)
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {	
                echo Modules::run('tax/_edit_tax', $id, $code);
            }
        }
        
        function creatTax()
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {              
                $manufacturer['taxform'] = Modules::run('tax/_add_tax');
                
                $data['header'] = '';
                $data['titelHeader'] = $this->lang->line('tax');
                $data['content'] = Modules::run('ajaxme/ajaxmeAddTax',$manufacturer);
                
                $this->load->view('general',$data);
                
            }
        }
        
        function ajaxaddTax()
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {
                echo Modules::run('tax/_add_tax');                               
            }            
        }        
        
        function ajaxDeletetax($id = NULL, $code = NULL)
        {
            if (($data['logedUser'] = $this->_admin_pages()))
            {	
                echo Modules::run('tax/_delete_tax', $id, $code);
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
                return $this->ion_auth->user()->row();
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