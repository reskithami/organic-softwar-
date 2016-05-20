<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* load the MX_Controller class */
require_once APPPATH."core/MY_Sublimecontroller.php";

class Order_product extends MY_Sublimecontroller {

	function __construct() {
		parent::__construct();
		$model_name = 'order_product_model';
		$this->setModel($model_name);
		$this->lang->load('modules');
	}
	
        function _add_from_cart($order_id, $cartitems = NULL)
        {
            if($cartitems === NULL)
                return false;
            
            $data = array();
            $total = 0;
            foreach ($cartitems as $k => $v)
            {
                $data [] = array(
                    'order_id' => $order_id,
                    'product_id' => $v->product_id,
                    'type_product' => $v->type,
                    'quantity' => $v->quantity,
                    'name' => $v->name,
                    'model' => $v->model,
                    'price' => $v->price,
                    'total' => $v->total, // === 'vente' ? $v->vente_price * $v->quantity  : $v->location_price * $v->quantity,
                    'start_date' => $v->start_date,
                    'end_date' => $v->end_date,
                    'teacher' => $v->teacher,
                );
                $total += $v->total;
            }
            if($this->order_product_model->_multi_insert_data($data))
                return $total;
            return false;
        }
        
        function _sheduler($month = NULL, $year = NULL)
        {
            $this->lang->load('calendar');
            $data['month'] = $month ? $month : date('m');
            $data['year'] = $year ? $year : date('Y');
            
            
            $where = array(
                    'date(start_date) >= ' => $data['year'] . '-' . $data['month'] . '-01',
                    'date(end_date) <=' => $data['year'] . '-' . $data['month'] . '-' .date('t',mktime(0, 0, 0, $data['month'], 1, $data['year'])) 
            );
            $data['date_book'] = $this->order_product_model->order_user()->product_info()->get_where($where,'', 'start_date ASC')->result();
            
            $this->load->view('sheduler',$data);
        }
        
        function _delete_form_order($order_id = NULL)
        {
            if($order_id == NULL)
                return false;
            $this->order_product_model->_multi_delete_form_order($order_id);
        }
        
        function _get_total_from_order_and_type($order_id = NULL, $type = NULL)
        {
            if($order_id == NULL && $type == NULL)
                return FALSE;
            
            return $this->order_product_model->total_price(array('order_id' => $order_id, 'type_product' => $type));
            
        }

}
?>