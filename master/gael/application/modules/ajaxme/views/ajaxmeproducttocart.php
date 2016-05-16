<div class="ajaxdiv" id="simpleajaxdivcarteitem">
<?php 
if(isset($carteitem)){
	echo $carteitem; 
}
?>
</div>
    <script type="text/javascript">
    (function($){
        var simpleajaxdiv = "#simpleajaxdivcarteitem";
        var error_form = 'error_form';
        $(document).ready(function(){

            $( ".detail_product .contener a" ).bind('click', function(e) {e.preventDefault();});
            $( ".datepickerinput .date" ).datepicker({
                minDate: 0,
                onClose : function(date){
                    if($(this).hasClass( "date_start" ) && $(this).attr('data-type') !== 'location'){
                        var date_end = $(this).parents('fieldset').find('.date_end');
                        if(date_end.val() === '')
                            date_end.val(date);
                    }

                },
                dateFormat: 'yy/mm/dd'
            });
           
            $(".datepickerinput .time").timeselector({
                hours12: false,
                step: 10,
                callbackHide: function(input,time){                    
                   if($(input).hasClass( "time_start" ) && $(input).attr('data-type') !== 'location'){
                       var time_end = $(input).parents('fieldset').find('.time_end');
                       if(time_end.val() === ''){
                            var monHeure = time.getTime();
                            var plus1Hours = monHeure + 3600 * 1000; // 1 jour = 86400 secondes
                            var timePlus1 = new Date(); ;
                            timePlus1.setTime(plus1Hours);
                            time_end.val(timePlus1.getHours() + ':' + (timePlus1.getMinutes()<10?'0':'') + timePlus1.getMinutes());
                       }
                   }    
                }
            });
           
            $('.control .add_to_cart').bind('click', function() {
                var obj = $(this);
                var id = obj.attr('name');
                var code = 1;
                var type = obj.attr('data-type');
                var send = false; 
                var prof ='';
                var price = $('#product_' + id + ' .contener .detail .product_sale_price .value').text().replace(',','.');
                
                if(type === 'cours' )
                {
                    // test if no one is empty 
                    var pContener = obj.parent('div').find('fieldset');
                    pContener.children('input').each(function(){
                         send = $(this).val() === '' ? send - 1 : send + 1;
                    });
                    send = send < 4 ? false : true; 
                    
                    if(send){// if first test ok 
                        // test date 
                        var d1 = new Date(pContener.children('.date_start').val() + ' ' + pContener.children('.time_start').val());
                        var d2 = new Date(pContener.children('.date_end').val() + ' ' + pContener.children('.time_end').val());
                        send = d1.getTime() <= d2.getTime()? true : false;
                    }
                    
                     if(send){// if first test ok 
                        prof = pContener.children('.select_users_form_group').val();
                        send = prof != '' ? true : false;
                    }
                    
                }
                else if(type === 'location')
                {
                    
                    // test if no one is empty 
                    var pContener = obj.parent('div').find('fieldset');
                    pContener.children('.date_start, .time_start').each(function(){
                         send = $(this).val() == '' ? send - 1 : send + 1;
                    });
                    send = send < 2 ? false : true; 
                    
                     
                    var d1 = new Date(pContener.children('.date_start').val() + ' ' + pContener.children('.time_start').val());
                    var d2 = '';
                    if(send && pContener.children('.date_end').val() !== ''){// if first test ok 
                        // test date
                        d2 = new Date(pContener.children('.date_end').val() + ' ' + pContener.children('.time_end').val());
                        send = d1.getTime() <= d2.getTime()? true : false;
                    }
                    
                    
                }
                else
                {
                    $(this).ajax_send_to_cart({
                        url:'/pages/ajaxadditem/' + id + '/' + code,
                        method: 'PUT',
                        data: {date_start: '0000-00-00 00:00:00', date_end: '0000-00-00 00:00:00', prof_id: prof, type: type, price: price},
                        callback: function(){
                            $(simpleajaxdiv).ajaxmecartlist();
                        }
                    });
                    return;
                }
                
                if(send && (type === 'cours' || type === 'location'))
                {
                    $(this).ajax_send_to_cart({
                        url:'/pages/ajaxadditem/' + id + '/' + code,
                        method: 'PUT',
                        data: {date_start: d1, date_end: d2, prof_id: prof, type: type, price: price},
                        callback: function(response){
                            $(simpleajaxdiv).html(response);
                            $(simpleajaxdiv).ajaxmecartlist();
                        }
                    });
                }
                else
                {
                    alert(error_form);
                }
            });
            
            $('.table_liste_records .deletitem').del_item();
            $('.editable_location').editable_location();
            $('.cartorder').cartorder();
            $('.deletcart').bind('click', function(event) {
               if(!confirm('delte')){
                   event.preventDefault();
                   return false
               }
            });
            <?php if(isset($users_select)){ ?>
	$('#cours fieldset').append('<?php echo str_replace("'","\'",$users_select);?>');        
            <?php } ?>

        });
            
            $.fn.ajax_send_to_cart = function (args)
            { 
                var params = $.extend({
                    url: '/pages/ajaxadditem/',
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
            
            $.fn.ajaxmecartlist = function (args)
            { 
                var params = $.extend({
                    urllist: '/pages/ajaxcartitemlist/',
                    methodlist: 'get',
                    datalist:'',
                    divlist: $(simpleajaxdiv)
                    },args);
		$.ajax({
                        url: params.urllist,
                        type: params.methodlist,
                        data: params.datalist,
			success: function(response) {
                            params.divlist.html(response);
                            $('.table_liste_records .deletitem').del_item();
                            $('.editable_location').editable_location();
                            $('.cartorder').cartorder();
			}
		});  
                return this;
            };
            
            
            $.fn.del_item = function (args){ 
                var params = $.extend(args);
               this.each(function(){
                    $(this).parent().css('color','red');
                    $(this).parent().on('click', function(e){
                            e.preventDefault();
                            var url = $(this).attr('href');
                            $(this).ajax_send_to_cart({
                                url: url,
                                callback:function(){
                                    $(this).ajaxmecartlist();
                                }
                            });
                    });

                });
                return this;
            };

            $.fn.plus_and_minus = function  ()
            {
                this.each(function () {
                    var plus = $('<span class="icon-plus-sign"></span>');
                    var minus = $('<span class="icon-minus-sign"></span>');
                    var id = $(this).attr('id').substring(8);

                    plus.on('click', function(){
                        $(this).ajax_send_to_cart({url:'/pages/ajaxadditem/' + id + '/1', callback:function(){$(this).ajaxmecartlist();}});
                    });

                    minus.on('click', function(){
                        $(this).ajax_send_to_cart({url:'/pages/ajaxadditem/' + id + '/-1', callback:function(){$(this).ajaxmecartlist();}});
                    });
                    $(this).before(plus);
                    if($(this).val()>0)
                        $(this).after(minus); 
                });
                return this;
            };
            
            $.fn.cartorder = function  ()
            {
                var table = $( this ).parents('table');
                if($(table).find('td').hasClass('editable_location'))
                {
                    $(this).bind('click', function(e) {
                        e.preventDefault();
                       alert('Form incomplet')
                    });
                }
                return this;
            };
            

            $.fn.editable_location = function  ()
            {
                this.each(function () {
                    $(this).html('');
                    var id = $(this).attr('data-id');
                    var inputdate = $('<input type="text" class="form-control date_location date_end_'+id+'" name="date_end" data-type="location" />');
                    var inputtime = $('<input type="text" class="form-control time_location time_end_'+id+'" name="time_end" data-type="location" />');
                    var button = $('<span class="btn btn-default add_to_cart">edit</span>');
                    button.on('click', function(){
                        var date_end = $('.date_end_'+id+'').filter( ":first" ).val();
                        var time_end = $('.time_end_'+id+'').filter( ":first" ).val();
                        var state = false;
                        if(date_end !== '' && time_end !== '')
                        {
                            var date_start = $('.no_editable_location_'+id+'').filter( ":first" ).text();
                            date_start = date_start.replace(/-/g, "/");
                            
                            var d1 = new Date(date_start);
                            var d2 = new Date(date_end + ' ' + time_end);
                            
                            if(d1.getTime() <= d2.getTime())
                            {
                                state = true;
                            }
                            
                        }
                        
                        if(!state)
                        {
                            alert(error_form);
                        }
                        else
                        {
                            if(confirm(d2))
                            {
                                $(this).ajax_send_to_cart({
                                    url:'/pages/ajaxmodifyitem/' + id ,
                                    method: 'PUT',
                                    data: {date_start: d1, date_end: d2},
                                    callback: function(response){
                                        $(simpleajaxdiv).html(response);
                                        $(simpleajaxdiv).ajaxmecartlist();
                                    }
                                });
                            }
                        }
                       
                    });
                    
                    $(this).append(inputdate);
                    $(this).append(inputtime);
                    $(this).append(button);
                });
                
                $('.date_location').datepicker({ minDate: 0, dateFormat: 'yy/mm/dd'});
                $('.time_location').timeselector({hours12: false, step: 10});
                
                return this;
            };
    })(jQuery);
    </script>