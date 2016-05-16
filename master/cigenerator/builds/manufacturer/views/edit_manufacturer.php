
<?php if (isset($manufacturer_records)):?>
	<div class="manufacturercontener form_add">
		<div class="manufacturer_box">
			<h3 class="heading"><?php echo $this->lang->line('edit_manufacturer_header'); ?></h3>
				<div class="manufacturer_content">
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div><?php $attributes = array("class" => "form-horizontal", "id"=>"manufacturer_edit_manufacturer");
						echo form_open("manufacturer/edit_manufacturer", $attributes);?>
						<fieldset>
		
								<?php $error = ''; if(form_error('name')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('name'); ?> </label>
							        <div class="controls">
										<input type="text" name="name" id="name" value="<?php echo ($this->input->post("name") )? $this->input->post("name") : $manufacturer_records->name; ?>" class="form-control"  >
										<?php echo form_error('name', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('logo')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('logo'); ?> </label>
							        <div class="controls">
										<input type="text" name="logo" id="logo" value="<?php echo ($this->input->post("logo") )? $this->input->post("logo") : $manufacturer_records->logo; ?>" class="form-control"  >
										<?php echo form_error('logo', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_change_button'); ?></button>
										<a class="btn" href="<?php echo site_url('manufacturer'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								<input type="hidden" name="id" value="<?php echo encode_id($manufacturer_records->manufacturer_id); ?>" />
								<input type="hidden" name="manufacturer_id" value="<?php echo $manufacturer_records->manufacturer_id; ?>" />

								</fieldset>
							</form>
				</div>
			</div>
		</div>
	<?php endif;?>