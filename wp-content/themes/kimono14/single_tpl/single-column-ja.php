<?php
/**
 * The Template for displaying SPOT category single posts
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
get_header('formal');
global $post, $custom_taxonomies, $kimono;

$current_cate = $kimono['current_cate'];
$taxonomy = $kimono['taxonomy'];
$parent = $kimono['parent'];
$parent_data = get_category_data($parent);
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
                                        <?php
                                        if (function_exists('yoast_breadcrumb')) {
                                            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
                                        }
                                        ?>
                                        <div class="wrap-formal-content formal-blog-detail flexbox">
                                            <div class="wrap-blog-left-content">
                                                <?php if (have_posts()) :
                                                    while (have_posts()) : the_post();
                                                        $img = has_post_thumbnail() ? swe_get_the_post_thumbnail($post) : '';
                                                        $title = get_the_title();
                                                        $date = get_the_date();
                                                        $view_count = do_shortcode('[post-views]');
                                                        $excerpt = get_the_excerpt();
                                                        $cate_link = get_category_link($current_cate);

                                                    endwhile;
                                                endif; ?>
                                                    <div class="wrap-pd-intro">
                                                        <div class="wrap-pd-img"><?php echo $img; ?><div class="overlay-img"></div>
                                                        </div>
                                                        <div class="wrap-pd-content">
                                                            <h2 class="wrap-pd-title"> <?php echo $title; ?> </h2>
                                                            <div class="wrap-pd-info">
                                                                <div class="wrap-feature">特集</div>
                                                                <div class="post-date"><?php echo $date; ?></div>
                                                                <div class="wrap-num-view flexbox"><span class="num-view"><?php echo $view_count; ?></span><span class="name-view">view</span></div>
                                                            </div>
                                                        </div>
                                                        <p><?php the_excerpt(); ?></p>
                                                        <div class="reserve-list"><a href="<?php echo $cate_link; ?>" alt="<?php echo $parent_data['name']; ?>" class="main-btn">記事掲載アイテム一覧</a></div>
                                                    </div>
                                                    <div class="wrap-pd-details"><?php the_content(); ?></div>
                                                    <div class="wrap-reserve-bottom">
                                                        <div class="reserve-list"><a href="<?php echo $cate_link;?>" class="main-btn">記事掲載アイテム一覧</a></div>
                                                        <div class="social-widget">
                                                            <?php
                                                            if (function_exists('wp_social_bookmarking_light_output_e')) {
                                                                wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));
                                                            }
                                                            ?></div>
                                                    </div>
                                                    <div class="wrap-pd-intro bottom">
                                                        <div class="wrap-pd-img"><?php echo $img; ?>
                                                            <div class="overlay-img"></div>
                                                        </div>
                                                        <div class="wrap-pd-content">
                                                            <h1 class="wrap-pd-title"> <?php echo $title;?> </h1>
                                                            <div class="wrap-pd-info">
                                                                <div class="wrap-feature">特集</div>
                                                                <div class="post-date"><?php echo $date; ?></div>
                                                                <div class="wrap-num-view flexbox"><span class="num-view"><?php echo $view_count; ?></span><span class="name-view">view</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="wrap-sidebar-overlay">
                                                <div class="wrap-blog-right-content right-blog-sidebar" id="right-blog-sidebar">
                                                    <?php if (is_active_sidebar('sidebar-1')) : ?>
                                                        <?php dynamic_sidebar('sidebar-1'); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--end right-column-->
                            </div><!--end wrap-boths-column-->
                        </div><!--end left-column-content-->
                    </div><!--end wrap-column-content-->
                </div>
            </div><!--end content-v2-->
        </div><!--end wrap-highend-v2-->
    </div>
<?php get_footer('formal'); ?>