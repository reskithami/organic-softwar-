

	<div class="detail_cart" id="cart_<?php echo $cart_id;?>">
		<div class="cart_contener">
<?php 

        foreach($row as $key => $value)
		{
			echo '
						<div class="item">
							<div class="element" id="cart_' . $key . '">
								<div class="label">' . $key . '</div>
								<div class="value">' . $value . '</div>
							</div>						
						</div>
						';
		}
?>
      	</div>
 	</div>