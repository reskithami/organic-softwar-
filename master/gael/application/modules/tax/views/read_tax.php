

	<div class="detail_tax" id="tax_<?php echo $tax_id;?>">
            <div class="tax_contener">
<?php 

        foreach($row as $key => $value)
		{
			echo '
                    <div class="item">
                            <div class="element" id="tax_' . $key . '">
                                    <div class="label">' . $key . '</div>
                                    <div class="value">' . $value . '</div>
                            </div>						
                    </div>
                    ';
		}
?>
            </div>
 	</div>