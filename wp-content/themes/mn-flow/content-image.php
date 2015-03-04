<?php 
/**
*
* Post Format Image
*
**/

?>
<article <?php post_class(); ?>>
	<header>
		<div class="row">
			<div class="col-md-12">
				<div class="entry" >
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>'.__( 'Pages:','mn_flow' ).'</span>', 'after' => '</div>' ) ); ?>
					<div class="clearfix"></div>
				</div>
				<footer>
					<div class="row">
						<div class="col-md-8">
							<?php 
							/**
							*
							* Entry Meta
							*
							**/

							mn_flow_entry_meta(); ?>

							<?php edit_post_link( __( 'Edit', 'mn_flow' ), '<span class="edit-link btn btn-default">', '</span>' ); ?>
						</div>
						<div class="col-md-4">
							<?php 
							/**
							*
							* Comments Link
							*
							**/
							
							if( comments_open() && is_single() ):
								comments_popup_link( __('<span class="el-icon-comment basic-color-icons"></span> No comments yet','mn_flow'), __('<span class="el-icon-comment basic-color-icons"></span> 1 comment','mn_flow'), __('<span class="el-icon-comment basic-color-icons"></span> % comments','mn_flow'), 'comments-link', '' );
							endif;
							?>
						</div>
					</div>
					<?php 
					if ( comments_open() && ! is_single() ) : ?>
						<section class="comments form-group">
							<?php 
							/**
							*
							* Comments
							*
							**/
							
							comments_template(); ?>
						</section>
						<?php 
					endif; ?>
				</footer>
			</div>
		</div>
	</header>
</article>