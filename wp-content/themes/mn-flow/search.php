<?php 
/**
*
* Search Template - search.php
*
**/

/* Include header.php */
get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
			<header class="archive-header">
				<h1><?php printf( __( 'Search Results for: %s', 'mn_flow' ), get_search_query() ); ?></h1>
			</header>
			<div id="content" class="content">
				<?php 
				/**
				*
				* Loop
				*
				**/
				
				if( have_posts() ):
					while( have_posts() ): the_post();
						get_template_part( 'content', get_post_format() );
					endwhile;

					/**
					*
					* Navigation
					*
					**/
					
					mn_flow_posts_paginate();
					
				else: ?>
					<p class="alert alert-warning"><?php echo __('Sorry, no posts matched your criteria.','mn_flow'); ?></p>
					<?php 
				endif;?>
			</div><!-- .content -->
		</div>
		<div class="clearfix"></div>
	</div><!-- .row -->
</div><!-- .container -->

<?php 
/* Include footer.php */
get_footer(); ?>