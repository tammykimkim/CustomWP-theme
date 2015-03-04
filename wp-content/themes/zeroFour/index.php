<?php get_header(); ?>
<!-- we just cut out the header and pasted it into the header.php page -->
		<!-- Main Wrapper -->
			<div id="main-wrapper">
				<div class="main-wrapper-style2">
					<div class="inner">
						<div class="container">
							<div class="row">
								<div class="8u">
									<div id="content skel-cell-important">

										<!-- Content -->
												<!-- Loop will start here -->
												<?php if(have_posts()) while(have_posts()) : the_post(); ?>

											<article>

												<header class="major">
													<h2><?php the_title(); ?></h2>
													<span class="byline">Written by <?php the_author(); ?> on <?php echo get_the_date(); ?></span>
												</header>

												<?php the_content(); ?>
											</article>

										<?php endwhile; ?>
												<!-- Loop will end here -->

									</div>
								</div>
							
								<?php get_sidebar(); ?>

							</div>  <!-- end.row -->
						</div> <!-- end.container -->
					</div> <!-- end.inner -->
				</div> <!-- end.main-wrapper -->
			</div> <!-- end.main-wrapper-style2 -->

<?php get_footer(); ?>