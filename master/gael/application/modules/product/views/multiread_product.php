<?php 
	if(! function_exists('affiche')){
		function affiche ($key, $value, $lang, $class = ''){
			return '
					<div class="item' . $class . '">
						<div class="element product_' . $key . '">
							<div class="label">' . $lang->line($key) . '</div>
							<div class="value">' . $value . '</div>
						</div>						
					</div>
									';
		}
	}

	$datenow = new DateTime("now");
	$section_type = '';
	if($product_records):
			foreach($product_records as $row):
			if($section_type !== $row->type)
			{
				if($section_type !== '')
					echo '
	</div>
    </section>
';
					
				echo '
    <section class="multi_product" id="' . $row->type . '">
	<h3 class="section_title">' . $row->type . '</h3>
	<div class="section_content row">
';	
				$section_type = $row->type;
			}
			
				?>
		<div class="detail_product col-md-3" id="product_<?php echo $row->product_id;?>">
			<div class="contener">
	<?php 				 
				$produc_link = '/pages/detail/'.$row->product_id.'/'.encode_id($row->product_id);
				if(!empty($row->small_images))
					echo '
				<a href="' . $produc_link . '">
					<span class="small_images"><img src="' . base_url() . 'product_images' . $row->small_images[0]->images_url . '" alt="' . $row->name . '"></span>
				</a>
                                        ';
				
				echo '			
                            <a href="' . $produc_link . '">
				<div class="detail">
				';
				echo affiche('title', $row->name, $this->lang);
				if(!empty($row->short_description))
					echo affiche('description', $row->short_description, $this->lang);
				
				$quantity = ($row->quantity > 0) ? 'in_stock' : 'out_stock';
				echo affiche($quantity, $row->quantity, $this->lang);
				
                                $row->sale_price = numberformat($row->sale_price, $this->lang->lang());
				echo affiche ('sale_price', $row->sale_price, $this->lang);	
				
	?>
                            </div>
                            </a>
			</div>
			<div class="control">
                            <?php if($row->type != 'vente'): ?>
                            <fieldset class="datepickerinput"> de
                                <input type="text" class="form-control date date_start"  name="date_start" data-type="<?php echo $row->type; ?>" />
                                <input type="text" class="form-control time time_start" name="time_start" data-type="<?php echo $row->type; ?>" /> à
                                <input type="text" class="form-control date date_end" name="date_end" data-type="<?php echo $row->type; ?>" />
                                <input type="text" class="form-control time time_end" name="time_end" data-type="<?php echo $row->type; ?>" />
                            </fieldset>
                            <?php endif; ?>
                            <span class="btn btn-default add_to_cart" name="<?php echo $row->product_id;?>" data-id="<?php echo encode_id($row->product_id);?>" data-type="<?php echo $row->type;?>"><?php echo $this->lang->line('add_to_cart');?></span>
                        </div>
		</div>
	<?php 
			endforeach;
	endif;
        
        echo '	
	</div>
    </section>';
        ?>