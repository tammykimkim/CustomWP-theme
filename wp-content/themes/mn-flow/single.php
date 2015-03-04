<?php 
/**
*
* Single Post Template - single.php
*
**/

/* Include header.php */
get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
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
				else: ?>
					<p class="alert alert-warning"><?php echo __('Sorry, no posts matched your criteria.','mn_flow'); ?></p>
					<?php 
				endif;?>
			</div><!-- .content -->

			<?php 
			/**
			*
			* Navigation
			*
			**/
			
			mn_flow_post_nav()
			?>
		</div>
		<div class="clearfix"></div>
	</div><!-- .row -->
</div><!-- .container -->

<?php 
/* Include footer.php */
get_footer(); ?>