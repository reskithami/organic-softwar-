

	<div class="detail_manufacturer" id="manufacturer_<?php echo $manufacturer_id;?>">
            <div class="manufacturer_contener">
<?php 

        foreach($row as $key => $value)
		{
			echo '
                    <div class="item">
                            <div class="element" id="manufacturer_' . $key . '">
                                    <div class="label">' . $key . '</div>
                                    <div class="value">' . $value . '</div>
                            </div>						
                    </div>
                    ';
		}
?>
            </div>
 	</div>