<?php 
    /* 
    Template Name: Blog
    Template Post Type: page
     */

    get_header(); 
?>
    <div class="site-content py-5 px-5 px-sm-0">
        <main class="main">
            <section class="featured-posts container">
                <p class="text-center">This is where the slider will go</p>
            </section>
            <section class="featured-links container">
                <p class="text-center">This is where the featured links will go</p>
            </section>
            <section class="newsletter">
                <p class="text-center">This is where the newletter will go</p>
            </section>
            <section class="recent-posts d-flex flex-wrap justify-content-center justify-content-lg-between justify-content-xl-around justify-content-around container">
                <?php 
                //Custom Query
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'published',
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
                                    <a class="secondary-button d-flex justify-content-end my-3" href="<?php get_the_permalink(); ?>"> <span>Read More</span></a>
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
