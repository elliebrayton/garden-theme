<?php 
    /* 
    Template Name: Blog
    Template Post Type: page
     */

    get_header(); 
?>
    <div class="site-content container py-5 px-5 px-sm-0">
        <h2 class="h2 py-4">Blog Posts</h2>
        <main class="main row">
            <?php 
                if(have_posts()){
                    while(have_posts()){
                        the_post(); ?>
                <section class="section col-md-7 mt-1 mb-5">
                <h3 class="h3"><?php echo get_the_title(); ?></h3>
                    <p class="blog-post-info d-flex flex-column flex-md-row pb-3">
                        <span class="blog-post-date"><i class="icofont-calendar icofont-sm"> </i><?php echo get_the_date('F jS, Y');?></span>
                        <span class="blog-post-tags">
                            
                            <?php
                                $posttags = get_the_tags();
                                if ($posttags) {
                                    echo '<i class="icofont-tag"></i> ';
                                    $tagstrings = array();
                                        foreach($posttags as $tag) {
                                            $tagstrings[] = '<a href="' . get_tag_link($tag->term_id) . '" class="tag-link-' . $tag->term_id . '">' . $tag->name . '</a>';
                                        } //END FOREACH
                                    echo implode(', ', $tagstrings);
                                }//END IF
                            ?>
                        </span>
                    </p>
                    <div class="blog-post-image-wrapper mx-auto">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <p class="blog-post-excerpt pt-3 mb-0"><?php echo get_the_excerpt(); ?></p>
                    <a class="secondary-button d-flex justify-content-end my-5" href="<?php get_the_permalink(); ?>"> <span>Read More</span></a>
                    <hr>
                    <?php gardenPagination(); ?>
                </section>
            <?php 
                    } //END WHILE
                } //END IF
            ?>

            <aside class="aside col-md-5">

            </aside>
        </main>
    </div>

<?php get_footer(); ?>
