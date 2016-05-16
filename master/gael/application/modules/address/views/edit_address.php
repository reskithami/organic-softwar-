
	<div class="addresscontener form_add">
		<div class="address_box">
			<h3 class="heading"><?php echo $this->lang->line('edit_address_header'); ?></h3>
				<div class="address_content">
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<form class="form-horizontal" action="<?php echo site_url('address/edit_address'); ?>" method="post" >
							<fieldset>
		
								<?php $error = ''; if(form_error('address_type')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('address_type'); ?> <span class="f_req">*</span></label>
							        <div class="controls">
										<input type="text" name="address_type" id="address_type" value="<?php echo set_value('address_type',$address_records->address_type); ?>" class="form-control"  >
										<?php echo form_error('address_type', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('foreign_key')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('foreign_key'); ?> <span class="f_req">*</span></label>
							        <div class="controls">
										<input type="text" name="foreign_key" id="foreign_key" value="<?php echo set_value('foreign_key',$address_records->foreign_key); ?>" class="form-control"  >
										<?php echo form_error('foreign_key', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('foreign_type')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('foreign_type'); ?> <span class="f_req">*</span></label>
							        <div class="controls">
										<input type="text" name="foreign_type" id="foreign_type" value="<?php echo set_value('foreign_type',$address_records->foreign_type); ?>" class="form-control"  >
										<?php echo form_error('foreign_type', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('address')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('address'); ?> </label>
							        <div class="controls">
										<input type="text" name="address" id="address" value="<?php echo set_value('address',$address_records->address); ?>" class="form-control"  >
										<?php echo form_error('address', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('address2')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('address2'); ?> </label>
							        <div class="controls">
										<input type="text" name="address2" id="address2" value="<?php echo set_value('address2',$address_records->address2); ?>" class="form-control"  >
										<?php echo form_error('address2', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('phone')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('phone'); ?> </label>
							        <div class="controls">
										<input type="text" name="phone" id="phone" value="<?php echo set_value('phone',$address_records->phone); ?>" class="form-control"  >
										<?php echo form_error('phone', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('phone2')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('phone2'); ?> </label>
							        <div class="controls">
										<input type="text" name="phone2" id="phone2" value="<?php echo set_value('phone2',$address_records->phone2); ?>" class="form-control"  >
										<?php echo form_error('phone2', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('city')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('city'); ?> </label>
							        <div class="controls">
										<input type="text" name="city" id="city" value="<?php echo set_value('city',$address_records->city); ?>" class="form-control"  >
										<?php echo form_error('city', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('country')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('country'); ?> </label>
							        <div class="controls">
										<input type="text" name="country" id="country" value="<?php echo set_value('country',$address_records->country); ?>" class="form-control"  >
										<?php echo form_error('country', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('country_code')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('country_code'); ?> </label>
							        <div class="controls">
										<input type="text" name="country_code" id="country_code" value="<?php echo set_value('country_code',$address_records->country_code); ?>" class="form-control"  >
										<?php echo form_error('country_code', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('zip')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('zip'); ?> </label>
							        <div class="controls">
										<input type="text" name="zip" id="zip" value="<?php echo set_value('zip',$address_records->zip); ?>" class="form-control"  >
										<?php echo form_error('zip', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('lat')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('lat'); ?> </label>
							        <div class="controls">
										<input type="text" name="lat" id="lat" value="<?php echo set_value('lat',$address_records->lat); ?>" class="form-control"  >
										<?php echo form_error('lat', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('lon')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('lon'); ?> </label>
							        <div class="controls">
										<input type="text" name="lon" id="lon" value="<?php echo set_value('lon',$address_records->lon); ?>" class="form-control"  >
										<?php echo form_error('lon', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_change_button'); ?></button>
										<a class="btn" href="<?php echo site_url('address'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								<input type="hidden" name="id" value="<?php echo encode_id($address_records->address_id); ?>" />
								<input type="hidden" name="address_id" value="<?php echo $address_records->address_id; ?>" />

								</fieldset>
							</form>
				</div>
			</div>
		</div>