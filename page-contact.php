<?php 
        get_header(); 
    ?>
    <div class="site-content container row py-8 px-4 px-md-5 px-lg-0 mx-auto">
        <main class="main mb-5 px-3 mx-auto">
        <h2 class="h2"><?php echo get_the_title(); ?></h2>
            <?php 
                if(have_posts()){
                    while(have_posts()){
                        the_post(); ?>
                <section class="section contact mt-4 mx-auto">
                    <?php echo the_content(); ?>
                </section>
            <?php 
                    } //END WHILE
                } //END IF
            ?>
        </main>
    </div>

<?php get_footer(); ?>
