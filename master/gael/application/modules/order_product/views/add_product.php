

	<div class="productcontener form_add">
		<div class="product_box">
			<h3 class="heading"><?php echo $this->lang->line('add_product_header'); ?></h3>
				<div class="product_content">					
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
						<?php $attributes = array('class' => 'form-horizontal', 'id'=>'product_add_product');
						echo form_open('product/add_product', $attributes);?>
							<fieldset>
		
								<?php $error = ''; if(form_error('reward')){ $error = 'error'; } ?>

							   	<div class="form_item <?php echo $error; ?>">
									<?php $attributes = array('class' => 'mycustomclass','style' => 'color: #000;');
									echo form_label($this->lang->line('reward'), 'reward', $attributes);?>
							        <div class="controls">
										<input type="text" name="reward" id="reward" value="<?php echo set_value('reward'); ?>" class="form-control"  >
										<?php echo form_error('reward', '<span class="help-inline">', '</span>'); ?>
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