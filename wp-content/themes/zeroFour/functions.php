<?php
    // Enable support for editable menus via Appearance > Menus
// This should be added to the functions.php file in order to enable custom menus
    register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'starter-theme' ),
      'footer' => __( 'Footer Menu', 'starter-theme' ),
      'sidebar-links' => __( 'Sidebar Links', 'starter-theme' ),
    ) );

// We register a sidebar which allows users to put widgets into the sidebar
    register_sidebar(array(
        'name' => 'Primary Widget Area',
        'id' => 'primary-widget-area',
        'description' => 'The primary widget area',
        'before_widget' => '<section>',
        'after_widget' => '</section>',
        'before_title' => '<header class="major"><h2>',
        'after_title' => '</h2></header>',
      ));