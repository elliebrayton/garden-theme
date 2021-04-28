<?php 
    /* 
    Template Name: Home
    Template Post Type: page
     */

    get_header(); 
    $slider_category = get_theme_mod('featured_category', 0);
    $slider_number_of_posts = get_theme_mod('number_of_posts_to_show', 3);
    $slider_style = get_theme_mod('featured_style', 'slider-dark');
    
    $slider_query = new WP_Query(array(
        'cat' => $slider_category,
        'posts_per_page' => $slider_number_of_posts,
    ));
    
    if ( $slider_query->have_posts() ):
    
        // Get slider speed and convert it to miliseconds
        $slider_speed = get_theme_mod('featured_speed', 7);
        $slider_speed = $slider_speed * 1000;
        $slider_disable_link = get_theme_mod('featured_disable_link', 0);
    ?>
    <div class="site-content py-5 px-1 px-sm-0">
        <main class="main">
            <section class="featured-posts container">
            <div class="carousel-row">
        <div class="carousel-wrap">
            <div id="featured-carousel" class="carousel slide" data-ride="carousel" data-interval="<?php echo $slider_speed; ?>" aria-labelledby="carousel-heading" aria-describedby="carousel-desc">
                <h2 id="carousel-heading" class="sr-only"><?php _e('Featured Posts', 'garden-theme'); ?></h2>
                <p id="carousel-desc" class="sr-only"><?php _e('Use the previous and next buttons to change the displayed slide.', 'garden-theme'); ?></p>
    
                <!-- Indicators -->
                <?php if ( $slider_query->post_count > 1 ): ?>
                <ol class="carousel-indicators">
                <?php for( $i=0; $i<$slider_query->post_count; $i++){
                    $slider_class = (0 == $i)? 'active':''; ?>
                    <li data-target="#featured-carousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $slider_class; ?>"></li>
                <?php } ?>
                </ol>
            <?php endif; ?>
    
                <div class="carousel-inner row">
                    <?php
                    while( $slider_query->have_posts() ): $slider_query->the_post();
                    $custom_meta = get_post_custom( get_the_ID() );
                    $image_type = ( isset($custom_meta['custom_meta_image_type']) )? $custom_meta['custom_meta_image_type'][0]:NULL;
                    $slider_first_id = $slider_query->posts[0]->ID;
                    $slide_url = esc_url( get_permalink() );
                    $slide_thumbnail = ( has_post_thumbnail() )? get_the_post_thumbnail( get_the_ID(), 'large'):'';
    
                    // Slider classes
                    $slider_classes = array();
                    $slider_classes[] = ( $slider_first_id == get_the_ID() )? 'active':'';
                    $slider_classes[] = ( !empty( $slider_style ) )? esc_attr( $slider_style ):'';
    
    
                    //Full-Size Image Output
                     if ($image_type): ?>
                 <div class="carousel-item full-image-feature <?php echo join(' ', $slider_classes); ?>" id="item-<?php the_ID(); ?>">
                        <?php if ( has_post_thumbnail() ): ?>
                        <div class="slide-image">
                        <?php the_post_thumbnail( 'full-width-thumb' ); ?>
                        </div>
                        <?php endif; ?>
    
                        <div class="carousel-caption">
                        <?php
                        if( !$slider_disable_link ){ // Add link to the title
                                the_title( sprintf('<h3 class="carousel-link"><a href="%s">', $slide_url), '</a></h3>' );
                                }
                                else {
                                the_title( '<h3class="carousel-link" >', '</h3>' );
                                }
                            ?>
                        </div>
                    </div><!-- .item -->
                <?php else: ?>
    
                <!-- Half-Width Image Output -->
                <div class="carousel-item half-image-feature <?php echo join(' ', $slider_classes); ?>" id="item-<?php the_ID(); ?>">
                    <div class="slide-image">
                        <?php
                            if( !$slider_disable_link ){ // Add link to the image and title
                            echo '<a href="' . $slide_url . '">' . $slide_thumbnail . '</a>';
                            }
                            else{
                            echo $slide_thumbnail;
                            }
                        ?>
                    </div>
    
                    <div class="carousel-caption d-none d-sm-block">
                    <div class="carousel-date"><?php echo get_the_date('F jS, Y');?></div>
                      <?php
                            if( !$slider_disable_link ){ // Add link to the image and title
                            the_title( sprintf('<h3 class="carousel-link" ><a href="%s">', $slide_url), '</a></h3>' );
                            }
                            else{
                            the_title( '<h3 class="carousel-link">', '</h3>' );
                            }
                        ?>
                    </div>
                </div><!-- .item -->
                <?php endif; ?>
    
                <?php endwhile; ?>
            </div><!-- .carousel-inner -->
    
            <?php if ( $slider_query->post_count > 1 ): ?>
                <a class="left carousel-control carousel-control-prev" href="#featured-carousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only"><?php _e( 'Previous', 'garden-theme' ); ?></span>
                </a>
                <a class="right carousel-control carousel-control-next" href="#featured-carousel" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only"><?php _e( 'Next', 'garden-theme' ); ?></span>
                </a>
            <?php endif; ?>
    
            </div><!-- .carousel -->
        </div><!-- .carousel-wrap -->
            </div><!-- .carousel-row -->
    <?php
    endif;
    
    // Restore original post data
    wp_reset_postdata();
    ?>
            </section>
            <section class="featured-links container py-7">
                <div class="featured-links-wrapper d-flex flex-wrap justify-content-center justify-content-lg-between justify-content-xl-around justify-content-around container">
                    <div class="featured-link">
                        <div class="featured-link-img">
                            <h2 class="widgettitle">About</h2>
                            <img src="<?php echo get_theme_mod('featured_image1'); ?>" />
                        </div>
                    </div>
                    <div class="featured-link">
                    <div class="featured-link-img">
                    <h2 class="widgettitle">Recipes</h2>
                            <img src="<?php echo get_theme_mod('featured_image2'); ?>" alt="author">
                        </div>
                    </div>
                    <div class="featured-link">
                    <h2 class="widgettitle">Youtube</h2>
                    <div class="featured-link-img">
                            <img src="<?php echo get_theme_mod('featured_image3'); ?>" alt="author">
                        </div>
                    </div>
                </div>
            </section>
            <section class="newsletter bg-tertiary">
                <div class="newsletter-wrapper container row mx-auto p-5">
                    <div class="newsletter-info col-12 col-md-6 px-md-4 px-lg-6">
                        <h2 class="h2 text-primary pb-4">Join The Community</h2>
                            <ul class="newsletter-list">
                                <li>+ insider updates</li>
                                <li>​+ health and wellness tips & FREE PDFs</li>
                                <li>+ exclusive recipes </li>
                                <li>+ simplified nutrition info to expand your nutrition knowledge</li>
                            </ul>
                    </div>
                    <div class="newsletter-form col-12 col-md-6 px-md-4 px-lg-6">
                    <?php echo do_shortcode('[wpforms id="72" title="false"]'); ?>
                    </div>
                </div>
            </section>
            <section class="recent-posts d-flex flex-wrap justify-content-center justify-content-lg-between justify-content-xl-around justify-content-around container">
                <?php 
                //Custom Query
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => '3',
                        'order' => 'DESC',
                        'orderby' => 'date'
                    );

                    $query = new WP_Query($args);
                    if($query->have_posts()){
                        while($query->have_posts()){
                            $query->the_post();
                            ?>
                            <div class="recent-post-item my-5">
                                <div class="recent-post-image-wrapper mx-auto">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                                <div class="recent-post-info-wrapper p-4">
                                <h3 class="h3"><?php the_title(); ?></h3>
                                    <p><i class="icofont-calendar icofont-sm"> </i><?php echo get_the_date('F jS, Y');?></p>
                                    <p><?php echo excerpt(17); ?></p>
                                    <a class="secondary-button d-flex justify-content-end my-3" href="<?php the_permalink(); ?>"> <span>Read More</span></a>
                                </div>
                            </div>
                <?php
                        }
                    }
                ?>
            </section>
        </main>
    </div>

<?php get_footer(); ?>
