<?php
// 
// Template Name: Custom Home 
// Description: Home Page
// 
get_header(); 
?>

<div class="main">
  <div class="container">

    <div class="content">
    		<?php get_template_part( 'loop', 'index' );	?>
    		
    </div> <!--/.content -->

    <?php get_sidebar(); ?> 

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>