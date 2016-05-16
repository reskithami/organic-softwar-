
<?php if (isset($product_records)):?>
	<div class="productcontener form_add">
		<div class="product_box">
			<h3 class="heading"><?php echo $this->lang->line('edit_product_header'); ?></h3>
				<div class="product_content">
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div><?php $attributes = array("class" => "form-horizontal", "id"=>"product_edit_product");
						echo form_open("product/edit_product", $attributes);?>
						<fieldset>
		
								<?php $error = ''; if(form_error('model')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('model'); ?> </label>
							        <div class="controls">
										<input type="text" name="model" id="model" value="<?php echo ($this->input->post("model") )? $this->input->post("model") : $product_records->model; ?>" class="form-control"  >
										<?php echo form_error('model', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('name')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('name'); ?> </label>
							        <div class="controls">
										<input type="text" name="name" id="name" value="<?php echo ($this->input->post("name") )? $this->input->post("name") : $product_records->name; ?>" class="form-control"  >
										<?php echo form_error('name', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('type')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('type'); ?> </label>
							        <div class="controls">
										<input type="text" name="type" id="type" value="<?php echo ($this->input->post("type") )? $this->input->post("type") : $product_records->type; ?>" class="form-control"  >
										<?php echo form_error('type', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('sku')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('sku'); ?> </label>
							        <div class="controls">
										<input type="text" name="sku" id="sku" value="<?php echo ($this->input->post("sku") )? $this->input->post("sku") : $product_records->sku; ?>" class="form-control"  >
										<?php echo form_error('sku', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('upc')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('upc'); ?> </label>
							        <div class="controls">
										<input type="text" name="upc" id="upc" value="<?php echo ($this->input->post("upc") )? $this->input->post("upc") : $product_records->upc; ?>" class="form-control"  >
										<?php echo form_error('upc', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('ean')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('ean'); ?> </label>
							        <div class="controls">
										<input type="text" name="ean" id="ean" value="<?php echo ($this->input->post("ean") )? $this->input->post("ean") : $product_records->ean; ?>" class="form-control"  >
										<?php echo form_error('ean', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('jan')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('jan'); ?> </label>
							        <div class="controls">
										<input type="text" name="jan" id="jan" value="<?php echo ($this->input->post("jan") )? $this->input->post("jan") : $product_records->jan; ?>" class="form-control"  >
										<?php echo form_error('jan', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('isbn')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('isbn'); ?> </label>
							        <div class="controls">
										<input type="text" name="isbn" id="isbn" value="<?php echo ($this->input->post("isbn") )? $this->input->post("isbn") : $product_records->isbn; ?>" class="form-control"  >
										<?php echo form_error('isbn', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('mpn')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('mpn'); ?> </label>
							        <div class="controls">
										<input type="text" name="mpn" id="mpn" value="<?php echo ($this->input->post("mpn") )? $this->input->post("mpn") : $product_records->mpn; ?>" class="form-control"  >
										<?php echo form_error('mpn', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('quantity')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('quantity'); ?> </label>
							        <div class="controls">
										<input type="text" name="quantity" id="quantity" value="<?php echo ($this->input->post("quantity") )? $this->input->post("quantity") : $product_records->quantity; ?>" class="form-control"  >
										<?php echo form_error('quantity', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('shipping')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('shipping'); ?> </label>
							        <div class="controls">
										<input type="text" name="shipping" id="shipping" value="<?php echo ($this->input->post("shipping") )? $this->input->post("shipping") : $product_records->shipping; ?>" class="form-control"  >
										<?php echo form_error('shipping', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('sale_price')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('sale_price'); ?> </label>
							        <div class="controls">
										<input type="text" name="sale_price" id="sale_price" value="<?php echo ($this->input->post("sale_price") )? $this->input->post("sale_price") : $product_records->sale_price; ?>" class="form-control"  >
										<?php echo form_error('sale_price', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('suggested_price')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('suggested_price'); ?> </label>
							        <div class="controls">
										<input type="text" name="suggested_price" id="suggested_price" value="<?php echo ($this->input->post("suggested_price") )? $this->input->post("suggested_price") : $product_records->suggested_price; ?>" class="form-control"  >
										<?php echo form_error('suggested_price', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('buy_price')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('buy_price'); ?> </label>
							        <div class="controls">
										<input type="text" name="buy_price" id="buy_price" value="<?php echo ($this->input->post("buy_price") )? $this->input->post("buy_price") : $product_records->buy_price; ?>" class="form-control"  >
										<?php echo form_error('buy_price', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('special_price')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('special_price'); ?> </label>
							        <div class="controls">
										<input type="text" name="special_price" id="special_price" value="<?php echo ($this->input->post("special_price") )? $this->input->post("special_price") : $product_records->special_price; ?>" class="form-control"  >
										<?php echo form_error('special_price', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('points')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('points'); ?> </label>
							        <div class="controls">
										<input type="text" name="points" id="points" value="<?php echo ($this->input->post("points") )? $this->input->post("points") : $product_records->points; ?>" class="form-control"  >
										<?php echo form_error('points', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('date_available')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('date_available'); ?> </label>
							        <div class="controls">
										<input type="text" name="date_available" id="date_available" value="<?php echo ($this->input->post("date_available") )? $this->input->post("date_available") : $product_records->date_available; ?>" class="form-control"  >
										<?php echo form_error('date_available', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('weight')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('weight'); ?> </label>
							        <div class="controls">
										<input type="text" name="weight" id="weight" value="<?php echo ($this->input->post("weight") )? $this->input->post("weight") : $product_records->weight; ?>" class="form-control"  >
										<?php echo form_error('weight', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('length')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('length'); ?> </label>
							        <div class="controls">
										<input type="text" name="length" id="length" value="<?php echo ($this->input->post("length") )? $this->input->post("length") : $product_records->length; ?>" class="form-control"  >
										<?php echo form_error('length', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('width')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('width'); ?> </label>
							        <div class="controls">
										<input type="text" name="width" id="width" value="<?php echo ($this->input->post("width") )? $this->input->post("width") : $product_records->width; ?>" class="form-control"  >
										<?php echo form_error('width', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('height')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('height'); ?> </label>
							        <div class="controls">
										<input type="text" name="height" id="height" value="<?php echo ($this->input->post("height") )? $this->input->post("height") : $product_records->height; ?>" class="form-control"  >
										<?php echo form_error('height', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('subtract')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('subtract'); ?> </label>
							        <div class="controls">
										<input type="text" name="subtract" id="subtract" value="<?php echo ($this->input->post("subtract") )? $this->input->post("subtract") : $product_records->subtract; ?>" class="form-control"  >
										<?php echo form_error('subtract', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('minimum')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('minimum'); ?> </label>
							        <div class="controls">
										<input type="text" name="minimum" id="minimum" value="<?php echo ($this->input->post("minimum") )? $this->input->post("minimum") : $product_records->minimum; ?>" class="form-control"  >
										<?php echo form_error('minimum', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('status')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('status'); ?> </label>
							        <div class="controls">
										<input type="text" name="status" id="status" value="<?php echo ($this->input->post("status") )? $this->input->post("status") : $product_records->status; ?>" class="form-control"  >
										<?php echo form_error('status', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('buyed')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('buyed'); ?> </label>
							        <div class="controls">
										<input type="text" name="buyed" id="buyed" value="<?php echo ($this->input->post("buyed") )? $this->input->post("buyed") : $product_records->buyed; ?>" class="form-control"  >
										<?php echo form_error('buyed', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('date_added')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('date_added'); ?> </label>
							        <div class="controls">
										<input type="text" name="date_added" id="date_added" value="<?php echo ($this->input->post("date_added") )? $this->input->post("date_added") : $product_records->date_added; ?>" class="form-control"  >
										<?php echo form_error('date_added', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('special_price_date_start')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('special_price_date_start'); ?> </label>
							        <div class="controls">
										<input type="text" name="special_price_date_start" id="special_price_date_start" value="<?php echo ($this->input->post("special_price_date_start") )? $this->input->post("special_price_date_start") : $product_records->special_price_date_start; ?>" class="form-control"  >
										<?php echo form_error('special_price_date_start', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('special_price_date_end')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('special_price_date_end'); ?> </label>
							        <div class="controls">
										<input type="text" name="special_price_date_end" id="special_price_date_end" value="<?php echo ($this->input->post("special_price_date_end") )? $this->input->post("special_price_date_end") : $product_records->special_price_date_end; ?>" class="form-control"  >
										<?php echo form_error('special_price_date_end', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('manufacturer_id')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('manufacturer'); ?> </label>
							        <div class="controls">
									    <select name="manufacturer_id" id="manufacturer_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_manufacturer'); ?></option>
							                <?php if(isset($manufacturer_records)) : foreach($manufacturer_records as $key => $val) :
												$selected = "";
							                	if ( $this->input->post("manufacturer_id") )  {
													if( $this->input->post("manufacturer_id") == $key){ $selected = "selected"; }
												}else{
													if($product_records->manufacturer_id == $key ) { $selected = "selected"; }
												}
							                ?>
											<option value="<?php echo $key; ?>" <?php echo $selected; ?>  >
											<?php echo $val; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('manufacturer_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('ingroup')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('ingroup'); ?> </label>
							        <div class="controls">
										<input type="text" name="ingroup" id="ingroup" value="<?php echo ($this->input->post("ingroup") )? $this->input->post("ingroup") : $product_records->ingroup; ?>" class="form-control"  >
										<?php echo form_error('ingroup', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('parent_id')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('parent'); ?> </label>
							        <div class="controls">
									    <select name="parent_id" id="parent_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_parent'); ?></option>
							                <?php if(isset($parent_records)) : foreach($parent_records as $key => $val) :
												$selected = "";
							                	if ( $this->input->post("parent_id") )  {
													if( $this->input->post("parent_id") == $key){ $selected = "selected"; }
												}else{
													if($product_records->parent_id == $key ) { $selected = "selected"; }
												}
							                ?>
											<option value="<?php echo $key; ?>" <?php echo $selected; ?>  >
											<?php echo $val; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('parent_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('tax_class_id')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('tax_class'); ?> </label>
							        <div class="controls">
									    <select name="tax_class_id" id="tax_class_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_tax_class'); ?></option>
							                <?php if(isset($tax_class_records)) : foreach($tax_class_records as $key => $val) :
												$selected = "";
							                	if ( $this->input->post("tax_class_id") )  {
													if( $this->input->post("tax_class_id") == $key){ $selected = "selected"; }
												}else{
													if($product_records->tax_class_id == $key ) { $selected = "selected"; }
												}
							                ?>
											<option value="<?php echo $key; ?>" <?php echo $selected; ?>  >
											<?php echo $val; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('tax_class_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_change_button'); ?></button>
										<a class="btn" href="<?php echo site_url('product'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								<input type="hidden" name="id" value="<?php echo encode_id($product_records->product_id); ?>" />
								<input type="hidden" name="product_id" value="<?php echo $product_records->product_id; ?>" />

								</fieldset>
							</form>
				</div>
			</div>
		</div>
	<?php endif;?>