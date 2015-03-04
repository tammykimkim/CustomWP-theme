<?php 
/**
*
* Theme Header - header.php
*
**/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
	/**
	*
	* Theme Options
	*
	**/
	
	global $mn_flow_archive_content_mode;
	$mn_flow_options = get_option( 'mn_flow' );

	if( $mn_flow_options ):
		$mn_flow_archive_content_mode = $mn_flow_options['mn_flow_archive_content_mode'];
	endif;
	?>
	
	<title><?php wp_title( '-', true, 'right' ); ?></title>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php 
	/* Hook - Triggered funcion */
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="mobile-background hidden-md hidden-lg" >
	<img src="<?php echo get_background_image(); ?>" alt="...">
</div>

<div class="content-wrapp"><!-- end in footer.php -->
	<div class="container">
		<header class="main-header">
			<div class="row">
				<div class="col-md-8 col-sm-12">
					<div class="website-title">
						<h2><?php bloginfo( 'name' ); ?></h2>
						<h3><?php bloginfo( 'description' ); ?></h3>
					</div>
				</div>
				<div class="col-md-4">
					<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input class="form-control" name="s" type="text">
						<button type="submit" class="search-btn"><span class="el-icon-search"></span></button>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<nav>
						<button class="navbar-toggle collapsed hidden-sm hidden-md hidden-lg" type="button" data-toggle="collapse" data-target="#flow-navbar-collapse">
					       <span class="el-icon-lines"></span>
					    </button>
					    <div class="collapse navbar-collapse" id="flow-navbar-collapse">
							<?php
							/**
							*
							* Menu location
							*
							**/

							$args = array( 
								'theme_location' => 'primary', 
								);
							wp_nav_menu( $args ); ?>
						</div>
					</nav>
				</div>
			</div>
		</header>
	</div>	