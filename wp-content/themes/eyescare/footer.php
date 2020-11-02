<footer>
        <div class="container d-flex justify-content-between">
          <?php 
            $footer_section = get_field('footer_section','option');
            if( $footer_section ): 
            if($footer_section['logo']):?>
          <div class="logo"> 
            <a href="<?php echo home_url(); ?>">
              <img src="<?php echo esc_url($footer_section['logo'])?>" alt="TCR" />
            </a>
          </div>
          <?php endif; endif; ?>
          <div class="footer-middle-box">
            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
            <div class="nav">
              <?php 
                  wp_nav_menu( array(
                        'container'      => false,
                        'menu_id'     => 'nav' ,
                        'items_wrap'     => '<ul  id="%1$s" class="list-unstyled">%3$s</ul>',
                        'theme_location' => 'footer',
                        'depth'          => 5,
                        'fallback_cb'    => false,
                        'walker' => new CSS_Menu_Maker_Walker()
                        
                  ) );
              ?>
          </div>
          <!-- newsletter -->
          <?php 
          $footer_section = get_field('footer_section','option');
          if( $footer_section ):
          if( $footer_section['newsletter'] ): ?>
          <div class="newsletter">
            <?php echo $footer_section['newsletter']?>
          </div>
          <?php endif; endif; endif; ?>
          </div>
          <?php 
          $footer_section = get_field('footer_section','option');
          if( $footer_section ):
          if( $footer_section['address'] ): ?>
            <div class="address">
              <?php echo $footer_section['address']?>
            </div>
          <?php endif; endif;?>
          
        </div>
      </footer>
    </div>
    <script>
      $(document).ready(function () {
        $('.hamburger-icon').click(function(){
          $(this).toggleClass('is-open');
          $('.nav-menu').toggle(1000);
        })
      });
      AOS.init({
        easing: 'ease-in-out-sine'
      });
    </script>
    <?php wp_footer(); ?>

  </body>
</html>