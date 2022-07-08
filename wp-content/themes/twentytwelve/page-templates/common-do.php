<?php
/**
 * Template Name: New Common Do
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
if(!empty(Yii::app()->language))
    $otherLanguage = (Yii::app()->language != 'ja')? '/'.Yii::app()->language:'';
else
    $otherLanguage='';
?>

<div id="app">
    <div class="cm-loading">
        <span class="loader"></span>
    </div>
</div>
<template id="activeMember" style="display:none">
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
                                            <span class="title-name-cm-user"><?php echo Yii::t('new-common', '会員情報本登録') ?></span>
					</h2>
<div style="display:none" id="activeEmail">{{ email }}</div>
                                        <div class="cm-user cm-user-login" v-if="haveSecurityKey">
                                            <p class="error"v-if="errorMsg">{{errorMsg}}</p>
                                            <p class="success" v-else-if="successMsg">{{ $t('staticMessage.successActive') }}</p>
                                        </div><!--end cm-user-->
                                        <div class="cm-user cm-user-login" v-else>
                                            <p >{{ $t('staticMessage.errorActiveMember') }}</p>
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
<template id="thanks" style="display: none">

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
                                            <span class="title-name-cm-user"><?php echo Yii::t('new-common', '仮登録ありがとうございます ') ?></span>
                                        </h2>
                                        <div class="cm-user cm-user-login thank-you" v-if="haveHash && haveEmail">
                                            <p class="success" v-if="successMsg">{{successMsg}}</p>
                                            <p class="error" v-if="errorMsg">{{errorMsg}}</p>
                                            <p>
                                                仮登録受付完了 <br>
                                                下記のメールアドレスに登録等URLを記載したメールを送信しました。<br>
                                                <b>{{this.$route.params.email }}</b><br>
                                            </p>
                                            <p v-html="$t('staticMessage.messageThanks')" ></p>
                                            <br>
                                            <div class="wrap-btn-cm">
                                                <a href="<?php echo Yii::app()->request->baseUrl.$otherLanguage; ?>/common/login" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', 'ログイン') ?></a>
                                                <button type="button" @click.prevent="resendMail" class="btn-cm " style="background-color: #727171;"  :disabled="canResendMail"><?php echo Yii::t('new-common', 'メール再発送') ?></button>
                                            </div>
                                        </div><!--end cm-user-->
                                        <div class="cm-user cm-user-login thank-you" v-else>
                                            <p >{{ $t('staticMessage.errorThanks') }}</p>
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
<template id="logout">

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
                                            <span class="title-name-cm-user"><?php echo Yii::t('new-common', 'Log out') ?></span>
                                        </h2>
                                        <div class="cm-user cm-user-login" >
                                            <p class="success" v-if="successMsg">{{ $t('staticMessage.successLogout') }}</p>
                                            <p class="error" v-if="errorMsg">{{errorMsg}}</p>
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
<template id="confirmChangeEmail" style="display: none;">
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
                                            <span class="icon-common icon-formal-mypage flexbox"></span>
                                            <span class="title-name-cm-user">{{confirmChangeEmailTitle}}</span>
                                        </h2>
                                        <div class="cm-user cm-user-login" >
                                            <p v-if="errorMsg">{{errorMsg}}</p>
                                            <p v-else-if="successMsg">{{ successMsg }}</p>
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
<template id="not-found-page">
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
                                        <div class="cm-user" >
                                            <h1>{{$t('staticMessage.notFound')}}</h1>
                                        </div><!--end cm-user-->

                                    </div><!--end wrap-cm-user-->
                                </div><!--end right-column-->
                            </div><!--end wrap-boths-column-->
                        </div><!--end left-column-content-->
                    </div><!--end wrap-column-content-->
                </div>
            </div><!--end content-v2-->
        </div><!--end wrap-highend-v2-->
    </div>
</template>

<template id="mainView" >
    <div>
        <router-view></router-view>
    </div>
</template>
<?php get_footer('new-kimono'); ?>
<script>
    var __MESSAGES = <?php echo json_encode(array(
        'successActive' => Yii::t('vue-login', 'Active member success'),
        'successLogout' => Yii::t('vue-login', 'Logout member success'),
        'errorThanks' => Yii::t('vue-login', 'Not exist Hash or Email'),
        'errorActiveMember' => Yii::t('vue-login', 'Not exist secret key'),
        'confirmChangeEmailTitle' => Yii::t('new-common', 'メールアドレス変更完了'),
        'success' => Yii::t('new-common', 'メールアドレスの登録情報を変更しました。'),
        'notFound' => Yii::t('new-common', 'The resource could not be found'),
        'messageThanks'=> Yii::t('new-common','メールに記載しております登録用URLよりアクセス頂き、登録完了をお願いいたします。<br>※メールが届かない場合はメール再送信をクリックしてください。'),
    ))?>;
</script>
<?php get_vue_js('common-do'); ?>

<!-- b-dash relation tag -->
<script type="text/javascript" src="//cdn.activity.bdash-cloud.com/tracking-script/bd-ikf625/tracking.js?async=false" charset="UTF-8"></script>
	<script language="JavaScript" type="text/javascript">
	function callBdash(email){
	if(bdash2){
		console.log("BDASH");
		console.log(email);
		bdash2('set', {exttblCustomerKey: "bdash_tougou_member_tag"});
		bdash2('set', {exttblCustomerValue: email});
		bdash2('send', {type:'pageview'});
		bdash2('set', {exttblCustomerKey: null});
		bdash2('set', {exttblCustomerValue: null});
					        }
	}
</script>
<!-- end b-dash relation tag -->
