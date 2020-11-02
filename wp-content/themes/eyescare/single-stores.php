<?php get_header();?>
<!-- Store post content -->
<div class="container">
  <div class="row our-post">
  <?php
        $store_section = get_field('store_imormation');
        if( $store_section ): 
        if( $store_section['background_image']):
        ?> 
        <img src="<?php echo esc_url($store_section['background_image']) ?>" alt="banner" />
        <?php else :?>
        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/about_img2.jpg') ?>" alt="banner" />
        <?php
        
    endif;
       ?>
        <div class="banner-caption" data-aos="fade-up">
        <h2><?php the_title()?></h2>

        <?php if( $store_section['contact_number']): ?>
        <h3>Contact Number: <span><?php echo $store_section['contact_number'];?><span></h3>

        <?php endif;
        if( $store_section['email_id']):?>
        <h3>Email Id : <span><?php echo $store_section['email_id'];?><span></h3>

        <?php endif;
        if( $store_section['srote_address']):?>
        <h3>Store Address : <span><?php echo $store_section['srote_address'];?><span></h3>
        <?php endif; ?>
              
        </div>
</div>
    <?php  endif; ?>
  </div>
</div>
<?php get_footer();?>