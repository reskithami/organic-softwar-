
<?php if (isset($order_records)):?>
	<div class="ordercontener form_add">
		<div class="order_box">
			<h3 class="heading"><?php echo $this->lang->line('edit_order_header'); ?></h3>
				<div class="order_content">
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div><?php $attributes = array("class" => "form-horizontal", "id"=>"order_edit_order");
						echo form_open("order/edit_order", $attributes);?>
						<fieldset>
		
								<?php $error = ''; if(form_error('invoice_no')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('invoice_no'); ?> </label>
							        <div class="controls">
										<input type="text" name="invoice_no" id="invoice_no" value="<?php echo ($this->input->post("invoice_no") )? $this->input->post("invoice_no") : $order_records->invoice_no; ?>" class="form-control"  >
										<?php echo form_error('invoice_no', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('invoice_prefix')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('invoice_prefix'); ?> </label>
							        <div class="controls">
										<input type="text" name="invoice_prefix" id="invoice_prefix" value="<?php echo ($this->input->post("invoice_prefix") )? $this->input->post("invoice_prefix") : $order_records->invoice_prefix; ?>" class="form-control"  >
										<?php echo form_error('invoice_prefix', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('order_status_array_id')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('order_status_array'); ?> </label>
							        <div class="controls">
									    <select name="order_status_array_id" id="order_status_array_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_order_status_array'); ?></option>
							                <?php if(isset($order_status_array_records)) : foreach($order_status_array_records as $key => $val) :
												$selected = "";
							                	if ( $this->input->post("order_status_array_id") )  {
													if( $this->input->post("order_status_array_id") == $key){ $selected = "selected"; }
												}else{
													if($order_records->order_status_array_id == $key ) { $selected = "selected"; }
												}
							                ?>
											<option value="<?php echo $key; ?>" <?php echo $selected; ?>  >
											<?php echo $val; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('order_status_array_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('customer_id')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('customer'); ?> </label>
							        <div class="controls">
									    <select name="customer_id" id="customer_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_customer'); ?></option>
							                <?php if(isset($customer_records)) : foreach($customer_records as $key => $val) :
												$selected = "";
							                	if ( $this->input->post("customer_id") )  {
													if( $this->input->post("customer_id") == $key){ $selected = "selected"; }
												}else{
													if($order_records->customer_id == $key ) { $selected = "selected"; }
												}
							                ?>
											<option value="<?php echo $key; ?>" <?php echo $selected; ?>  >
											<?php echo $val; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('customer_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('saller_id')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('saller'); ?> </label>
							        <div class="controls">
									    <select name="saller_id" id="saller_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_saller'); ?></option>
							                <?php if(isset($saller_records)) : foreach($saller_records as $key => $val) :
												$selected = "";
							                	if ( $this->input->post("saller_id") )  {
													if( $this->input->post("saller_id") == $key){ $selected = "selected"; }
												}else{
													if($order_records->saller_id == $key ) { $selected = "selected"; }
												}
							                ?>
											<option value="<?php echo $key; ?>" <?php echo $selected; ?>  >
											<?php echo $val; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('saller_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('firstname')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('firstname'); ?> </label>
							        <div class="controls">
										<input type="text" name="firstname" id="firstname" value="<?php echo ($this->input->post("firstname") )? $this->input->post("firstname") : $order_records->firstname; ?>" class="form-control"  >
										<?php echo form_error('firstname', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('lastname')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('lastname'); ?> </label>
							        <div class="controls">
										<input type="text" name="lastname" id="lastname" value="<?php echo ($this->input->post("lastname") )? $this->input->post("lastname") : $order_records->lastname; ?>" class="form-control"  >
										<?php echo form_error('lastname', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('email')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('email'); ?> </label>
							        <div class="controls">
										<input type="text" name="email" id="email" value="<?php echo ($this->input->post("email") )? $this->input->post("email") : $order_records->email; ?>" class="form-control"  >
										<?php echo form_error('email', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('phone')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('phone'); ?> </label>
							        <div class="controls">
										<input type="text" name="phone" id="phone" value="<?php echo ($this->input->post("phone") )? $this->input->post("phone") : $order_records->phone; ?>" class="form-control"  >
										<?php echo form_error('phone', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_firstname')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('payment_firstname'); ?> </label>
							        <div class="controls">
										<input type="text" name="payment_firstname" id="payment_firstname" value="<?php echo ($this->input->post("payment_firstname") )? $this->input->post("payment_firstname") : $order_records->payment_firstname; ?>" class="form-control"  >
										<?php echo form_error('payment_firstname', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_lastname')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('payment_lastname'); ?> </label>
							        <div class="controls">
										<input type="text" name="payment_lastname" id="payment_lastname" value="<?php echo ($this->input->post("payment_lastname") )? $this->input->post("payment_lastname") : $order_records->payment_lastname; ?>" class="form-control"  >
										<?php echo form_error('payment_lastname', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_company')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('payment_company'); ?> </label>
							        <div class="controls">
										<input type="text" name="payment_company" id="payment_company" value="<?php echo ($this->input->post("payment_company") )? $this->input->post("payment_company") : $order_records->payment_company; ?>" class="form-control"  >
										<?php echo form_error('payment_company', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_address_1')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('payment_address_1'); ?> </label>
							        <div class="controls">
										<input type="text" name="payment_address_1" id="payment_address_1" value="<?php echo ($this->input->post("payment_address_1") )? $this->input->post("payment_address_1") : $order_records->payment_address_1; ?>" class="form-control"  >
										<?php echo form_error('payment_address_1', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_address_2')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('payment_address_2'); ?> </label>
							        <div class="controls">
										<input type="text" name="payment_address_2" id="payment_address_2" value="<?php echo ($this->input->post("payment_address_2") )? $this->input->post("payment_address_2") : $order_records->payment_address_2; ?>" class="form-control"  >
										<?php echo form_error('payment_address_2', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_city')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('payment_city'); ?> </label>
							        <div class="controls">
										<input type="text" name="payment_city" id="payment_city" value="<?php echo ($this->input->post("payment_city") )? $this->input->post("payment_city") : $order_records->payment_city; ?>" class="form-control"  >
										<?php echo form_error('payment_city', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_zip')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('payment_zip'); ?> </label>
							        <div class="controls">
										<input type="text" name="payment_zip" id="payment_zip" value="<?php echo ($this->input->post("payment_zip") )? $this->input->post("payment_zip") : $order_records->payment_zip; ?>" class="form-control"  >
										<?php echo form_error('payment_zip', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_country')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('payment_country'); ?> </label>
							        <div class="controls">
										<input type="text" name="payment_country" id="payment_country" value="<?php echo ($this->input->post("payment_country") )? $this->input->post("payment_country") : $order_records->payment_country; ?>" class="form-control"  >
										<?php echo form_error('payment_country', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_method')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('payment_method'); ?> </label>
							        <div class="controls">
										<input type="text" name="payment_method" id="payment_method" value="<?php echo ($this->input->post("payment_method") )? $this->input->post("payment_method") : $order_records->payment_method; ?>" class="form-control"  >
										<?php echo form_error('payment_method', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('payment_code')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('payment_code'); ?> </label>
							        <div class="controls">
										<input type="text" name="payment_code" id="payment_code" value="<?php echo ($this->input->post("payment_code") )? $this->input->post("payment_code") : $order_records->payment_code; ?>" class="form-control"  >
										<?php echo form_error('payment_code', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('comment')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('comment'); ?> </label>
							        <div class="controls">
										<input type="text" name="comment" id="comment" value="<?php echo ($this->input->post("comment") )? $this->input->post("comment") : $order_records->comment; ?>" class="form-control"  >
										<?php echo form_error('comment', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('total')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('total'); ?> </label>
							        <div class="controls">
										<input type="text" name="total" id="total" value="<?php echo ($this->input->post("total") )? $this->input->post("total") : $order_records->total; ?>" class="form-control"  >
										<?php echo form_error('total', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('affiliate_id')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('affiliate'); ?> </label>
							        <div class="controls">
									    <select name="affiliate_id" id="affiliate_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_affiliate'); ?></option>
							                <?php if(isset($affiliate_records)) : foreach($affiliate_records as $key => $val) :
												$selected = "";
							                	if ( $this->input->post("affiliate_id") )  {
													if( $this->input->post("affiliate_id") == $key){ $selected = "selected"; }
												}else{
													if($order_records->affiliate_id == $key ) { $selected = "selected"; }
												}
							                ?>
											<option value="<?php echo $key; ?>" <?php echo $selected; ?>  >
											<?php echo $val; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('affiliate_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('commission')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('commission'); ?> </label>
							        <div class="controls">
										<input type="text" name="commission" id="commission" value="<?php echo ($this->input->post("commission") )? $this->input->post("commission") : $order_records->commission; ?>" class="form-control"  >
										<?php echo form_error('commission', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('tracking')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('tracking'); ?> </label>
							        <div class="controls">
										<input type="text" name="tracking" id="tracking" value="<?php echo ($this->input->post("tracking") )? $this->input->post("tracking") : $order_records->tracking; ?>" class="form-control"  >
										<?php echo form_error('tracking', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('language_code')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('language_code'); ?> </label>
							        <div class="controls">
										<input type="text" name="language_code" id="language_code" value="<?php echo ($this->input->post("language_code") )? $this->input->post("language_code") : $order_records->language_code; ?>" class="form-control"  >
										<?php echo form_error('language_code', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('currency_id')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('currency'); ?> </label>
							        <div class="controls">
									    <select name="currency_id" id="currency_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_currency'); ?></option>
							                <?php if(isset($currency_records)) : foreach($currency_records as $key => $val) :
												$selected = "";
							                	if ( $this->input->post("currency_id") )  {
													if( $this->input->post("currency_id") == $key){ $selected = "selected"; }
												}else{
													if($order_records->currency_id == $key ) { $selected = "selected"; }
												}
							                ?>
											<option value="<?php echo $key; ?>" <?php echo $selected; ?>  >
											<?php echo $val; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('currency_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('currency_code')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('currency_code'); ?> </label>
							        <div class="controls">
										<input type="text" name="currency_code" id="currency_code" value="<?php echo ($this->input->post("currency_code") )? $this->input->post("currency_code") : $order_records->currency_code; ?>" class="form-control"  >
										<?php echo form_error('currency_code', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('currency_value')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('currency_value'); ?> </label>
							        <div class="controls">
										<input type="text" name="currency_value" id="currency_value" value="<?php echo ($this->input->post("currency_value") )? $this->input->post("currency_value") : $order_records->currency_value; ?>" class="form-control"  >
										<?php echo form_error('currency_value', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('ip')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('ip'); ?> </label>
							        <div class="controls">
										<input type="text" name="ip" id="ip" value="<?php echo ($this->input->post("ip") )? $this->input->post("ip") : $order_records->ip; ?>" class="form-control"  >
										<?php echo form_error('ip', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('forwarded_ip')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('forwarded_ip'); ?> </label>
							        <div class="controls">
										<input type="text" name="forwarded_ip" id="forwarded_ip" value="<?php echo ($this->input->post("forwarded_ip") )? $this->input->post("forwarded_ip") : $order_records->forwarded_ip; ?>" class="form-control"  >
										<?php echo form_error('forwarded_ip', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('user_agent')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('user_agent'); ?> </label>
							        <div class="controls">
										<input type="text" name="user_agent" id="user_agent" value="<?php echo ($this->input->post("user_agent") )? $this->input->post("user_agent") : $order_records->user_agent; ?>" class="form-control"  >
										<?php echo form_error('user_agent', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('accept_language')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('accept_language'); ?> </label>
							        <div class="controls">
										<input type="text" name="accept_language" id="accept_language" value="<?php echo ($this->input->post("accept_language") )? $this->input->post("accept_language") : $order_records->accept_language; ?>" class="form-control"  >
										<?php echo form_error('accept_language', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('date_added')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('date_added'); ?> </label>
							        <div class="controls">
										<input type="text" name="date_added" id="date_added" value="<?php echo ($this->input->post("date_added") )? $this->input->post("date_added") : $order_records->date_added; ?>" class="form-control"  >
										<?php echo form_error('date_added', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('date_modified')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('date_modified'); ?> </label>
							        <div class="controls">
										<input type="text" name="date_modified" id="date_modified" value="<?php echo ($this->input->post("date_modified") )? $this->input->post("date_modified") : $order_records->date_modified; ?>" class="form-control"  >
										<?php echo form_error('date_modified', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_change_button'); ?></button>
										<a class="btn" href="<?php echo site_url('order'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								<input type="hidden" name="id" value="<?php echo encode_id($order_records->order_id); ?>" />
								<input type="hidden" name="order_id" value="<?php echo $order_records->order_id; ?>" />

								</fieldset>
							</form>
				</div>
			</div>
		</div>
	<?php endif;?>