
<?php if (isset($tax_records)):?>
	<div class="taxcontener form_add">
		<div class="tax_box">
			<h3 class="heading"><?php echo $this->lang->line('edit_tax_header'); ?></h3>
				<div class="tax_content">
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div><?php $attributes = array("class" => "form-horizontal", "id"=>"tax_edit_tax");
						echo form_open("tax/edit_tax", $attributes);?>
						<fieldset>
		
								<?php $error = ''; if(form_error('name')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('name'); ?> </label>
							        <div class="controls">
										<input type="text" name="name" id="name" value="<?php echo ($this->input->post("name") )? $this->input->post("name") : $tax_records->name; ?>" class="form-control"  >
										<?php echo form_error('name', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<?php $error = ''; if(form_error('ratio')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('ratio'); ?> </label>
							        <div class="controls">
										<input type="text" name="ratio" id="ratio" value="<?php echo ($this->input->post("ratio") )? $this->input->post("ratio") : $tax_records->ratio; ?>" class="form-control"  >
										<?php echo form_error('ratio', '<span class="help-inline">', '</span>'); ?>
									</div>
							  	</div>
							  	
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_change_button'); ?></button>
										<a class="btn" href="<?php echo site_url('tax'); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								<input type="hidden" name="id" value="<?php echo encode_id($tax_records->tax_class_id); ?>" />
								<input type="hidden" name="tax_id" value="<?php echo $tax_records->tax_class_id; ?>" />

								</fieldset>
							</form>
				</div>
			</div>
		</div>
	<?php endif;?>