<?php
/**
 * Template Name: New Common Active Member
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

<div id="app">
    <div class="cm-loading">
        <span class="loader"></span>
    </div>
</div>
<template id="activeMember" style="display:none">
    <div class="container-box clearfix 123">
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
                                            <p v-if="errorMsg">{{errorMsg}}</p>
                                            <p v-else-if="successMsg">{{ $t('staticMessage.success') }}</p>
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
<script>
    var __MESSAGES = <?php echo json_encode(array(
        'success' => Yii::t('vue-login', 'Active member success'),
    ))?>;
</script>
<script>

    // setTimeout(function(){window.location.href = window.location.origin + baseUrl+"/common/login"; }, 3000);
</script>
<script src="<?=WP_HOME?>/js/vue/lib/require.js"></script>
<script>
    require(['../js/vue/swe-common'], function(SweVue) {
        require(['auth', 'moment','core/point','helper'], function (Auth, moment,point,Helper) {
            SweVue.registerRootEx('#activeMember', {
                data: {
                    errorMsg:null,
                    successMsg:null
                },
                mounted:function() {
                    var that =this;

                    var p = Helper.getData("activateMember",{"secret_key": '<?php echo $_GET["ui"]?>'});
                    return p.then(function (res) {
                        try {
                            console.log(res.status);
                            if(res.status === 200) {
				    that.successMsg = "Success";
				    console.log('abc');
				    console.log(res);
                                setTimeout(function () {
                                    window.location.href = window.location.origin + baseUrl + "/common/login";
                                }, 7000);
                            }
                        } catch(e) {
                            var error ={
                                status: 403,
                                statusText: 'Invalid token',
                                successMessage: 'Invalid token'
			}
			    console.log(e);
                            that.errorMsg =error.status+" "+error.statusText;
                            //setTimeout(function(){window.location.href = window.location.origin + baseUrl+"/common/register"; }, 7000);
                        }
		    }).catch(function (errors) {
			    console.log(errors);
                        that.errorMsg = errors.response.data.arcode+" "+errors.response.data._error;
                        //setTimeout(function(){window.location.href = window.location.origin + baseUrl+"/common/register"; }, 7000);
                    });

                }
            }, {});
        });
    });

</script>
