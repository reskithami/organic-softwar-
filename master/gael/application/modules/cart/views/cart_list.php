

	<div class="cartcontener form_add">
		<div class="cart_box">
			<h3 class="heading">Cart List</h3>
				<div class="cart_content">				
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
					<div class="span12">
						<ul class="icoNav">
							<li><a href="<?php echo site_url('cart/add_cart'); ?>" style="background-image: url(<?php echo base_url(); ?>assets/img/gCons/add-item.png)">New Cart</a></li>
						</ul>
					</div>
				</div>

				<table class="table_liste_records">
                    <thead>
                        <tr>
                        	<th>No.</th>
                        	<th>Init Date</th>
							<th>Customer</th>
							<th>Session</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($cart_records)) :foreach($cart_records as $row): $num++;
						?>
						<tr>
							<td></td>
							<td><?php echo $row->init_date; ?></td>
							<td><?php echo $row->first_name . ' ' . $row->last_name; ?></td>
							<td><?php echo $row->status; ?></td>
							<td>
                              <a href="<?php echo site_url('cart/edit_cart/'.$row->cart_id.'/'.encode_id($row->cart_id)); ?>" class="sepV_a" title="Edit"><i class="icon-pencil">edit</i></a>
                              <a href="#" class="delete" id="<?php echo encode_ajax_id($row->cart_id); ?>" title="Delete"><i class="icon-trash">del</i></a>
                          	</td>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						<?php endif; ?>
                    </tbody>
            	</table>
      	</div>
 	</div>