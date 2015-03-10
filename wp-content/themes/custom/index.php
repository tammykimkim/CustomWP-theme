<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>

<div class="main">
  <!-- <div class="container">
	  <div class="container-inner"> -->
	  <div class="content">
	    <?php get_template_part( 'loop', 'index' );	?>
	  </div>
		<!-- </div>  /.container-inner -->
  <!-- </div> /.container -->
    <?php get_sidebar(); ?>
</div> <!-- /.main -->

<?php get_footer(); ?>