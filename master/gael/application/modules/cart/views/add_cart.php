

	<div class="cartcontener form_add">
		<div class="cart_box">
			<h3 class="heading"><?php echo $this->lang->line('add_cart_header'); ?></h3>
				<div class="cart_content">					
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<?php $attributes = array('class' => 'form-horizontal', 'id'=>'cart_add_cart');
						echo form_open('cart/add_cart', $attributes);?>
							<fieldset>
		
								<?php $error = ''; if(form_error('customer_id')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('customer'), 'customer_id', $attributes);?>
							        <div class="controls">
										<?php echo form_hidden('customer_id', $cart_records->customer_id);?>
										<?php echo form_error('customer_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('session_id')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('session'), 'session_id', $attributes);?>
							        <div class="controls">
										<?php echo form_hidden('session_id', $cart_records->session_id);?>
										<?php echo form_error('session_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('status')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('status'), 'status', $attributes);?>
							        <div class="controls">
									    <select name="status" id="status" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_status'); ?></option>
							 				<option value="1" <?php echo set_select('status', '1'); ?> >open</option>
							 				<option value="2" <?php echo set_select('status', '2'); ?> >close</option>
									    </select>
										<?php echo form_error('status', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_button'); ?></button>
										<a class="btn" href="<?php echo site_url('cart'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								</fieldset>
							<?php echo form_close();?>
				</div>
			</div>
		</div>