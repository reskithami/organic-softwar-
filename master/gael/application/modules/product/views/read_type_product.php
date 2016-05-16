

	<div class="type_product">
            <div class="type_product_contener">
<?php 

        foreach($product_type as $key => $value)
		{
			echo '
						<div class="item">
							<a class="show-content" href="#' . $value->type . '">
								<button class="list-group-item input-lg ">' . $value->type . '</button>
							</a>						
						</div>
						';
		}
?>
            </div>
 	</div>