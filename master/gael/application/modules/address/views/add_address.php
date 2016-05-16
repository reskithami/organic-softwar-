

	<div class="addresscontener form_add">
		<div class="address_box">
			<h3 class="heading"><?php echo $this->lang->line('add_address_header'); ?></h3>
				<div class="address_content">					
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<?php $attributes = array('class' => 'form-horizontal', 'id'=>'address_add_address');
						echo form_open('address/add_address', $attributes);?>
							<fieldset>
		
								<?php $error = ''; if(form_error('address_type')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('address_type'), 'address_type', $attributes);?>
							        <div class="controls">
										<input type="text" name="address_type" id="address_type" value="<?php echo set_value('address_type'); ?>" class="form-control"  >
										<?php echo form_error('address_type', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('foreign_key')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('foreign_key'), 'foreign_key', $attributes);?>
							        <div class="controls">
										<input type="text" name="foreign_key" id="foreign_key" value="<?php echo set_value('foreign_key'); ?>" class="form-control"  >
										<?php echo form_error('foreign_key', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('foreign_type')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('foreign_type'), 'foreign_type', $attributes);?>
							        <div class="controls">
										<input type="text" name="foreign_type" id="foreign_type" value="<?php echo set_value('foreign_type'); ?>" class="form-control"  >
										<?php echo form_error('foreign_type', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('address')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('address'), 'address', $attributes);?>
							        <div class="controls">
										<input type="text" name="address" id="address" value="<?php echo set_value('address'); ?>" class="form-control"  >
										<?php echo form_error('address', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('address2')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('address2'), 'address2', $attributes);?>
							        <div class="controls">
										<input type="text" name="address2" id="address2" value="<?php echo set_value('address2'); ?>" class="form-control"  >
										<?php echo form_error('address2', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('phone')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('phone'), 'phone', $attributes);?>
							        <div class="controls">
										<input type="text" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" class="form-control"  >
										<?php echo form_error('phone', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('phone2')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('phone2'), 'phone2', $attributes);?>
							        <div class="controls">
										<input type="text" name="phone2" id="phone2" value="<?php echo set_value('phone2'); ?>" class="form-control"  >
										<?php echo form_error('phone2', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('city')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('city'), 'city', $attributes);?>
							        <div class="controls">
										<input type="text" name="city" id="city" value="<?php echo set_value('city'); ?>" class="form-control"  >
										<?php echo form_error('city', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('country')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('country'), 'country', $attributes);?>
							        <div class="controls">
										<input type="text" name="country" id="country" value="<?php echo set_value('country'); ?>" class="form-control"  >
										<?php echo form_error('country', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('country_code')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('country_code'), 'country_code', $attributes);?>
							        <div class="controls">
										<input type="text" name="country_code" id="country_code" value="<?php echo set_value('country_code'); ?>" class="form-control"  >
										<?php echo form_error('country_code', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('zip')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('zip'), 'zip', $attributes);?>
							        <div class="controls">
										<input type="text" name="zip" id="zip" value="<?php echo set_value('zip'); ?>" class="form-control"  >
										<?php echo form_error('zip', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('lat')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('lat'), 'lat', $attributes);?>
							        <div class="controls">
										<input type="text" name="lat" id="lat" value="<?php echo set_value('lat'); ?>" class="form-control"  >
										<?php echo form_error('lat', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('lon')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('lon'), 'lon', $attributes);?>
							        <div class="controls">
										<input type="text" name="lon" id="lon" value="<?php echo set_value('lon'); ?>" class="form-control"  >
										<?php echo form_error('lon', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_button'); ?></button>
										<a class="btn" href="<?php echo site_url('address'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								</fieldset>
							<?php echo form_close();?>
				</div>
			</div>
		</div>