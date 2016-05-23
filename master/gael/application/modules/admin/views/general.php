<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Prologue by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">
    <!-- Jquery CSS -->
    <link href="<?php echo site_url("assets/css/jquery-ui.min.css");?>" rel="stylesheet">
    <link href="<?php echo site_url("assets/css/jquery-ui.structure.min.css");?>" rel="stylesheet">
    <link href="<?php echo site_url("assets/css/jquery-ui.theme.min.css");?>" rel="stylesheet">
    
		<!--[if lte IE 8]><script src="<?php echo site_url("assets/admin/js/ie/html5shiv.js");?>""></script><![endif]-->
		<link rel="stylesheet" href="<?php echo site_url("assets/admin/css/main.css");?>" />
		<!--[if lte IE 8]><link rel="stylesheet" href="<?php echo site_url("assets/admin/css/ie8.css");?>" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="<?php echo site_url("assets/admin/css/ie9.css");?>" /><![endif]-->
                
                <!-- jQuery -->
		<script src="<?php echo site_url("assets/admin/js/jquery.min.js");?>"></script>
	</head>
	<body>

		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
						
                                                    <a href='/'>
                                                        <span class="image avatar48">
                                                            <img src="<?php echo site_url("assets/admin/images/standup_paddle_icone_bleu.png");?>" alt="" />
                                                        </span>
                                                    </a>
							<h1 id="title"><?php if($logedUser) echo $logedUser->first_name;?></h1>
							<p>Hyperspace Engineer</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
                                                   
							<!--

								Prologue's nav expects links in one of two formats:

								1. Hash link (scrolls to a different section within the page)

								   <li><a href="#foobar" id="foobar-link" class="icon fa-whatever-icon-you-want skel-layers-ignoreHref"><span class="label">Foobar</span></a></li>

								2. Standard link (sends the user to another page/site)

								   <li><a href="http://foobar.tld" id="foobar-link" class="icon fa-whatever-icon-you-want"><span class="label">Foobar</span></a></li>

							-->
							<ul>
								<li>
                                                                    <a href="<?php echo site_url('admin/index');?>" id="top-link_order" class="skel-layers-ignoreHref<?php if(strpos(current_url(), '/admin/index')!== false)echo ' active';?>">
                                                                        <span class="icon fa-home"><?php echo $this->lang->line('order');?></span>
                                                                    </a>
                                                                </li>
								<li>
                                                                    <a href="<?php echo site_url('admin/product');?>" id="top-link_product" class="skel-layers-ignoreHref<?php if(strpos(current_url(), 'product')!== false)echo ' active';?>">
                                                                        <span class="icon fa-th"><?php echo $this->lang->line('product');?></span>
                                                                    </a>
                                                                </li>
								<li>
                                                                    <a href="<?php echo site_url('admin/manufacturer');?>" id="top-link_manufacturer" class="skel-layers-ignoreHref<?php if(strpos(current_url(), 'manufacturer')!== false)echo ' active';?>">
                                                                        <span class="icon fa-user-secret"><?php echo $this->lang->line('manufacturer');?></span>
                                                                    </a>
                                                                </li>
								<li>
                                                                    <a href="<?php echo site_url('admin/tax');?>" id="top-link_tax" class="skel-layers-ignoreHref<?php if(strpos(current_url(), 'tax')!== false)echo ' active';?>">
                                                                        <span class="icon fa-barcode"><?php echo $this->lang->line('tax');?></span>
                                                                    </a>
                                                                </li>
								<li>
                                                                    <a href="<?php echo site_url('auth');?>" id="top-link_auth" class="skel-layers-ignoreHref<?php if(strpos(current_url(), 'auth')!== false)echo ' active';?>">
                                                                        <span class="icon fa-user"><?php echo $this->lang->line('users');?></span>
                                                                    </a>
                                                                </li>
								
							</ul>
						</nav>

				</div>


			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
<!--					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt">Hi! I'm <strong>Prologue</strong>, a <a href="http://html5up.net/license">free</a> responsive<br />
								site template designed by <a href="http://html5up.net">HTML5 UP</a>.</h2>
								<p>Ligula scelerisque justo sem accumsan diam quis<br />
								vitae natoque dictum sollicitudin elementum.</p>
							</header>
                                                    <?php	echo $header; ?>
							<footer>
								<a href="#portfolio" class="button scrolly">Magna Aliquam</a>
							</footer>

						</div>
					</section>-->

                                        
				<!-- About Me -->
					<section class="three">
						<div class="container">

							<header>
								<h2><?php	echo $titelHeader; ?></h2>
							</header>

						<?php	echo $content; ?>

						</div>
					</section>

				

			</div>

		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
<?php 
			$time_end = microtime(true);
			$time = $time_end - TIME_START;
			echo '<br>' . $time;
			echo '<br> 	0.110653686523438';
?>
			</div>

		<!-- Scripts -->
			<script src="<?php echo site_url("assets/admin/js/jquery.scrolly.min.js");?>"></script>
			<script src="<?php echo site_url("assets/admin/js/jquery.scrollzer.min.js");?>"></script>
			<script src="<?php echo site_url("assets/admin/js/skel.min.js");?>"></script>
			<script src="<?php echo site_url("assets/admin/js/util.js");?>"></script>
			<!--[if lte IE 8]><script src="<?php echo site_url("assets/admin/js/ie/respond.min.js");?>"></script><![endif]-->
			<script src="<?php echo site_url("assets/admin/js/main.js");?>"></script>
    <!-- Plugin JavaScript -->
    <script src="<?php echo site_url("assets/js/jquery-ui.min.js");?>"></script>

	</body>
</html>