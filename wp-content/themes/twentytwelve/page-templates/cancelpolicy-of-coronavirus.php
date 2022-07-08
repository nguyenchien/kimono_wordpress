<?php
/**
 * Template Name: Cancelpolicy Of Coronavirus
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

global $language, $post;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
get_header('formal-v2');
if($isSmartPhone){
    wp_register_style('new-formal-corona-sp-style', get_template_directory_uri() . '/css/new-formal-corona-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-corona-sp-style');
}else{
    wp_register_style('new-formal-corona-pc-style', get_template_directory_uri() . '/css/new-formal-corona-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-corona-pc-style');
}
wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');
?>
<link rel="preload" href="<?= WP_HOME?>/css/searchform.css?v=26062019" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME?>/css/searchform.css?v=26062019"></noscript>
<?php if($isSmartPhone):?>
    <div class="wrap-overlay-filter">
        <div class="wrap-relative-toggle">
            <div class="wrap-toggle-left-sidebar toggle-filter-list-sidebar">
                <div class="box-filter-list-sidebar">
                    <div class="toggle-filter-sidebar sp">
                        <?php echo do_shortcode('[FormalSidebarLeftCodeNewStyle]'); ?>
                    </div>
                </div>
            </div>
            <div class="close-sidebar sp">
                <span class="closed-filter"></span>
            </div>
        </div>
    </div>
<?php endif;?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
    }
    ?>

    <?php if($isSmartPhone) : ?>
        <?php if(get_field('title_list_cate_sp')): ?>
            <h1 class="title-name-formal">
                <?php the_field('title_list_cate_sp'); ?>
            </h1>
        <?php endif; ?>
    <?php else: ?>
        <?php if(get_field('title_list_cate_pc')): ?>
            <h1 class="title-name-formal">
                <?php the_field('title_list_cate_pc'); ?>
            </h1>
        <?php endif; ?>
    <?php endif; ?>

    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php
                                if($isSmartPhone){
                                    echo FormalSidebarLeftCodeNewStyle(array());
                                }else{
                                    if($postName != 'list'){
                                        echo FormalSidebarLeftCodeNewStyle(array());
                                    }else if($postName == 'list'){
                                        echo FormalSidebarLeftCodeNewStyle(array());
                                    }
                                }
                                ?>
                            </div>

                            <div class="right-column right-column-list right-refund-campaign right-cate-list-v3 cancelpolicy_of_coronavirus">

                                <div class="padding-v2">
                                    <?php while ( have_posts() ) : the_post(); ?>
                                        <?php the_content(); ?>
                                    <?php endwhile; ?>
                                </div>

                            </div><!--end right-column right-cate-list-v2-->

                        </div><!--end wrap-boths-column-->

                    </div><!--end left-column-content-->


                </div><!--end wrap-column-content-->
            </div><!--end container-box-->

        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->

</div><!-- end container -->
<?php get_footer('formal-v2'); ?>