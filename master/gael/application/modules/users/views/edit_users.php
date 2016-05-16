
	<div class="userscontener form_add">
		<div class="users_box">
			<h3 class="heading"><?php echo $this->lang->line('edit_users_header'); ?></h3>
				<div class="users_content">
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<form class="form-horizontal" action="<?php echo site_url('users/edit_users'); ?>" method="post" >
							<fieldset>
		
								<?php $error = ''; if(form_error('username')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('username'); ?> </label>
							        <div class="controls">
										<input type="text" name="username" id="username" value="<?php echo set_value('username',$users_records->username); ?>" class="form-control"  >
										<?php echo form_error('username', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('password')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('password'); ?> </label>
							        <div class="controls">
										<input type="text" name="password" id="password" value="<?php echo set_value('password',$users_records->password); ?>" class="form-control"  >
										<?php echo form_error('password', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('email')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('email'); ?> </label>
							        <div class="controls">
										<input type="text" name="email" id="email" value="<?php echo set_value('email',$users_records->email); ?>" class="form-control"  >
										<?php echo form_error('email', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('active')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('active'); ?> </label>
							        <div class="controls">
										<input type="text" name="active" id="active" value="<?php echo set_value('active',$users_records->active); ?>" class="form-control"  >
										<?php echo form_error('active', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('first_name')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('first_name'); ?> </label>
							        <div class="controls">
										<input type="text" name="first_name" id="first_name" value="<?php echo set_value('first_name',$users_records->first_name); ?>" class="form-control"  >
										<?php echo form_error('first_name', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('last_name')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('last_name'); ?> </label>
							        <div class="controls">
										<input type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name',$users_records->last_name); ?>" class="form-control"  >
										<?php echo form_error('last_name', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('company')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('company'); ?> </label>
							        <div class="controls">
										<input type="text" name="company" id="company" value="<?php echo set_value('company',$users_records->company); ?>" class="form-control"  >
										<?php echo form_error('company', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('phone')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('phone'); ?> </label>
							        <div class="controls">
										<input type="text" name="phone" id="phone" value="<?php echo set_value('phone',$users_records->phone); ?>" class="form-control"  >
										<?php echo form_error('phone', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_change_button'); ?></button>
										<a class="btn" href="<?php echo site_url('users'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								<input type="hidden" name="id" value="<?php echo encode_id($users_records->users_id); ?>" />
								<input type="hidden" name="users_id" value="<?php echo $users_records->users_id; ?>" />

								</fieldset>
							</form>
				</div>
			</div>
		</div>