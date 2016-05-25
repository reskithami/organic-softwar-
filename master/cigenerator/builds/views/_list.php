
	
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url("/create"), $this->lang->line("new"), array("class" => "btn btn-primary", "title" => $this->lang->line("new"), "data-button" => "new") ); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> "" ? $this->session->userdata('message') : ""; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-6 text-right">
                <?php echo form_open("//index/", array('class' => 'listeSearch')); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> "")
                                {
                                    ?>
                                    <a href="//index/" class="btn btn-default list_reset"><?php echo $this->lang->line('reset');?></a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit"><?php echo $this->lang->line('search');?></button>
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
                        	<th>Action</th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($_records)) :foreach($_records as $row): $num++;
						?>
						<tr>
							<td></td>
							<td>
                              <a href="<?php echo site_url('/edit_/'.$row->_id.'/'.encode_id($row->_id)); ?>" class="list_link_edit" title="Edit" data-id="<?php echo $row->_id;?>" data-code="<?php echo encode_id($row->_id);?>"><i class="fa fa-pencil"></i></a>
                              <a href="#" class="list_link_delete" data-id="<?php echo $row->_id;?>" data-code="<?php echo encode_id($row->_id);?>" title="Delete"><i class="fa fa-trash"></i></a>
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