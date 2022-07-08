<?php
/**
 * Template Name: New Common Thanks
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
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}

get_header('new-kimono');
wp_register_style('new-common-style', get_template_directory_uri() . '/css/new-common.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-style');
wp_register_style('new-common-register-style', get_template_directory_uri() . '/css/new-common-register.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-register-style');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;
?>


    <div class="container-box clearfix">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-new-kimono">', '</div>');
        }
        ?>

        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column left-column-new-kimono hidden-sidebar">
                                    <?php get_sidebar('top-page-left') ?>
                                </div>
                                <div class="right-column right-column-list right-column-list-new-kimono">
                                    <div class="wrap-cm-user">
                                        <h2 class="title-cm-user flexbox align-items-center">
                                            <span class="icon-common icon-formal-cm-add flexbox"></span>
                                            <span class="title-name-cm-user"><?php echo Yii::t('new-common', '新規会員登録') ?></span>
                                        </h2>
                                        <div class="cm-user cm-user-login" >
                                           <p><?php echo Yii::t('member', 'Register success . Please check your mail');?></p>
                                        </div><!--end cm-user-->

                                    </div><!--end wrap-cm-user-->
                                </div><!--end right-column-->
                            </div><!--end wrap-boths-column-->
                        </div><!--end left-column-content-->
                    </div><!--end wrap-column-content-->
                </div>
            </div><!--end content-v2-->
        </div><!--end wrap-highend-v2-->
    </div><!-- end container -->

<?php get_footer('new-kimono'); ?>

<script>
    setTimeout(function(){window.location.href = window.location.origin + baseUrl+"/common/login"; }, 10000);
</script>

