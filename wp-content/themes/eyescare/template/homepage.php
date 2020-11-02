<?php
/*
  Template Name: Homepage
 */
get_header();

?>
<!-- Start Page Content -->

<!-- Hero Section -->
<?php
$hero_section = get_field('hero_section');
if( $hero_section ): 
if( $hero_section['hero_image']):
?> 
<div class="banner" data-parallax="scroll" data-image-src="<?php echo esc_url($hero_section['hero_image']) ?>">
    <!-- <img src="<?php echo esc_url($hero_section['hero_image']) ?>" alt="banner" /> -->
    <div class="banner-caption" data-aos="fade-up">
        <h2><?php echo $hero_section['hero_section_heading'];?></h2>
        <?php echo $hero_section['hero_section_text'];?>
        <?php if($hero_section['hero_section_button_text']):?>
        <a href="<?php echo esc_url( $hero_section['hero_section_button_link'] ); ?>" class="btn btn-primary"><?php echo $hero_section['hero_section_button_text'] ; ?></a>
    	<?php endif;?>	
    </div>
</div>
<?php endif; endif; ?>

<!-- Lower hero section -->
<?php
$lower_hero_section = get_field('lower_hero_section');
if( $lower_hero_section ): 
if($lower_hero_section['first_image']):?>
<div class="feature-box" data-aos="fade-up">
    <div class="d-flex flex-wrap">
    	<!-- 1st image & content -->
        <div class="col-6 col-md-3">
        	<div class="icon">
            	<img src="<?php echo esc_url($lower_hero_section['first_image']); ?>" alt="" />
            </div>
            <h6><?php echo $lower_hero_section['first_image_text']; ?></h6>
        </div>
        
        <!-- 2nd image & content -->
        <?php if($lower_hero_section['second_image']):?>
        <div class="col-6 col-md-3">
            <div class="icon">
            	<img src="<?php echo esc_url($lower_hero_section['second_image']); ?>" alt="" />
            </div>
            <h6><?php echo $lower_hero_section['second_image_text'];?></h6>
        </div>
    	<?php endif; ?>

        <!-- 3rd image & content -->
        <?php if($lower_hero_section['third_image']):?>
        <div class="col-6 col-md-3">
            <div class="icon">
            	<img src="<?php echo esc_url($lower_hero_section['third_image']); ?>" alt="" />
            </div>
            <h6><?php echo $lower_hero_section['third_image_text'];?></h6>
        </div>
        <?php endif; ?>

        <!-- 4th image & content -->
        <?php if($lower_hero_section['fourth_image']):?>
        <div class="col-6 col-md-3">
            <div class="icon">
            	<img src="<?php echo esc_url($lower_hero_section['fourth_image']); ?>" alt="" />
            </div>
            <h6><?php echo $lower_hero_section['fourth_image_text']; ?></h6>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif;endif; ?>

<!-- Information Section -->
<?php
$information_section = get_field('information_section');
if( $information_section ):
if($information_section['heading']):  ?> 
<div class="cdr-section">
    <div class="caption" data-aos="fade-left">
        <h2><?php echo $information_section['heading']; ?></h2>
        <?php echo $information_section['content']; ?>
    </div>
    <img src="<?php echo esc_url($information_section['background_image']);?>" alt="cdr" />
</div>
<?php endif; endif; ?>

