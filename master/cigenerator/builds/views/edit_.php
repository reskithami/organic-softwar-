
<?php if (isset($_records)):?>
	<div class="contener form_add">
		<div class="_box">
			<h3 class="heading"><?php echo $this->lang->line('edit__header'); ?></h3>
				<div class="_content">
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div><?php $attributes = array("class" => "form-horizontal", "id"=>"_edit_");
						echo form_open("/edit_", $attributes);?>
						<fieldset>
		
								<div class="control-group">
									<div class="controls">
										<button class="btn btn-gebo" type="submit"><?php echo $this->lang->line('save_change_button'); ?></button>
										<a class="btn" href="<?php echo site_url(''); ?>"><?php echo $this->lang->line('cancel_button'); ?></a>
									</div>
								</div>

								<input type="hidden" name="id" value="<?php echo encode_id($_records->_id); ?>" />
								<input type="hidden" name="_id" value="<?php echo $_records->_id; ?>" />

								</fieldset>
							</form>
				</div>
			</div>
		</div>
	<?php endif;?>