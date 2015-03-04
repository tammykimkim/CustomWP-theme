<!DOCTYPE HTML>
<!--
	ZeroFour 2.5 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?php wp_title('|', true, 'right') ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800" rel="stylesheet" type="text/css" />
		<script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/jquery.dropotron.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/config.js"></script>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" />

		<?php wp_head(); ?>
		<!-- This is the header hook for plugins to use -->
		
	</head>
	<body class="right-sidebar">

		<!-- Header Wrapper -->
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">

							<!-- Header -->
								<header id="header">
									<div class="inner">

										<!-- Logo -->
											<h1><a href="<?php echo home_url(); ?>" id="logo"><?php bloginfo('name'); ?></a></h1>

										<!-- Nav -->
											<nav id="nav">
											<?php wp_nav_menu(array(
											  'container' => false,
											  'container_id'=>'nav',
											  'menu' => 'main'
											  )); ?>
											</nav>

									</div>
								</header>

						</div>
					</div>
				</div>
			</div>
