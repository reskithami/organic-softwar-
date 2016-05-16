

	<div class="productcontener form_add">
		<div class="product_box">
			<h3 class="heading">Product List</h3>
				<div class="product_content">				
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
					<div class="span12">
						<ul class="icoNav">
							<li><a href="<?php echo site_url('product/add_product'); ?>" style="background-image: url(<?php echo base_url(); ?>assets/img/gCons/add-item.png)">New Product</a></li>
						</ul>
					</div>
				</div>

				<table class="table_liste_records">
                    <thead>
                        <tr>
                        	<th>No.</th>
                        	<th>Order</th>
							<th>Product</th>
							<th>Type Product</th>
							<th>Name</th>
							<th>Model</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Total</th>
							<th>Tax</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Reward</th>
							<th>Action</th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($product_records)) :foreach($product_records as $row): $num++;
						?>
						<tr>
							<td></td>
							<td><?php echo $row->invoice_no; ?></td>
							<td><?php echo $row->name; ?></td>
							<td><?php echo $row->type_product; ?></td>
							<td><?php echo $row->name; ?></td>
							<td><?php echo $row->model; ?></td>
							<td><?php echo $row->quantity; ?></td>
							<td><?php echo $row->price; ?></td>
							<td><?php echo $row->total; ?></td>
							<td><?php echo $row->tax; ?></td>
							<td><?php echo $row->start_date; ?></td>
							<td><?php echo $row->end_date; ?></td>
							<td><?php echo $row->reward; ?></td>
							<td>
                              <a href="<?php echo site_url('product/edit_product/'.$row->product_id.'/'.encode_id($row->product_id)); ?>" class="sepV_a" title="Edit"><i class="icon-pencil">edit</i></a>
                              <a href="#" class="delete" id="<?php echo encode_ajax_id($row->product_id); ?>" title="Delete"><i class="icon-trash">del</i></a>
                          	</td>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						<?php endif; ?>
                    </tbody>
            	</table>
      	</div>
 	</div>