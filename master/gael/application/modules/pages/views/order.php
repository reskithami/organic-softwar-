<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Caisse</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo site_url("assets/css/grayscale.css");?>" rel="stylesheet">
    <link href="<?php echo site_url("assets/css/sheduler.css");?>" rel="stylesheet">
    
    <!-- Jquery CSS -->
    <link href="<?php echo site_url("assets/css/jquery-ui.min.css");?>" rel="stylesheet">
    <link href="<?php echo site_url("assets/css/jquery-ui.structure.min.css");?>" rel="stylesheet">
    <link href="<?php echo site_url("assets/css/jquery-ui.theme.min.css");?>" rel="stylesheet">
    
    

    <!-- Custom Fonts -->
    <link href="<?php echo site_url("assets/font-awesome/css/font-awesome.min.css");?>" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    
    
    <!-- Datepicker CSS -->
    <link href="<?php echo site_url("assets/css/timepicker.css");?>" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="<?php echo site_url("assets/js/jquery.js");?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


    <!-- Caisse Section -->
    <section id="Payement" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <?php 
				echo $payement;		
                ?>
            </div>
        </div>
    </section>

    <!-- Map Section -->
<!--    <div id="map"></div>-->

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Gaël 2016 - &infin; </p>
        </div>
    </footer>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url("assets/js/bootstrap.min.js");?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo site_url("assets/js/jquery-ui.min.js");?>"></script>
    
    <!-- date js -->
    <script src="<?php echo site_url("assets/js/jquery.timepicker.js");?>"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo site_url("assets/js/grayscale.js");?>"></script>
<?php 
			$time_end = microtime(true);
			$time = $time_end - TIME_START;
			echo '<br>' . $time;
			echo '<br> 	0.110653686523438';
?>
</body>

</html>