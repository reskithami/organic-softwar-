
	
        <div class="row" style="margin-bottom: 10px">
            
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> "" ? $this->session->userdata('message') : ""; ?>
                </div>
            </div>
            <div class="col-md-8 text-right">
                <?php echo form_open("order/index/", array('class' => 'listeSearch')); ?>
                    <div class="input-group">
                        <label><?php echo $this->lang->line('date_start');?></label>
                        <input type="text" class="form-control" name="date_start" value="<?php echo $date_start; ?>">
                        <label><?php echo $this->lang->line('date_end');?></label>
                        <input type="text" class="form-control" name="date_end" value="<?php echo $date_end; ?>">
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" name="query_order" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <input class="btn btn-primary" type="submit" name="bttsearch" value="<?php echo $this->lang->line('search');?>">
                        </span>
                    </div>
                </form>
                <?php echo $this->lang->line('total_cours') . '  ' . numberformat($total_price_cours->total, $this->lang->lang());?>
                <?php echo $this->lang->line('total_location') . '  ' . numberformat($total_price_location->total, $this->lang->lang());?>
                <?php echo $this->lang->line('total_vente') . '  ' . numberformat($total_price_vente->total, $this->lang->lang());?>
                <?php echo $this->lang->line('total') . '  ' . numberformat($total_price->total, $this->lang->lang());?>
            </div>
        </div>
			<div class="table-responsive">
				<table class="table_liste_records table">
                    <thead>
                        <tr>
                        	<th>No.</th>
                        	<th><?php echo $this->lang->line('invoice_no');?></th>
							<th><?php echo $this->lang->line('invoice_prefix');?></th>
							<th><?php echo $this->lang->line('order_status_array');?></th>
							<th><?php echo $this->lang->line('saller');?></th>
							<th><?php echo $this->lang->line('firstname');?></th>
							<th><?php echo $this->lang->line('lastname');?></th>
							<th><?php echo $this->lang->line('email');?></th>
							<th><?php echo $this->lang->line('phone');?></th>
							<th><?php echo $this->lang->line('total');?></th>
							<th><?php echo $this->lang->line('date_added');?></th>
							<th><?php echo $this->lang->line('date_modified');?></th>
							<th>Action</th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php                                                    
						    $num = 0; if(isset($order_records)) :foreach($order_records as $row): $num++;
						?>
						<tr>
							<td></td>
							<td><?php echo $row->invoice_no; ?></td>
							<td><?php echo $row->invoice_prefix; ?></td>
							<td><?php echo $row->order_status_array_id; ?></td>
							<td><?php echo $row->saller_first_name; ?></td>
							<td><?php echo $row->firstname; ?></td>
							<td><?php echo $row->lastname; ?></td>
							<td><?php echo $row->email; ?></td>
							<td><?php echo $row->phone; ?></td>
							<td><?php echo $row->date_added; ?></td>
							<td><?php echo $row->date_modified; ?></td>
							<td>
                              <a href="<?php echo site_url('order/edit_order/'.$row->order_id.'/'.encode_id($row->order_id)); ?>" class="list_link_edit" title="Edit"
                                 data-id="<?php echo $row->order_id;?>" data-code="<?php echo encode_id($row->order_id);?>"><i class="fa fa-pencil"></i></a>
                              <a href="#" class="list_link_delete" id="<?php echo encode_ajax_id($row->order_id); ?>" data-id="<?php echo $row->order_id;?>" data-code="<?php echo encode_id($row->order_id);?>" title="Delete"><i class="fa fa-trash"></i></a>
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