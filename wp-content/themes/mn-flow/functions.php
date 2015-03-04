<?php
/**
 * MN Flow only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/* Setup Theme */

add_action( 'after_setup_theme', 'mn_flow_setup' );

function mn_flow_setup() {

	/*
	 * Makes MN Flow Theme for fun available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on MN Flow Theme, use a find and
	 * replace to change 'mn_flow' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'mn_flow', get_template_directory() . '/languages' );

	/* Add Theme Support For Custom Backgrounds */
	$args = array(
	'default-color'          => '000000',
	'default-image'          => get_template_directory_uri() . '/assets/img/background.jpg',
	'default-repeat'         => 'no-repeat',
	'default-position-x'     => 'left',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
	);
	add_theme_support( "custom-background", $args );

	function mn_flow_activation_function($oldname, $oldtheme=false) {
 		set_theme_mod( 'background_attachment', 'fixed' );
	}
	add_action("after_switch_theme", "mn_flow_activation_function", 10 ,  2);

	/* Add Theme Support For Feed Links */
	add_theme_support( 'automatic-feed-links' );

	/* Add Theme Support For Post Thumbnails */
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
	}

	/* Define Custom Thumbnails Custom Formats */
	if ( function_exists( 'add_image_size' ) ):
		 add_image_size( 'wide', 400, 200, true );
		/* Add same more */
	endif;

	/* Add Theme Support For Post Formats */
	add_theme_support( 'post-formats', array( 'video', 'gallery', 'image', 'audio', 'quote' ) );

	/* Add custom actions. */
	add_action( 'widgets_init', 'mn_flow_register_sidebars' );

	/* Register menu location */
	register_nav_menus( array('primary' => __('Primary','mn_flow') ) );

	/* Add TinyMCE Editor Style */
	function mn_flow_add_editor_styles() {
	    add_editor_style( 'custom-editor-style.css' );
	    $font_url = 'http://fonts.googleapis.com/css?family=Open+Sans:300';
	    add_editor_style( str_replace( ',', '%2C', $font_url ) );
	}
	add_action( 'init', 'mn_flow_add_editor_styles' );

	/* Add Google Fonts */
	function mn_flow_load_fonts() {
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,700|Open+Sans+Condensed:300,700');
            wp_enqueue_style( 'googleFonts');
        }
    add_action('wp_print_styles', 'mn_flow_load_fonts');

    /* Add HTML5 Fix for Internet Explorer  */
    add_action('wp_head','mn_flow_options_style');

    /* Add Customized Options Styles */
    add_action('wp_head','mn_flow_ie_fix');

}

/* Add Theme Support For JetPack Infinite Scroll */
function mn_flow_infinite_scroll(){
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'infinite-scroll', array(
		    'container' => 'content',
		    'footer_widgets' => array( 'footer-left-sidebar', 'footer-middle-sidebar', 'footer-right-sidebar' ),
		    'footer' => 'page',
		) );
	}
}
add_action( 'init', 'mn_flow_infinite_scroll' );

/* Change Infinite Scroll Older Posts Text if Infinite Scroll is Active */
if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ):
	function mn_flow_infinite_scroll_btn_text() {
	if ( is_home() || is_archive() ) {
		$button_text = __('Load more...', 'mn_flow' );
		?>
		<script type="text/javascript">
		//<![CDATA[
		infiniteScroll.settings.text = "<?php echo $button_text; ?>";
		//]]>
		</script>
		<?php }
	}
	add_action( 'wp_footer', 'mn_flow_infinite_scroll_btn_text', 3 );
endif;

/* Set Content Width */
if ( ! isset( $content_width ) ) $content_width = 610;

/* Set HTML5 Fix Scritps for Internet Explorer */
function mn_flow_ie_fix(){
	$condicional_ie_comment = '<!--[if IE]>
	<script src="' . get_template_directory_uri() . '/assets/ie/respond.min.js"></script>
	<script src="' . get_template_directory_uri() . '/assets/ie/html5.js"></script>
	<![endif]-->';

	echo $condicional_ie_comment;
}

