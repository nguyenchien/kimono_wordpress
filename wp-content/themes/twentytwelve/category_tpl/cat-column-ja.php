<?php
/**
 * The template for displaying Column pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-flexslider');
wp_enqueue_script('new-formal-blog-script', get_template_directory_uri() . '/js/new-formal-blog.js');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
wp_register_style('new-formal-blog-style', get_template_directory_uri() . '/css/new-formal-blog.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-blog-style');
wp_register_style('group-category-for-post-style', get_template_directory_uri() . '/css/group-category-for-post.css', array('twentytwelve-style'));
wp_enqueue_style('group-category-for-post-style');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
if ($isSmartPhone) {
    wp_register_style('new-column-sp-v2-style', get_template_directory_uri() . '/css/new-column-sp-v2.css', array('twentytwelve-style'));
    wp_enqueue_style('new-column-sp-v2-style');
} else {
    wp_register_style('new-column-pc-v2-style', get_template_directory_uri() . '/css/new-column-pc-v2.css', array('twentytwelve-style'));
    wp_enqueue_style('new-column-pc-v2-style');
}

get_header('formal');
global $post, $custom_taxonomies, $kimono;
$category_data = get_category_data($kimono['current_cate']);
$list_cate_column = array(
    'homongi-column',
    'kurotomesode-column',
    'irotomesode-column',
    'furisode-column',
    'column_hakama',
    'ubugi-column',
    'column_yukata',
    'kekkonshiki-column',
    'seijin-column',
    'sotsugyou-column',
    'nyugakushiki-column',
    'shichigosan-column',
    'omiyamairi-column',
);

?>
    <div class="container-box clearfix">
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="right-column">
                                    <div class="section-new-formal wrap-formal-blog">
                                        <div class="wrap-banner-formal column-banner">
                                            <h1 class="row">
                                                <?php if (!$isSmartPhone) : ?>
                                                <img class="pc" src="<?php echo WP_HOMES; ?>/images/formal-rental/column-banner-pc.jpg" alt="着物と浴衣の豆知識">
                                                <?php else: ?>
                                                <img class="sp" src="<?php echo WP_HOMES; ?>/images/formal-rental/column-banner-sp.jpg" alt="着物と浴衣の豆知識">
                                                <?php endif; ?>
                                            </h1>
                                        </div>

                                        <div class="wrap-breadcrumbs-column">
                                            <?php
                                            if (function_exists('yoast_breadcrumb')) {
                                                yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
                                            }
                                            ?>
                                        </div>

                                        <div class="wrap-title-tabs">
                                            <ul class="tab-link">
                                                <li class="tab-item active"><a href="#news-article">新着</a></li>
                                                <li class="tab-item"><a href="#ranking-article">人気の記事</a></li>
                                            </ul>
                                            <div class="menu-toggle"><span id="toggle-sidebar" class="icon icon-formal-menu-toggle-open"></span></div>
                                        </div>
                                        <div class="wrap-formal-content">
                                            <div class="wrap-blog-left-content full-width">
                                                <div class="wrap-list-col-cate active" id="news-article">
                                                    <div class="wrap-banners-column-cate">
                                                        <h2 class="title-banner-cate">着物の種類で探す</h2>
                                                        <ul class="list-banners-column-cate flexbox">
                                                            <li class="banner-column-cate">
                                                                <a href="<?= WP_HOME; ?>/column/homongi"><img src="<?= WP_HOME; ?>/images/column/banner-column-homongi.jpg" alt="訪問着"></a>
                                                            </li>
                                                            <li class="banner-column-cate">
                                                                <a href="<?= WP_HOME; ?>/column/tomesode"><img src="<?= WP_HOME; ?>/images/column/banner-column-tomesode.jpg" alt="留袖"></a>
                                                            </li>
                                                            <li class="banner-column-cate">
                                                                <a href="<?= WP_HOME; ?>/column/furisode"><img src="<?= WP_HOME; ?>/images/column/banner-column-furisode.jpg" alt="振袖"></a>
                                                            </li>
                                                            <li class="banner-column-cate">
                                                                <a href="<?= WP_HOME; ?>/column/hakama"><img src="<?= WP_HOME; ?>/images/column/banner-column-hakama.jpg" alt="袴"></a>
                                                            </li>
                                                            <li class="banner-column-cate">
                                                                <a href="<?= WP_HOME; ?>/column/ubugi"><img src="<?= WP_HOME; ?>/images/column/banner-column-ubugi.jpg" alt="産着"></a>
                                                            </li>
                                                            <li class="banner-column-cate">
                                                                <a href="<?= WP_HOME; ?>/column/yukata"><img src="<?= WP_HOME; ?>/images/column/banner-column-yukata.jpg" alt="浴衣"></a>
                                                            </li>
                                                            <li class="banner-column-cate banner-column-cate-full">
                                                                <a href="<?= WP_HOME; ?>/column/mofuku"><img src="<?= WP_HOME; ?>/images/column/banner-column-mofuku.jpg" alt="その他の種類の着物"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="wrap-banners-column-cate">
                                                        <h2 class="title-banner-cate">冠婚葬祭シーンから探す</h2>
                                                        <ul class="list-banners-column-cate flexbox">
                                                            <li class="banner-column-cate">
                                                                <a href="<?= WP_HOME; ?>/column/wedding"><img src="<?= WP_HOME; ?>/images/column/banner-column-wedding.jpg" alt="結婚式"></a>
                                                            </li>
                                                            <li class="banner-column-cate">
                                                                <a href="<?= WP_HOME; ?>/column/coming-of-age"><img src="<?= WP_HOME; ?>/images/column/banner-column-coming-of-age.jpg" alt="成人式"></a>
                                                            </li>
                                                            <li class="banner-column-cate">
                                                                <a href="<?= WP_HOME; ?>/column/graduation"><img src="<?= WP_HOME; ?>/images/column/banner-column-graduation.jpg" alt="卒業式"></a>
                                                            </li>
                                                            <li class="banner-column-cate">
                                                                <a href="<?= WP_HOME; ?>/column/enter-school"><img src="<?= WP_HOME; ?>/images/column/banner-column-enter-school.jpg" alt="入学式"></a>
                                                            </li>
                                                            <li class="banner-column-cate">
                                                                <a href="<?= WP_HOME; ?>/column/753"><img src="<?= WP_HOME; ?>/images/column/banner-column-753.jpg" alt="七五三"></a>
                                                            </li>
                                                            <li class="banner-column-cate">
                                                                <a href="<?= WP_HOME; ?>/column/shrine-visit-for-birth"><img src="<?= WP_HOME; ?>/images/column/banner-column-shrine-visit-for-birth.jpg" alt="お宮参り"></a>
                                                            </li>
                                                            <li class="banner-column-cate banner-column-cate-full">
                                                                <a href="<?= WP_HOME; ?>/column/other"><img src="<?= WP_HOME; ?>/images/column/banner-column-other.jpg" alt="その他のイベント・シーン"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="wrap-text-column-cate">
                                                        <ul class="list-text-column-cate flexbox">
                                                            <li class="text-column-cate"><a href="<?= WP_HOME; ?>/column/kitsuke">着付け</a></li>
                                                            <li class="text-column-cate"><a href="<?= WP_HOME; ?>/column/obi">帯</a></li>
                                                            <li class="text-column-cate"><a href="<?= WP_HOME; ?>/column/komono">小物</a></li>
                                                            <li class="text-column-cate"><a href="<?= WP_HOME; ?>/column/hair-style">髪型</a></li>
                                                            <li class="text-column-cate"><a href="<?= WP_HOME; ?>/column/men">男性</a></li>
                                                        </ul>
                                                    </div>

                                                    <?php
                                                        foreach ($list_cate_column as $cate_column) {
                                                            $term_obj = get_term_by('slug', $cate_column, 'category');

                                                            // Meta query
                                                            $args = array();
                                                            $defaults = array(
                                                                'number_of_posts' => 2,
                                                                'post_type' => array('post'),
                                                                'order' => 'desc',
                                                                'thumbnail_size' => 'thumbnail',
                                                                'show_post_views' => true,
                                                                'show_post_thumbnail' => false,
                                                                'show_post_excerpt' => false,
                                                                'no_posts_message' => __('No Posts', 'post-views-counter'),
                                                                'item_before' => '',
                                                                'item_after' => ''
                                                            );
                                                            $args = apply_filters('pvc_most_viewed_posts_args', wp_parse_args($args, $defaults));

                                                            $posts = pvc_get_most_viewed_posts(
                                                                array(
                                                                    'posts_per_page' => (isset($args['number_of_posts']) ? (int)$args['number_of_posts'] : $defaults['number_of_posts']),
                                                                    'tax_query' => array(
                                                                        array(
                                                                            'taxonomy' => 'category',
                                                                            'field' => 'slug',
                                                                            'terms' => $cate_column,
                                                                        )
                                                                    ),
                                                                )
                                                            );

                                                            if ($posts) {
                                                    ?>
                                                    <div class="wrap-articles-column top wrap-articles-column-most-viewed">
                                                        <h3 class="title-articles-column"><?= $term_obj->name ? $term_obj->name.'に関する新着記事' : ''; ?></h3>
                                                        <ul class="list-articles-column">
                                                            <?php
                                                                foreach ($posts as $post) {
                                                                    $img_post = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, 'large', array('alt'=>get_the_title())) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                                                                ?>
                                                                <li class="article-column flexbox">
                                                                    <div class="image-article-column"><a href="<?php echo get_permalink($post->ID); ?>"><?= $img_post; ?></a></div>
                                                                    <div class="info-article-column">
                                                                        <!--<p class="customer-views">--><?php //echo $args['show_post_views'] ? number_format_i18n(pvc_get_post_views($post->ID)) : '' ?><!-- view</p>-->
                                                                        <a href="<?php echo get_permalink($post->ID); ?>">
                                                                            <h4 class="title-article-column"><?php echo get_the_title($post->ID); ?></h4>
                                                                            <p class="desc-article-column"><?php echo wp_trim_words( $post->post_content, 100, '...' ); ?></p>
                                                                        </a>
                                                                        <?php
                                                                            $obj_tax_column = get_the_terms($post->ID, 'category');
                                                                            if ($obj_tax_column) {
                                                                        ?>
                                                                        <ul class="list-cate-by-article flexbox">
                                                                            <?php foreach ($obj_tax_column as $tax_column) { ?>
                                                                            <li class="cate-by-article"><a href="<?= get_term_link($tax_column->term_id); ?>"><?= $tax_column->name; ?></a></li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                        <?php } ?>
                                                                    </div>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                        <?php wp_reset_postdata(); ?>
                                                    </div>
                                                    <?php
                                                            }
                                                        }
                                                    ?>

                                                </div>
                                                <div class="wrap-list-col-cate" id="ranking-article">
                                                    <?php get_template_part('include/column_ranking');?>
                                                </div>
                                                <div class="about-blog" style="display: none;">
                                                    <h5 class="about-blog-title"><?php echo $category_data['name'];?></h5>
                                                    <p><?php echo $category_data['description'];?></p>
                                                </div>
                                            </div>
                                            <?php if ($isSmartPhone) : ?>
                                            <div class="wrap-blog-right-content right-blog-sidebar" id="right-blog-sidebar">
                                                <?php get_sidebar('column-ja'); ?>
                                            </div>
                                            <?php endif; ?>
                                            <!--end right-column-->
                                        </div>
                                    </div>
                                </div><!--end right-column-->
                            </div><!--end wrap-boths-column-->
                        </div><!--end left-column-content-->
                    </div><!--end wrap-column-content-->
                </div>
            </div><!--end content-v2-->
        </div><!--end wrap-highend-v2-->
    </div><!-- end container -->
<?php get_footer('formal'); ?>
