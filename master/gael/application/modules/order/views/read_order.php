

	<div class="detail_order" id="order_<?php echo $order_id;?>">
            <div class="order_contener">
<?php 

        foreach($row as $key => $value)
		{
			echo '
                    <div class="item">
                            <div class="element" id="order_' . $key . '">
                                    <div class="label">' . $key . '</div>
                                    <div class="value">' . $value . '</div>
                            </div>						
                    </div>
                    ';
		}
?>
            </div>
 	</div>