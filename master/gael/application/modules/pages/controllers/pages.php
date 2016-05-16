<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MX_Controller
{

	function __construct() {
            parent::__construct();
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
                $cart =  Modules::run('cart/_get_cart');
                $carteitem['carteitem'] = Modules::run('cartitem/_cart_item_list', $cart); 
                $carteitem['users_select'] = Modules::run('users/_get_user_from_group', 'prof');
                $data['caisse'] .= Modules::run('ajaxme/ajaxmeproducttocart',  $carteitem);
                
                $data['caisse'] .= Modules::run('pages/ajaxmesheduler');
                
                $data['error'] = $this->session->flashdata('error');
                
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
                if($cart_id = Modules::run('cart/_get_cart_from_customer', $user_id))
                    echo $cart_id;
                else
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
        
        function ajaxdeletecart($cart_id)
        {
            if ($this->_admin_pages())
            {
                Modules::run('cart/_del_cart_and_item', $cart_id); 
                $this->session->set_flashdata('error', 'cart deleted');
                redirect('pages/index', 'refresh');               
            }            
        }
        
        function ajaxmodifyitem($cart_item_id)
        {
            if ($this->_admin_pages())
            {
                Modules::run('cartitem/_modify_itme', $cart_item_id);                
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
                $cart =  Modules::run('cart/_get_cart');
                echo Modules::run('cartitem/_cart_item_list', $cart);                               
            }            
        }         
        
        function ajaxmesheduler($month = NULL, $year = NULL)
        {
            if ($this->_admin_pages())
            {
                $data['sheduler'] = Modules::run('order_product/_sheduler', $month, $year);
                echo Modules::run('ajaxme/ajaxmesheduler', $data);                               
            }            
        }   
        
        
        
        function creat_order()
        {
            if ($this->_admin_pages())
            {
                $saller_id = $this->ion_auth->get_user_id();
                $cart =  Modules::run('cart/_get_cart');
                if(! $cart)
                {
                    $this->session->set_flashdata('error', 'no cart');
                     redirect('pages/index', 'refresh');
                     return FALSE;
                }
                
                $customer =  Modules::run('users/_get_user',$cart->customer_id);
                if(! $customer)
                {
                    $this->session->set_flashdata('error', 'no customer');
                     redirect('pages/index', 'refresh');
                     return FALSE;
                }
                
                $cartitem =  Modules::run('cartitem/_get_items_form_cart',$cart->cart_id);
                if(! $cartitem)
                {
                    $this->session->set_flashdata('error', 'no item');
                     redirect('pages/index', 'refresh');
                     return FALSE;
                }
                    
                
                $order_id =  Modules::run('order/_add_order', $cart, $customer, $saller_id);
                
                if($order_id)
                {
                    if ($total = Modules::run('order_product/_add_from_cart', $order_id, $cartitem))
                    {
                         Modules::run('order/_update_total', $order_id, $total);
                         Modules::run('cart/_del_cart_and_item', $cart->cart_id);
                    }
                    
                    $this->session->set_flashdata('error', 'no order set');
                    redirect('pages/index', 'refresh');
                }
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
            elseif (!$this->ion_auth->in_group('vendeur')) //remove this elseif if you want to enable this for non-admins
            {
                //redirect them to the home page because they must be an administrator to view this
                return show_error('You must be an administrator to view this page.');
            }
            else
            {
                return true;
            }
        }
}