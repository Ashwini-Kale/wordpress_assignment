<?php

/**
 * Eyes Care functions and definitions
 **/
 
/**
 * Enqueues styles and scripts.
 **/

// Theme options

function eyescare_style_script() {
    // style
    wp_enqueue_style( 'font-awesome-style','https://fonts.googleapis.com/css2?family=Rubik&family=Work+Sans:wght@100;300;400;500;600;700&display=swap');

    wp_register_style('bootstrap-style',get_template_directory_uri().'/assets/css/bootstrap.min.css','','1.0.0');
    wp_enqueue_style('bootstrap-style');

    wp_register_style('aos-style',get_template_directory_uri().'/assets/css/aos.css','','1.0.0');
    wp_enqueue_style('aos-style');
    
    wp_register_style('custom-style',get_template_directory_uri().'/assets/css/custom-style.css','','1.0.0');
    wp_enqueue_style('custom-style');   

    wp_register_style('eyescare-style',get_stylesheet_uri());
    wp_enqueue_style('eyescare-style');

    //script
    wp_register_script('jquery-script', get_stylesheet_directory_uri() . '/assets/js/jquery-3.5.1.min.js',array(), true );
    wp_enqueue_script('jquery-script');

    wp_register_script('parallax-script', get_stylesheet_directory_uri() . '/assets/js/parallax.min.js',array(), true );
    wp_enqueue_script('parallax-script');

    wp_register_script('aos-script', get_stylesheet_directory_uri() . '/assets/js/aos.js',array(), true );
    wp_enqueue_script('aos-script');
}
add_action( 'wp_enqueue_scripts', 'eyescare_style_script' );



// function eyescare_script_script() {
//     echo "<script type='text/javascript' src='get_stylesheet_directory_uri() . '/assets/js/jquery-3.5.1.min.js'></script>";

//     //script
//     // wp_register_script('jquery-script', get_stylesheet_directory_uri() . '/assets/js/jquery-3.5.1.min.js',array(), true );
//     // wp_enqueue_script('jquery-script');

//     wp_register_script('parallax-script', get_stylesheet_directory_uri() . '/assets/js/parallax.min.js',array(), true );
//     wp_enqueue_script('parallax-script');

//     wp_register_script('aos-script', get_stylesheet_directory_uri() . '/assets/js/aos.js',array(), true );
//     wp_enqueue_script('aos-script');
// }
// add_action( 'wp_footer', 'eyescare_script_script' );

// Custom logo
function themename_custom_logo_setup() {
    $defaults = array(
    'height'      => 100,
    'width'       => 199,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

// For Custom Menu
register_nav_menus(array(
    'primary' => __('Primary Menu', 'Eyes Care'),
    'footer' => __('Footer Menu', 'Eyes Care'),
    
));
class CSS_Menu_Maker_Walker extends Walker {

    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
  
    function start_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent<ul class='dropdown'> \n";
    }
  
    function end_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "$indent</ul>\n";
    }
  
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  
      global $wp_query;
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
      $class_names = $value = '';        
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
  
      /* Add active class */
      if(in_array('current-menu-item', $classes)) {
        $classes[] = 'active';
        unset($classes['current-menu-item']);
      }
  
      /* Check for children */
      $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
      if (!empty($children)) {
        $classes[] = 'cn-dropdown-item has-down';
      }
  
      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
  
      $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
      $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
  
      $output .= $indent . '<li' . $id . $value . $class_names .'>';
  
      $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
  
      $item_output = $args->before;
      $item_output .= '<a'. $attributes .'>';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</a>';
      $item_output .= $args->after;
  
      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
  
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
      $output .= "</li>\n";
    }
  }

// Footer

// widgets function for footer
function widgets_footer1() {
    register_sidebar(
        array(
            'name'          => __( 'Footer 1', 'crbtech' ),
            'id'            => 'footer-1',
            'description'   => __( 'Add widgets here to appear in your footer.', 'crbtech' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

}
add_action( 'widgets_init', 'widgets_footer1' );

function widgets_footer2() {

    register_sidebar(
        array(
            'name'          => __( 'Footer 2', 'crbtech' ),
            'id'            => 'footer-2',
            'description'   => __( 'Add widgets here to appear in your footer.', 'crbtech' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

}
add_action( 'widgets_init', 'widgets_footer2' );

function widgets_footer3() {

    register_sidebar(
        array(
            'name'          => __( 'Footer 3', 'crbtech' ),
            'id'            => 'footer-3',
            'description'   => __( 'Add widgets here to appear in your footer.', 'crbtech' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

}
add_action( 'widgets_init', 'widgets_footer3' );

// Theme option
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Theme Options Settings',
    'menu_title'  => 'Theme Options',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}

// Feature imgaes for post
add_theme_support( 'post-thumbnails' );
        //set_post_thumbnail_size( 1568, 9999 );
        add_image_size( 'single-post-thumbnail',0,300 );
        set_post_thumbnail_size( 0,300);


        // The shortcode function
function wpb_demo_shortcode_2() { 
    // Things that you want to do. 
$message = 'Hello world! jkh'; 

// Output needs to be return
return $message;
   }
   // Register shortcode
   add_shortcode('my_ad_code', 'wpb_demo_shortcode_2'); 

// Add custom post type "Store"
function post_type_store(){
    register_post_type( 'stores',
    // Set UI labels for Custom Post Type
        array(
            'labels' => array(
                'name' => __( 'Stores' ),
                'singular_name' => __( 'Store' )
            ),
            // Set other options for Custom Post Type
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'stores'),
            'show_in_rest' => true,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // This is where we add taxonomies to our CPT
           'taxonomies'          => array( 'category' ),
 
        )
    );
}
add_action('init','post_type_store');

function search_filter($query) {
    if ( !is_admin() && $query->is_main_query() ) {
      if ($query->is_search) {
        $query->set('post_type', 'stores' );
      }
    }
  }
  
  add_action('pre_get_posts','search_filter');

//   theme support
add_theme_support('html5',array('search-form'));

function template_chooser($template)
{
  global $wp_query;
  $post_type = get_query_var('post_type');
  if( $wp_query->is_search && $post_type == 'stores' )
  {
    return locate_template('archive-stores.php');
  }
  return $template;
}
add_filter('template_include', 'template_chooser');