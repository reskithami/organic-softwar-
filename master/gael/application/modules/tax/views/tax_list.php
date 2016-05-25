
	
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url("tax/create"), $this->lang->line("new"), array("class" => "btn btn-primary", "title" => $this->lang->line("new"), "data-button" => "new") ); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> "" ? $this->session->userdata('message') : ""; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-6 text-right">
                <?php echo form_open("/tax/index/", array('class' => 'listeSearch')); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="query_tax" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                          <input class="btn btn-primary" type="submit" value="<?php echo $this->lang->line('search');?>" name="bttsearch">
                        </span>
                    </div>
                </form>
            </div>
        </div>
			<div class="table-responsive">
				<table class="table_liste_records table">
                    <thead>
                        <tr>
                        	<th>No.</th>
                        	<th><?php echo $this->lang->line('name');?></th>
							<th><?php echo $this->lang->line('ratio');?></th>
							<th>Action</th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($tax_records)) :foreach($tax_records as $row): $num++;
						?>
						<tr>
							<td></td>
							<td><?php echo $row->name; ?></td>
							<td><?php echo $row->ratio; ?></td>
							<td>
                              <a href="<?php echo site_url('tax/edit_tax/'.$row->tax_class_id.'/'.encode_id($row->tax_class_id)); ?>" class="list_link_edit" title="Edit" data-id="<?php echo $row->tax_class_id;?>" data-code="<?php echo encode_id($row->tax_class_id);?>"><i class="fa fa-pencil"></i></a>
                              <a href="#" class="list_link_delete" data-id="<?php echo $row->tax_class_id;?>" data-code="<?php echo encode_id($row->tax_class_id);?>" title="Delete"><i class="fa fa-trash"></i></a>
                          	</td>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						<?php endif; ?>
                    </tbody>
            	</table>
            <div class="col-md-6 text-right">
                <?php echo $pagination; ?>
            </div>
			</div>