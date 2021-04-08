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

        //MAIN STYLESHEET
        wp_enqueue_style('main-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'custom_theme_scripts');

/*****************************************
 
    ADDS FEATURED IMAGE

*****************************************/

add_theme_support('post-thumbnails');

/*****************************************
 
    CUSTOM IMAGE SIZE

*****************************************/


add_image_size( 'featured-image', 600, 600, false );

/*****************************************
 
    CUSTOM EXCERPT LENGTH

*****************************************/

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
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
      $content = implode(" ", $content) . '...';
  } else {
      $content = implode(" ", $content);
  }

  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);

  return $content;
}

/*****************************************
 
    CREATE WIDGET AREAS

*****************************************/

function blank_widgets_init(){
    register_sidebar(array(
        'name' =>('About Me Section (PLACE IMAGE)'),
        'id' => 'about-image',
        'description' => 'Place an image of yourself!',
        'before_widget' => '<div class="about-image">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name' =>('About Me Section (PLACE TEXT)'),
        'id' => 'about-text',
        'description' => 'Write something about yourself! Recommended word count limit is 100 words!',
        'before_widget' => '<div class="about-text">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}

add_action('widgets_init', 'blank_widgets_init');

/*****************************************
 
    ADD MENUS TO OUR THEME

*****************************************/

function register_my_menus(){
    register_nav_menus( array(
        'main-nav' => __('Main Navigation'),
        'footer-nav' => __('Footer Navigation')
    ));
}

add_action('init', 'register_my_menus');

/*****************************************
 
    SETTING LI CLASS TO NAV-LINK 

*****************************************/

function add_menu_link_class($atts, $item, $args)
{
    $atts['class'] = 'nav-link';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

/*****************************************
 
    PAGINATION LINKS

*****************************************/

function minimalistic_pagination(){
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
 
    POST NAVIGATION

*****************************************/

function minimalisticPostNavigation(){ ?>
    <div class="post-navigation-container d-flex justify-content-sm-between align-items-center flex-column flex-sm-row mb-4">
        <div class="previous-post-link mb-3 mb-sm-0">
            <?php previous_post_link('%link', 'Previous'); ?>
        </div>
        <div class="next-post-link">
            <?php next_post_link('%link', 'Next post »'); ?>
        </div>
    </div>

    <?php
} ?>