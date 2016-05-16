

	<div class="itemcontener form_add">
		<div class="item_box">
			<h3 class="heading"><?php echo $this->lang->line('add_item_header'); ?></h3>
				<div class="item_content">					
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<?php $attributes = array('class' => 'form-horizontal', 'id'=>'cartitem_add_item');
						echo form_open('cartitem/add_item', $attributes);?>
							<fieldset>
		
								<?php $error = ''; if(form_error('cart_id')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('cart'), 'cart_id', $attributes);?>
							        <div class="controls">
									    <select name="cart_id" id="cart_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_cart'); ?></option>
							                <?php if(isset($cart_records)) : foreach($cart_records as $row) : ?>
											<option value="<?php echo $row->cart_id; ?>" <?php echo set_select('cart_id', $row->cart_id); ?>  >
											<?php echo $row->cart_id; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('cart_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('product_id')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('product'), 'product_id', $attributes);?>
							        <div class="controls">
										<?php echo form_hidden('product_id', $item_records->product_id);?>
										<?php echo form_error('product_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('quantity')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('quantity'), 'quantity', $attributes);?>
							        <div class="controls">
										<input type="text" name="quantity" id="quantity" value="<?php echo set_value('quantity'); ?>" class="form-control"  >
										<?php echo form_error('quantity', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('date_added')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('date_added'), 'date_added', $attributes);?>
							        <div class="controls">
										<input type="text" name="date_added" id="date_added" value="<?php echo set_value('date_added'); ?>" class="form-control"  >
										<?php echo form_error('date_added', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_button'); ?></button>
										<a class="btn" href="<?php echo site_url('cartitem'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								</fieldset>
							<?php echo form_close();?>
				</div>
			</div>
		</div>