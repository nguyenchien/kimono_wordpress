<?php
/**
 * Template Name: Kimono Mamechigyo page
 * Links: /kimono/mamechiyo
 */
global $post, $language;
global $is_yukata;
$language = Yii::app()->language;
if($language == "ja"){
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}
wp_register_style('font-icon-shop', get_template_directory_uri() . '/css/font-icon-shop.css', array('twentytwelve-style'));
wp_enqueue_style('font-icon-shop');
wp_register_style('kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
wp_enqueue_style('kimono');
if ($is_yukata) {
    wp_register_style('yukata_plan', get_template_directory_uri() . '/css/yukata_plan.css', array('twentytwelve-style'));
    wp_enqueue_style('yukata_plan');
}
if (is_page('mamechiyo')) {
    wp_register_style('howto-faq', get_template_directory_uri() . '/css/howto-faq.css', array('twentytwelve-style'));
    wp_enqueue_style('howto-faq');
}
?>
    <div class="container-box clearfix">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
        }
        ?>
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column hidden-sidebar">
                                    <?php get_sidebar('top-page-left-v3') ?>
                                </div>
                                <div class="right-column">
                                    <div class="container kimono-couple-page clearfix">
                                        <?php while (have_posts()) : the_post(); ?>
                                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                                <div class="box-overview-kimono-page clearfix">
                                                    <div class="section-top">
                                                        <?php swe_the_post_thumbnail($post, 'full', array('alt' => strip_tags(get_the_title()))); ?>
                                                        <h1>
                                                            <?php
                                                            if (wp_nonce_field('page_h1')) {
                                                                the_title();
                                                            } else {
                                                                the_field('page_h1');
                                                            }
                                                            ?>
                                                        </h1>
                                                        <?php
                                                        if (get_field('sub-title-page') && get_field('sub-title-page') != 'null') {
                                                            echo '<h2>' . get_field('sub-title-page') . '</h2>';
                                                        }
                                                        ?>
                                                        <?php if (!empty($post->post_excerpt)): ?>
                                                            <?php the_excerpt(); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div><!-- end box-overview-kimono-page -->

                                                <?php
                                                $current_page = $post->post_name;
                                                $parent_page = !empty($post->post_parent) ? get_page($post->post_parent)->post_name : 0;
                                                $language = Yii::app()->language;
                                                if ($post->post_name == 'kimono'): ?>
                                                    <div class="box-banner-graphic"><img
                                                                src="<?php echo WP_HOME; ?>/images/banner-graphic-kimono-<?php echo $language; ?>.png"
                                                                alt="<?php echo strip_tags(get_the_title()); ?>"/></div>
                                                <?php elseif ($post->ID == get_page_by_path('yukata/plan')->ID): ?>
                                                    <div class="box-banner-graphic"><img
                                                                src="<?php echo WP_HOME; ?>/images/banner-graphic-yukata-plan-<?php echo $language; ?>.png"
                                                                alt="<?php echo strip_tags(get_the_title()); ?>"/></div>
                                                <?php endif; ?>

                                                <div class="box-content-page <?php echo $post->post_name; ?> clearfix content-couple">
                                                    <div class="cont-page-left clearfix">
                                                        <?php
                                                        if (is_page(array('kimono', 'plan'))) :
                                                            get_template_part('temp-small/kimono-list');
                                                        endif;
                                                        if (get_field('is_plan_page') === true) :
                                                            // plan pages
                                                            Yii::app()->controller->widget('application.components.widgets.ListKimono', array('plan_type_id' => get_field('plan_type_id')));
                                                        else:
                                                            the_content();
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <!-- end cont-page-left -->

                                                    <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
                                                </div>
                                                <!-- .box-content-page -->
                                                <div class="entry-meta sixteen columns">
                                                    <?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
                                                </div>
                                                <!-- .entry-meta -->

                                            </article><!-- #post -->

                                        <?php endwhile; // end of the loop.  ?>

                                    </div><!-- end container -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end wrap-highend-v2 -->
    </div><!-- end container -->

<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>