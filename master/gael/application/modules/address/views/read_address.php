

	<div class="detail_address" id="address_<?php echo $address_id;?>">
		<div class="address_contener">
<?php 

        foreach($row as $key => $value)
		{
			echo '
						<div class="item">
							<div class="element" id="address_' . $key . '">
								<div class="label">' . $key . '</div>
								<div class="value">' . $value . '</div>
							</div>						
						</div>
						';
		}
?>
      	</div>
 	</div>