<?php
    global $custom_taxonomies, $custom_post_type, $post;
    $blog_args = array (
        'post_status'            => 'publish',
        'order'                  => 'DESC',
        'orderby'                => 'date',
        'posts_per_page'		 => '4'
    );
    $slug = "blog";
    if($lang == 'ko'){
        $slug = "korean-blog";
    }elseif($lang=='th'){
        $slug = "thailand-blog";
    }elseif($lang == 'id'){
        $slug = "indonesia-blog";
    }
    if(post_type_exists($custom_post_type['blog']) && taxonomy_exists($custom_taxonomies['blog'])){
        $blog_args['post_type'] = $custom_post_type['blog'];
        $blog_args[$custom_taxonomies['blog']] = $slug;
    }
    //	if(is_page('osaka')){
    //		$blog_args['shop-blog'] = "osaka-shinsaibashi";
    //	}
    $the_query = new WP_Query( $blog_args );
    if($the_query -> have_posts()):
        ?>
        <div class="lesson-news">
            <h2 class="title-lesson-group title-lesson-group-news">News</h2>
            <ul class="dx-prefix-flex">
                <?php
                $i = 1;
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $taxonomies = get_post_taxonomies($post);
                    $taxonomy = $taxonomies[0];
                    $term= getShopBlog($post, $taxonomy);
                    $category_data = get_category_data($term, $taxonomy);
                    ?>
                    <li>
                        <div class="image">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                                <?php
                                $attachment_id = get_post_thumbnail_id($post->ID);
                                if (!empty($attachment_id)) {
                                    echo swe_wp_get_attachment_image($attachment_id, $size = array(367, 250), $icon = 1, $attr = array(
                                        'class' => 'attachment-block-top-blog wp-post-image '.$attachment_id,
                                        'id' => '',
                                        'alt' => get_the_title(),
                                    ));
                                }else{
                                    $url=WP_HOME.'/images/no-image.png';
                                    echo '<img data-src="'.$url.'" width="121" height="114" class="attachment-block-top-blog wp-post-image" title="'.strip_tags(get_the_title()).'" alt="'.strip_tags(get_the_title()).'" />';
                                }
                                ?>
                            </a>
                        </div>
                        <div class="text">
                            <p class="date clearfix">
                                <?php if(!in_array($lang,array('ko','th','id'))): ?>
                                    <a class="shop-name <?php echo $category_data['class']; ?>" href='<?php echo get_term_link($category_data['id'], $taxonomy); ?>' title='<?php echo $category_data['name']; ?>' >
                                        <?php echo $category_data['shop']; ?>
                                    </a>
                                <?php endif; ?>
                                <span><?php echo get_the_date('', $post->ID); ?></span>
                            </p>
                            <p class="brief">
                                <a href="<?php the_permalink() ?>" title="<?php the_title();?>"><?php splitPostTitle(get_the_title()); ?></a>
                            </p>
                        </div>
                    </li>
                    <?php } ?>
            </ul>
        </div>
        <?php endif; ?>