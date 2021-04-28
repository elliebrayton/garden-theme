<?php 

/*****************************************
 
    STYLESHEET & SCRIPTS

*****************************************/

function custom_theme_scripts(){

    //JQUERY
    wp_enqueue_script('bower-jquery', get_stylesheet_directory_uri() . '/jquery/dist/jquery.min.js');

    //BOOTSTRAP JS FILE
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/bootstrap/dist/js/bootstrap.min.js');

    //MAIN JS FILE
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/scripts.js');
    
    //ICOFONT FILE
    wp_enqueue_style('icofont', get_stylesheet_directory_uri() . '/icofont/icofont.css');

    //MAIN STYLESHEET
    wp_enqueue_style('main-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'custom_theme_scripts');

/*****************************************
    
    ADDS FEATURED IMAGE
    
*****************************************/

add_theme_support('post-thumbnails');

/*****************************************
    
    ADDS HEADER IMAGE
    
*****************************************/

$custom_image_header = array(
    'width' => 577,
    'height' => 120,
    'uploads' => 'true',
);

add_theme_support('custom-header', $custom_image_header);


/*****************************************
 
    CUSTOM READ MORE TEXT

*****************************************/

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*****************************************
 
    REGISTER MENU

*****************************************/

function register_my_menus(){
    register_nav_menus( array(
        'main-menu' => __('Main Navigation'),
        'footer-nav' => __('Footer Navigation')
    ));
}


/*****************************************
 
    PGINATION LINKS

*****************************************/

function gardenPagination(){
    global $wp_query;

    $big = 999999999; // need an unlikely integer
    $translated = __( 'Page', 'mytextdomain' ); // Supply translatable string
 
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
            'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
    ) );
}

/*****************************************
 
    Register Custom Nav Walker

*****************************************/
add_action('init', 'register_my_menus');

function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );

/*****************************************
 
    CUSTOM EXCERPT LENGTH

*****************************************/

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt);
    } else {
        $excerpt = implode(" ", $excerpt);
    }

    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

    return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);

  if (count($content) >= $limit) {
      array_pop($content);
      $content = implode(" ", $content);
  } else {
      $content = implode(" ", $content);
  }

  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);

  return $content;
}

add_filter('wp_list_categories', 'cat_count_span');
function cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span>(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}

// Add to your child-theme functions.php
add_filter('get_search_form', 'my_search_form_text');
 
function my_search_form_text($text) {
     $text = str_replace('value="Search"', 'value="Go"', $text); //set as value the text you want
     return $text;
}

function garden_theme_customize_register($wp_customize){
    $wp_customize->add_panel('garden_theme_options', array(
        'title' => __('Theme Options', 'garden-theme'),
        'description' => __('Modify Theme', 'garden-theme'),
        'priority' => '1'
    ));

    $wp_customize->add_section( 'featured_section' , array(
        'title' => __('Featured Section', 'garden-theme'),
        'description'=>__('This is where you can change the images of the featured links section', 'garden-theme'),
        'panel' => 'garden_theme_options',
      ) );


      $wp_customize->add_setting( 'featured_image1', array(
        'default' => get_theme_file_uri('/images/author.jpg'), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_setting( 'featured_image2', array(
        'default' => get_theme_file_uri('/images/author.jpg'), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'garden_theme_options', array(
        'label' => 'Upload Image',
        'priority' => 20,
        'section' => 'featured_section',
        'settings' => 'featured_image1',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'garden_theme_options', array(
        'label' => 'Upload Image',
        'priority' => 21,
        'section' => 'featured_section',
        'settings' => 'featured_image2',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Logo',
                    'remove' => 'Remove Logo',
                    'change' => 'Change Logo',
                    )
    )));


    
}

add_action('customize_register', 'garden_theme_customize_register');

?>


