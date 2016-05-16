
	
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('order/create'), $this->lang->line('new'), 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> "" ? $this->session->userdata('message') : ""; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <?php echo form_open("/order/index/", array('class' => 'listeSearch')); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> "")
                                {
                                    ?>
                                    <a href="/order/index/" class="btn btn-default list_reset"><?php echo $this->lang->line('reset');?></a>
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
                        	<th><?php echo $this->lang->line('invoice_no');?></th>
							<th><?php echo $this->lang->line('invoice_prefix');?></th>
							<th><?php echo $this->lang->line('order_status_array');?></th>
							<th><?php echo $this->lang->line('customer');?></th>
							<th><?php echo $this->lang->line('saller');?></th>
							<th><?php echo $this->lang->line('firstname');?></th>
							<th><?php echo $this->lang->line('lastname');?></th>
							<th><?php echo $this->lang->line('email');?></th>
							<th><?php echo $this->lang->line('phone');?></th>
							<th><?php echo $this->lang->line('payment_firstname');?></th>
							<th><?php echo $this->lang->line('payment_lastname');?></th>
							<th><?php echo $this->lang->line('payment_company');?></th>
							<th><?php echo $this->lang->line('payment_address_1');?></th>
							<th><?php echo $this->lang->line('payment_address_2');?></th>
							<th><?php echo $this->lang->line('payment_city');?></th>
							<th><?php echo $this->lang->line('payment_zip');?></th>
							<th><?php echo $this->lang->line('payment_country');?></th>
							<th><?php echo $this->lang->line('payment_method');?></th>
							<th><?php echo $this->lang->line('payment_code');?></th>
							<th><?php echo $this->lang->line('comment');?></th>
							<th><?php echo $this->lang->line('total');?></th>
							<th><?php echo $this->lang->line('affiliate');?></th>
							<th><?php echo $this->lang->line('commission');?></th>
							<th><?php echo $this->lang->line('tracking');?></th>
							<th><?php echo $this->lang->line('language_code');?></th>
							<th><?php echo $this->lang->line('currency');?></th>
							<th><?php echo $this->lang->line('currency_code');?></th>
							<th><?php echo $this->lang->line('currency_value');?></th>
							<th><?php echo $this->lang->line('ip');?></th>
							<th><?php echo $this->lang->line('forwarded_ip');?></th>
							<th><?php echo $this->lang->line('user_agent');?></th>
							<th><?php echo $this->lang->line('accept_language');?></th>
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
							<td><?php echo $row->order_name; ?></td>
							<td><?php echo $row->customer_name; ?></td>
							<td><?php echo $row->saller_name; ?></td>
							<td><?php echo $row->firstname; ?></td>
							<td><?php echo $row->lastname; ?></td>
							<td><?php echo $row->email; ?></td>
							<td><?php echo $row->phone; ?></td>
							<td><?php echo $row->payment_firstname; ?></td>
							<td><?php echo $row->payment_lastname; ?></td>
							<td><?php echo $row->payment_company; ?></td>
							<td><?php echo $row->payment_address_1; ?></td>
							<td><?php echo $row->payment_address_2; ?></td>
							<td><?php echo $row->payment_city; ?></td>
							<td><?php echo $row->payment_zip; ?></td>
							<td><?php echo $row->payment_country; ?></td>
							<td><?php echo $row->payment_method; ?></td>
							<td><?php echo $row->payment_code; ?></td>
							<td><?php echo $row->comment; ?></td>
							<td><?php echo $row->total; ?></td>
							<td><?php echo $row->affiliate_name; ?></td>
							<td><?php echo $row->commission; ?></td>
							<td><?php echo $row->tracking; ?></td>
							<td><?php echo $row->language_code; ?></td>
							<td><?php echo $row->currency_name; ?></td>
							<td><?php echo $row->currency_code; ?></td>
							<td><?php echo $row->currency_value; ?></td>
							<td><?php echo $row->ip; ?></td>
							<td><?php echo $row->forwarded_ip; ?></td>
							<td><?php echo $row->user_agent; ?></td>
							<td><?php echo $row->accept_language; ?></td>
							<td><?php echo $row->date_added; ?></td>
							<td><?php echo $row->date_modified; ?></td>
							<td>
                              <a href="<?php echo site_url('order/edit_order/'.$row->order_id.'/'.encode_id($row->order_id)); ?>" class="list_link_edit" title="Edit" data-id="<?php echo $row->order_id;?>" data-code="<?php echo encode_id($row->order_id);?>"><i class="fa fa-pencil"></i></a>
                              <a href="#" class="delete" id="<?php echo encode_ajax_id($row->order_id); ?>" title="Delete"><i class="fa fa-trash"></i></a>
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