
	<div class="cartcontener form_add">
		<div class="cart_box">
			<h3 class="heading"><?php echo $this->lang->line('edit_cart_header'); ?></h3>
				<div class="cart_content">
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<form class="form-horizontal" action="<?php echo site_url('cart/edit_cart'); ?>" method="post" >
							<fieldset>
		
								<?php $error = ''; if(form_error('customer_id')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('customer'); ?> </label>
							        <div class="controls">
										<?php echo form_hidden('customer_id', $cart_records->customer_id);?>
										<?php echo form_error('customer_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('session_id')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('session'); ?> </label>
							        <div class="controls">
										<?php echo form_hidden('session_id', $cart_records->session_id);?>
										<?php echo form_error('session_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('status')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('status'); ?> </label>
							        <div class="controls">
										<?php

											$selected_1 = FALSE;

											if($cart_records->status=='1'){ $selected_1 = TRUE; }

											$selected_2 = FALSE;

											if($cart_records->status=='2'){ $selected_2 = TRUE; }
										?>
									    <select name="status" id="status" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_status'); ?></option>
							 				<option value="1" <?php echo set_select('status', '1', $selected_1); ?> >open</option>
							 				<option value="2" <?php echo set_select('status', '2', $selected_2); ?> >close</option>
									    </select>
										<?php echo form_error('status', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_change_button'); ?></button>
										<a class="btn" href="<?php echo site_url('cart'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								<input type="hidden" name="id" value="<?php echo encode_id($cart_records->cart_id); ?>" />
								<input type="hidden" name="cart_id" value="<?php echo $cart_records->cart_id; ?>" />

								</fieldset>
							</form>
				</div>
			</div>
		</div>