<?php
/**
 * Template Name: New Takuhai Howto V2
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

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;

if($isSmartPhone){
    wp_register_style('new-formal-cate-list-v2-sp-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-sp-style');
    wp_register_style('new-takuhai-howto-v2-sp-style', get_template_directory_uri() . '/css/new-takuhai-howto-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-takuhai-howto-v2-sp-style');
}else{
    wp_register_style('new-formal-cate-list-v2-pc-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-pc-style');
    wp_register_style('new-takuhai-howto-v2-pc-style', get_template_directory_uri() . '/css/new-takuhai-howto-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-takuhai-howto-v2-pc-style');
}
if($isSmartPhone){
    wp_register_style('new-formal-popup-preview-sp', get_template_directory_uri() . '/css/new-formal-popup-preview-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-sp');
}else{
    wp_register_style('new-formal-popup-preview-pc', get_template_directory_uri() . '/css/new-formal-popup-preview-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-pc');
}
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
get_header('new-takuhai');

?>
<?php if($isSmartPhone):?>
    <div class="wrap-overlay-filter">
        <div class="wrap-relative-toggle">
            <div class="wrap-toggle-left-sidebar toggle-filter-list-sidebar">
                <div class="box-filter-list-sidebar">
                    <div class="toggle-filter-sidebar sp">
                        <?php echo do_shortcode('[FormalSidebarFilter]'); ?>
                    </div>
                </div>
            </div>
            <div class="close-sidebar sp">
                <span class="closed-filter"></span>
            </div>
        </div>
    </div>
<?php endif;?>
    <div class="container-box clearfix">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
        }
        ?>

        <?php if($isSmartPhone) : ?>
            <?php if(get_field('title_list_cate_sp')): ?>
                <h1 class="title-name-formal">
                    <?php the_field('title_list_cate_sp'); ?>
                </h1>
            <?php endif; ?>
        <?php else: ?>
            <?php if(get_field('title_list_cate_pc')): ?>
                <h1 class="title-name-formal">
                    <?php the_field('title_list_cate_pc'); ?>
                </h1>
            <?php endif; ?>
        <?php endif; ?>

        <div class="main-baner-top-v2">
            <?php if($isSmartPhone) : ?>
                <div class="banner-top-v2">
                    <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-new-takuhai-howto-v2-sp.jpg">
                </div>
            <?php else: ?>
                <div class="banner-top-v2">
                    <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-new-takuhai-howto-v2-pc.jpg">
                </div>
            <?php endif; ?>

        </div><!--end main-baner-top-v2-->

        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column hidden-sidebar">
                                    <?php
                                    while ( have_posts() ) : the_post();
                                        the_content();
                                    endwhile;
                                    ?>
                                </div>

                                <div class="right-column right-column-list right-cate-list-v2 right-cate-tahuhai-howto">
                                    <div class="padding-v2">
                                        <?php if(get_field('search_scene')): ?>
                                            <div class="wrap-search-scene-v2 wrap-search-scene-v2-takuhai-howto">
                                                <?php the_field('search_scene'); ?>
                                            </div >
                                        <?php endif; ?>
                                        <div class="wrap-slider-v2 wrap-slider-new-takuhai-howto-v2">
                                            <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">レンタルセット内容</h2>
                                                    <span class="des-sm-title">Rental Set</span>
                                                </div>
                                            </div>
                                            <div class="wrap-content-slider-new-takuhai-howto">
                                                <p class="sub-des-title-takuhai">着付けに必要なものをセットして、専用のバッグにお入れしてお届けいたします。</p>
                                                <p class="other-sub-des-title-takuhai color-line-bottom">体型を補正するタオル５枚お客樣にてご用意願います。</p>
                                            </div>
                                            <div class="wrap-set-icon-option-takuhai">
                                                <p class="des-set-icon-option-takuhai">例：留袖の場合のセット内容</p>
                                                <div class="set-icon-option-takuhai">
                                                    <?php if($isSmartPhone) : ?>
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/set-option-takuhai-howto-sp.svg" alt="">
                                                    <?php else: ?>
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/set-option-takuhai-howto.svg" alt="">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div><!--end wrap-slider-new-takuhai-howto-v2 -->
                                        <div class="wrap-howto-reserve wrap-howto-reserve-takuhai-howto-v2">
                                            <div class="wrap-title">
                                                <h2 class="title-howto-reserve">レンタルご予約方法</h2>
                                                <div class="wrap-line-v2">
                                                    <div class="line-v2 line-v2-single"></div>
                                                </div><!--end wrap-line-v2-->
                                            </div>
                                            <div class="wrap-content-howto-reserve">
                                                <div class="box-howto-reserve">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-takuhai-howto.svg" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-takuhai-howto wrap-r-icon-irotomesode">
                                                                <p class="color-takuhai">ご来店でご予約</p>
                                                            </div>
                                                        </div><!--end group-icon-->
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-takuhai-howto.svg" alt="">
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-takuhai-howto wrap-r-icon-irotomesode">
                                                                    <p class="color-takuhai">ご来店でご予約</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
                                                                <p>きものレンタルwargo フォーマル着物取扱店舗では下見および<br/>ご来店でのご予約も承っております。</p>
                                                                <p><strong>下見（30分まで無料）</strong>をご予約いただき、お着物を選んでいただいた上で、配送のご予約をいただくことが可能です。店頭での現金払い、クレジットカード払いも選択していただけます。</p>
                                                            </div>
                                                        </div>
                                                        <div class="wrap-circle-link bg-shop wrap-circle-link-homongi wrap-circle-link-irotomesode flexbox justify-content-center">
                                                            <a href="<?php echo WP_HOME ;?>/howto" class="circle-link flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">来店レンタルの<br>詳しい流れは<br>コチラ</p>
                                                                <span class="arrow-r"></span>
                                                            </a>
                                                        </div>
                                                    </div><!--end group-all-icon-text-->

                                                    <div class="wrap-btn-v2 flexbox">
                                                        <a href="#" class="btn-review">
                                                            <div class="btn-v2 btn-v2-homongi btn-v2-takuhai-howto formal-preview-popup-handle">
                                                                <div class="btn-v2-reserve">
                                                                    <div class="pattern"></div>
                                                                    <div class="text">
                                                                        <span class="text-link">来店予約をする</span>
                                                                        <span class="icon-arrow-r-link"></span>
                                                                    </div>
                                                                    <div class="pattern last"></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div><!--end wrap-btn-v2-->

                                                </div><!--end box-howto-reserve-->
                                                <div class="box-howto-reserve box-howto-reserve-takuhai last">
                                                    <div class="wrap-all-group">
                                                        <?php if($isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-takuhai-howto.svg" alt="">
                                                                </div>
                                                                <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-takuhai-howto wrap-r-icon-irotomesode">
                                                                    <p class="color-takuhai">WEBでご予約</p>
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-all-icon-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="group-icon flexbox">
                                                                    <div class="wrap-l-icon">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-takuhai-howto" alt="">
                                                                    </div>
                                                                </div><!--end group-icon-->
                                                            <?php endif; ?>
                                                            <div class="group-text">
                                                                <?php if(!$isSmartPhone) : ?>
                                                                    <div class="wrap-r-icon bg-web wrap-r-icon-homongi wrap-r-icon-irotomesode wrap-r-icon-takuhai-howto">
                                                                        <p class="color-takuhai">WEBでご予約</p>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="para-text">
                                                                    <p>宅配着物レンタルwargoのウェブサイトからお着物を選んでいただき、ご予約をいただくことが可能です。スマートフォン・パソコンか<br>らご予約いただけます。<br/>お申し込みにはクレジットカードが必要です。</p>
                                                                </div>
                                                            </div>
                                                        </div><!--end group-all-icon-text-->
                                                    </div><!---end wrap-all-group-->
                                                    <div class="wrap-flow-delivery wrap-flow-delivery-other mg-70">
                                                        <h2 class="title-flow-delivery title-sub-slug-irotomesode title-sub-slug-takuhai-howto">宅配レンタルの流れ</h2>
                                                        <div class="text-flow-deivery">
                                                            <p>宅配着物レンタルwargoは、必要なものをすべてセットにしてご自宅にお届けいたします。</p>
                                                            <p>ご予約は、ご自宅のパソコンやスマートフォンからはもちろん、</p>
                                                            <p>対応店舗にご来店いただき、着物を下見していただいてからご予約をいただくこともできます。</p>
                                                            <p>余裕の2日前配達や、簡単な返却方法など、着物を手軽にお楽しみいだけるサービスをご用意しています。</p>
                                                        </div>
                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">01</span><var></var>お届け日程</div>
                                                            <div class="des-group-step"><p>お貸し出しは3泊4日で、ご利用日の2日前にお届けいたします。</p></div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">02</span><var></var>お届け日の例</div>
                                                            <div class="des-group-step des-group-step-other"><p>ご利用日が5月10日の場合</p></div>
                                                            <ul class="list-step-num list-step-num-homongi flexbox">
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-takuhai flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">お客様到着日</div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-grey flexbox align-items-center justify-content-center"><span class="sm-num">5/9</span></div>
                                                                    </div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-gold flexbox align-items-center justify-content-center"><span class="sm-num">5/10</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">ご利用日 </div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-yellow-takuhai flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">ご返送日</div>
                                                                </li>
                                                            </ul><!--end list-step-num-->
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow group-step-flow-other last">
                                                            <div class="title-group-step"><span class="step-num">03</span><var></var>レンタルの延長</div>
                                                            <div class="des-group-step">
                                                                <p>お貸し出し期間の延長をご希望の場合は、申し込み時にカレンダーよりご指定ください。</p>
                                                                <p>1日につき1,000円（＋tax）で延長を承ります。</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow group-step-flow-other last">
                                                            <div class="title-group-step"><span class="step-num">04</span><var></var>お届け先の変更</div>
                                                            <div class="des-group-step">
                                                                <p>お届け先を変更されたい場合は、なるだけ早めにメール(<a href="mailto:takuhai@kyotokimono-rental.com" class="link-mailto">takuhai@kyotokimono-rental.com</a>)か、</p>
                                                                <p>お電話0120-42-0505（京都着物レンタルコールセンターへお電話にてお知らせください。</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow group-step-flow-other last">
                                                            <div class="title-group-step"><span class="step-num">05</span><var></var>キャンセル</div>
                                                            <div class="wrap-group-step-5 mg-step-5">
                                                                <p class="sub-text-title-square text-title-square"><var class="text-square">■</var>振袖・袴・七五三のレンタルを含む予約</p>
                                                                <p class="sub-text-title-square">［お届け日］から30日前までのキャンセル：キャンセル料無料</p>
                                                                <p class="sub-text-title-square">［お届け日］から29日以内のキャンセル：ご利用料金の100％</p>
                                                            </div>
                                                            <div class="wrap-group-step-5">
                                                                <p class="text-title-square sub-text-title-square"><var class="text-square">■</var>その他（訪問着、留袖、産着）</p>
                                                                <p class="sub-text-title-square">［お届け日］から30日前までのキャンセル：キャンセル料無料</p>
                                                                <p class="sub-text-title-square">［お届け日］から29日～7日前までのキャンセル：ご利用料金の30％</p>
                                                                <div class="des-bottom-step-5 sub-text-title-square">［お届け日］から6日以内のキャンセル：ご利用料金の100％</div>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="wrap-group-step-payment-method">
                                                            <div class="sub-list-option-takuhai"><span class="text-sub-line">お支払い方法</span></div>
                                                            <div class="sm-text-list-option-takuhai">お支払い方法は、以下の場合でのご利用ができます。</div>
                                                            <div class="group-step-payment-method">
                                                                <div class="sub-group-step-payment-method first flexbox">
                                                                    <div class="wrap-sub-group-step-payment-method step-payment-method-left group-icon flexbox">
                                                                        <div class="wrap-l-icon-takuhai icon-takuhai-01">
                                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-takuhai-howto-bl.svg" alt="">
                                                                        </div>
                                                                        <div class="wrap-r-icon-payment flexbox align-items-center">
                                                                            <p class="color-takuhai">WEBでご予約いただく場合</p>
                                                                        </div>
                                                                    </div><!--end group-icon-->
                                                                    <div class="wrap-sub-group-step-payment-method step-payment-method-right group-icon flexbox">
                                                                        <div class="wrap-r-icon-takuhai icon-takuhai-04">
                                                                            <p class="sub-text-payment-takuhai">クレジットカード</p>
                                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-step-takuhai-hh.svg" alt="">
                                                                        </div>
                                                                    </div><!--end group-icon-->
                                                                </div>
                                                                <div class="sub-group-step-payment-method flexbox">
                                                                    <div class="wrap-sub-group-step-payment-method step-payment-method-left group-icon flexbox">
                                                                        <div class="wrap-l-icon-takuhai icon-takuhai-03">
                                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-takuhai-howto-bl.svg" alt="">
                                                                        </div>
                                                                        <div class="wrap-r-icon-payment flexbox align-items-center">
                                                                            <p class="color-takuhai">ご来店でご予約いただく場合</p>
                                                                        </div>
                                                                    </div><!--end group-icon-->
                                                                    <div class="wrap-sub-group-step-payment-method step-payment-method-right group-icon flexbox">
                                                                        <div class="wrap-r-icon-takuhai icon-takuhai-04">
                                                                            <p class="sub-text-payment-takuhai">クレジットカード</p>
                                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-step-takuhai-hh.svg" alt="">
                                                                        </div>
                                                                        <div class="wrap-r-icon-takuhai others">
                                                                            <p class="sub-text-payment-takuhai others">現金</p>
                                                                            <div class="wrap-both-price flexbox">
                                                                                <div class="box-outside-price">
                                                                                    <div class="box-inside-price">
                                                                                        <span>0</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="box-current-price">¥</div>
                                                                            </div>
                                                                        </div>
                                                                    </div><!--end group-icon-->
                                                                </div>
                                                            </div>
                                                        </div><!--end group-step-flow-->
                                                    </div><!--end wrap-flow-delivery-->

                                                    <div class="wrap-flow-delivery wrap-return-method">
                                                        <h2 class="title-flow-delivery title-sub-slug-takuhai-howto title-sub-slug-irotomesode">返却方法</h2>
                                                        <div class="text-flow-deivery text-flow-deivery-takuhai">
                                                            <div class="title-group-return-method">収納について</div>
                                                            <p>着物を折りたたんで、専用のバッグに入れてください。</p>
                                                            <p>たたみ方がわからない場合には、なるだけ着物の折り目に沿って折りたたんでいただき、カバンに入れてください。</p>
                                                        </div>
                                                        <div class="text-flow-deivery about-return-carrier text-flow-deivery-takuhai">
                                                            <div class="title-group-return-method">返送業者について</div>
                                                            <p>付属の佐川急便用返送用伝票を用いて、返送してください。</p>
                                                        </div>
                                                        <div class="group-step-flow last">
                                                            <div class="title-group-step"><span class="step-num">01</span><var></var>電話で集荷を依頼する場合</div>
                                                            <a class="link-brand-search color-takuhai des-group-step" href="http://www.sagawa-exp.co.jp/send/branch_search/tanto/">http://www.sagawa-exp.co.jp/send/branch_search/tanto/</a>
                                                            <div class="des-group-step"><p>こちらからお近くの営業所へお電話をいただき、集荷を依頼して下さい。</p></div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow other last">
                                                            <div class="title-group-step"><span class="step-num">02</span><var></var>お近くの営業所へお持ち込みいただく場合</div>
                                                            <a class="link-brand-search color-takuhai des-group-step" href="http://www.sagawa-exp.co.jp/send/branch_search/tanto/">http://www.sagawa-exp.co.jp/send/branch_search/tanto/</a>
                                                            <div class="des-group-step des-group-step-other last">
                                                                <p>こちらからお近くの営業所の場所を営業時間をご確認いただき、お持ち込みをお願いいたします。</p>
                                                                <p>必ず「佐川急便」の「着払い」にて返却をお願いいたします。</p>
                                                                <p>その他の業者を使われた場合には、送料をお客様負担とさせていただきます。</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->
                                                    </div><!--end wrap-flow-delivery-->


                                                </div><!--end box-howto-reserve-->
                                            </div><!--end wrap-content-howto-reserve-->
                                        </div>

                                        <div class="wrap-content-takuhai-method takuhai-howto">
                                            <div class="box-howto-reserve-takuhai">
                                                <div class="wrap-title-method-takuhai text-center"><p class="title-method-takuhai">破損・汚損について</p></div>
                                                <div class="group-all-icon-text">
                                                    <div class="group-icon flexbox">
                                                        <div class="wrap-l-icon wrap-l-icon-takuhhai-method">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/step-icon-pollution.svg" alt="">
                                                        </div>
                                                        <div class="wrap-r-text-takuhai-method">
                                                            <p class="r-text-takuhai-method">お着物が壊れてしまった、汚れてしまった場合には...</p>
                                                            <?php if($isSmartPhone) : ?>
                                                                <p class="r-text-takuhai-method color-line-bottom">「ご自身での修繕・洗濯・クリーニング」はなさらない</p>
                                                                <p class="r-text-takuhai-method color-line-bottom">ようにお願いいたします。</p>
                                                            <?php else: ?>
                                                                <p class="r-text-takuhai-method color-line-bottom">「ご自身での修繕・洗濯・クリーニング」はなさらないようにお願いいたします。</p>
                                                            <?php endif; ?>
                                                            <p class="r-text-takuhai-method r-text-des-bottom">※著しい破損・汚損の場合には、修繕代・クリーニング代の実費を請求させていただく場合がございますので、ご了承願います。</p>
                                                        </div>
                                                    </div><!--end group-icon-->
                                                </div><!--end group-all-icon-text-->
                                            </div><!--end box-howto-reserve-->
                                        </div><!--end wrap-content-howto-reserve-->
                                        <div class="wrap-btn-v2 wrap-link-to-top-takuhai flexbox">
                                            <a href="<?= home_url();?>/takuhai">
                                                <div class="btn-v2 btn-v2-homongi btn-v2-takuhai-howto formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">宅配レンタルTOPに戻る</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div><!--end wrap-btn-v2-->

                                    </div><!--end padding-v2-->
                                </div><!--end right-column right-cate-list-v2-->

                            </div><!--end wrap-boths-column-->

                        </div><!--end left-column-content-->


                    </div><!--end wrap-column-content-->
                </div>

            </div><!--end content-v2-->
        </div><!--end wrap-highend-v2-->
    </div>
<?php get_footer('new-takuhai') ;?>

<?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
    'id' => 'formal-preview-popup',
    'htmlOptions' => array(
        'style' => 'display: none'
    ),
))
?>
<?php
$cs=Yii::app()->getClientScript();
ob_start();
?>

<script>
    $(document).ready(function () {
        $('.formal-preview-popup-handle').click(function (event) {
            event.preventDefault();
            $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
            $('#formal-preview-popup').show(0, function () {
                $("html").addClass("modal-open");
                if(!$("#formal-preview-popup input.preview-shops:checked").length){
                    $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
                }
            });
            $('#botDiv').hide();
        });

        $(document).on('click', '#closeStep, #backStep', function(){
            $("html").removeClass("modal-open");
        });
    })
</script>

<?php
$js = ob_get_contents();
$js = str_replace('<script>','',$js);
$js = str_replace('</script>','',$js);
ob_end_clean();
$cs->registerScript('formal-preview-v2',$js, CClientScript::POS_END);
?>