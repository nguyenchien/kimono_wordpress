<?php
/**
 * Template Name: New Access Page V2
 * Links: /access
 */
global $post, $language;
$detect = Yii::app()->mobileDetect;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
if($language == "ja"){
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}
if($isSmartPhone){
    wp_register_style('new-access-list-sp-v2-style', get_template_directory_uri() . '/css/new-access-list-sp-v2.css', array('twentytwelve-style'));
    wp_enqueue_style('new-access-list-sp-v2-style');
}else{
    wp_register_style('new-access-list-pc-v2-style', get_template_directory_uri() . '/css/new-access-list-pc-v2.css', array('twentytwelve-style'));
    wp_enqueue_style('new-access-list-pc-v2-style');
}
if($language != "ja"){
    if($isSmartPhone){
        wp_register_style('new-access-list-sp-v2-style'.$cssLanguage.'', get_template_directory_uri() . '/css/new-access-list-sp-v2'.$cssLanguage.'.css', array('twentytwelve-style'));
        wp_enqueue_style('new-access-list-sp-v2-style'.$cssLanguage.'');
    }else{
        wp_register_style('new-access-list-pc-v2-style'.$cssLanguage.'', get_template_directory_uri() . '/css/new-access-list-pc-v2'.$cssLanguage.'.css', array('twentytwelve-style'));
        wp_enqueue_style('new-access-list-pc-v2-style'.$cssLanguage.'');
    }
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
                            <div class="right-column right-column-list-access">
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <?php the_content(); ?>
                                <?php endwhile; ?>
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
<script>
    $(document).ready(function() {
        $(".list-item-details").click(function () {
            var content = $(this).find('.access-sub-list');
            content.slideToggle();
        });
    });
</script>
