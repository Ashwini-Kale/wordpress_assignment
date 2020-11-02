<!-- Add Footer -->
<?php get_header(); ?>
<!-- End Footer -->

<!-- Post Content -->
<div class="container">
  <div class="row our-post">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="col-md-6" data-aos="fade-left">
        <h2><?php the_title(); ?></h2>
        <?php the_content();?>
        <?php echo get_the_date(); ?>
    </div>
    <div class="col-md-6">
        <?php the_post_thumbnail()?>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>
<!-- Add Footer -->
<?php get_footer();  ?>
<!-- End Footer -->

