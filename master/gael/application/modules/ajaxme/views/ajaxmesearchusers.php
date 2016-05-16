
<?php 
    echo $searchusers;
?>
<script type="text/javascript" >
( function( $ ) {
    $(document).ready(function(){
        $('#nom_clientsearchform').autocomplete({
            type: 'POST',
            autoFocus : true,
            minLength: 1,
            _renderItem: function( ul, item ) {
                return $( "<li>" )
                  .attr( "data-value", item.value )
                  .append( item.user_id )
                  .appendTo( ul );
            },
            source: function( request, response ) {
                $.ajax({
                    url: "/pages/ajaxsearchusers/" + request.term,
                    dataType: "json",
                    data: '',
                    success: function(data){
                        response( data ) ;
                    }
                });
            },
            select: function(e,ui)
            {
                $( "#id_clientsearchform" ).val(ui.item.user_id);
            }
        });
        
        
        // show new user form
        $('#newUsers').bind('click', function() {
            $('.userscontener ').toggle();
        });
        
        // on validation search user
        $('#validuserfind').bind('click', function() {
            var user = $( "#id_clientsearchform" ).val();
            if(user !== '')
            {
                $.ajax({
                    url: "/pages/ajaxcreatcart/" + user,
                    dataType: "json",
                    data: '',
                    success: function(data){
                        if(data !== '')
                        {
                            $.ajax({
                                url: "/pages/ajaxselectecart/" + data,
                                dataType: "json",
                                data: '',
                                complete : function(){
                                    $(this).ajaxmecartlist();

                                    $('html, body').stop().animate({
                                        scrollTop: $('#Caisse').offset().top
                                    }, 1500, 'easeInOutExpo');

                                    $('.multi_product, .userscontener ').hide();
                                }
                            });

                        }
                    }
                });
            }
            else
            {   
                alert('select customer');
            }
        });
            
    });
    
    
} )( jQuery );

</script>