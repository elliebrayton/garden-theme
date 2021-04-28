<?php 
        get_header(); 
    ?>
    <div class="site-content container py-8 px-5 mx-auto">
        <main class="main">
        <h2 class="h2"><?php echo single_tag_title() . 's';?>
            </h2>
            <section class="recipe-posts">
            <?php 
                if(have_posts()){
                    while(have_posts()){
                        the_post(); ?>
                        <div class="recipe-post-item my-5">
                                <div class="recipe-post-image-wrapper mx-auto">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                                <div class="recipe-post-info-wrapper p-4">
                                <h3 class="h3"><?php the_title(); ?></h3>
                                    <p><i class="icofont-calendar icofont-sm"> </i><?php echo get_the_date('F jS, Y');?></p>
                                    <a class="secondary-button d-flex justify-content-end my-3" href="<?php the_permalink(); ?>"> <span>Read More</span></a>
                                </div>
                            </div>
       
            <?php 
                    } //END WHILE
                } //END IF
            ?>
            </section>
            <div class="tag-pagination text-accent2 text-center mx-auto"><?php gardenPagination(); ?></div>
        </main>
    </div>

<?php get_footer(); ?>
