<?php 
        get_header(); 
    ?>
    <div class="site-content container row py-8 px-4 px-md-5 px-lg-0 mx-auto">
        <main class="main row col-lg-8 mb-5 px-3">
        <h2 class="h2"><?php echo get_the_title(); ?></h2>
            <?php 
                if(have_posts()){
                    while(have_posts()){
                        the_post(); ?>
                <section class="section mt-1">
                        <div class="blog-post-image-wrapper mx-auto">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                        <p class="blog-post-excerpt pt-3 mb-0"><?php echo the_content(); ?></p>
                        <hr>
                </section>
            <?php 
                    } //END WHILE
                } //END IF
            ?>
        </main>
                <!--START ASIDE -->
                <aside class="offset-lg-1 col-lg-3">
                    <div class="card">
                        <h3 class="card-header text-black rounded-0 archive-header">Archive</h3>
                        <div class="card-body">
                            <ul class="list-group list-group-flush pl-3 pt-2">
                                <?php wp_get_archives(array(
                                    'type' => 'monthly',
                                    'before' => '<li class="list-group-item archive-link">',
                                    'after' => '</li>',
                                )
                                ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <h3 class="card-header text-black rounded-0 archive-header">Categories</h3>
                        <div class="card-body">
                            <ul class="list-group list-group-flush pl-3 pt-2">
                                <?php 
                                    $categories = get_categories();
                                    foreach ($categories as $cat) {
                                        $category_link = get_category_link($cat->cat_ID);
                                        echo '<li class="list-group-item archive-link"><a href="'.esc_url( $category_link ).'" title="'.esc_attr($cat->name).'">'.$cat->name.'</a></li>';
                                        }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <h3 class="card-header text-black rounded-0 archive-header">Tags</h3>
                        <div class="card-body">
                            <ul class="list-group list-group-flush pl-3 pt-2">
                                <?php 
                                    $tags = get_tags();
                                    foreach($tags as $tag){
                                        echo '<li class="list-group-item archive-link"><a href="'. get_tag_link($tag->term_id) . '">'. $tag->name.'</a></li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </aside>
        <!-- END ASIDE -->
    </div>

<?php get_footer(); ?>
