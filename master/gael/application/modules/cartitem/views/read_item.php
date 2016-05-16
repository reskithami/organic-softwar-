

	<div class="detail_item" id="item_<?php echo $item_id;?>">
		<div class="item_contener">
<?php 

        foreach($row as $key => $value)
		{
			echo '
						<div class="item">
							<div class="element" id="item_' . $key . '">
								<div class="label">' . $key . '</div>
								<div class="value">' . $value . '</div>
							</div>						
						</div>
						';
		}
?>
      	</div>
 	</div>