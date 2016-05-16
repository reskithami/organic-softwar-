
	<div class="productcontener form_add">
		<div class="product_box">
			<h3 class="heading"><?php echo $this->lang->line('edit_product_header'); ?></h3>
				<div class="product_content">
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<form class="form-horizontal" action="<?php echo site_url('product/edit_product'); ?>" method="post" >
							<fieldset>
		
								<?php $error = ''; if(form_error('reward')){ $error = 'error'; } ?>

							   	<div class="control-group formSep <?php echo $error; ?>">
							        <label for="select01" class="control-label"><?php echo $this->lang->line('reward'); ?> </label>
							        <div class="controls">
										<input type="text" name="reward" id="reward" value="<?php echo set_value('reward',$product_records->reward); ?>" class="form-control"  >
										<?php echo form_error('reward', '<span class="help-inline">', '</span>'); ?>
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