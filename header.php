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
        <header class="header container">
            <div class="row d-flex justify-content-between">
                <h1 class="h1"><?php bloginfo('name'); ?></h1>
                <?php get_search_form(); ?>
            </div>
            <nav class="nav"></nav>
        </header>
        <!--END HEADER-->


