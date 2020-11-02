<?php get_header();?>
<!-- Archive page content -->
<div class="container">
  <?php get_search_form();?>


  <div class="row stores-post" id="post-<?php the_ID(); ?>">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="col-md-4" data-aos="fade-left">
    <div class="">
           <a href="<?php the_permalink() ?>"> <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail(array(350,300));
        }  ?></a>
        <h3><?php the_title()?></h3>
       
        </div>
    </div>
    
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>
<?php get_footer();?>