<?php // If there are no posts to display, such as an empty archive page ?>

<?php if ( ! have_posts() ) : ?>

	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title">Not Found</h1>

		<section class="entry-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<?php get_search_form(); ?>
		</section><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php endif; // end if there are no posts ?>

<?php // if there are posts, Start the Loop. ?>

<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('drew'); ?>>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark"><?php the_title(); ?></a> </h2>
<!-- 			<div class="avatar-bgnd"> -->
			<!-- adding my avatar -->
<!-- 				<?php //echo get_avatar( get_the_author_meta('ID')); ?> -->
			<!-- adding the date here -->
	      <p><?php echo get_the_date('D M t, h:i A'); ?>

<!-- 	      <?php //echo $author_name = get_author_name( $user_id ); ?>  this will just get and print my name -->
	       -  by  
	       <a href="<?php the_permalink(); ?>" title="the_author_posts_link(); ?>"><?php the_author_posts_link(); ?></a></p>

				<section class="entry-content">
					<?php the_excerpt(); ?>

					<?php wp_link_pages( array(
	          'before' => '<div class="page-link"> Pages:',
	          'after' => '</div>'
	        )); ?>

	        

				</section><!-- .entry-content -->

				<div class="taxes">
					<p><?php the_tags('Tags: ', ', ', '<br>'); ?> Posted in <?php the_category(', '); ?></p>
        	<p><?php comments_popup_link('Respond to this post &raquo;', '1 Response &raquo;', '% Responses &raquo;'); ?></p>
        	<p><?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>
				</div> <!-- /.taxes -->
		</article><!-- #post-## -->

<!-- 		<?php comments_template( '', true ); ?> -->

<?php endwhile; // End the loop. Whew. ?>

<?php // Display navigation to next/previous pages when applicable ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <p class="alignleft"><?php next_posts_link('&laquo; Older Entries'); ?></p>
  <p class="alignright"><?php previous_posts_link('Newer Entries &raquo;'); ?></p>
<?php endif; ?>
