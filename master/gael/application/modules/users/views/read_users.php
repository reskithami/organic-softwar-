

	<div class="detail_users" id="users_<?php echo $users_id;?>">
            <div class="users_contener">
<?php 

        foreach($row as $key => $value)
		{
			echo '
                    <div class="item">
                            <div class="element" id="users_' . $key . '">
                                    <div class="label">' . $key . '</div>
                                    <div class="value">' . $value . '</div>
                            </div>						
                    </div>
                    ';
		}
?>
            </div>
 	</div>