/* Set Customized Option Style */
function mn_flow_options_style() {
	$mn_flow_options = get_option( 'mn_flow' );

	if( $mn_flow_options ):
		$mn_flow_basic_color = $mn_flow_options['mn_flow_basic_color_theme'];
		$mn_flot_title_background = $mn_flow_options['mn_flow_title_background_color'];
	endif;

	$option_style = '<style>';

	if( get_theme_mod( 'background_attachment') == 'fixed' ):
		$option_style .= 'body{-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}';
	endif;

	if( isset( $mn_flow_basic_color ) ):
		$option_style .= '
		.basic-color-bg,
		.post .page-link a,
		blockquote, th, .sticky,
		.basic-color-bg-child-links a,
		.post .post-password-form, .type-page .post-password-form,
		.btn-default:hover, .comment-form .form-submit input,
		.main-header .menu .children a:hover, .main-header .menu .sub-menu a:hover,
		.search-form input:focus, .error404 article,
		.format-audio .entry, nav .navbar-toggle, 
		.main-header nav li a, #infinite-handle span,
		#wp-calendar tbody td a:hover
		{ background-color: ' . $mn_flow_basic_color . '; }
		.basic-color-text,
		a:hover, .share a:hover,
		#wp-calendar caption, .comment-list .comment-author,
		#wp-calendar #today, #wp-calendar #today a,
		.archive-header h1 a:hover
		input[type="submit"], #wp-calendar tbody td a
		{ color: '. $mn_flow_basic_color . '; }
		.basic-color-border,
		.bypostauthor .comment-author img,
		.comment-respond h3, .comments-title,
		.btn-default:hover, .main-footer h3, .main-header nav ul,
		.search-form, #wp-calendar tbody td a, .video-entry
		{ border-color: ' . $mn_flow_basic_color . '; }
		@media ( max-width: 480px ) {
			.main-header .menu li a{
				background-color: ' . $mn_flow_basic_color . ' !important;
			}
		}';

		if( isset( $mn_flot_title_background ) && $mn_flot_title_background == true ):
			$option_style .= '.title-site{ background-color: ' . $mn_flow_basic_color . '; }';
		endif;
	endif;

	$option_style .= '</style>';

	echo $option_style;
}

/* Add class basic-color-border to all Posts container */
function mn_flow_post_custom_class($classes) {
    global $post;
    $classes[] = 'basic-color-border';
    return $classes;
}
add_filter('post_class', 'mn_flow_post_custom_class');

/* Register Sidebars Function */
function mn_flow_register_sidebars() {
	/* Add Sidebar Widgets Support */
	register_sidebar(array(
	  'name' => __( 'Footer Left Sidebar', 'mn_flow' ),
	  'id' => 'footer-left-sidebar',
	  'description' => __( 'Widgets in this area will be shown on the left-hand side on footer.','mn_flow' ),
	  'before_title' => '<h3>',
	  'after_title' => '</h3>'
	));

	register_sidebar(array(
	  'name' => __( 'Footer Middle Sidebar', 'mn_flow' ),
	  'id' => 'footer-middle-sidebar',
	  'description' => __( 'Widgets in this area will be shown on the middle-hand side on footer.','mn_flow' ),
	  'before_title' => '<h3>',
	  'after_title' => '</h3>'
	));

	register_sidebar(array(
	  'name' => __( 'Footer Right Sidebar', 'mn_flow' ),
	  'id' => 'footer-right-sidebar',
	  'description' => __( 'Widgets in this area will be shown on the right-hand side on footer.','mn_flow' ),
	  'before_title' => '<h3>',
	  'after_title' => '</h3>'
	));
}

/* Navigation functions */
function mn_flow_posts_paginate() {
	global $wp_query;

	// Don't print empty markup.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="default-posts-nav basic-color-bg-child-links">
		<div class="row">
			<div class="col-md-6">
			<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous-posts pull-left"><?php next_posts_link( __( '<span class="el-icon-chevron-left"></span> Older posts', 'mn_flow' ) ); ?></div>
			<?php endif; ?>
			</div>
			<div class="col-md-6">
			<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next-posts pull-right"><?php previous_posts_link( __( 'Newer posts <span class="el-icon-chevron-right"></span>', 'mn_flow' ) ); ?></div>
			<?php endif; ?>
			</div>
		</div>
	</nav>
	<?php
}

function mn_flow_post_nav() {
	global $post;

	// Don't print empty markup.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="posts-nav">
		<div class="row">
			<div class="col-md-6">
				<div class="basic-color-bg-child-links prev-post pull-left">
					<?php previous_post_link('%link', '<span class="el-icon-chevron-left"></span> %title');  ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="basic-color-bg-child-links next-post pull-right">
					<?php next_post_link('%link', '%title <span class="el-icon-chevron-right"></span>');  ?>
				</div>
			</div>
		</div>
	</nav>
	<?php
}

