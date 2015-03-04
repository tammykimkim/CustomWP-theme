<?php 
/**
*
* Archive Template - archive.php
*
**/

/* Include header.php */
get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
			<header class="archive-header">
				<h1>
					<?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'mn_flow' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'mn_flow' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'mn_flow' ) ) );

					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'mn_flow' ), get_the_date( _x( 'Y', 'yearly archives date format', 'mn_flow' ) ) );
					elseif ( is_tag() ) :
						printf( __( 'Tag Archives: %s', 'mn_flow' ), single_tag_title( '', false ) );
					elseif ( is_author() ) :
						printf( __( 'All posts by %s', 'mn_flow' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
					else :
						_e( 'Archives', 'mn_flow' );
					endif;
					?>
				</h1>
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