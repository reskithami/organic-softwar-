

	<div class="productcontener form_add">
		<div class="product_box">
			<h3 class="heading"><?php echo $this->lang->line('add_product_header'); ?></h3>
				<div class="product_content">					
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<?php $attributes = array('class' => 'form-horizontal', 'id'=>'product_add_product');
						echo form_open('product/add_product', $attributes);?>
							<fieldset>
		
								<?php $error = ''; if(form_error('model')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('model'), 'model', $attributes);?>
							        <div class="controls">
										<input type="text" name="model" id="model" value="<?php echo set_value('model'); ?>" class="form-control"  >
										<?php echo form_error('model', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('name')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('name'), 'name', $attributes);?>
							        <div class="controls">
										<input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" class="form-control"  >
										<?php echo form_error('name', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('type')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('type'), 'type', $attributes);?>
							        <div class="controls">
										<input type="text" name="type" id="type" value="<?php echo set_value('type'); ?>" class="form-control"  >
										<?php echo form_error('type', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('sku')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('sku'), 'sku', $attributes);?>
							        <div class="controls">
										<input type="text" name="sku" id="sku" value="<?php echo set_value('sku'); ?>" class="form-control"  >
										<?php echo form_error('sku', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('upc')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('upc'), 'upc', $attributes);?>
							        <div class="controls">
										<input type="text" name="upc" id="upc" value="<?php echo set_value('upc'); ?>" class="form-control"  >
										<?php echo form_error('upc', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('ean')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('ean'), 'ean', $attributes);?>
							        <div class="controls">
										<input type="text" name="ean" id="ean" value="<?php echo set_value('ean'); ?>" class="form-control"  >
										<?php echo form_error('ean', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('jan')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('jan'), 'jan', $attributes);?>
							        <div class="controls">
										<input type="text" name="jan" id="jan" value="<?php echo set_value('jan'); ?>" class="form-control"  >
										<?php echo form_error('jan', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('isbn')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('isbn'), 'isbn', $attributes);?>
							        <div class="controls">
										<input type="text" name="isbn" id="isbn" value="<?php echo set_value('isbn'); ?>" class="form-control"  >
										<?php echo form_error('isbn', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('mpn')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('mpn'), 'mpn', $attributes);?>
							        <div class="controls">
										<input type="text" name="mpn" id="mpn" value="<?php echo set_value('mpn'); ?>" class="form-control"  >
										<?php echo form_error('mpn', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('quantity')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('quantity'), 'quantity', $attributes);?>
							        <div class="controls">
										<input type="text" name="quantity" id="quantity" value="<?php echo set_value('quantity'); ?>" class="form-control"  >
										<?php echo form_error('quantity', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('shipping')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('shipping'), 'shipping', $attributes);?>
							        <div class="controls">
										<input type="text" name="shipping" id="shipping" value="<?php echo set_value('shipping'); ?>" class="form-control"  >
										<?php echo form_error('shipping', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('sale_price')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('sale_price'), 'sale_price', $attributes);?>
							        <div class="controls">
										<input type="text" name="sale_price" id="sale_price" value="<?php echo set_value('sale_price'); ?>" class="form-control"  >
										<?php echo form_error('sale_price', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('suggested_price')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('suggested_price'), 'suggested_price', $attributes);?>
							        <div class="controls">
										<input type="text" name="suggested_price" id="suggested_price" value="<?php echo set_value('suggested_price'); ?>" class="form-control"  >
										<?php echo form_error('suggested_price', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('buy_price')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('buy_price'), 'buy_price', $attributes);?>
							        <div class="controls">
										<input type="text" name="buy_price" id="buy_price" value="<?php echo set_value('buy_price'); ?>" class="form-control"  >
										<?php echo form_error('buy_price', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('special_price')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('special_price'), 'special_price', $attributes);?>
							        <div class="controls">
										<input type="text" name="special_price" id="special_price" value="<?php echo set_value('special_price'); ?>" class="form-control"  >
										<?php echo form_error('special_price', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('points')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('points'), 'points', $attributes);?>
							        <div class="controls">
										<input type="text" name="points" id="points" value="<?php echo set_value('points'); ?>" class="form-control"  >
										<?php echo form_error('points', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('date_available')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('date_available'), 'date_available', $attributes);?>
							        <div class="controls">
										<input type="text" name="date_available" id="date_available" value="<?php echo set_value('date_available'); ?>" class="form-control"  >
										<?php echo form_error('date_available', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('weight')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('weight'), 'weight', $attributes);?>
							        <div class="controls">
										<input type="text" name="weight" id="weight" value="<?php echo set_value('weight'); ?>" class="form-control"  >
										<?php echo form_error('weight', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('length')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('length'), 'length', $attributes);?>
							        <div class="controls">
										<input type="text" name="length" id="length" value="<?php echo set_value('length'); ?>" class="form-control"  >
										<?php echo form_error('length', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('width')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('width'), 'width', $attributes);?>
							        <div class="controls">
										<input type="text" name="width" id="width" value="<?php echo set_value('width'); ?>" class="form-control"  >
										<?php echo form_error('width', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('height')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('height'), 'height', $attributes);?>
							        <div class="controls">
										<input type="text" name="height" id="height" value="<?php echo set_value('height'); ?>" class="form-control"  >
										<?php echo form_error('height', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('subtract')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('subtract'), 'subtract', $attributes);?>
							        <div class="controls">
										<input type="text" name="subtract" id="subtract" value="<?php echo set_value('subtract'); ?>" class="form-control"  >
										<?php echo form_error('subtract', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('minimum')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('minimum'), 'minimum', $attributes);?>
							        <div class="controls">
										<input type="text" name="minimum" id="minimum" value="<?php echo set_value('minimum'); ?>" class="form-control"  >
										<?php echo form_error('minimum', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('status')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('status'), 'status', $attributes);?>
							        <div class="controls">
										<input type="text" name="status" id="status" value="<?php echo set_value('status'); ?>" class="form-control"  >
										<?php echo form_error('status', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('buyed')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('buyed'), 'buyed', $attributes);?>
							        <div class="controls">
										<input type="text" name="buyed" id="buyed" value="<?php echo set_value('buyed'); ?>" class="form-control"  >
										<?php echo form_error('buyed', '<span class="alert-warning">', '</span>'); ?>
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
							  	
								<?php $error = ''; if(form_error('special_price_date_start')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('special_price_date_start'), 'special_price_date_start', $attributes);?>
							        <div class="controls">
										<input type="text" name="special_price_date_start" id="special_price_date_start" value="<?php echo set_value('special_price_date_start'); ?>" class="form-control"  >
										<?php echo form_error('special_price_date_start', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('special_price_date_end')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('special_price_date_end'), 'special_price_date_end', $attributes);?>
							        <div class="controls">
										<input type="text" name="special_price_date_end" id="special_price_date_end" value="<?php echo set_value('special_price_date_end'); ?>" class="form-control"  >
										<?php echo form_error('special_price_date_end', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('manufacturer_id')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('manufacturer'), 'manufacturer_id', $attributes);?>
							        <div class="controls">
									    <select name="manufacturer_id" id="manufacturer_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_manufacturer'); ?></option>
							                <?php if(isset($manufacturer_records)) : foreach($manufacturer_records as $row) : ?>
											<option value="<?php echo $row->manufacturer_id; ?>" <?php echo set_select('manufacturer_id', $row->manufacturer_id); ?>  >
											<?php echo $row->manufacturer_name; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('manufacturer_id', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('ingroup')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('ingroup'), 'ingroup', $attributes);?>
							        <div class="controls">
										<input type="text" name="ingroup" id="ingroup" value="<?php echo set_value('ingroup'); ?>" class="form-control"  >
										<?php echo form_error('ingroup', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('parent_id')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('parent'), 'parent_id', $attributes);?>
							        <div class="controls">
									    <select name="parent_id" id="parent_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_parent'); ?></option>
							                <?php if(isset($parent_records)) : foreach($parent_records as $row) : ?>
											<option value="<?php echo $row->parent_id; ?>" <?php echo set_select('parent_id', $row->parent_id); ?>  >
											<?php echo $row->parent_name; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('parent_id', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('tax_class_id')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('tax_class'), 'tax_class_id', $attributes);?>
							        <div class="controls">
									    <select name="tax_class_id" id="tax_class_id" class="input-xlarge chosen">
							                <option value=""><?php echo $this->lang->line('select_tax_class'); ?></option>
							                <?php if(isset($tax_class_records)) : foreach($tax_class_records as $row) : ?>
											<option value="<?php echo $row->tax_class_id; ?>" <?php echo set_select('tax_class_id', $row->tax_class_id); ?>  >
											<?php echo $row->tax_name; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
							            </select>
										<?php echo form_error('tax_class_id', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_button'); ?></button>
										<a class="btn" href="<?php echo site_url('product'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								</fieldset>
							<?php echo form_close();?>
				</div>
			</div>
		</div>