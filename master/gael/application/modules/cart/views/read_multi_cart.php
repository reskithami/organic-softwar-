<div class="multi_read_cart row">

<?php 
if($cart_records):
    
    foreach ($cart_records as $key => $row): 
        
?>
	<div class="detail_cart col-md-4" id="cart_<?php echo $row->cart_id;?>">
            <div class="cart_contener fixed-panel">
                <h3><?php echo $row->first_name . ' ' . $row->last_name;?></h3>
                <p><?php echo $row->email;?></p>
                <a class="btn btn-default cart_selector" role="button" href="#" data-value="<?php echo $row->cart_id;?>"><?php echo $this->lang->line('view_detail');?> »</a>
            </div>
 	</div>
<?php 
    endforeach;
endif;
?>
</div>