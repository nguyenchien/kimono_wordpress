<?php
/**
 * Template Name: New Common Term Of Use
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
wp_register_style('new-common-term-of-use-style', get_template_directory_uri() . '/css/new-common-term-of-use.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-term-of-use-style');
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
                                    <div class="cm-user cm-user-login">
                                        <div class="box-cm-user">
                                            <div class="header-term-of-use">
                                                <h2 class="title-term-of-use"><?php echo Yii::t('new-common', 'ご利用規約') ?></h2>
                                                <p class="text-term-of-use"><?php echo Yii::t('new-common', '【重要】新規利用登録をされる前に、下記ご利用規約をよくお読みください。') ?></p>
                                                <p class="text-term-of-use last"><?php echo Yii::t('new-common', '【重要】新規利用登録をされる前に、下記ご利用規約をよくお読みください。') ?></p>
                                            </div>
                                            <div class="content-term-of-use">
                                                <div class="box-ct-term-of-use">
                                                    <h3 class="sub-title-ct"><?php echo Yii::t('new-common', '第1条 (会員)') ?></h3>
                                                    <div class="group-term">
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '1. 「会員」とは、当社が定める手続に従い本規約に同意の上、入会の申し込みを行う個人をいいます。') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '2. 「会員情報」とは、会員が当社に開示した会員の属性に関する情報および会員の取引に関する履歴等の情報をいいます。') ?>
                                                        </p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '3. 本規約は、すべての会員に適用され、登録手続時および登録後にお守りいただく規約です。') ?></p>
                                                    </div>
                                                    <h3 class="sub-title-ct"><?php echo Yii::t('new-common', '第2条 (登録)') ?></h3>
                                                    <div class="group-term">
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '1. 会員資格') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '本規約に同意の上、所定の入会申込みをされたお客様は、所定の登録手続完了後に会員としての資格を有します。会員登録手続は、会員となるご本人が行ってください。代理による登録は一切認められません。なお、過去に会員資格が取り消された方やその他当社が相応しくないと判断した方からの会員申込はお') ?></p>
                                                    </div>
                                                    <div class="group-term">
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '2. 会員情報の入力') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '会員登録手続の際には、入力上の注意をよく読み、所定の入力フォームに必要事項を正確に入力してください。会員情報の登録において、特殊記号・旧漢字・ローマ数字などはご使用になれません。これらの文字が登録された場合は当社にて変更致します。') ?></p>
                                                    </div>
                                                    <div class="group-term">
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '3. パスワードの管理') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '(1)パスワードは会員本人のみが利用できるものとし、第三者に譲渡・貸与できないものとします。') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '(2)パスワードは、他人に知られることがないよう定期的に変更する等、会員本人が責任をもって管理してください。') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '(3)パスワードを用いて当社に対して行われた意思表示は、会員本人の意思表示とみなし、そのために生じる支払等はすべて会員の責任となります。') ?></p>
                                                    </div>
                                                    <h3 class="sub-title-ct"><?php echo Yii::t('new-common', '第3条 (変更)') ?></h3>
                                                    <div class="group-term">
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '1. 会員は、氏名、住所など当社に届け出た事項に変更があった場合には、速やかに当社に連絡するものとします。') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '2. 変更登録がなされなかったことにより生じた損害について、当社は一切責任を負いません。また、変更登録がなされた場合でも、変更登録前にすでに手続がなされた取引は、変更登録前の情報に基づいて行われますのでご注意ください。') ?></p>
                                                    </div>
                                                    <h3 class="sub-title-ct"><?php echo Yii::t('new-common', '第4条 (退会)') ?></h3>
                                                    <div class="group-term">
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '会員が退会を希望する場合には、会員本人が退会手続きを行ってください。所定の退会手続の終了後に、退会となります。') ?></p>
                                                    </div>
                                                    <h3 class="sub-title-ct"><?php echo Yii::t('new-common', '第5条 (会員資格の喪失及び賠償義務)') ?></h3>
                                                    <div class="group-term">
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '1. 会員が、会員資格取得申込の際に虚偽の申告をしたとき、通信販売による代金支払債務を怠ったとき、その他当社が会員として不適当と認める事由があるときは、当社は、会員資格を取り消すことができることとします。') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '2. 会員が、以下の各号に定める行為をしたときは、これにより当社が被った損害を賠償する責任を負います。') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '(1)会員番号、パスワードを不正に使用すること') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '(2)当ホームページにアクセスして情報を改ざんしたり、当ホームページに有害なコンピュータープログラムを送信するなどして、当社の営業を妨害すること') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '(3)当社が扱う商品の知的所有権を侵害する行為をすること') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '(4)その他、この利用規約に反する行為をすること') ?></p>
                                                    </div>
                                                    <h3 class="sub-title-ct"><?php echo Yii::t('new-common', '第6条 (会員情報の取扱い)') ?></h3>
                                                    <div class="group-term">
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '1. 当社は、原則として会員情報を会員の事前の同意なく第三者に対して開示することはありません。ただし、次の各号の場合には、会員の事前の同意なく、当社は会員情報その他のお客様情報を開示できるものとします。') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '(1)法令に基づき開示を求められた場合') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '(2)当社の権利、利益、名誉等を保護するために必要であると当社が判断した場合') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '2. 会員情報につきましては、当社の「個人情報保護への取組み」に従い、当社が管理します。当社は、会員情報を、会員へのサービス提供、サービス内容の向上、サービスの利用促進、およびサービスの健全かつ円滑な運営の確保を図る目的のために、当社おいて利用することができるものとします。') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '3. 当社は、会員に対して、メールマガジンその他の方法による情報提供(広告を含みます)を行うことができるものとします。会員が情報提供を希望しない場合は、当社所定の方法に従い、その旨を通知して頂ければ、情報提供を停止します。ただし、本サービス運営に必要な情報提供につきましては、会員の希望により停止をすることはできません。') ?></p>
                                                    </div>
                                                    <h3 class="sub-title-ct"><?php echo Yii::t('new-common', '第7条 (禁止事項))') ?></h3>
                                                    <div class="group-term">
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '本サービスの利用に際して、会員に対し次の各号の行為を行うことを禁止します。') ?></p>
                                                    </div>
                                                    <div class="group-term">
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '2. 当社、およびその他の第三者の権利、利益、名誉等を損ねること') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '3. 青少年の心身に悪影響を及ぼす恐れがある行為、その他公序良俗に反する行為を行うこと') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '4. 他の利用者その他の第三者に迷惑となる行為や不快感を抱かせる行為を行うこと') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '5. 虚偽の情報を入力すること') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '6. 有害なコンピュータープログラム、メール等を送信または書き込むこと') ?></p>
                                                        <p class="text-ct-term-of-use"><?php echo Yii::t('new-common', '7. 当社のサーバーその他のコンピューターに不正にアクセスす') ?></p>
                                                    </div>






                                                </div>
                                            </div>
                                            <div class="group-btn-cm group-two-btn-cm flexbox">
                                                <div class="wrap-btn-cm">
                                                    <button type="button" class="btn-cm cm-color-grey"><?php echo Yii::t('new-common', '同意しない') ?></button>
                                                </div>
                                                <div class="wrap-btn-cm">
                                                    <button type="button" class="btn-cm cm-color-pink"><?php echo Yii::t('new-common', '同意して新規会員登録をする') ?></button>
                                                </div>
                                            </div>
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
<?php get_footer('new-kimono'); ?>


