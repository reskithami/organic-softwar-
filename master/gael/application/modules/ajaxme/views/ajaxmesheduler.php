<section class="ajaxdiv" id="shedulerajaxsection">
<?php 
    echo $sheduler;
?>
</section>
<script type="text/javascript" >

(function($){
    
    var shedulerAjaxSection = "#shedulerajaxsection";
    
    $(document).ready(function(){
        
        init_action_calendar();
        
    });
    
    
    function init_action_calendar()
    {        
        $('.calendar .detail_calendar_day').hide();
        
        $('.calendar .day-number .active').bind('click', function() {
            $('.calendar .detail_calendar_day').hide();
            $('.calendar .detail_calendar_day' + $(this).text()).show();
        });
        
        $('.calendar .prev, .calendar .next').bind('click', function(e) {
            e.preventDefault();
            $(this).ajaxmesheduler({urllist:'/pages/ajaxmesheduler' + $(this).attr('href')});
        });
    }
    
    
    $.fn.ajaxmesheduler = function (args)
            { 
                var params = $.extend({
                    urllist: '/pages/ajaxmesheduler/',
                    methodlist: 'get',
                    datalist:'',
                    divlist: $(shedulerAjaxSection)
                    },args);
		$.ajax({
                        url: params.urllist,
                        type: params.methodlist,
                        data: params.datalist,
			success: function(response) {
                            params.divlist.html(response);
                            
                            init_action_calendar();
			}
		});  
                return this;
            };
})(jQuery);

</script>