<div id="adminOrderContent">
<?php 
		echo($content);
?>
</div>
<script type="text/javascript">
    (function($){
        var adminOrderContent = '#adminOrderContent';
        $(document).ready(function(){
            
            listelink();
            
        });
        
        function listelink()
        {
            $('.pagination a, form a.list_reset').each(function() {
                var link = $(this).attr('href');
                if(link)
                {
                    link = link.replace("order/index/", "admin/index/");
                    $(this).attr('href', link);
                }
            });
            
            $('form.listeSearch').each(function() {
                var link = $(this).attr('action');
                if(link)
                {
                    link = link.replace("order/index", "admin/index");
                    $(this).attr('action', link);
                }
            });
            
            $('table a.list_link_edit').bind('click', function(event) {
                 event.preventDefault();
                var id = $( this ).attr('data-id');
                var code = $( this ).attr('data-code');
                if(id !== '' && code !== '')
                {
                    $(this).ajax_order_methode({
                        url:'/admin/ajaxEditOrder/' + id + '/' + code,
                        method: 'get',
                        callback: function(response){
                            $(adminOrderContent).html(response);
                            editLink();
                        }
                    });
                    
                }
                else
                {   
                    alert('error');
                }
            });
            
            
            $('table a.list_link_delete').bind('click', function(event) {
                 event.preventDefault();
                var id = $( this ).attr('data-id');
                var code = $( this ).attr('data-code');
                if(id !== '' && code !== '')
                {
                    if(confirm('<?php echo $this->lang->line('delete');?>'))
                    {
                        $(this).ajax_order_methode({
                            url:'/admin/ajaxDeleteOrder/' + id + '/' + code,
                            method: 'get',
                            callback: function(response){
                                alert(response);
                                document.location.reload(true);
                            }
                        });
                    }
                    
                }
                else
                {   
                    alert('error');
                }
            });
            
            $( "form input[name=date_start], form input[name=date_end]" ).datepicker({
                dateFormat: 'yy-mm-dd'
            });
        }
        
        function editLink()
        {
            $('form#order_edit_order').on('submit', function(e) {

                    var obj = $(this), // (*) references the current object/form each time
                    id = obj.find('[name=id]').val(), 
                    code = obj.find('[name=order_id]').val(), 
                    url = '<?php echo base_url() . $this->lang->lang();?>/admin/ajaxEditOrder/' + code + '/' + id,
                    method = obj.attr('method'),
                    data = {};
                    e.preventDefault();
                    
                    obj.find('[name]').each(function(index, value) {
                        var fild = $(this),
                        name = fild.attr('name'),
                        value = fild.val();
                        data[name] = value;
                    });

                    obj.ajax_order_methode({url:url, method:method, data: data, callback:function(response){
                            if(response == "<?php echo $this->lang->line('success');?>"){
                            alert( response )
                            document.location.reload(true);
                        }else{
                            $(adminOrderContent).html(response);
                            editLink();
                        }
                    }});
                    return false; //disable refresh
            });
            $('#order_edit_order .controls a.btn').hide();
        }
        
        
        
        $.fn.ajax_order_methode = function (args)
            { 
                var params = $.extend({
                    url: '/admin/ajaxadditem/',
                    method: 'get',
                    data:''
                    },args);
                $.ajax({
                        url: params.url,
                        type: params.method,
                        data: params.data,
                        success: function(response) {
                            if(params.callback)
                                params.callback(response);
                        }
                }); 
                return this;
            };
        
    })(jQuery);
</script>