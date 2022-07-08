<?php
/**
 * Template Name: New Yukata Contest 2019
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

// Get page parent's slug
global $post, $language;
$post_data = get_post($post->post_parent);
$parent_slug = $post_data->post_name;

$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
get_header('new-kimono');
if($isSmartPhone){
    wp_register_style('new-yukata-contest-2019-sp-style', get_template_directory_uri() . '/css/new-yukata-contest-2019-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-yukata-contest-2019-sp-style');
}else{
    wp_register_style('new-yukata-contest-2019-pc-style', get_template_directory_uri() . '/css/new-yukata-contest-2019-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-yukata-contest-2019-pc-style');
}
if($language == 'en' || $language == 'th' || $language == 'id' || $language == 'fr' || $language == 'vi'){
    if($isSmartPhone){
        wp_register_style('new-yukata-contest-2019-sp-en-style', get_template_directory_uri() . '/css/new-yukata-contest-2019-sp-en.css', array('twentytwelve-style'));
        wp_enqueue_style('new-yukata-contest-2019-sp-en-style');
    }else{
        wp_register_style('new-yukata-contest-2019-pc-en-style', get_template_directory_uri() . '/css/new-yukata-contest-2019-pc-en.css', array('twentytwelve-style'));
        wp_enqueue_style('new-yukata-contest-2019-pc-en-style');
    }
}
if($language == 'tw' || $language == 'cn' || $language == 'ko'){
    if($isSmartPhone){
        wp_register_style('new-yukata-contest-2019-sp-tw-style', get_template_directory_uri() . '/css/new-yukata-contest-2019-sp-tw.css', array('twentytwelve-style'));
        wp_enqueue_style('new-yukata-contest-2019-sp-tw-style');
    }else{
        wp_register_style('new-yukata-contest-2019-pc-tw-style', get_template_directory_uri() . '/css/new-yukata-contest-2019-pc-tw.css', array('twentytwelve-style'));
        wp_enqueue_style('new-yukata-contest-2019-pc-tw-style');
    }
}

?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-new-kimono">', '</div>');
    }
    ?>
    <?php if($isSmartPhone) : ?>
        <?php
        $title_contest_sp_2019 = get_field('title_contest_sp_2019');
        if ($title_contest_sp_2019) {
            echo do_shortcode(php_set_base_url($title_contest_sp_2019));
        }
        ?>
    <?php else: ?>
        <?php
        $title_contest_pc_2019= get_field('title_contest_pc_2019');
        if ($title_contest_pc_2019) {
            echo do_shortcode(php_set_base_url($title_contest_pc_2019));
        }
        ?>
    <?php endif; ?>
    <div class="banner-contest-2019">
        <?php if($isSmartPhone) : ?>
            <div class="banner-top-contest">
                <img src="<?= WP_HOME; ?>/images/yukata-contest-2019/main-banner-contest-sp-2019<?php echo ($language == 'ja') ? "" : "-$language"?>.jpg" alt="">
            </div>
        <?php else: ?>
            <div class="banner-top-contest">
                <img src="<?= WP_HOME; ?>/images/yukata-contest-2019/main-banner-contest-pc-2019<?php echo ($language == 'ja') ? "" : "-$language"?>.jpg" alt="">
            </div>
        <?php endif; ?>
    </div><!--end main-baner-top-v2-->
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column left-column-new-kimono hidden-sidebar">
                                <?php if($language == 'ja') : ?>
                                    <?php get_sidebar('top-page-left-v2') ?>
                                <?php else: ?>
                                    <?php get_sidebar('top-page-left') ?>
                                <?php endif; ?>
                            </div>

                            <div class="right-column right-column-list right-column-list-new-kimono right-yukata-contest-2019">
                                <?php
                                while (have_posts()) : the_post();
                                    the_content();
                                endwhile;
                                ?>
                            </div><!--end right-column-->

                        </div><!--end wrap-boths-column-->

                    </div><!--end left-column-content-->


                </div><!--end wrap-column-content-->
            </div>

        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->

</div><!-- end container -->
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>


