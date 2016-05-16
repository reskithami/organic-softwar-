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
//            optionform ();
//            ajaxForm($("#product_add_product"));
            
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
        }
        
        function editLink()
        {
            
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