
	<div class="itemcontener form_add">
		<div class="item_box">
			<h3 class="heading"><?php echo $this->lang->line('edit_item_header'); ?></h3>
				<div class="item_content">
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<form class="form-horizontal" action="<?php echo site_url('cartitem/edit_item'); ?>" method="post" >
							<fieldset>
		
								<?php $error = ''; if(form_error('cart_id')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('cart'); ?> <span class="f_req">*</span></label>
							        <div class="controls">
									    <select name="cart_id" id="cart_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_cart'); ?></option>
							                <?php if(isset($cart_records)) : foreach($cart_records as $row) :
							                	$selected = FALSE; if($item_records->cart_id==$row->cart_id){ $selected = TRUE; }
							                ?>
											<option value="<?php echo $row->cart_id; ?>" <?php echo set_select('cart_id', $row->cart_id,$selected); ?>  >
											<?php echo $row->cart_id; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('cart_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('product_id')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('product'); ?> <span class="f_req">*</span></label>
							        <div class="controls">
										<?php echo form_hidden('product_id', $item_records->product_id);?>
										<?php echo form_error('product_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('quantity')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('quantity'); ?> <span class="f_req">*</span></label>
							        <div class="controls">
										<input type="text" name="quantity" id="quantity" value="<?php echo set_value('quantity',$item_records->quantity); ?>" class="form-control"  >
										<?php echo form_error('quantity', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('date_added')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('date_added'); ?> </label>
							        <div class="controls">
										<input type="text" name="date_added" id="date_added" value="<?php echo set_value('date_added',$item_records->date_added); ?>" class="form-control"  >
										<?php echo form_error('date_added', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_change_button'); ?></button>
										<a class="btn" href="<?php echo site_url('cartitem'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								<input type="hidden" name="id" value="<?php echo encode_id($item_records->item_id); ?>" />
								<input type="hidden" name="item_id" value="<?php echo $item_records->item_id; ?>" />

								</fieldset>
							</form>
				</div>
			</div>
		</div>