

	<div class="ordercontener form_add">
		<div class="order_box">
			<h3 class="heading"><?php echo $this->lang->line('add_order_header'); ?></h3>
				<div class="order_content">					
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<?php $attributes = array('class' => 'form-horizontal', 'id'=>'order_add_order');
						echo form_open('order/add_order', $attributes);?>
							<fieldset>
		
								<?php $error = ''; if(form_error('invoice_no')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('invoice_no'), 'invoice_no', $attributes);?>
							        <div class="controls">
										<input type="text" name="invoice_no" id="invoice_no" value="<?php echo set_value('invoice_no'); ?>" class="form-control"  >
										<?php echo form_error('invoice_no', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('invoice_prefix')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('invoice_prefix'), 'invoice_prefix', $attributes);?>
							        <div class="controls">
										<input type="text" name="invoice_prefix" id="invoice_prefix" value="<?php echo set_value('invoice_prefix'); ?>" class="form-control"  >
										<?php echo form_error('invoice_prefix', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('order_status_array_id')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('order_status_array'), 'order_status_array_id', $attributes);?>
							        <div class="controls">
									    <select name="order_status_array_id" id="order_status_array_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_order_status_array'); ?></option>
							 				<option value="K" <?php echo set_select('order_status_array_id', 'K'); ?> >V</option>
							 				<option value="A" <?php echo set_select('order_status_array_id', 'A'); ?> >B</option>
									    </select>
										<?php echo form_error('order_status_array_id', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('customer_id')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('customer'), 'customer_id', $attributes);?>
							        <div class="controls">
									    <select name="customer_id" id="customer_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_customer'); ?></option>
							                <?php if(isset($customer_records)) : foreach($customer_records as $row) : ?>
											<option value="<?php echo $row->customer_id; ?>" <?php echo set_select('customer_id', $row->customer_id); ?>  >
											<?php echo $row->customer_name; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('customer_id', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('saller_id')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('saller'), 'saller_id', $attributes);?>
							        <div class="controls">
									    <select name="saller_id" id="saller_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_saller'); ?></option>
							                <?php if(isset($saller_records)) : foreach($saller_records as $row) : ?>
											<option value="<?php echo $row->saller_id; ?>" <?php echo set_select('saller_id', $row->saller_id); ?>  >
											<?php echo $row->saller_name; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('saller_id', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('firstname')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('firstname'), 'firstname', $attributes);?>
							        <div class="controls">
										<input type="text" name="firstname" id="firstname" value="<?php echo set_value('firstname'); ?>" class="form-control"  >
										<?php echo form_error('firstname', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('lastname')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('lastname'), 'lastname', $attributes);?>
							        <div class="controls">
										<input type="text" name="lastname" id="lastname" value="<?php echo set_value('lastname'); ?>" class="form-control"  >
										<?php echo form_error('lastname', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('email')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('email'), 'email', $attributes);?>
							        <div class="controls">
										<input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control"  >
										<?php echo form_error('email', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('phone')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('phone'), 'phone', $attributes);?>
							        <div class="controls">
										<input type="text" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" class="form-control"  >
										<?php echo form_error('phone', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_firstname')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('payment_firstname'), 'payment_firstname', $attributes);?>
							        <div class="controls">
										<input type="text" name="payment_firstname" id="payment_firstname" value="<?php echo set_value('payment_firstname'); ?>" class="form-control"  >
										<?php echo form_error('payment_firstname', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_lastname')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('payment_lastname'), 'payment_lastname', $attributes);?>
							        <div class="controls">
										<input type="text" name="payment_lastname" id="payment_lastname" value="<?php echo set_value('payment_lastname'); ?>" class="form-control"  >
										<?php echo form_error('payment_lastname', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_company')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('payment_company'), 'payment_company', $attributes);?>
							        <div class="controls">
										<input type="text" name="payment_company" id="payment_company" value="<?php echo set_value('payment_company'); ?>" class="form-control"  >
										<?php echo form_error('payment_company', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_address_1')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('payment_address_1'), 'payment_address_1', $attributes);?>
							        <div class="controls">
										<input type="text" name="payment_address_1" id="payment_address_1" value="<?php echo set_value('payment_address_1'); ?>" class="form-control"  >
										<?php echo form_error('payment_address_1', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_address_2')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('payment_address_2'), 'payment_address_2', $attributes);?>
							        <div class="controls">
										<input type="text" name="payment_address_2" id="payment_address_2" value="<?php echo set_value('payment_address_2'); ?>" class="form-control"  >
										<?php echo form_error('payment_address_2', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_city')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('payment_city'), 'payment_city', $attributes);?>
							        <div class="controls">
										<input type="text" name="payment_city" id="payment_city" value="<?php echo set_value('payment_city'); ?>" class="form-control"  >
										<?php echo form_error('payment_city', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_zip')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('payment_zip'), 'payment_zip', $attributes);?>
							        <div class="controls">
										<input type="text" name="payment_zip" id="payment_zip" value="<?php echo set_value('payment_zip'); ?>" class="form-control"  >
										<?php echo form_error('payment_zip', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_country')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('payment_country'), 'payment_country', $attributes);?>
							        <div class="controls">
										<input type="text" name="payment_country" id="payment_country" value="<?php echo set_value('payment_country'); ?>" class="form-control"  >
										<?php echo form_error('payment_country', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_method')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('payment_method'), 'payment_method', $attributes);?>
							        <div class="controls">
										<input type="text" name="payment_method" id="payment_method" value="<?php echo set_value('payment_method'); ?>" class="form-control"  >
										<?php echo form_error('payment_method', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_code')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('payment_code'), 'payment_code', $attributes);?>
							        <div class="controls">
										<input type="text" name="payment_code" id="payment_code" value="<?php echo set_value('payment_code'); ?>" class="form-control"  >
										<?php echo form_error('payment_code', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('comment')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('comment'), 'comment', $attributes);?>
							        <div class="controls">
										<input type="text" name="comment" id="comment" value="<?php echo set_value('comment'); ?>" class="form-control"  >
										<?php echo form_error('comment', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('total')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('total'), 'total', $attributes);?>
							        <div class="controls">
										<input type="text" name="total" id="total" value="<?php echo set_value('total'); ?>" class="form-control"  >
										<?php echo form_error('total', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('commission')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('commission'), 'commission', $attributes);?>
							        <div class="controls">
										<input type="text" name="commission" id="commission" value="<?php echo set_value('commission'); ?>" class="form-control"  >
										<?php echo form_error('commission', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('tracking')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('tracking'), 'tracking', $attributes);?>
							        <div class="controls">
										<input type="text" name="tracking" id="tracking" value="<?php echo set_value('tracking'); ?>" class="form-control"  >
										<?php echo form_error('tracking', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('language_code')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('language_code'), 'language_code', $attributes);?>
							        <div class="controls">
										<input type="text" name="language_code" id="language_code" value="<?php echo set_value('language_code'); ?>" class="form-control"  >
										<?php echo form_error('language_code', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('currency_code')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('currency_code'), 'currency_code', $attributes);?>
							        <div class="controls">
										<input type="text" name="currency_code" id="currency_code" value="<?php echo set_value('currency_code'); ?>" class="form-control"  >
										<?php echo form_error('currency_code', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('currency_value')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('currency_value'), 'currency_value', $attributes);?>
							        <div class="controls">
										<input type="text" name="currency_value" id="currency_value" value="<?php echo set_value('currency_value'); ?>" class="form-control"  >
										<?php echo form_error('currency_value', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('ip')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('ip'), 'ip', $attributes);?>
							        <div class="controls">
										<input type="text" name="ip" id="ip" value="<?php echo set_value('ip'); ?>" class="form-control"  >
										<?php echo form_error('ip', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('forwarded_ip')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('forwarded_ip'), 'forwarded_ip', $attributes);?>
							        <div class="controls">
										<input type="text" name="forwarded_ip" id="forwarded_ip" value="<?php echo set_value('forwarded_ip'); ?>" class="form-control"  >
										<?php echo form_error('forwarded_ip', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('user_agent')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('user_agent'), 'user_agent', $attributes);?>
							        <div class="controls">
										<input type="text" name="user_agent" id="user_agent" value="<?php echo set_value('user_agent'); ?>" class="form-control"  >
										<?php echo form_error('user_agent', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('accept_language')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('accept_language'), 'accept_language', $attributes);?>
							        <div class="controls">
										<input type="text" name="accept_language" id="accept_language" value="<?php echo set_value('accept_language'); ?>" class="form-control"  >
										<?php echo form_error('accept_language', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('date_added')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('date_added'), 'date_added', $attributes);?>
							        <div class="controls">
										<input type="text" name="date_added" id="date_added" value="<?php echo set_value('date_added'); ?>" class="form-control"  >
										<?php echo form_error('date_added', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('date_modified')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('date_modified'), 'date_modified', $attributes);?>
							        <div class="controls">
										<input type="text" name="date_modified" id="date_modified" value="<?php echo set_value('date_modified'); ?>" class="form-control"  >
										<?php echo form_error('date_modified', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_button'); ?></button>
										<a class="btn" href="<?php echo site_url('order'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								</fieldset>
							<?php echo form_close();?>
				</div>
			</div>
		</div>