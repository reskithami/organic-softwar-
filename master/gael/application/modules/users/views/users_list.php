

	<div class="userscontener form_add">
		<div class="users_box">
			<h3 class="heading">Users List</h3>
				<div class="users_content">				
					<div class="flasdata"><?php if($this->session->flashdata('msg')){ 
					echo $this->session->flashdata('msg'); } ?></div>
					<div class="span12">
						<ul class="icoNav">
							<li><a href="<?php echo site_url('users/add_users'); ?>" style="background-image: url(<?php echo base_url(); ?>assets/img/gCons/add-item.png)">New Users</a></li>
						</ul>
					</div>
				</div>

				<table class="table_liste_records">
                    <thead>
                        <tr>
                        	<th>No.</th>
                        	<th>Ip Address</th>
							<th>Username</th>
							<th>Password</th>
							<th>Salt</th>
							<th>Email</th>
							<th>Activation Code</th>
							<th>Forgotten Password Code</th>
							<th>Forgotten Password Time</th>
							<th>Remember Code</th>
							<th>Created On</th>
							<th>Last Login</th>
							<th>Active</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Company</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($users_records)) :foreach($users_records as $row): $num++;
						?>
						<tr>
							<td></td>
							<td><?php echo $row->ip_address; ?></td>
							<td><?php echo $row->username; ?></td>
							<td><?php echo $row->password; ?></td>
							<td><?php echo $row->salt; ?></td>
							<td><?php echo $row->email; ?></td>
							<td><?php echo $row->activation_code; ?></td>
							<td><?php echo $row->forgotten_password_code; ?></td>
							<td><?php echo $row->forgotten_password_time; ?></td>
							<td><?php echo $row->remember_code; ?></td>
							<td><?php echo $row->created_on; ?></td>
							<td><?php echo $row->last_login; ?></td>
							<td><?php echo $row->active; ?></td>
							<td><?php echo $row->first_name; ?></td>
							<td><?php echo $row->last_name; ?></td>
							<td><?php echo $row->company; ?></td>
							<td><?php echo $row->phone; ?></td>
							<td>
                              <a href="<?php echo site_url('users/edit_users/'.$row->users_id.'/'.encode_id($row->users_id)); ?>" class="sepV_a" title="Edit"><i class="icon-pencil">edit</i></a>
                              <a href="#" class="delete" id="<?php echo encode_ajax_id($row->users_id); ?>" title="Delete"><i class="icon-trash">del</i></a>
                          	</td>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						<?php endif; ?>
                    </tbody>
            	</table>
      	</div>
 	</div>