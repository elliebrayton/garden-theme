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

?>