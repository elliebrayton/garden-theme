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
            <section class="newsletter bg-tertiary">
                <div class="newsletter-wrapper container row mx-auto p-5">
                    <div class="newsletter-info col-6 col-lg-5 offset-md-1">
                        <h2 class="h2 text-primary">Join The Community</h2>
                            <ul class="newsletter-list">
                                <li>+ insider updates</li>
                                <li>​+ health and wellness tips & FREE PDFs</li>
                                <li>+ exclusive recipes </li>
                                <li>+ simplified nutrition info to expand your nutrition knowledge</li>
                            </ul>
                    </div>
                    <form action="" class="newsletter-form col-6 col-lg-5 align-self-center">
                        <p>This section still needs to be styled</p>
                    <div class="form-group row">
                            <label for="name" class="col-12 col-md-2">Name</label>
                            <input type="text" class="form-control col-12  col-md-10">
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-12  col-md-2">E-mail</label>
                            <input type="email" class="form-control col-12 col-md-10">
                        </div>
                    </form>
                </div>
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
