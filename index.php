<?php get_header(); ?>
    <div class="site-content container py-5">
        <h2 class="h2">Blog </h2>
        <main class="main row">
            <section class="section col-md-7">
            <?php 
                if(have_posts()){
                    while(have_posts()){
                        the_post(); ?>
                <h3 class="h3"><?php echo get_the_title(); ?></h3>
                    <p class="blog-post-info">
                        <span class="blog-post-date"><i class="icofont-calendar"> </i><?php echo get_the_date('F jS, Y');?></span>
                        <span class="blog-post-tags"><i class="icofont-tag"></i> 
                            <?php
                                $posttags = get_the_tags();
                                if ($posttags) {
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

            <?php 
                    } //END WHILE
                } //END IF
            ?>
            </section>
            <aside class="aside col-md-5">

            </aside>
        </main>
    </div>

<?php get_footer(); ?>