/* Entry Meta */
function mn_flow_entry_meta(){
	global $post;
	?>
	<time><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a></time>
	<div class="clearfix"></div>
	<?php 
	if( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ): ?>
		<div class="categories-links pull-left"><span class="el-icon-folder-open"></span>	<?php echo get_the_category_list( __( ', ', 'Used between list items, there is a space after the comma.', 'mn_flow' ) ); ?></div>
		<?php 
	endif; 
	?>
	<div class="author-link"><span class="el-icon-user"></span> <?php the_author_posts_link(); ?></div>
	<?php
	the_tags( '<div class="tags"><span class="el-icon-tag"></span> ', ', ', '</div>' ); 
}

/* Featured Front Page Recent Posts */
function mn_flow_featured_posts(){
	/* Theme Options */
	$mn_flow_options = get_option( 'mn_flow' );

	if( $mn_flow_options ):
		$mn_flow_featured_recent_posts_number = (int)$mn_flow_options['mn_flow_featured_number_posts'];
	else:
		$mn_flow_featured_recent_posts_number = 6;
	endif;

	global $paged;
	global $post;

	/* Show only in first posts page */
	if ( $paged >= 2 )
		return;
	if( $mn_flow_featured_recent_posts_number > 0 ): ?>
		<div class="col-md-10 col-md-offset-1">
			<section class="featured">
				<div id="container-masonry">
					<?php 
					/**
					*
					* Featured Recent Posts
					*
					**/
					
					$mn_flow_args = array(
						'post_type' => 'post',
						'numberposts' => $mn_flow_featured_recent_posts_number
						);
					$mn_flow_posts_data = get_posts( $mn_flow_args );
					if( $mn_flow_posts_data ):
						foreach( $mn_flow_posts_data as $post ): setup_postdata( $post );
						$has_thumbnail = has_post_thumbnail();
						?>
						<div class="item">
							<article class="post-featured <?php if( !$has_thumbnail ) echo 'no-thumbnail'; ?>">
								<time class="basic-color-bg">
									<span class="day"><?php the_time( 'd' ); ?></span>
									<span class="month"><?php the_time( 'M' ); ?></span>
								</time>
								<?php 
								if( $has_thumbnail ): ?>
									<a class="post-thumbnail basic-color-border" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium', array( 'class'=>'img-responsive' ) ); ?></a>
									<?php 
								endif; ?>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</article><!-- post-featured -->
						</div>
						<?php 
						endforeach;
					endif; ?>
				</div><!-- .row -->
			</section>
		</div>
		<?php 
	endif; 
}

/* Extract video from content */
function mn_flow_featured_video( $content ) {
	$url = trim( array_shift( explode( "\n", $content ) ) );	
	if ( 0 === strpos( $url, 'http://' ) || preg_match ( '#^<(script|iframe|embed|object)#i', $url )) { 	
 		echo apply_filters( 'the_content', $url ); 	
 	}	 		
}

function mn_flow_content_no_video( $content ) {
	$url = trim( array_shift( explode( "\n", $content ) ) );	
	if ( 0 === strpos( $url, 'http://' ) || preg_match ( '#^<(script|iframe|embed|object)#i', $url )) { 		
 		$content = trim( str_replace( $url, '', $content ) );  	
 	}
	return $content;
}

/* Enqueue Theme Scripts and Styles */
function mn_flow_scripts_styles() {
	// Threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Loads JavaScript file.
	wp_enqueue_script( 'mn-flow-script', get_template_directory_uri() . '/assets/dist/concat.min.js', array( 'jquery' ), '2014-03-07', true );
	
	// Load Front Page scripts.
	if ( is_front_page() ):
		wp_enqueue_script( 'jquery-masonry', array( 'jquery' ) );
		wp_enqueue_script('home-scripts', get_template_directory_uri() .'/assets/home/home-scripts.js', array('jquery'), '1.0', true);
	endif;

	// Loads main stylesheet.
	wp_enqueue_style('mn-flow-style', get_template_directory_uri() .'/assets/dist/all.min.css', false, '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'mn_flow_scripts_styles' );

/* Nicely Title */
function mn_flow_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'mn_flow' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'mn_flow_wp_title', 10, 2 );

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 * https://github.com/devinsays/options-framework-theme
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/functions/theme-options/' );
require_once dirname( __FILE__ ) . '/functions/theme-options/options-framework.php';