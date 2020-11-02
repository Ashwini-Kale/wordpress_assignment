<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head();?>
  </head>
  <body <?php body_class(); ?> >
    <div class="wrapper">
      <header>
        <div class="container p-0 px-md-4">
          <div class="d-flex align-items-center no-gutters flex-wrap">
            <div
              class="col-12 col-md-4 col-lg-6 order-1 order-md-0 d-flex align-items-center flex-wrap justify-content-between px-2 px-md-0"
            >
              <div class="logo">
                <a href="<?php echo get_bloginfo( 'url' )?>">
                  <?php 
                      $custom_logo_id = get_theme_mod( 'custom_logo' );
                      $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                      if(has_custom_logo()) {
                        echo '<img  src="'.$image[0].'" alt="' . get_bloginfo( 'name' ) . '">';
                      }else{
                        echo '<h4>'. get_bloginfo( 'name' ) .'</h4>';
                        echo '<p>'. get_bloginfo( 'description' ) .'</p>';
                      }
                  ?>
                </a>
              </div>
              <button class="d-block d-md-none hamburger-icon" aria-label="Mobile Header Menu" role="menubar">
                <div><span></span><span></span></div>
                <p class="nav-label mb-0">MENU</p>
              </button>
            </div>
            <div class="col-12 col-md-8 col-lg-6 d-flex flex-md-column flex-wrap align-items-end">
              <?php 
                $upper_header = get_field('upper_header','option');
                if( $upper_header ): ?>
              <div class="right-top-list">
                <ul class="list-unstyled d-flex flex-wrap">
                  <?php if($upper_header['account_number']): ?>
                  <li>
                    <a href="<?php echo $upper_header['account_number']?>">
                      <span>
                        <img src="<?php echo get_template_directory_uri().'/assets/images/icon1.png'?>" alt="My Account" />
                      </span>My Account</a>
                  </li>
                  <?php endif;
                  if($upper_header['chat_now']): ?>
                  <li>
                    <a href="<?php echo $upper_header['chat_now']?>"
                      ><span><img src="<?php echo get_template_directory_uri().'/assets/images/icon2.png' ?>" alt="Chat Now" /></span
                      >Chat Now</a
                    >
                  </li>
                  <?php endif;
                  if($upper_header['contact_number']): ?>
                  <li>
                    <a href="tel:<?php echo $upper_header['contact_number']?>"
                      ><span
                        ><img src="<?php echo get_template_directory_uri().'/assets/images/icon3.png'?>" alt="My Account" /></span
                      ><?php  echo number_format($upper_header['contact_number'], 0, ',', '.')?></a
                    >
                  </li>
                  <?php endif; ?>
                </ul>
              </div>
              
              <div class="right-btn-group d-none d-md-block">
                <?php if($upper_header['first_button_text']): ?>
                <a href="<?php echo $upper_header['first_button_link']?>" class="btn btn-primary"><?php echo $upper_header['first_button_text']?></a>
                <?php endif;
                if($upper_header['second_button_text']):?>
                <a href="<?php echo $upper_header['second_button_link']?>" class="btn btn-secondary"><?php echo $upper_header['second_button_text']?></a>
                <?php endif;?>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </header>

      <nav class="nav-menu">
        <div class="container">
        <?php 
            wp_nav_menu( array(
                  'container'      => false,
                  'menu_id'     => 'nav' ,
                  'items_wrap'     => '<ul  id="%1$s" class="list-unstyled">%3$s</ul>',
                  'theme_location' => 'primary',
                  'depth'          => 5,
                  'fallback_cb'    => false,
                  'walker' => new CSS_Menu_Maker_Walker()
                  
            ) );
        ?>  
        </div>
        <?php 
          $upper_header_btn = get_field('upper_header','option');
          if( $upper_header_btn ): ?>
          <div class="btn-mob">
            <?php if($upper_header_btn['first_button_text']): ?>
            <a href="<?php echo $upper_header_btn['first_button_link']?>" class="d-block d-md-none btn btn-primary"><?php echo $upper_header_btn['first_button_text']?></a>
            <?php endif;
            if($upper_header_btn['second_button_text']):?>
            <a href="<?php echo $upper_header_btn['second_button_link']?>" class="d-block d-md-none btn btn-secondary"><?php echo $upper_header_btn['second_button_text']?></a>
            <?php endif;?>
          </div>
        <?php endif;?>
      </nav>

