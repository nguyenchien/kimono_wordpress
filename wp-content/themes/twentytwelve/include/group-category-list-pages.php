<?php
    global $column_query_var, $wp, $post;
    $current_url = home_url( $wp->request );
    $is_column = strrpos($current_url, "column");

    // column list page custom
    $columnPageCustom = array(
        'different-term-of-shrine-visit',
        'omiyamairi_fukuso_kimono',
        'omiyamairi_syashin',
        'omiyamairi_kimono',
        'hakama_kounyu_rental',
        'sotsugyo-hakama-boots-zori',
        'hakama_kitsuke',
        'otoko_hakama',
        'hakama_sotsugyosiki',
        'kekkonshiki_furisode_kamigata',
        'furisode_rental_souba',
        'furisode_kitsuke',
        'homongi_kekkonshiki',
        'furisode_obi',
    );
?>
<?php if($is_column): ?>
    <div class="wrap-blog-right-content right-blog-sidebar" id="right-blog-sidebar">
        <div id="post_views_counter_list_widget-5" class="right-sidebar-category widget_post_views_counter_list_widget">
            <h2 class="title-right-sidebar flexbox align-items-center"><span class="icon-prize"><img src="<?= WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span>注目されている記事</h2>
            <div class="container-rsb">
                <ul class="list-col-cate list-col-cate-blog list-col-cate-rsb pc flexbox">
                    <?php
                    foreach ($columnPageCustom as $columnItem) :
                        $args = array( 'name' => $columnItem );
                        $posts = get_posts( $args );
                        if ($posts) :
                        foreach ( $posts as $post ) :
                        setup_postdata( $post );
                        $view_count = do_shortcode('[post-views id="'.$post->ID.'"]');
                    ?>
                    <li class="item-col-cate">
                        <div class="box-content-cate flexbox">
                            <div class="wrap-image-cate">
                                <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
                                    <?php else: ?>
                                        <img src="<?= WP_HOME; ?>/images/no-image.png" alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="info-inner-cate">
                                <div class="box-title-inner-info flexbox">
                                    <p class="title-inner-info-name"><a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></p>
                                </div>
                                <div class="box-bottom-inner-info flexbox justify-content-between">
                                    <div class="wrap-view-feature flexbox">
                                        <div class="wrap-feature">特集</div>
                                        <div class="wrap-num-view flexbox"><span class="num-view"><?= $view_count; ?></span><span class="name-view">view</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; wp_reset_postdata(); endif; endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

<div class="wrap-group-cate-for-post wrap-group-cate-list-pages">
    <div class="blog_links blog_links-popular">
        <h2 class="title-right-sidebar flexbox align-items-center"><span class="icon-prize"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><span>着る物の種類によること</span></h2>
        <div class="blog_links blog_links-popular">
            <a class="blog_link_item blog_link_item_full" href="/column/kimono">着物の豆知識</a>
            <a class="blog_link_item" href="/column/homongi">訪問着</a>
            <a class="blog_link_item" href="/column/tomesode">留袖</a>
            <a class="blog_link_item" href="/column/furisode">振袖</a>
            <a class="blog_link_item" href="/column/hakama">袴</a>
            <a class="blog_link_item" href="/column/ubugi">産着</a>
            <a class="blog_link_item" href="/column/mofuku">喪服</a>
            <a class="blog_link_item blog_link_item_full" href="/column/yukata">浴衣の豆知識</a>
        </div>
    </div>
    <div class="blog_links blog_links-popular">
        <h2 class="title-right-sidebar flexbox align-items-center"><span class="icon-prize"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><span>ジャンル</span></h2>
        <div class="blog_links blog_links-popular">
            <a class="blog_link_item" href="/column/kitsuke">着付け</a>
            <a class="blog_link_item" href="/column/obi">帯</a>
            <a class="blog_link_item" href="/column/komono">小物</a>
            <a class="blog_link_item" href="/column/hair-style">髪型</a>
            <a class="blog_link_item" href="/column/men">男性</a>
        </div>
    </div>
    <div class="blog_links blog_links-popular">
        <h2 class="title-right-sidebar flexbox align-items-center"><span class="icon-prize"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><span>フォーマルイベント</span></h2>
        <div class="blog_links blog_links-popular">
            <a class="blog_link_item" href="/column/wedding">結婚式</a>
            <a class="blog_link_item" href="/column/coming-of-age">成人式</a>
            <a class="blog_link_item" href="/column/graduation">卒業式</a>
            <a class="blog_link_item" href="/column/enter-school">入学式</a>
            <a class="blog_link_item" href="/column/753">七五三</a>
            <a class="blog_link_item" href="/column/shrine-visit-for-birth">お宮参り</a>
            <a class="blog_link_item" href="/column/other">その他のイベント</a>
        </div>
    </div>
</div>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function () {
        var column_name = '<?php echo $column_query_var; ?>';
        var links_item = $(".wrap-group-cate-list-pages .blog_link_item");
        $.each(links_item, function (key, val) {
            var slug = $(val).attr('href').split('/');
            slug = slug[slug.length - 1];
            if (column_name === slug) {
                $(val).addClass('blog_link_current');
            }
        });
    });
</script>