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
            <div class="title-wrapper container d-flex justify-content-between">
                <h1 class="h1"><?php bloginfo('name'); ?></h1>
                <?php get_search_form(); ?>
            </div>
            <div class="main-nav-wrapper bg-accent">
            <nav class="main-nav navbar navbar-expand-md navbar-light container text-center" role="navigation">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <button class="navbar-toggler border-primary" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
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


