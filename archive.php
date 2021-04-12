    <?php 
    /*Template Name: Archives*/
        get_header(); 
    ?>
    <div class="site-content container row py-8 px-5 px-sm-0 mx-auto">
        <main class="main row col-lg-8 mb-5">
        <h2 class="h2">
            <?php 
                if(is_category()){
                    single_cat_title();
                }elseif(is_tag()){
                    single_tag_title();
                }elseif(is_day()){
                    echo get_the_date();
                }elseif(is_month()){
                    echo get_the_date('F Y');
                }elseif(is_year()){
                    echo get_the_date('Y');
                }else{
                    echo "Archives";
                }
            ?>
            </h2>
            <?php 
                if(have_posts()){
                    while(have_posts()){
                        the_post(); ?>
                <section class="section mt-1">
                    <h3 class="h3 pt-4"><?php echo get_the_title(); ?></h3>
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
                </section>
            <?php 
                    } //END WHILE
                } //END IF
                gardenPagination();
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
