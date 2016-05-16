

	<div class="addresscontener form_add">
		<div class="address_box">
			<h3 class="heading">Address List</h3>
				<div class="address_content">				
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
					<div class="span12">
						<ul class="icoNav">
							<li><a href="<?php echo site_url('address/add_address'); ?>" style="background-image: url(<?php echo base_url(); ?>assets/img/gCons/add-item.png)">New Address</a></li>
						</ul>
					</div>
				</div>

				<table class="table_liste_records">
                    <thead>
                        <tr>
                        	<th>No.</th>
                        	<th>Address Type</th>
							<th>Foreign Key</th>
							<th>Foreign Type</th>
							<th>Address</th>
							<th>Address2</th>
							<th>Phone</th>
							<th>Phone2</th>
							<th>City</th>
							<th>Country</th>
							<th>Country Code</th>
							<th>Zip</th>
							<th>Lat</th>
							<th>Lon</th>
							<th>Action</th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($address_records)) :foreach($address_records as $row): $num++;
						?>
						<tr>
							<td></td>
							<td><?php echo $row->address_type; ?></td>
							<td><?php echo $row->foreign_key; ?></td>
							<td><?php echo $row->foreign_type; ?></td>
							<td><?php echo $row->address; ?></td>
							<td><?php echo $row->address2; ?></td>
							<td><?php echo $row->phone; ?></td>
							<td><?php echo $row->phone2; ?></td>
							<td><?php echo $row->city; ?></td>
							<td><?php echo $row->country; ?></td>
							<td><?php echo $row->country_code; ?></td>
							<td><?php echo $row->zip; ?></td>
							<td><?php echo $row->lat; ?></td>
							<td><?php echo $row->lon; ?></td>
							<td>
                              <a href="<?php echo site_url('address/edit_address/'.$row->address_id.'/'.encode_id($row->address_id)); ?>" class="sepV_a" title="Edit"><i class="icon-pencil">edit</i></a>
                              <a href="#" class="delete" id="<?php echo encode_ajax_id($row->address_id); ?>" title="Delete"><i class="icon-trash">del</i></a>
                          	</td>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						<?php endif; ?>
                    </tbody>
            	</table>
      	</div>
 	</div>