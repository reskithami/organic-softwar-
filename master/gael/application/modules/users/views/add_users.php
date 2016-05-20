

	<div class="userscontener form_add">
		<div class="users_box">
			<h3 class="heading"><?php echo $this->lang->line('add_users_header'); ?></h3>
				<div class="users_content">					
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<?php $attributes = array('class' => 'form-horizontal', 'id'=>'users_add_users');
						echo form_open('users/add_users', $attributes);?>
							<fieldset>
							  	
								<?php $error = ''; if(form_error('email')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('email'), 'email', $attributes);?>
							        <div class="controls">
										<input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control"  >
										<?php echo form_error('email', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('first_name')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('first_name'), 'first_name', $attributes);?>
							        <div class="controls">
										<input type="text" name="first_name" id="first_name" value="<?php echo set_value('first_name'); ?>" class="form-control"  >
										<?php echo form_error('first_name', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('last_name')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('last_name'), 'last_name', $attributes);?>
							        <div class="controls">
										<input type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control"  >
										<?php echo form_error('last_name', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('company')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('company'), 'company', $attributes);?>
							        <div class="controls">
										<input type="text" name="company" id="company" value="<?php echo set_value('company'); ?>" class="form-control"  >
										<?php echo form_error('company', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('phone')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('phone'), 'phone', $attributes);?>
							        <div class="controls">
										<input type="text" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" class="form-control"  >
										<?php echo form_error('phone', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('code_id')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('code_id'), 'code_id', $attributes);?>
							        <div class="controls">
										<input type="text" name="code_id" id="code_id" value="<?php echo set_value('code_id'); ?>" class="form-control"  >
										<?php echo form_error('code_id', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-default" type="submit"><?php echo $this->lang->line('save_button'); ?></button>
										<a class="btn" href="<?php echo site_url('users'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								</fieldset>
							<?php echo form_close();?>
				</div>
			</div>
		</div>