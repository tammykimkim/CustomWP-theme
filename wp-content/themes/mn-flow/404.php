<?php 
/**
*
* 404 Template - 404.php
*
**/

/* Include header.php */
get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
			<div id="content" class="content">
				<article>
					<h1><?php _e( 'Oops! Page not found.', 'mn_flow' ); ?></h1>
					<h3><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'mn_flow' ); ?></h3>
				</article>
			</div><!-- .content -->
		</div>
		<div class="clearfix"></div>
	</div><!-- .row -->
</div><!-- .container -->

<?php 
/* Include footer.php */
get_footer(); ?>