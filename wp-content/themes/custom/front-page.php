<?php
// 
// Template Name: Custom Home 
// Description: Home Page
// 
get_header(); 
?>

<!--   <div class="container"> -->

    <div class="content">
      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <h2 class="title"><?php the_title(); ?></h2>  <!-- these are loop specific tags -->
<!--         <p><?php echo home_url(); ?></p> -->
<!--         <p>The url for this page is <?php echo get_permalink(); ?></p> -->
        
<!--         <p>The url for my blog post is <?php echo get_permalink(22); ?></p> -->
        <?php the_content(); ?>

      <?php endwhile; // end the loop?>

      </div> <!-- /.content -->
      
    <?php get_sidebar(); ?> 
<!--   </div>  --><!-- /.container -->

<?php get_footer(); ?>