<!-- Steps To get order -->
<?php
$steps_to_get_order = get_field('steps_to_get_order');
if( $steps_to_get_order ): 
if($steps_to_get_order['main_heading']):?> 
<div class="get-started-section">
    <h2>
        <span><?php echo $steps_to_get_order['main_heading'];?>:</span>
	<h2>
    <div class="step-list d-flex flex-wrap" data-aos="fade-up">
    	<!-- Step 1 -->
    	<?php if($steps_to_get_order['step_1_heading']):?>
        <div class="col-md-4">
            <div class="step-box">
            	<h4><?php echo $steps_to_get_order['step_1_heading'];?>:</h4>
            	<?php if($steps_to_get_order['step_1_image']):?>
              	<div class="icon">
                	<img src="<?php echo esc_url($steps_to_get_order['step_1_image'])?>" alt="Step 1" />
              	</div>
              	<?php endif;?>
              	<p><?php echo $steps_to_get_order['step_1_content'];?></p>
            </div>
        </div>
    	<?php endif;?>
    	<!-- Step 2 -->
    	<?php if($steps_to_get_order['step_2_heading']):?>
        <div class="col-md-4">
            <div class="step-box">
              	<h4><?php echo $steps_to_get_order['step_2_heading'];?>:</h4>
              	<?php if($steps_to_get_order['step_2_image']):?>
              	<div class="icon">
                	<img src="<?php echo esc_url($steps_to_get_order['step_2_image'])?>" alt="Step 2" />
              	</div>
              	<?php endif;?>
              	<p><?php echo $steps_to_get_order['step_2_content'];?></p>
            </div>
        </div>
        <?php endif;?>
        <!-- Step 3 -->
        <?php if($steps_to_get_order['step_3_heading']):?>
        <div class="col-md-4">
            <div class="step-box">
              	<h4><?php echo $steps_to_get_order['step_3_heading'];?>:</h4>
              	<?php if($steps_to_get_order['step_3_image']):?>
              	<div class="icon">
                	<img src="<?php echo esc_url($steps_to_get_order['step_3_image'])?>" alt="Step 3" />
              	</div>
              	<?php endif;?>
              	<p><?php echo $steps_to_get_order['step_3_content'];?></p>
            </div>
        </div>
        <?php endif;?>
        <!-- Button -->
        <?php if($steps_to_get_order['link_text']):?>
        <div class="col-md-12 text-center">
            <a href="<?php echo esc_url( $steps_to_get_order['link'] ); ?>" class="link"><?php echo $steps_to_get_order['link_text'];?><img src="<?php echo get_template_directory_uri().'/assets/images/icon11.png'?>" alt="arrow"
            /></a>
        </div>
        <?php endif;?>
    </div>
</div>
<?php endif; endif; ?>

<!-- Services -->
<?php
$services = get_field('services');
if( $services ): 
if( $services['background_image'] ): ?> 
<div class="our-edge">
    <img src="<?php echo esc_url($services['background_image']);?>" alt="our edge" />
    <div class="edge-list" data-aos="fade-up">
    	<?php if($services['heading']):?>
        <div class="title">
    	    <h3><?php echo $services['heading'];?></h3>
        </div>
        <?php endif;?>
        <div class="d-flex flex-wrap">
        	<!-- 1st service -->
        	<?php if($services['first_service_heading']):?>
        	<div class="col-md-4">
            	<div class="edge-box">
	            	<h3><?php echo $services['first_service_heading'];?></h3>
	                <p><?php echo $services['first_service_content'];?></p>
              	</div>
            </div>
        	<?php endif;?>
        	<!-- 2nd service -->
        	<?php if($services['second_service_heading']):?>
            <div class="col-md-4">
            	<div class="edge-box">
	                <h3><?php echo $services['second_service_heading'];?></h3>
	                <p><?php echo $services['second_service_content'];?></p>
              	</div>
            </div>
            <?php endif;?>
        	<!-- 3rd service -->
        	<?php if($services['third_service_heading']):?>
            <div class="col-md-4">
            	<div class="edge-box">
	                <h3><?php echo $services['third_service_heading'];?></h3>
	                <p><?php echo $services['third_service_content'];?></p>
              	</div>
            </div>
            <?php endif;?>
         </div>
    </div>
</div>
<?php endif; endif; ?>

<!-- prescription  -->
<?php
$prescription_section = get_field('prescription_section');
if( $prescription_section ): 
if( $prescription_section['image'] ): ?> 
<div class="visit-doc">
	<div class="img-box">
    	<img src="<?php echo esc_url($prescription_section['image']);?>" alt="lense" data-aos="zoom-in" />
        <?php if($prescription_section['heading']):?>
        <div class="caption" data-aos="fade-left">
        	<h3><?php echo $prescription_section['heading'];?></h3>
            <p><?php echo $prescription_section['content'];?></p>
        </div>
    <?php endif;?>
    </div>       
</div>
<?php endif;endif; ?>
<!-- End Page Content -->
<?php
get_footer();