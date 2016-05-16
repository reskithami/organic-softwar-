<?php 
		echo($taxform);
?>

<script type="text/javascript">
    (function($){
        $(document).ready(function(){

            optionform ();
            ajaxForm($("#tax_add_tax"));
            
        });
        
        function ajaxForm(form) {
            $(form).on('submit', function(e) {

                    var obj = $(this), // (*) references the current object/form each time
                    url = '<?php echo base_url() . $this->lang->lang();?>/admin/ajaxAddTax',
                    method = obj.attr('method'),
                    data = {};
                    e.preventDefault();
                    
                    obj.find('[name]').each(function(index, value) {
                        var obj = $(this),
                        name = obj.attr('name'),
                        value = obj.val();

                        data[name] = value;
                    });

                    sendData(url, method, data, $('.tax_box .tax_content:first'));
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
                            ajaxForm($("#tax_add_tax"));
                        }
                }
            });  
        }
        
        function optionform ()
        {
            $('#tax_add_tax a.btn').hide();
        }

        
    })(jQuery);
</script>