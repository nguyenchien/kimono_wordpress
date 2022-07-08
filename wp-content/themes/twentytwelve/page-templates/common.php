<?php
/**
 * Template Name: New Common
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
wp_register_style('', get_template_directory_uri() . '/css/new-common.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-style');
wp_register_style('new-common-manage-style', get_template_directory_uri() . '/css/new-common-manage.css?ver=123', array('twentytwelve-style'));
wp_enqueue_style('new-common-manage-style');
wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js');
//wp_enqueue_script('new-common-script', get_template_directory_uri() . '/js/new-common.js');
$baseUrl = Yii::app()->baseUrl;
global $post;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$postName = $post->post_name;
// check login, if member did't logged redirect to login page
if (Yii::app()->member_user->isGuest) {
    $loginUrl = home_url().'/common/login';
    wp_redirect($loginUrl);
}

?>
<div id="app">
    <div class="cm-loading">
        <span class="loader"></span>
    </div>
</div>
<template id="profile" style="display: none;">
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-new-kimono">', '</div>');
    }
    ?>
    <div class="wrap-highend-v2 ">
        <div class="wrap-content-v2">
            <div class="container-box rendered">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <?php if(!$isSmartPhone): ?>
                            <div class="left-column left-column-new-kimono">
                                <?php include("common-sidebar.php"); ?>
                            </div><!--end left-column-->
                            <?php endif;?>
                            <div class="right-column right-column-list right-column-list-new-kimono">
                                    <div class="wrap-cm-user">
<!--                                        <h2 class="title-cm-user title-toggle-click flexbox align-items-center" data-show-content=".common-sidebar">-->
<!--                                            <span class="icon-common icon-formal-cm-user-info flexbox"></span>-->
<!--                                            <span class="title-name-cm-user">--><?php //echo Yii::t('new-common', 'マイページ') ?><!--</span>-->
<!--                                        </h2>-->
                                        <div class="main-page-title flexbox">
                                            <span class="icon">
                                                <img src="<?php echo WP_HOME;?>/images/icon-user.svg">
                                            </span>
                                            <span class="lg-txt">My Page</span>
                                            <span class="sm-txt">マイページ</span>
                                        </div>
	                                    <?php if($isSmartPhone): ?>
                                        <div class="wrap-show-content sp common-sidebar" style="display: block;">
		                                    <?php include("common-sidebar.php"); ?>
                                        </div>
	                                    <?php endif;?>
                                        <div class="wrap-user-content">
                                            <div class="box-user-content member-info" id="member-info">
                                                <h2 class="title-cm-user">
                                                    <?php echo Yii::t('new-common', '会員登録情報') ?>
                                                </h2>
                                                <basicinfo></basicinfo>
                                                <changeemail></changeemail>
                                                <changepassword></changepassword>
                                            </div>
                                            <addresslist></addresslist>
                                            <cancelnewsletter></cancelnewsletter>
                                        </div>
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
<!-- address child -->
<script type="text/x-template" id="address-child">
    <div v-if="form.is_edit" class="box-info-item editing">
        <h3 class="user-name-info"><?php echo Yii::t('new-common', 'ご登録の住所') ?></h3>
        <form class="form-cm-user">
            <div class="group-cm-user">
                <div class="input-group-cm">
                    <input type="text"  v-model="form.postal_code" v-validate="{ required: true, postal_code: true}"  v-mask="'###-####'" name="postal_code" class="form-control-cm" :placeholder="$t('form.postal_code')">
                    <span class="error" v-show="errors.has('postal_code')">{{ errors.first('postal_code') }}</span>
                </div>
                <div class="input-group-cm">
                    <input type="text"  v-model="form.address" maxlength="200" name="address" v-validate="'required'" class="form-control-cm" :placeholder="$t('form.address')">
                    <span class="error" v-show="errors.has('address')">{{ errors.first('address')}}</span>
                </div>
                <div class="input-group-cm">
                    <input type="tel" v-model="form.tel_01" maxlength="15" v-validate="{ required: true, min: 8, regex: /^([0-9\(\).\-\+])*$/ }"  name="tel_01"  class="form-control-cm" :placeholder="$t('form.tel_01')">
                    <span class="error" v-show="errors.has('tel_01')">{{ errors.first('tel_01') }}</span>
                </div>
            </div>
        </form>
        <div class="wrap-btn">
            <button @click="saveAddress" :disabled="form.disabled" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', '更新') ?></button>
            <button @click="cancelAddress" class="btn-cm cm-color-grey cancel-btn"><?php echo Yii::t('new-common', 'キャンセル') ?></button>
        </div>
    </div>
    <div v-else-if="form.address_id" class="box-info-item">
        <h3 class="user-name-info"><?php echo Yii::t('new-common', 'ご登録の住所') ?></h3>
        <ul class="list-info-content">
            <li class="user-address">{{form.postal_code|postal_code}}</br>{{form.address}}</li>
            <li class="user-phone">{{form.tel_01}}</li>
        </ul>
        <div class="wrap-btn">
            <button @click="editAddress" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', '変更') ?></button>
            <button @click="removeAddress($event, form.address_id)" class="btn-cm cm-color-grey"><?php echo Yii::t('new-common', '削除') ?></button>
        </div>
    </div>
</script>
<script type="text/x-template" id="member-address">
    <div class="box-user-content address-box" id="change-address">
        <h2 class="title-cm-user">
            <?php if($isSmartPhone) : ?>
                <?php echo Yii::t('new-common', 'お届け先の追加・変更') ?>
            <?php else: ?>
                <?php echo Yii::t('new-common', 'お届け先の変更・追加') ?>
            <?php endif; ?>
        </h2>
        <addresschild v-for="(item, index) in addressList" :key="index" :is_edit="item.is_edit" :postal_code="item.data.postal_code" :address="item.data.address" :tel_01="item.data.tel_01" :address_id="item.data.address_id"></addresschild>
        <div v-if="mounted" class="box-info-item new-address">
            <div class="wrap-link-btn">
                <a @click="addNewAddress" class="btn-cm cm-color-pink add-address link" href="#"><?php echo Yii::t('new-common', 'お届け先を追加する') ?></a>
            </div>
        </div>
    </div>
</script>
<script type="text/x-template" id="cancel-newsletter">
    <div class="box-user-content" id="cancel-news">
        <h2 class="title-cm-user">
            <?php echo Yii::t('new-common', 'メールマガジンの配信設定') ?>
        </h2>
        <div class="wrap-cancel-news flexbox justify-content-center">
            <label class="wrap-cb-radio">
                <input type="radio" name="cancel-news" value="2" v-model="selectedCancel" @change="onChangeAcceptNews($event)">受け取る
                <span class="checkmark"></span>
            </label>
            <label class="wrap-cb-radio">
                <input type="radio" name="cancel-news" value="1" v-model="selectedCancel" @change="onChangeAcceptNews($event)">受け取らない
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
</script>
<!-- basic info -->
<script type="text/x-template"  id="basic-info">
    <div v-if="!is_edit" class="box-info-item">
        <h3 class="user-name-info"><?php echo Yii::t('new-common', '基本情報') ?></h3>
        <ul class="list-info-content">
            <li v-if="member.name" class="user-name">{{member.name}} {{member.name_last}} <span v-if="member.kana || member.kana_last">({{member.kana}} {{member.kana_last}})</span></li>
            <li v-if="member.sex_label" class="user-gender">{{member.sex_label}}</li>
            <li v-if="member.birth" class="user-birthday">{{member.birth|date('YYYY年MM月DD日')}}</li>
            <li v-if="member.postal_code" class="user-address">{{member.postal_code|postal_code}}</li>
            <li v-if="member.postal_code" class="user-address">{{member.prefecture_label}}</li>
            <li v-if="member.postal_code" class="user-address">{{member.addr01}}</li>
            <li v-if="member.tel" class="user-phone">{{member.tel}}</li>
        </ul>
        <div class="wrap-btn">
            <button @click="handleClickEdit" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', '変更') ?></button>
        </div>
    </div>
    <div v-else class="box-info-item editing">
        <form class="form-cm-user">
            <span class="error" v-if="errorMessage">{{errorMessage}}</span>
            <div class="group-cm-user">
                <div class="input-group-cm two-row flexbox">
                    <label class="lbl-name">氏名</label>
                    <div class="row-input flexbox">
                        <div class="input-row flexbox">
                            <input type="text" v-model="member.name" maxlength="100" v-validate="'required'" name="name" class="form-control-cm" :placeholder="$t('form.name')">
                            <span class="error" v-show="errors.has('name')">{{ errors.first('name') }}</span>
                        </div>
                        <div class="input-row flexbox required-two-row">
                            <input type="text" v-model="member.name_last" maxlength="100" v-validate="'required'" name="name_last" class="form-control-cm" :placeholder="$t('form.name_last')">
                            <span class="error" v-show="errors.has('name_last')">{{ errors.first('name_last') }}</span>
                        </div>
                    </div>
                </div>
                <div class="input-group-cm two-row flexbox">
                    <label class="lbl-name">フリガナ</label>
                    <div class="row-input flexbox">
                        <div class="input-row flexbox">
                            <input type="text" v-model="member.kana" maxlength="100" name="kana" class="form-control-cm" :placeholder="$t('form.kana')">
                            <span class="error" v-show="errors.has('kana')">{{ errors.first('kana')}}</span>
                        </div>
                        <div class="input-row flexbox">
                            <input type="text" v-model="member.kana_last" maxlength="100" name="kana_last" class="form-control-cm" :placeholder="$t('form.kana_last')">
                            <span class="error" v-show="errors.has('kana_last')">{{ errors.first('kana_last')}}</span>
                        </div>
                    </div>
                </div>
                <div class="input-group-cm gender-input">
                    <template class="radio" v-for="(value, key) in genders.data" >
                        <label class="wrap-radio">
                            <input name="member" type="radio"  @change="changeGender" v-model = "member.sex"  :value="value.id">{{value.name}}
                            <span class="checkmark"></span>
                        </label>
                    </template>
                    <span class="error" v-show="errors.has('sex')">{{errors.first('sex') }}</span>
                </div>
                <div class="input-group-cm">
                    <div class="row-input flexbox">
                        <label class="lbl-name">生年月日</label>
                        <input class="form-control-cm" v-validate="'date_format:YYYY-MM-DD'" v-mask="'####-##-##'" v-model="member.birth" name="birth" :placeholder="$t('form.birth')+'(YYYY-MM-DD)'"></input>
                    </div>
                    <span class="error" v-show="errors.has('birth')">{{ errors.first('birth') }}</span>
                </div>
                <div class="input-group-cm">
                    <div class="row-input flexbox">
                        <label class="lbl-name">郵便番号</label>
                        <input type="text"  v-model="member.postal_code"  name="postal_code" v-mask="'###-####'" class="form-control-cm" :placeholder="$t('form.postal_code')">
                    </div>
                    <span class="error" v-show="errors.has('postal_code')"> {{ errors.first('postal_code') }}</span>
                </div>
                <div class="input-group-cm two-row flexbox">
                    <label class="lbl-name">住所</label>
                    <div class="row-input flexbox">
                        <div class="input-row flexbox">
                            <input type="text" v-model="member.addr01" maxlength="200" name="addr01" class="form-control-cm" :placeholder="$t('form.addr01')">
                            <span class="error" v-show="errors.has('addr01')">{{ errors.first('addr01') }}</span>
                        </div>
                        <div class="input-row flexbox">
                            <div class="wrap-select">
                                <select name="prefecture" onChange="this.style.color=this.selectedIndex>0?'#000':''" @change="changePrefecture" v-model="member.prefecture" >
                                    <option value=""><?php echo Yii::t('new-common','都道府県を選んでください') ?></option>
                                    <option v-for="item in dataPrefectures" :value="item.id" >{{item.name}}</option>
                                </select>
                            </div>
                            <span class="error" v-show="errors.has('prefecture')">{{ errors.first('prefecture') }}</span>
                        </div>
                    </div>
                </div>
                <div class="input-group-cm">
                    <div class="row-input flexbox">
                        <label class="lbl-name">電話番号</label>
                        <input type="tel" v-model="member.tel"  name="tel" maxlength="18" v-validate="{ required: false, min: 8, regex: /^([0-9\(\).\-\+])*$/ }" class="form-control-cm" :placeholder="$t('form.tel')">
                    </div>
                    <span class="error" v-show="errors.has('tel')">{{ errors.first('tel') }}</span>
                </div>
            </div>
        </form>
        <div class="wrap-btn">
            <button @click="handleClickSave" :disabled="disabled" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', '更新') ?></button>
        </div>
    </div>
</script>
<!-- change-email -->
<script type="text/x-template" id="change-email">
    <div v-if="!is_edit_email" class="box-info-item">
        <h3 class="user-name-info"><?php echo Yii::t('new-common', 'メールアドレス') ?></h3>
        <ul class="list-info-content">
            <li>{{member.old_email}}</li>
        </ul>
        <div class="wrap-btn">
            <button @click="editEmail" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', '変更') ?></button>
        </div>
    </div>
    <div v-else class="box-info-item editing">
        <h3 class="user-name-info"><?php echo Yii::t('new-common', 'メールアドレス') ?></h3>
        <form class="form-cm-user">
            <span class="error" v-if="errorMessage">{{errorMessage}}</span>
            <div class="group-cm-user">
                <div class="input-group-cm two-row flexbox">
                    <div class="row-input flexbox">
                        <div class="input-row flexbox">
                            <input type="text" v-model="member.old_email"  maxlength="200" disabled name="old_email" v-validate="'required|email'" class="form-control-cm" :placeholder="$t('form.old_email')">
                        </div>
                        <div class="input-row flexbox">
                            <input type="text" v-model="member.email_confirm" maxlength="200" name="email_confirm" v-validate="'required|email'" class="form-control-cm" :placeholder="$t('form.email_confirm')">
                            <span class="error" v-show="errors.has('email_confirm')">{{ errors.first('email_confirm') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="wrap-btn">
            <button @click="saveEmail" :disabled="disabled" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', '更新') ?></button>
        </div>
    </div>
</script>
    <!-- change-password -->
<script type="text/x-template" id="change-password">
    <div v-if="!is_edit" class="box-info-item editing">
        <h3 class="user-name-info"><?php echo Yii::t('new-common', 'パスワード') ?></h3>
        <ul class="list-info-content">
            <li class="password">●●●●●●●●</li>
            <li style="color: #901C32"><?php echo Yii::t('new-common', 'セキュリティの為パスワードは非表示となっております。') ?></li>
        </ul>
        <div class="wrap-btn">
            <button @click="editPassword" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', '変更') ?></button>
        </div>
    </div>
    <div v-else class="box-info-item editing">
        <h3 class="user-name-info"><?php echo Yii::t('new-common', 'パスワード') ?></h3>
        <form class="form-cm-user">
            <span class="error" v-if="errorMessage">{{errorMessage}}</span>
            <div class="group-cm-user">
                <div class="input-group-cm two-row flexbox">
                    <div class="row-input flexbox">
                        <div class="input-row flexbox">
                            <input type="password" v-model="member.old_password" maxlength="64" name="old_password" v-validate="'required|min:8'" class="form-control-cm" :placeholder="$t('form.old_password')">
                            <span class="error" v-show="errors.has('old_password')">{{ errors.first('old_password') }}</span>
                        </div>
                        <div class="input-row flexbox">
                            <input type="password" v-model="member.new_password" maxlength="64" name="new_password" v-validate="'required|min:8'" class="form-control-cm" :placeholder="$t('form.new_password')">
                            <span class="error" v-show="errors.has('new_password')">{{ errors.first('new_password') }}</span>
                        </div>
                        <div class="input-row flexbox">
                            <input type="password" v-model="member.confirm_password" maxlength="64" name="confirm_password"  v-validate="'required|confirmed:new_password|min:8'" class="form-control-cm" :placeholder="$t('form.confirm_password')">
                            <span class="error" v-show="errors.has('confirm_password')">{{ errors.first('confirm_password') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="wrap-btn">
            <button @click="changePassword" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', '更新') ?></button>
        </div>
    </div>
</script>
<script>
        var __MESSAGES = {
            delete: "<?php echo Yii::t('common.vue', 'Are you sure to delete this address');?>",
            save: "<?php echo Yii::t('common.vue', 'Are you sure to save');?>"
        };
        var __ATTRS = <?php echo json_encode(array(
	        'name' => Yii::t('member', 'First Name'),
	        'name_last' => Yii::t('member', 'Last Name'),
	        'postal_code' => Yii::t('member', 'Postal Code'),
	        'tel' => Yii::t('member', 'Telephone Number'),
	        'tel_01' => Yii::t('member', 'Telephone Number'),
	        'birth' => Yii::t('member', 'Birthday'),
	        'addr01' => Yii::t('member', 'Address 01'),
	        'address' => Yii::t('member', 'Address 01'),
	        'email' => Yii::t('member', 'Email'),
	        'old_email' => Yii::t('member', 'Old email'),
	        'email_confirm' => Yii::t('member', 'Confirm email'),
	        'password' => Yii::t('member', 'Password'),
	        'old_password' => Yii::t('member', 'Old password'),
	        'new_password' => Yii::t('member', 'New password'),
	        'confirm_password' => Yii::t('member', 'Confirm Password'),
	        'sex' => Yii::t('member', 'Sex'),
	        'kana' => Yii::t('member', 'First Kana'),
	        'kana_last' => Yii::t('member', 'Last Kana'),
        ))?>;
    </script>
<!--<style>.wrap-user-content{display: block !important;wrap-link-btn}</style>-->
<!--<script src="--><?//=WP_HOME?><!--/js/vue/require.js"></script>-->
<!--<script src="--><?//=WP_HOME?><!--/js/vue/common.js"></script>-->
<?php get_vue_js('common'); ?>
<?php get_footer('new-kimono'); ?>
