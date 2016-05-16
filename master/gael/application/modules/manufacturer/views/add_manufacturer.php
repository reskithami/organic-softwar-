

	<div class="manufacturercontener form_add">
		<div class="manufacturer_box">
			<h3 class="heading"><?php echo $this->lang->line('add_manufacturer_header'); ?></h3>
				<div class="manufacturer_content">					
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<?php $attributes = array('class' => 'form-horizontal', 'id'=>'manufacturer_add_manufacturer');
						echo form_open('manufacturer/add_manufacturer', $attributes);?>
							<fieldset>
		
								<?php $error = ''; if(form_error('name')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('name'), 'name', $attributes);?>
							        <div class="controls">
										<input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" class="form-control"  >
										<?php echo form_error('name', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('logo')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'control-label');
									echo form_label($this->lang->line('logo'), 'logo', $attributes);?>
							        <div class="controls">
										<input type="text" name="logo" id="logo" value="<?php echo set_value('logo'); ?>" class="form-control"  >
										<?php echo form_error('logo', '<span class="alert-warning">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_button'); ?></button>
										<a class="btn" href="<?php echo site_url('manufacturer'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								</fieldset>
							<?php echo form_close();?>
				</div>
			</div>
		</div>