	<div class="itemcontener" id="itemcontener">	
            <h3 class="heading"><?php echo $this->lang->line('item_list'); ?></h3>
            <div class="item_box table-responsive">
                <div class="item_content">
                    <h2><?php echo $cart_records->first_name . ' ' . $cart_records->last_name;?></h2>
                        <div class="flasdata"><?php if($this->session->flashdata('msg')){ 
                        echo $this->session->flashdata('msg'); } ?></div>
                </div>

                <table class="table table_liste_records">
                    <tbody>
                        <?php
                        $total_price = 0; 
                        if(isset($item_records)) :
                            foreach($item_records as $row): 

                                if($row->quantity > 0)
                                {
                                    $name = $row->name;
                                    $quantity = $row->quantity;

                                    $price = $row->sale_price;
                                    
                                    
                                    $sum_price = $row->total;
                                    $total_price += $sum_price;

                        ?>
                        <tr>
                            <td><?php echo $row->type; ?></td>
                            <td<?php if($row->type == 'location'){ echo ' class="no_editable_location_' . $row->cart_item_id. '"';
                            }?>><?php if ($row->type == 'cours' || $row->type == 'location' ){echo $row->start_date ;} ?> </td>
                            <td<?php if($row->type == 'location' && $row->end_date == '0000-00-00 00:00:00' ){ echo ' class="editable_location" data-id="' . $row->cart_item_id. '"';
                            }?>><?php if ($row->type == 'cours' || $row->type == 'location' ){echo $row->end_date;} ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo numberformat($row->sale_price, $this->lang->lang()); ?></td>
                            <td><input type="text" name="quantity" id="quantity<?php echo $row->product_id; ?>" value="<?php echo $quantity; ?>" class="form-control input_cart_item"  ></td>
                            <td><?php echo numberformat($sum_price, $this->lang->lang()); ?></td>
                            <td>
                                <a href="<?php echo site_url('pages/detail/'.$row->product_id.'/'.encode_id($row->product_id)); ?>" class="sepV_a" title="Edit"><i class="see_product"><?php echo $this->lang->line('go_to_product'); ?></i></a>
                                <a href="<?php echo site_url('cartitem/ajax_delete_item/'.$row->cart_item_id.'/'.encode_id($row->cart_item_id)); ?>" class="sepV_a" title="Delete"><i class="deletitem">del</i></a>
                            </td>
                        </tr>
                          <?php }
                            endforeach; ?>						
                        <tr>
                            <td><?php echo $this->lang->line('Total'); ?></td>
                            <td><?php echo numberformat($total_price, $this->lang->lang()); ?></td>
                            <td></td>
                            <td></td>
                            <td><a href="<?php echo site_url('pages/creat_order/'); ?>" class="cartorder btn btn-success"><?php echo $this->lang->line('payed'); ?></a></td>
                            <td></td>
                            <td><a href="<?php echo site_url('pages/ajaxdeletecart/'.$cart_records->cart_id); ?>" class="deletcart btn btn-danger"><?php echo $this->lang->line('delete'); ?></a></td>
                            <td></td>
                        </tr>
                  <?php 
                        else : 
                        endif;?> 	
                    </tbody>
                </table>
            </div>
 	</div>