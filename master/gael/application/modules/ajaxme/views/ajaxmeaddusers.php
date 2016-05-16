<?php 
		echo($formaddusers);
?>

<script type="text/javascript">
    (function($){
        $(document).ready(function(){

            formoption();
            ajaxForm($("#users_add_users"));
            
        });
        
        function ajaxForm(form) {
            $(form).on('submit', function(e) {

                    var obj = $(this), // (*) references the current object/form each time
                    url = '<?php echo base_url() . $this->lang->lang();?>/pages/ajaxaddusers',
                    method = obj.attr('method'),
                    data = {};
                    e.preventDefault();//disable refresh
                    
                    obj.find('[name]').each(function(index, value) {
                        var obj = $(this),
                        name = obj.attr('name'),
                        value = obj.val();

                        data[name] = value;
                    });

                    sendData(url, method, data, $('.users_box .users_content:first'));
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
                    
                        if(typeof response === 'string' && response.indexOf("<?php echo $this->lang->line('success');?>") >= 0){
                            var user = response.replace('<?php echo $this->lang->line('success');?>', "");
                            if(user !== '')
                            {
                                $.ajax({
                                    url: "/pages/ajaxcreatcart/" + user,
                                    dataType: "json",
                                    data: '',
                                    success: function(){
                                        location.reload(true);
                                    }
                                });
                            }
                            else
                            {   
                                alert('select customer');
                                location.reload();
                            }
                        }else{
                            $(div).html(response);
                            formoption();
                            ajaxForm($("#users_add_users"));
                        }
                }
            });  
        }
        function formoption()
        {
            $('#users_add_users a.btn').hide();
        }
        

        
    })(jQuery);
</script>