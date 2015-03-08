<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php // Load our CSS ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />


  <?php wp_head(); ?>
<!-- This is the header hook for plugins to use -->
</head>

<body <?php body_class(); ?>>

<div class="max-container">
  <header class="top-menu">

      <div>
        <nav class="top-menu-hidden">
          <?php wp_nav_menu( array(
            'container' => false,
            'theme_location' => 'primary'
          )); ?>
        </nav>
        
        <div class="clickme">
          <i class="fa fa-coffee"></i>
        </div>
      </div>

    <!-- Add Flexslider here -->

    <div class="container">
    
        <h1 class="title">
          <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
            <?php bloginfo( 'name' ); ?>
          </a>
        </h1>
        <p class="tagline">
          <?php bloginfo( 'description' ); ?>
        </p>

    </div>  <!-- end container -->

  </header><!--/.header-->
</div> <!-- end max-container -->
