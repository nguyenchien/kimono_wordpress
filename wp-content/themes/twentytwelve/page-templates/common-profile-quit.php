<?php
/**
 * Template Name: New Common Profile Quit
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
wp_register_style('new-common-manage-style', get_template_directory_uri() . '/css/new-common-manage.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-manage-style');
//wp_enqueue_script('new-common-script', get_template_directory_uri() . '/js/new-common.js');
wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;
if (Yii::app()->member_user->isGuest) wp_redirect('login');
?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-new-kimono">', '</div>');
    }
    ?>

    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box rendered">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column left-column-new-kimono pc">
                                <?php include("common-sidebar.php"); ?>
                            </div><!--end left-column-->

                            <div class="right-column right-column-list right-column-list-new-kimono">
                                <!-- Box quit -->
                                <div class="wrap-cm-user wrap-user-content" data-view-source="quit-confirm">
<!--	                                --><?php //if($isSmartPhone) : ?>
<!--                                    <h2 class="title-cm-user title-toggle-click flexbox align-items-center" data-show-content=".wrap-show-content">-->
<!--                                        --><?php //echo Yii::t('new-common', 'マイページ') ?>
<!--                                    </h2>-->
<!--                                    --><?php //endif; ?>
									<div id="app">
                                        <div class="cm-loading">
                                            <span class="loader"></span>
                                        </div>
									</div>
                                    <template id="quit-confirm">
                                        <div>
<!--                                            --><?php //if(!$isSmartPhone) : ?>
<!--                                                <h2 class="title-cm-user flexbox align-items-center">-->
<!--                                                    <span class="icon-common icon-formal-cm-user-info flexbox"></span>-->
<!--                                                    <span class="title-name-cm-user">--><?//= Yii::t('new-common', 'マイページ')?><!--</span>-->
<!--                                                </h2>-->
<!--                                            --><?php //endif; ?>
                                            <div class="box-user-content box-quit">
                                                <div class="main-page-title flexbox">
                                                    <span class="icon">
                                                        <img src="<?php echo WP_HOME;?>/images/icon-user.svg">
                                                    </span>
                                                    <span class="lg-txt">My Page</span>
                                                    <span class="sm-txt">マイページ</span>
                                                </div>
                                                <?php if($isSmartPhone):?>
                                                    <div class="wrap-show-content sp" style="display: block">
                                                        <?php include("common-sidebar.php"); ?>
                                                    </div>
                                                <?php endif ?>
                                                <h2 class="title-cm-user">
                                                    <?php echo Yii::t('new-common', '退会手続き') ?>
                                                </h2>
                                                <div class="box-info-item">
                                                    <ul class="list-info-content">
                                                        <li class="item">
                                                            <label class="flexbox">
                                                                <input type="hidden" value="0" name="hidden">
                                                                <input name="check-1" v-validate="'required'" value="1" type="checkbox">
                                                                <div class="confirm-text">
                                                                    <span class="agreement-condition"><?php echo Yii::t('new-common', '会員登録情報について') ?></span>
                                                                    <p class="text-quit"><?php echo Yii::t('new-common', '個人情報規定ならびに弊社のセキュリティシステム上、退会後の会員登録内容の確認はできなくなります。') ?></p>
                                                                </div>
                                                                </span>
                                                                <?php if($isSmartPhone) : ?>
                                                                    <span class="error" v-show="errors.has('check-1')">{{ errors.first('check-1') }}</span>
                                                                <?php endif; ?>
                                                            </label>
                                                            </span>
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <span class="error" v-show="errors.has('check-1')">{{ errors.first('check-1') }}</span>
                                                            <?php endif; ?>

                                                        </li>
                                                        <li class="item">
                                                            <label class="flexbox">
                                                                <input type="hidden" value="0" name="hidden">
                                                                <input name="check-2" v-validate="'required'" value="1" type="checkbox">
                                                                <div class="confirm-text">
                                                                    <span class="agreement-condition"><?php echo Yii::t('new-common', 'ポイントについて') ?></span>
                                                                    <p class="text-quit"><?php echo Yii::t('new-common', 'お持ちのポイントは無効となります。新しい会員登録へのポイントの移行はできません。') ?></p>
                                                                </div>
                                                                <?php if($isSmartPhone) : ?>
                                                                    <span class="error" v-show="errors.has('check-2')">{{ errors.first('check-2') }}</span>
                                                                <?php endif; ?>
                                                            </label>
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <span class="error" v-show="errors.has('check-2')">{{ errors.first('check-2') }}</span>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li class="item">
                                                            <label class="flexbox">
                                                                <input type="hidden" value="0" name="hidden">
                                                                <input name="check-3" v-validate="'required'" value="1" type="checkbox">
                                                                <div class="confirm-text">
                                                                    <span class="agreement-condition"><?php echo Yii::t('new-common', 'ご注文商品について') ?></span>
<!--                                                                    <p class="text-quit">--><?php //echo Yii::t('new-common', 'お持ちのポイントは無効となります。新しい会員登録へのポイントの移行はできません。') ?><!--</p>-->
                                                                    <p class="text-quit"><?php echo Yii::t('new-common', '•既にご注文いただきました商品は、退会後も発送致します。')?></p>
                                                                    <p class="text-quit"><?php echo Yii::t('new-common', '•退会後は、商品の発送先・お支払い方法・配達日の変更はできません。')?></p>
                                                                </div>
                                                                <?php if($isSmartPhone) : ?>
                                                                    <span class="error" v-show="errors.has('check-3')">{{ errors.first('check-3') }}</span>
                                                                <?php endif; ?>
                                                            </label>
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <span class="error" v-show="errors.has('check-3')">{{ errors.first('check-3') }}</span>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li class="item">
                                                            <label class="flexbox">
                                                                <input type="hidden" value="0" name="hidden">
                                                                <input name="check-4" v-validate="'required'" value="1" type="checkbox">
                                                                <span class="confirm-text flexbox align-items-center">
                                                                    <span class="agreement-condition">
                                                                        <?php echo Yii::t('new-common', 'すべての項目を確認しました。') ?>
                                                                    </span>
                                                                </span>
                                                                <?php if($isSmartPhone) : ?>
                                                                    <span class="error" v-show="errors.has('check-4')">{{ errors.first('check-4') }}</span>
                                                                <?php endif; ?>
                                                            </label>
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <span class="error" v-show="errors.has('check-4')">{{ errors.first('check-4') }}</span>
                                                            <?php endif; ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="alert-overlay">
                                                <div class="alert-content">{{ errorMessage }}</div>
                                            </div>
                                            <div class="wrap-btn-quit">
                                                <button type="submit" v-on:click="checkTerms" class="btn-cm cm-color-pink btn-quit"><?php echo Yii::t('new-common', '退会する') ?></button>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div><!--end right-column-->

                        </div><!--end wrap-boths-column-->

                    </div><!--end left-column-content-->


                </div><!--end wrap-column-content-->
            </div>

        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->

	<script src="<?=WP_HOME?>/js/vue/lib/require.js"></script>

<script>
	$( document ).ready(function() {
        require(['../js/vue/swe-common'], function(SweVue){
            require(['auth'], function(Auth){
                SweVue.registerRoot('#quit-confirm',
                    {
                        errorMessage: null
                    },
                    {
                        mounted: function (){
                            this.$nextTick(function(){
                                if(isSmartPhone()){
                                    $('[data-show-content]').on('click', function(){
                                        var self    = this;
                                        var target  = $(self).data('show-content');
                                        var $other  = $('[data-show-content="'+target+'"]');
                                        if(target){
                                            $other.each(function(index, el){
                                                if(el !== self){
                                                    $(el).siblings(target).slideUp();
                                                    $(el).parent().find('.title-cm-user').removeClass('active');
                                                }else{
                                                    $(self).siblings(target).slideToggle();
                                                    $(self).parent().find('.title-cm-user').toggleClass('active');
                                                }
                                            });
                                        }
                                    });
                                }
                            })
                        },
                        checkTerms: function (event) {
                            event.preventDefault();
                            var that = this ;
                            that.$validator.validateAll().then(
                                function () {
                                    //Success
                                    if (0 === that.errors.count()) {
                                        if (confirm(that.$t('staticMessage.quitConfirm'))) {
                                            Auth.withdrawn.bind(this)().then(
                                                function (res) {
                                                    if (typeof res.data !== 'undefined' && typeof res.data.status !== 'undefined' && res.data.status === 'success') {
                                                        Auth.logout();
                                                        that.errorMessage = "Quit succesfully. Thank you for supporting our business !";
                                                        setTimeout(function () {
                                                            $('.alert-overlay').addClass('active');
                                                        }, 1000);
                                                    }
                                                }
                                            );

                                            //Redirect to top page
                                            setTimeout(function () {
                                                var href = window.location.origin + baseUrl;
                                                window.location.href = href;
                                            }, 4000);
                                        }
                                    }
                                });
                        },
                        showErrorMessage: function (data) {
                            this.errorMessage = data.statusText._error;
                        }
                    },
                    {}, true
	    );
            });
	});

        //Error Message
        var __ATTRS = <?php echo json_encode(array(
            'check-1' => Yii::t('member', 'check-1 content'),
            'check-2' => Yii::t('member', 'check-2 content'),
            'check-3' => Yii::t('member', 'check-3 content'),
            'check-4' => Yii::t('member', 'check-4 content')
        ))?>;

        var __MESSAGES = <?php echo json_encode(array(
            'quitConfirm'=> Yii::t('new-common', '退会手続きを行います。本当によろしいですか？'),
        ))?>;
	 
});
    </script>
</div><!-- end container -->
<?php get_footer('new-kimono'); ?>


