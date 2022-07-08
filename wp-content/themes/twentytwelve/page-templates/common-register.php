<?php
/**
 * Template Name: New Common Register
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
wp_register_style('new-common-term-of-use-style', get_template_directory_uri() . '/css/new-common-term-of-use.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-term-of-use-style');
wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;
if (false == Yii::app()->member_user->isGuest) {
    $loginUrl = home_url().'/common';
    wp_redirect($loginUrl);
}
?>
<style>
    .fixed-overflow{
        overflow: hidden;
    }
    .alert-overlay{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        background: rgba(0,0,0,0.5);
        display: none;
    }
    .alert-overlay .alert-content{
        padding: 100px 50px;
        background: #fff;
        font-size: 14px;
    }
    .alert-overlay.active{
        display: block;
    }
    @media (min-width: 750px){
        .alert-overlay.active{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }
    }
</style>
<div id="app">
	<div class="cm-loading">
		<span class="loader"></span>
	</div>
</div>
<template id="register" style="display:none">
    <div class="container-box clearfix rendered">
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
                                        <div class="main-page-title flexbox">
                                            <span class="icon">
                                                <img src="<?php echo WP_HOME;?>/images/icon-user.svg">
                                            </span>
                                            <span class="lg-txt">My Page</span>
                                            <span class="sm-txt">マイページ</span>
                                        </div>
                                        <h2 class="title-cm-user">
                                            <?php echo Yii::t('new-common', '新規会員登録') ?>
                                        </h2>
                                        <div class="cm-user cm-user-register" >
                                            <div class="box-cm-user">
                                                <span class="success" v-if="successMessage">{{successMessage}}</span>
                                                <span class="error" v-if="errorMessage">{{errorMessage}}</span>
                                                <form action="" class="form-cm-user">
                                                    <div class="group-cm-user">
                                                        <div class="input-group-cm two-row flexbox">
                                                            <label class="lbl-name">氏名</label>
                                                            <div class="row-input flexbox">
                                                                <div class="input-row flexbox">
                                                                    <input name="name" type="text" v-validate="'required'" maxlength="50" v-model = "form.name" class="form-control-cm" :placeholder="$t('form.name')">
                                                                    <span class="error" v-show="errors.has('name')">{{ errors.first('name') }}</span>
                                                                </div>
                                                                <div class="input-row flexbox required-two-row">
                                                                    <input name="name_last" type="text" v-validate="'required'" maxlength="50" class="form-control-cm" v-model = "form.name_last" :placeholder="$t('form.name_last')">
                                                                    <span class="error" v-show="errors.has('name_last')">{{ errors.first('name_last') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-group-cm two-row flexbox">
                                                            <label class="lbl-name">フリガナ</label>
                                                            <div class="row-input flexbox">
                                                                <div class="input-row flexbox">
                                                                    <input name="kana" type="text" maxlength="50" class="form-control-cm" v-model = "form.kana" :placeholder="$t('form.kana')">
                                                                    <span class="error" v-show="errors.has('kana')">{{ errors.first('kana') }}</span>
                                                                </div>
                                                                <div class="input-row flexbox">
                                                                    <input name="kana_last" type="text" maxlength="50" class="form-control-cm" v-model = "form.kana_last" :placeholder="$t('form.kana_last')">
                                                                    <span class="error" v-show="errors.has('kana_last')">{{ errors.first('kana_last') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-group-cm gender-input">
                                                            <template  v-for="(value, key) in sex_list" >
                                                                <label class="wrap-radio">{{value.name}}
                                                                    <input name="sex" class="radio-input" type="radio" v-model = "form.sex"  :value="value.id">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </template>
                                                            <span class="error" v-show="errors.has('sex')">{{ errors.first('sex') }}</span>
                                                        </div>
                                                        <div class="input-group-cm">
                                                            <div class="row-input flexbox">
                                                                <label class="lbl-name">メールアドレス</label>
                                                                <input name="email" :readonly="readonly" type="email" v-validate="'required|email'" maxlength="200" v-model="form.email" class="form-control-cm" :placeholder="$t('form.email')">
                                                            </div>
                                                            <span class="error" v-show="errors.has('email')">{{ errors.first('email') }}</span>
                                                        </div>
                                                        <div class="input-group-cm">
                                                            <div class="row-input flexbox">
                                                                <label class="lbl-name">パスワード</label>
                                                                <input name="password" type="password" v-validate="'required|min:8'" maxlength="64"  v-model = "form.password" name="password" class="form-control-cm" :placeholder="$t('form.password')">
                                                            </div>
                                                            <span class="error" v-if="errors.has('password')">{{ errors.first('password') }}</span>
                                                        </div>
                                                        <div class="input-group-cm">
                                                            <div class="row-input flexbox">
                                                                <label class="lbl-name">パスワード（確認）</label>
                                                                <input name="confirm_password" type="password" v-validate="'required|confirmed:password|min:8'" maxlength="64"  v-model = "form.confirm_password" name="confirm_password" class="form-control-cm" :placeholder="$t('form.confirm_password')">
                                                            </div>
                                                            <span class="error" v-if="errors.has('confirm_password')">{{ errors.first('confirm_password') }}</span>
                                                        </div>
                                                        <div class="input-group-cm">
                                                            <div class="row-input flexbox">
                                                                <label class="lbl-name">電話番号</label>
                                                                <input name="tel" type="tel" v-validate="{ min: 8, regex: /^([0-9\(\).\-\+])*$/ }" maxlength="15" v-model = "form.tel"class="form-control-cm" :placeholder="$t('form.tel')">
                                                            </div>
                                                            <span class="error" v-show="errors.has('tel')">{{ errors.first('tel') }}</span>
                                                        </div>
                                                        <div class="input-group-cm">
                                                            <div class="row-input flexbox">
                                                                <label class="lbl-name">郵便番号</label>
                                                                <input name="postal_code" type="text" v-validate="'postal_code: true'" maxlength="8" v-mask="'###-####'" v-model = "form.postal_code" class="form-control-cm" :placeholder="$t('form.postal_code') ">
                                                            </div>
                                                            <span class="error" v-show="errors.has('postal_code')"> {{ errors.first('postal_code') }}</span>
                                                        </div>
                                                        <div class="input-group-cm">
                                                            <div class="row-input flexbox">
                                                                <label class="lbl-name"></label>
                                                                <button type="button" v-on:click="addressFromZipcode" class="btn-cm-get cm-color-brick" v-bind:disabled ="waitGetAddressFromZipCode"><?php echo Yii::t('new-common', '郵便番号から住所を検索') ?></button>
                                                            </div>
                                                        </div>
                                                        <div class="input-group-cm">
                                                            <div class="row-input flexbox">
                                                                <label class="lbl-name"></label>
                                                                <div class="wrap-select">
                                                                    <select class="select-input" name="prefecture" id="" v-model = "form.prefecture" onChange="this.style.color=this.selectedIndex>0?'#000':''">
                                                                        <option value="" ><?php echo Yii::t('new-common', '都道府県を選んでください') ?></option>
                                                                        <option :value="item.id" v-for="item in prefecture_display">{{item.name}}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <span class="error" v-show="errors.has('prefecture')">{{ errors.first('prefecture') }}</span>
                                                        </div>
                                                        <div class="input-group-cm">
                                                            <div class="row-input flexbox">
                                                                <label class="lbl-name">市区町村</label>
                                                                <input name="addr01" type="text" maxlength="200" v-model = "form.addr01" class="form-control-cm" :placeholder="$t('form.addr01')">
                                                            </div>
                                                            <span class="error" v-show="errors.has('addr01')">{{ errors.first('addr01') }}</span>
                                                        </div>
                                                        <div class="input-group-cm">
                                                            <div class="row-input flexbox">
                                                                <label class="lbl-name">生年月日</label>
                                                                <input class="form-control-cm" type="text" v-validate="'date_format:YYYY-MM-DD'" v-mask="'####-##-##'"  maxlength="10" v-model="form.birth" name="birth" :placeholder="$t('form.birth')">
                                                            </div>
                                                            <span class="error" v-show="errors.has('birth')">{{ errors.first('birth') }}</span>
                                                        </div>


                                                        <div class="input-group-cm input-group-cm-sl flexbox">
                                                            <div class="row-input flexbox">
                                                                <label class="lbl-name"></label>
                                                                <div class="wrap-select">
                                                                    <?php echo CHtml::dropDownList('knowus_source', null, MasterValues::listItemByCode('source'), array("empty"=>"当店をお知りになったきっかけを教えて下さい",'class' => 'sl-common select-input', 'v-validate' => "'required'",'v-model'=>'form.knowus_source', 'onChange' => "this.style.color=this.selectedIndex>0?'#000':''"));?>
                                                                </div>
                                                            </div>
                                                            <span class="error" v-if="errors.has('knowus_source')">{{ errors.first('knowus_source') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-term-of-use">
                                                        <div class="box-term-of-use">
                                                            <label class="flexbox">
                                                                <input name="agreement_condition" v-validate="'required'" v-model = "form.agreement_condition" value="" type="checkbox">
                                                                <span class="confirm-text flexbox align-items-center">
                                                                    <span class="agreement-condition"><a  v-on:click.prevent="showTerm"><?php echo Yii::t('new-common', '利用規約') ?></a></span><?php echo Yii::t('new-common', 'の取扱について同意する') ?>
                                                                </span>
                                                            </label>
                                                            <span class="error" v-if="errors.has('agreement_condition')">{{ errors.first('agreement_condition') }}</span>
                                                        </div>
                                                        <div class="box-term-of-use">
                                                            <label class="flexbox">
                                                                <input name="mail_maga" v-model = "form.mail_maga"  value="" type="checkbox" >
                                                                <span class="confirm-text flexbox align-items-center">
                                                                    <span class="agreement-condition"><?php echo Yii::t('new-common', 'メールマガジンに登録する') ?></span>
                                                                </span>
                                                            </label>
                                                            <span class="error" v-if="errors.has('mail_maga')">{{ errors.first('mail_maga') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="group-btn-cm flexbox">
                                                        <div class="wrap-btn-cm">
                                                            <button type="submit" v-on:click="registerMember" class="btn-cm cm-color-pink" v-bind:disabled ="waitRegisterMember"><?php echo Yii::t('new-common', '登録内容を確認する') ?></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!--end cm-user-->

                                    </div><!--end wrap-cm-user-->
                                </div><!--end right-column-->
                            </div><!--end wrap-boths-column-->
                        </div><!--end left-column-content-->
                        <div class="alert-overlay" v-bind:class="{ active: isActive}">
                            <div class="cm-user cm-user-login cm-term">
                                <div class="box-cm-user">
                                    <div v-html="__MESSAGES.agreement"></div>
                                    <div class="group-btn-cm group-two-btn-cm flexbox">
                                        <div class="wrap-btn-cm">
                                            <button type="button" class="btn-cm cm-color-grey" v-on:click.prevent="isNotAgreeTerm"><?php echo Yii::t('new-common', '同意しない') ?></button>
                                        </div>
                                        <div class="wrap-btn-cm">
                                            <button type="button" class="btn-cm cm-color-pink"  v-on:click.prevent="isAgreeTerm"><?php echo Yii::t('new-common', '同意して新規会員登録をする') ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end cm-user-->
                        </div>
                    </div><!--end wrap-column-content-->
                </div>
            </div><!--end content-v2-->

        </div><!--end wrap-highend-v2-->
    </div><!-- end container -->
</template>
<template id="mainView" >
    <div>
        <router-view></router-view>
    </div>
</template>
<script>
        var __ATTRS = <?php echo json_encode(array(
            'name' => Yii::t('member', 'First Name'),
            'name_last' => Yii::t('member', 'Last Name'),
            'postal_code' => Yii::t('member', 'Postal Code'),
            'tel' => Yii::t('member', 'Telephone Number'),
            'birth' => Yii::t('member', 'Birthday  (YYYY-MM-DD)'),
            'addr01' => Yii::t('member', 'Address 01'),
            'email' => Yii::t('member', 'Email'),
            'password' => Yii::t('member', 'Password'),
            'confirm_password' => Yii::t('member', 'Confirm Password'),
            'sex' => Yii::t('member', 'Sex'),
            'kana' => Yii::t('member', 'First Kana'),
            'kana_last' => Yii::t('member', 'Last Kana'),
            'knowus_source' => Yii::t('member', 'Knowus Source'),
            'agreement_condition' => Yii::t('member', 'Agreement Condition'),
            'mail_maga' => Yii::t('member', 'Mail Maga'),
            'prefecture'=>  Yii::t('member', 'Prefecture'),
        ))?>;
        var __MESSAGES = <?php echo json_encode(array(
            'agreement'=> Yii::t('new-common', 'Member Register Terms'),
            'token'=> Yii::t('member', 'Token not exist'),
        ))?>;
    </script>
<!--<script src="--><?//=WP_HOME?><!--/js/vue/require.js"></script>-->
<!--<script src="--><?//=WP_HOME?><!--/js/vue/common-register.js"></script>-->
<?php get_vue_js('common-register'); ?>
<script>
    $(document).ready(function () {
        //Click outside close agreement popup
        $(document).on('click', function(e){
            if(!$(e.target).closest('.agreement-condition a, .cm-term').length) {
                $('.alert-overlay').removeClass('active');
                $('html').removeClass('fixed-overflow');
            }
        })
    })
</script>
<?php get_footer('new-kimono'); ?>


