<?php 
/**
*
* Is Archive
*
**/

/* Theme Options */
global $mn_flow_archive_content_mode;

if( is_archive() || is_home() || is_search() ): ?>
	<article <?php post_class(); ?>>
		<header>
			<h1 class="uppercase"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h1>
			<div class="row">
				<div class="col-md-8">
					<?php mn_flow_entry_meta(); ?>
				</div>
				<div class="col-md-4">
					<?php 
					if( comments_open() ):
						comments_popup_link( __('<span class="el-icon-comment basic-color-icons"></span> No comments yet','mn_flow'), __('<span class="el-icon-comment basic-color-icons"></span> 1 comment','mn_flow'), __('<span class="el-icon-comment basic-color-icons"></span> % comments','mn_flow'), 'comments-link', '' );
					endif;
					?>
				</div>
			</div><!-- .row -->
			<?php 
			if( has_post_thumbnail() ): ?>
				<div class="post-image"><?php the_post_thumbnail( 'large' ); ?></div>
				<?php
			endif; ?>
		</header>
		<div class="entry" >
			<?php 
			/**
			*
			* Show the content
			*
			**/
			
			if( $mn_flow_archive_content_mode == 0 || $mn_flow_archive_content_mode != 1 ):
				the_excerpt(); 
			else:
				the_content();
			endif;
			?>
		</div>
		<footer>
			<?php 
			if( $mn_flow_archive_content_mode == 0 || $mn_flow_archive_content_mode != 1 ): ?>
				<a class="btn btn-default" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo __('Read more','mn_flow'); ?></a>
				<?php 
			endif; ?>
			<?php edit_post_link( __( 'Edit', 'mn_flow' ), '<span class="edit-link btn btn-default">', '</span>' ); ?>
		</footer>
	</article>
	<?php 
endif; ?>

<?php 
/**
*
* Is Single or Is Page
*
**/

if( is_single() || is_page() ): ?>
	<article <?php post_class(); ?>>
		<header <?php if( is_page() ) echo 'class="basic-color-bg"'; ?> >
			<div class="row">
				<div class="<?php if( has_post_thumbnail() ){ echo 'col-md-8'; }else{ echo 'col-md-12'; } ?>">
					<h1 class="uppercase"><?php the_title(); ?></h1>
				</div>
				<?php 
				if( has_post_thumbnail() && is_single() ): ?>
					<div class="col-md-4 visible-md visible-lg">
						<div class="pull-right post-image-thumb">
							<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-responsive' ) ); ?>
						</div>
					</div>
					<?php
				endif; ?>
			</div>
			<?php 
			if( is_single() ): ?>
				<div class="row">
					<div class="col-md-8">
						<?php mn_flow_entry_meta(); ?>
					</div>
					<div class="col-md-4">
						<?php 
						if( comments_open() ):
							comments_popup_link( __('<span class="el-icon-comment basic-color-icons"></span> No comments yet','mn_flow'), __('<span class="el-icon-comment basic-color-icons"></span> 1 comment','mn_flow'), __('<span class="el-icon-comment basic-color-icons"></span> % comments','mn_flow'), 'comments-link', '' );
						endif;
						?>
					</div>
				</div>
				<?php 
			endif; ?>
		</header>
		<div class="entry" >
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>'.__( 'Pages:','mn_flow' ).'</span>', 'after' => '</div>' ) ); ?>
			<div class="clearfix"></div>
		</div>
		<footer>
			<?php edit_post_link( __( 'Edit', 'mn_flow' ), '<span class="edit-link btn btn-default">', '</span>' ); ?>
			<?php 
			if ( comments_open() ) : ?>
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
	</article>
	<?php 
endif; ?>