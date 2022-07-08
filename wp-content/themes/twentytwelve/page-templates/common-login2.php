<?php
/**
 * Template Name: New Common Login 2
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
wp_register_style('new-common-login-style', get_template_directory_uri() . '/css/new-common-login.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-login-style');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;
?>

<div id="app">
	<div class="cm-loading">
		<img style="display: none;" src="<?= WP_HOME ?>/images/reserve/ajax-loader.gif" alt="">
	</div>
</div>
<template id="login" style="display:none">
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
                                            <span class="icon-common icon-formal-cm-login flexbox"></span>
                                            <span class="title-name-cm-user"><?php echo Yii::t('new-common', 'マイページ　ログイン') ?></span>
                                        </h2>
                                        <div class="cm-user cm-user-login">
                                            <div class="box-cm-user">
                                                <form action="" class="form-cm-user">
                                                    <h3><?php echo Yii::t('new-common', '会員登録がお済みのお客様') ?></h3>
                                                    <span class="error" v-if="errorMessage">{{errorMessage}}</span>
                                                    <div class="group-cm-user">
                                                        <div class="input-group-cm">
                                                            <input type="email" v-model="form.email" name="email" v-validate="'required|email'" class="form-control-cm" placeholder="メールアドレス">
                                                            <span class="error" v-show="errors.has('email')">{{ errors.first('email') }}</span>
                                                        </div>
                                                        <div class="input-group-cm">
                                                            <input v-model="form.password" v-validate="'required'" type="password" name="password" class="form-control-cm" placeholder="パスワード">
                                                            <span class="error" v-show="errors.has('password')">{{ errors.first('password') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="group-btn-cm flexbox">
                                                        <div class="wrap-btn-cm">
                                                            <button type="submit" v-on:click="login" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', 'ログイン') ?></button>
                                                        </div>
                                                        <div class="lbl-cm-user">
                                                            <p class="text">
                                                                <a href="#"><?php echo Yii::t('new-common', 'パスワードをお忘れですか？') ?></a>
                                                            </p>
                                                            <p class="text">
                                                                <a href="#"><?php echo Yii::t('new-common', '初めてご利用の方(新規会員登録)') ?></a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="wrap-cm-regiser">
                                                    <div class="box-cm-register">
                                                        <h3 class="title-rg"><?php echo Yii::t('new-common', 'まだ会員登録をされていないお客様') ?></h3>
                                                        <p class="text-rg"><?php echo Yii::t('new-common', '会員登録をすると便利なMyページをご利用いただけます。<br class="pc">また、ログインするだけで、毎回お名前や住所などを<br class="pc">入力することなくスムーズに着物レンタルをお楽しみいただけます。') ?></p>
                                                        <div class="wrap-btn-cm">
                                                            <a href="#" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', '新規会員登録をする') ?></a>
                                                        </div>
                                                    </div>
                                                </div><!--end wrap-cm-regiser-->
                                            </div>
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
</template>

<?php get_footer('new-kimono'); ?>

<script src="<?=WP_HOME?>/js/vue/require.js"></script>
<script>
    require(['js/vue/swe-common'], function(SweVue){
        SweVue.registerRoot('#login',
            {
                errorMessage: null,
                form: {email: null, password: null}
            },
            {
                login: function (event) {
                    event.preventDefault();
                    var that = this ;
                    that.$validator.validateAll().then(
                        function () {
                            if (0 === that.errors.count()) {
                                loginUser.bind(that)(that.form.email, that.form.password, 'common-profile');
                            }
                        }
                    );
                },
                showErrorMessage: function (data) {
                    this.errorMessage = data.statusText._error;
                }
            },
            {}, true
        );
    });
</script>


