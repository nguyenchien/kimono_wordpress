<?php
/**
 * Template Name: New Common Forget Password
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
wp_register_style('new-common-forget-password-style', get_template_directory_uri() . '/css/new-common-forget-password.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-forget-password-style');
wp_register_style('new-common-manage-style', get_template_directory_uri() . '/css/new-common-manage.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-manage-style');
wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;
?>

<div id="app">
    <div class="cm-loading">
        <span class="loader"></span>
    </div>
</div>
<template id="forgetPassword" style="display:none">
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
                                            <span class="title-name-cm-user"><?php echo Yii::t('new-common', 'パスワードを忘れた方') ?></span>
                                        </h2>
                                        <div class="cm-user cm-user-login  cm-user-forget-password">
                                            <div class="box-cm-user">
                                                <div class="info-cm">
                                                    <p class="text-info-cm"><?php echo Yii::t('new-common', '会員登録時に登録されたメールアドレスとお生年月日を入力してください。ご登録のメールアドレス宛に、仮パスワードをお送りします。') ?></p>
                                                    <p class="noted-info-cm"><?php echo Yii::t('new-common', '※仮パスワードが発行されると、これまでのパスワードはご利用いただけません。') ?></p>
                                                    <span class="error" v-if="errorMsg">{{errorMsg}}</span>
                                                </div>

                                                <form action="" class="form-cm-user">
                                                    <div class="group-cm-user">
                                                        <div class="input-group-cm">
                                                            <input name="email" type="email" v-validate="'required|email|max:200'" v-model = "form.email" class="form-control-cm"  :placeholder="$t('form.email')">

                                                        </div>
                                                        <span class="error" v-show="errors.has('email')">{{ errors.first('email') }}</span>
<!--                                                        <div class="input-group-cm sl-forget-password flexbox">-->
<!--                                                            <div class="wrap-sl-common flexbox">-->
<!--                                                                <div class="box-sl-cm">-->
<!--                                                                    <div class="input-group-cm">-->
<!--                                                                        <input class="form-control-cm" v-validate="'required|date_format:YYYY-MM-DD'" v-mask="'####-##-##'" v-model="form.birth" name="birth" :placeholder="$t('form.birth')">-->
<!---->
<!--                                                                    </div>-->
<!--                                                                    <span class="error" v-show="errors.has('birth')">{{ errors.first('birth') }}</span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
                                                    </div>
                                                    <div class="group-btn-cm group-two-btn-cm flexbox">
                                                        <div class="wrap-btn-cm">
                                                            <button type="button" class="btn-cm cm-color-grey" onclick="window.history.back();"><?php echo Yii::t('new-common', '戻る') ?></button>
                                                        </div>
                                                        <div class="wrap-btn-cm">
                                                            <button type="submit" v-on:click.prevent="forgetPassword" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', '登録内容を確認する') ?></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!--end cm-user-->
                                    </div><!--end wrap-cm-user-->
                                    <div class="alert-overlay">
                                        <div class="alert-content">{{successMsg}}</div>
                                    </div>
                                </div><!--end right-column-->

                            </div><!--end wrap-boths-column-->

                        </div><!--end left-column-content-->


                    </div><!--end wrap-column-content-->
                </div>

            </div><!--end content-v2-->
        </div><!--end wrap-highend-v2-->

    </div><!-- end container -->
</template>
<script>

    var __ATTRS = <?php echo json_encode(array(
        'birth' => Yii::t('member', 'Birthday (YYYY-MM-DD)'),
        'email' => Yii::t('member', 'Email'),
    ))?>;
</script>
<?php get_vue_js('common-forget-password');?>
<?php get_footer('new-kimono'); ?>


