

	<div class="detail_product" id="product_<?php echo $product_id;?>">
            <div class="product_contener">
<?php 

        foreach($row as $key => $value)
		{
			echo '
                    <div class="item">
                            <div class="element" id="product_' . $key . '">
                                    <div class="label">' . $key . '</div>
                                    <div class="value">' . $value . '</div>
                            </div>						
                    </div>
                    ';
		}
?>
            </div>
 	</div>