<?php
/**
 * Template Name: New Kimono Option V2
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
$language = Yii::app()->language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
if($language == "ja"){
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}

if (!$isSmartPhone) {
    wp_register_style('new-kimono-option-v2-pc-style', get_template_directory_uri() . '/css/new-kimono-option-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-option-v2-pc-style');
}
else{
    wp_register_style('new-kimono-option-v2-sp-style', get_template_directory_uri() . '/css/new-kimono-option-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-option-v2-sp-style');
}

if($language != "ja"){
    if($isSmartPhone){
        wp_register_style('new-kimono-option-v2-sp-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-option-v2-sp'.$cssLanguage.'.css', array('twentytwelve-style'));
        wp_enqueue_style('new-kimono-option-v2-sp-style'.$cssLanguage);
    }else{
        wp_register_style('new-kimono-option-v2-pc-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-option-v2-pc'.$cssLanguage.'.css', array('twentytwelve-style'));
        wp_enqueue_style('new-kimono-option-v2-pc-style'.$cssLanguage);
    }

}
?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
    }
    ?>

    <?php if(get_field('title_h1')): ?>
            <h1 class="title-name-option">
                <?php the_field('title_h1'); ?>
            </h1>
    <?php endif; ?>
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-option-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column left-column-new-kimono hidden-sidebar">
                                <?php get_sidebar('top-page-left-v3') ?>
                            </div>

                            <div class="right-column right-column-list right-column-list-new-kimono right-kimono-option-v2">
                                <div class="wrap-new-option-v2">
                                    <?php if($isSmartPhone) : ?>
                                        <?php
                                        $main_banner_sp = get_field('main_banner_sp');
                                        if ($main_banner_sp) {
                                            echo do_shortcode(php_set_base_url($main_banner_sp));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $main_banner_pc = get_field('main_banner_pc');
                                        if ($main_banner_pc) {
                                            echo do_shortcode(php_set_base_url($main_banner_pc));
                                        }
                                        ?>
                                    <?php endif; ?>

                                    <?php if($isSmartPhone) : ?>
                                        <?php
                                        $sub_banner_sp = get_field('sub_banner_sp');
                                        if ($sub_banner_sp) {
                                            echo do_shortcode(php_set_base_url($sub_banner_sp));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $sub_banner_pc = get_field('sub_banner_pc');
                                        if ($sub_banner_pc) {
                                            echo do_shortcode(php_set_base_url($sub_banner_pc));
                                        }
                                        ?>
                                    <?php endif; ?>
                                </div>
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

