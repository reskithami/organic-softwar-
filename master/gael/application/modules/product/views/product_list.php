
	
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url("product/create"), $this->lang->line("new"), array("class" => "btn btn-primary", "title" => $this->lang->line("new"), "data-button" => "new") ); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> "" ? $this->session->userdata('message') : "";?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-8 text-right">
                <?php echo form_open("/product/index/", array('class' => 'listeSearch')); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> "")
                                {
                                    ?>
                                    <a href="/product/index/" class="btn btn-default list_reset"><?php echo $this->lang->line('reset');?></a>
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
                        	<th><?php echo $this->lang->line('model');?></th>
							<th><?php echo $this->lang->line('name');?></th>
							<th><?php echo $this->lang->line('type');?></th>
							<th><?php echo $this->lang->line('sku');?></th>
							<th><?php echo $this->lang->line('upc');?></th>
							<th><?php echo $this->lang->line('ean');?></th>
							<th><?php echo $this->lang->line('jan');?></th>
							<th><?php echo $this->lang->line('isbn');?></th>
							<th><?php echo $this->lang->line('mpn');?></th>
							<th><?php echo $this->lang->line('quantity');?></th>
							<th><?php echo $this->lang->line('shipping');?></th>
							<th><?php echo $this->lang->line('sale_price');?></th>
							<th><?php echo $this->lang->line('suggested_price');?></th>
							<th><?php echo $this->lang->line('buy_price');?></th>
							<th><?php echo $this->lang->line('special_price');?></th>
							<th><?php echo $this->lang->line('points');?></th>
							<th><?php echo $this->lang->line('date_available');?></th>
							<th><?php echo $this->lang->line('weight');?></th>
							<th><?php echo $this->lang->line('length');?></th>
							<th><?php echo $this->lang->line('width');?></th>
							<th><?php echo $this->lang->line('height');?></th>
							<th><?php echo $this->lang->line('subtract');?></th>
							<th><?php echo $this->lang->line('minimum');?></th>
							<th><?php echo $this->lang->line('status');?></th>
							<th><?php echo $this->lang->line('buyed');?></th>
							<th><?php echo $this->lang->line('date_added');?></th>
							<th><?php echo $this->lang->line('special_price_date_start');?></th>
							<th><?php echo $this->lang->line('special_price_date_end');?></th>
							<th><?php echo $this->lang->line('manufacturer');?></th>
							<th><?php echo $this->lang->line('ingroup');?></th>
							<th><?php echo $this->lang->line('tax_class');?></th>
							<th>Action</th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($product_records)) :foreach($product_records as $row): $num++;
						?>
						<tr>
							<td></td>
							<td><?php echo $row->model; ?></td>
							<td><?php echo $row->name; ?></td>
							<td><?php echo $row->type; ?></td>
							<td><?php echo $row->sku; ?></td>
							<td><?php echo $row->upc; ?></td>
							<td><?php echo $row->ean; ?></td>
							<td><?php echo $row->jan; ?></td>
							<td><?php echo $row->isbn; ?></td>
							<td><?php echo $row->mpn; ?></td>
							<td><?php echo $row->quantity; ?></td>
							<td><?php echo $row->shipping; ?></td>
							<td><?php echo $row->sale_price; ?></td>
							<td><?php echo $row->suggested_price; ?></td>
							<td><?php echo $row->buy_price; ?></td>
							<td><?php echo $row->special_price; ?></td>
							<td><?php echo $row->points; ?></td>
							<td><?php echo $row->date_available; ?></td>
							<td><?php echo $row->weight; ?></td>
							<td><?php echo $row->length; ?></td>
							<td><?php echo $row->width; ?></td>
							<td><?php echo $row->height; ?></td>
							<td><?php echo $row->subtract; ?></td>
							<td><?php echo $row->minimum; ?></td>
							<td><?php echo $row->status; ?></td>
							<td><?php echo $row->buyed; ?></td>
							<td><?php echo $row->date_added; ?></td>
							<td><?php echo $row->special_price_date_start; ?></td>
							<td><?php echo $row->special_price_date_end; ?></td>
							<td><?php echo $row->manufacturer_name; ?></td>
							<td><?php echo $row->ingroup; ?></td>
							<td><?php echo $row->tax_name; ?></td>
							<td>
                              <a href="<?php echo site_url('product/edit_product/'.$row->product_id.'/'.encode_id($row->product_id)); ?>" class="list_link_edit" title="Edit" data-id="<?php echo $row->product_id;?>" data-code="<?php echo encode_id($row->product_id);?>"><i class="fa fa-pencil"></i></a>
                              <a href="#" class="list_link_delete" data-id="<?php echo $row->product_id;?>" data-code="<?php echo encode_id($row->product_id);?>" title="Delete"><i class="fa fa-trash"></i></a>
                          	</td>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						<?php endif; ?>
                    </tbody>
            	</table>
            <div class="col-md-6 text-right">
                <?php echo $pagination;?>
            </div>
			</div>