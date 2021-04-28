<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <!--START HEAD-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.typekit.net/qti2wuf.css">

        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?> 
    </head>
    <!--END HEAD-->
    <!--START BODY -->
    <body class="site" <?php body_class(); ?>>
        <!--START HEADER-->
        <header class="header">
            <div class="title-wrapper container d-flex flex-column align-items-center justify-content-between px-md-3 px-lg-0 flex-md-row py-5">
                <?php if(get_header_image() == '') {?>
                    <h1 class="h1"><a href="<?php get_home_url(); ?>"><?php bloginfo('name') ?></a></h1>
                    <?php } else {?>
                        <a href="<?php get_home_url(); ?>"><img class="logo" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width;?>" alt="logo"></a>
                        <?php } ?>

                <div class="search-form py-3"><?php get_search_form(); ?></div>
            </div>
            <div class="main-nav-wrapper bg-accent">
            <nav class="main-nav navbar navbar-expand-md navbar-light container text-center" role="navigation">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
                      <span class="navbar-toggler-icon border-0"></span>
                  </button>
                      <?php
                      wp_nav_menu( array(
                          'theme_location'    => 'main-menu',
                          'depth'             => 2,
                          'container'         => 'div',
                          'container_class'   => 'collapse navbar-collapse',
                          'container_id'      => 'bs-example-navbar-collapse-1',
                          'menu_class'        => 'nav navbar-nav mx-auto my-3',
                          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                          'walker'            => new WP_Bootstrap_Navwalker(),
                      ) );
                      ?>
              </nav>
            </div>
        </header>
        <!--END HEADER-->