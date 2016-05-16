<?php 
		echo($productform);
?>

<script type="text/javascript">
    (function($){
        $(document).ready(function(){

            optionform ();
            ajaxForm($("#product_add_product"));
            
        });
        
        function ajaxForm(form) {
            $(form).on('submit', function(e) {

                    var obj = $(this), // (*) references the current object/form each time
                    url = '<?php echo base_url() . $this->lang->lang();?>/admin/ajaxaddproduct',
                    method = obj.attr('method'),
                    data = {};
                    e.preventDefault();
                    
                    obj.find('[name]').each(function(index, value) {
                        var obj = $(this),
                        name = obj.attr('name'),
                        value = obj.val();

                        data[name] = value;
                    });

                    sendData(url, method, data, $('.product_box .product_content:first'));
                    return false; //disable refresh
            });
        }

        function sendData(url, method, data, div){
            $.ajax({
                // see the (*)
                url: url,
                type: method,
                data: data,
                success: function(response) {			
                        if(response == "<?php echo $this->lang->line('success');?>"){
                            if(confirm(response +'\n add image ?'))
                            {
                                alert('ok');
                            }
                            $(div).html("");
                        }else{
                            $(div).html(response);
                            optionform ();
                            ajaxForm($("#product_add_product"));
                        }
                }
            });  
        }
        
        function optionform ()
        {
           var manufacturer = [];
            var tax_class = [];
            <?php 
            if(isset($manufacturer_records)) 
            {
                foreach($manufacturer_records->result() as $row)                    
                {
                    echo "\n\t\t" . "manufacturer.push({id:" . $row->manufacturer_id . ", name:'" . $row->name . "'});";
                }                
            }
            
            if(isset($tax_records)) 
            {
                foreach($tax_records->result() as $row)                    
                {
                    echo "\n\t\t" . "tax_class.push({id:" . $row->tax_class_id . ", name:'" . $row->name . "', ratio:'" . $row->ratio . "'});";
                }                
            }
            ?>
            $('#manufacturer_id').html();
            $(manufacturer).each(function(i, e){
               var option = $('<option value="' + e.id + '">' + e.name + '</option>');
               $('#manufacturer_id').append(option);
            });
            
            $('#tax_class_id').html();
            $(tax_class).each(function(i, e){
               var option = $('<option value="' + e.id + '">' + e.name + ' : ' + e.ratio + '</option>');
               $('#tax_class_id').append(option);
            });
            
            $('#product_add_product a.btn').hide();
        }

        
    })(jQuery);
</script>