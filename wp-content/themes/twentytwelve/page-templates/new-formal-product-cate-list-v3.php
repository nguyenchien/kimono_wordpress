<?php
/**
 * Template Name: New Formal Product Cate List v3
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

global $language, $post;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
$postName = $post->post_name;
//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;
$listHasFaq = array('homongi', 'ubugi', 'kurotomesode', 'irotomesode');

get_header('formal-v2');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('jquery-visible', 'https://kyotokimono-rental.com/js/jquery.visible.min.js');
if($isSmartPhone){
    wp_register_style('new-formal-popup-preview-sp', get_template_directory_uri() . '/css/new-formal-popup-preview-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-sp');
} else{
    wp_register_style('new-formal-popup-preview-pc', get_template_directory_uri() . '/css/new-formal-popup-preview-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-pc');
}
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
?>
<link rel="preload" href="/css/searchform.css?v=21062021" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=21062021"></noscript>
<?php if($isSmartPhone):?>
    <link rel="preload" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-sp.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-sp.css"></noscript>
<?php else: ?>

    <link rel="preload" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-pc.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-pc.css"></noscript>
<?php endif; ?>

<link rel="preload" href="<?= WP_HOME ?>/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick-theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick-theme.css"></noscript>
<?php
wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
?>
<?php if($isSmartPhone):?>
    <?php
        $title_page_h1_sp = get_field('title_page_h1_sp');
        echo do_shortcode(php_set_base_url($title_page_h1_sp));
    ?>
    <div class="container-box clearfix">
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column hidden-sidebar">
									<?php
                                    if($isSmartPhone){
                                        //echo FormalSidebarLeftCodeNewStyle(array());
                                    }else{
                                        if($postName != 'list'){
                                            echo FormalSidebarLeftCodeNewStyle(array('type'=>'planlist'));
                                            echo FormalSidebarFilterCode(array('type'=>'planlist'));
                                        }else if($postName == 'list'){
                                            echo FormalSidebarFilterCode(array());
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="right-column right-column-list right-cate-list-v3 <?= $postName?>">
                                    <div class="padding-v2">
                                        <?php
                                        $banner_sp = get_field('banner_sp');
                                        if ($banner_sp) {
                                            echo do_shortcode(php_set_base_url($banner_sp));
                                        }
                                        ?>
                                        <!-- Intro -->
                                        <?php
                                        $point_intro_sp = get_field('point_intro_sp');
                                        if ($point_intro_sp) {
                                            echo do_shortcode(php_set_base_url($point_intro_sp));
                                        }
                                        ?>
                                        <!-- Scene -->
                                        <?php
                                        $scene_sp = get_field('scene_sp');
                                        if ($scene_sp) {
                                            echo do_shortcode(php_set_base_url($scene_sp));
                                        }
                                        ?>
                                        <!-- Color -->
                                        <?php
                                        $color_sp = get_field('color_sp');
                                        if ($color_sp) {
                                            echo do_shortcode(php_set_base_url($color_sp));
                                        }
                                        ?>
                                        <!-- Size -->
                                        <?php
                                        $size_sp = get_field('size_sp');
                                        if ($size_sp) {
                                            echo do_shortcode(php_set_base_url($size_sp));
                                        }
                                        ?>
                                        <!-- Age Group -->
                                        <?php
                                        $age_group_sp = get_field('age_group_sp');
                                        if ($age_group_sp) {
                                            echo do_shortcode(php_set_base_url($age_group_sp));
                                        }
                                        ?>
                                        <!-- Season Group -->
                                        <?php
                                        $season_group_sp = get_field('season_sp');
                                        if ($season_group_sp) {
                                            echo do_shortcode(php_set_base_url($season_group_sp));
                                        }
                                        ?>

                                        <section class="content-section-new-page">
                                            <?php
                                            $content_section_new_page_sp = get_field('content_section_new_page_sp');
                                            if ($content_section_new_page_sp) {
                                                echo do_shortcode(php_set_base_url($content_section_new_page_sp));
                                            }
                                            ?>
                                        </section>
                                        <section class="content-section-ranking">
                                            <?php
                                            $list_product_ranking_sp = get_field('list_product_ranking_sp');
                                            if ($list_product_ranking_sp) {
                                                echo do_shortcode(php_set_base_url($list_product_ranking_sp));
                                            }
                                            ?>
                                        </section>
                                        <?php
                                        $custom_button = get_field('custom_button');
                                        if ($custom_button) {
                                            echo do_shortcode(php_set_base_url($custom_button));
                                        }
                                        ?>
                                        <section class="set-content-section">
                                            <?php
                                            $set_content_sp = get_field('set_content_sp');
                                            if ($set_content_sp) {
                                                echo do_shortcode(php_set_base_url($set_content_sp));
                                            }
                                            ?>
                                        </section>

                                        <section class="reason-point-section">
                                            <?php
                                                $reason_choose_sp = get_field('reason_choose_sp');
                                                if ($reason_choose_sp) {
                                                    echo do_shortcode(php_set_base_url($reason_choose_sp));
                                                }
                                            ?>
                                        </section>

                                        <section class="banner-checking-section">
                                            <?php
                                            $banner_checking_sp = get_field('banner_checking_sp');
                                            if ($banner_checking_sp) {
                                                echo do_shortcode(php_set_base_url($banner_checking_sp));
                                            }
                                            ?>
                                        </section>
                                        <?php if(in_array($postName, $listHasFaq)):?>
											<section class="section-faq">
												<div class="wrap-title">
													<p class="main-title">FAQ</p>
													<h2 class="sub-title">皆様からいただけるよくあるご質問♪</h2>
												</div>
												<div class="wrap-faq">
													<div class="faq-content">
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">キャンセルについて</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">【上級来店着付け】</p>
																<p class="text-item-content">■振袖・袴・七五三のレンタルを含むご予約</p>
																<p class="text-item-content">[ご利用日]から30日前までのキャンセル ：無料</p>
																<p class="text-item-content">[ご利用日]から29日以内のキャンセル ：ご利用料金の100％</p>
																<br>
																<p class="text-item-content">■その他（訪問着等）のお着物のみのご予約</p>
																<p class="text-item-content">[ご利用日]から30日前までのキャンセル ：無料</p>
																<p class="text-item-content">[ご利用日]から29日～7日前までのキャンセル：ご利用料金の30％</p>
																<p class="text-item-content">[ご利用日]から6日以内のキャンセル ：ご利用料金の100％</p>
															</div>
														</div>
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">早朝の予約が入れれません</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">早朝のご予約はお下見の際に店頭でお申し付け頂くか <a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>にお問い合わせ下さい。</p>
																<!--																<p class="text-item-content">--><?php //echo Yii::t('new-top-page-kimono-v3', 'キャンセルの場合はご来店予定日の二日前までご予約確認メールにある項目3「ご予約プランの詳細」リンクからキャンセルをお願い致します。<br/>ただし下記のキャンセル料金が発生いたしますのでご了承ください。<br/>ご利用日］から2日前までのキャンセル：キャンセル料無料<br/>※事務手数料500円(税別)のみ頂きます<br/>［ご利用日］の前日および当日のキャンセル：ご利用料金の100％'); ?><!--</p>-->
															</div>
														</div>
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">当日予約可能ですか？</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">
																	冠婚葬祭用のお着物の即時ご予約は承っておりません。<br>
																	ご予約は一週間前からご予約可能です。
																</p>
															</div>
														</div>
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">訪問着の場合もヘアセットはついていますか？</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">
																	冠婚葬祭のお着物でご利用はヘアセットオプションご利用をお勧めいたします。<br/><a href="<?= WP_HOME; ?>/hairset">&gt;&gt;ヘアセットについてはこちら</a>
																</p>
															</div>
														</div>
													</div>
												</div>
											</section>
                                        <?php endif; ?>
                                        <section class="shoplist-section">
                                            <?php
                                            $shop_list_sp = get_field('shop_list_sp');
                                            if ($shop_list_sp) {
                                                echo do_shortcode(php_set_base_url($shop_list_sp));
                                            }
                                            ?>
                                        </section>
                                        <?php
                                        $customer_voice_sp = get_field('customer_voice_sp');
                                        if ($customer_voice_sp) {
                                            echo do_shortcode(php_set_base_url($customer_voice_sp));
                                        }
                                        ?>
                                        <?php
                                        $rental_sp = get_field('rental_sp');
                                        if ($rental_sp) {
                                            echo do_shortcode(php_set_base_url($rental_sp));
                                        }
                                        ?>
                                        <?php
                                        $column_sp = get_field('column_sp');
                                        if ($column_sp) {
                                            echo do_shortcode(php_set_base_url($column_sp));
                                        }
                                        ?>
                                        <?php
                                        $about_sp = get_field('about_sp');
                                        if ($about_sp) {
                                            echo do_shortcode(php_set_base_url($about_sp));
                                        }
                                        ?>
                                        <?php
                                        $intro_bottom_v2 = get_field('intro_bottom_v2');
                                        if ($intro_bottom_v2) {
                                            echo do_shortcode(php_set_base_url($intro_bottom_v2));
                                        }
                                        ?>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="container-box clearfix">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
        }
        ?>
        <?php
        $title_page_h1_pc = get_field('title_page_h1_pc');
        echo do_shortcode(php_set_base_url($title_page_h1_pc));
        ?>
    </div>
    <?php
    $banner_pc = get_field('banner_pc');
    if ($banner_pc) {
        echo do_shortcode(php_set_base_url($banner_pc));
    }
    ?>
    <?php
    $point_intro_pc = get_field('point_intro_pc');
    if ($point_intro_pc) {
        echo do_shortcode(php_set_base_url($point_intro_pc));
    }
    ?>
    <?php
    $scene_pc = get_field('scene_pc');
    if ($scene_pc) {
        echo do_shortcode(php_set_base_url($scene_pc));
    }
    ?>
    <div class="container-box clearfix">
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column hidden-sidebar">
                                    <?php
                                    if($isSmartPhone){
                                        echo FormalSidebarLeftCodeNewStyle(array());
				    }else{
					    if($postName != 'list'){
					                                                    echo FormalSidebarLeftCodeNewStyle(array());
											                                        }else if($postName == 'list'){
																	echo FormalSidebarLeftCodeNewStyle(array());
																	                                    }
                                    }
                                    ?>
                                </div>
                                <div class="right-column right-column-list right-cate-list-v3 <?= $postName?>">
                                    <div class="padding-v2">
                                        <!-- Color -->
                                        <?php
                                        $color_pc = get_field('color_pc');
                                        if ($color_pc) {
                                            echo do_shortcode(php_set_base_url($color_pc));
                                        }
                                        ?>
                                        <!-- Size -->
                                        <?php
                                        $size_pc = get_field('size_pc');
                                        if ($size_pc) {
                                            echo do_shortcode(php_set_base_url($size_pc));
                                        }
                                        ?>
                                        <!-- Age Group -->
                                        <?php
                                        $age_group_pc = get_field('age_group_pc');
                                        if ($age_group_pc) {
                                            echo do_shortcode(php_set_base_url($age_group_pc));
                                        }
                                        ?>
                                        <!-- Season Group -->
                                        <?php
                                        $season_group_pc = get_field('season_pc');
                                        if ($season_group_pc) {
                                            echo do_shortcode(php_set_base_url($season_group_pc));
                                        }
                                        ?>

                                        <section class="content-section-new-page">
                                            <?php
                                            $content_section_new_page_pc = get_field('content_section_new_page_pc');
                                            if ($content_section_new_page_pc) {
                                                echo do_shortcode(php_set_base_url($content_section_new_page_pc));
                                            }
                                            ?>
                                        </section>
                                        <section class="content-section-ranking">
                                            <?php
                                            $list_product_ranking_pc = get_field('list_product_ranking_pc');
                                            if ($list_product_ranking_pc) {
                                                echo do_shortcode(php_set_base_url($list_product_ranking_pc));
                                            }
                                            ?>
                                        </section>
                                        <?php
                                        $custom_button = get_field('custom_button');
                                        if ($custom_button) {
                                            echo do_shortcode(php_set_base_url($custom_button));
                                        }
                                        ?>
                                        <section class="set-content-section">
                                            <?php
                                                $set_content_pc = get_field('set_content_pc');
                                                if ($set_content_pc) {
                                                    echo do_shortcode(php_set_base_url($set_content_pc));
                                                }
                                            ?>
                                        </section>

                                        <section class="reason-point-section">
                                            <?php
                                                $reason_choose_pc = get_field('reason_choose_pc');
                                                if ($reason_choose_pc) {
                                                    echo do_shortcode(php_set_base_url($reason_choose_pc));
                                                }
                                            ?>
                                        </section>

                                        <section class="banner-checking-section">
                                            <?php
                                                $banner_checking_pc = get_field('banner_checking_pc');
                                                if ($banner_checking_pc) {
                                                    echo do_shortcode(php_set_base_url($banner_checking_pc));
                                                }
                                            ?>
                                        </section>
                                        <?php if(in_array($postName, $listHasFaq)):?>
											<section class="section-faq">
												<div class="wrap-title">
													<p class="main-title">FAQ</p>
													<h2 class="sub-title">よくある質問</h2>
												</div>
												<div class="wrap-faq">
													<div class="faq-content">
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">キャンセルについて</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">【上級来店着付け】</p>
																<p class="text-item-content">■振袖・袴・七五三のレンタルを含むご予約</p>
																<p class="text-item-content">[ご利用日]から30日前までのキャンセル ：無料</p>
																<p class="text-item-content">[ご利用日]から29日以内のキャンセル ：ご利用料金の100％</p>
																<br>
																<p class="text-item-content">■その他（訪問着等）のお着物のみのご予約</p>
																<p class="text-item-content">[ご利用日]から30日前までのキャンセル ：無料</p>
																<p class="text-item-content">[ご利用日]から29日～7日前までのキャンセル：ご利用料金の30％</p>
																<p class="text-item-content">[ご利用日]から6日以内のキャンセル ：ご利用料金の100％</p>
															</div>
														</div>
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">早朝の予約が入れれません</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">早朝のご予約はお下見の際に店頭でお申し付け頂くか <a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>にお問い合わせ下さい。</p>
<!--																<p class="text-item-content">--><?php //echo Yii::t('new-top-page-kimono-v3', 'キャンセルの場合はご来店予定日の二日前までご予約確認メールにある項目3「ご予約プランの詳細」リンクからキャンセルをお願い致します。<br/>ただし下記のキャンセル料金が発生いたしますのでご了承ください。<br/>ご利用日］から2日前までのキャンセル：キャンセル料無料<br/>※事務手数料500円(税別)のみ頂きます<br/>［ご利用日］の前日および当日のキャンセル：ご利用料金の100％'); ?><!--</p>-->
															</div>
														</div>
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">当日予約可能ですか？</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">
																	冠婚葬祭用のお着物の即時ご予約は承っておりません。<br>
																	ご予約は一週間前からご予約可能です。
																</p>
															</div>
														</div>
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">訪問着の場合もヘアセットはついていますか？</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">
																	冠婚葬祭のお着物でご利用はヘアセットオプションご利用をお勧めいたします。<br/><a href="<?= WP_HOME; ?>/hairset">&gt;&gt;ヘアセットについてはこちら</a>
																</p>
															</div>
														</div>
													</div>
												</div>
											</section>
                                        <?php endif; ?>

										<section class="shoplist-section">
                                            <?php
                                            $shop_list_pc = get_field('shop_list_pc');
                                            if ($shop_list_pc) {
                                                echo do_shortcode(php_set_base_url($shop_list_pc));
                                            }
                                            ?>
										</section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $customer_voice_pc = get_field('customer_voice_pc');
    if ($customer_voice_pc) {
        echo do_shortcode(php_set_base_url($customer_voice_pc));
    }
    ?>
    <?php
    $rental_pc = get_field('rental_pc');
    if ($rental_pc) {
        echo do_shortcode(php_set_base_url($rental_pc));
    }
    ?>
    <?php
    $column_pc = get_field('column_pc');
    if ($column_pc) {
        echo do_shortcode(php_set_base_url($column_pc));
    }
    ?>
    <?php
    $about_pc = get_field('about_pc');
    if ($about_pc) {
        echo do_shortcode(php_set_base_url($about_pc));
    }
    ?>
    <?php
    $intro_bottom_v2 = get_field('intro_bottom_v2');
    if ($intro_bottom_v2) {
        echo do_shortcode(php_set_base_url($intro_bottom_v2));
    }
    ?>
<?php endif; ?>

<?php get_footer('formal-v2'); ?>
<div id="wrap-formal-preview-popup"></div>

<style>
    *{
        min-height: 0;
        min-width: 0;
    }
</style>
<script>
    $(document).ready(function(){
        $('.lazy').lazy();
        $('body').addClass('<?php echo $postName;?>');

        //Toggle sidebar
        $('[data-sub-shop]').click(function(){
            var self    = this;
            var target  = $(self).data('sub-shop');
            var $other  = $('[data-sub-shop="'+target+'"]');
            if(target){
                $other.each(function(index, el){
                    if(el !== self){
                        $(el).siblings(target).slideUp();
                        $(el).parent().find('.text-shop-wg-dropdown').removeClass('active');
                    }else{
                        $(self).siblings(target).slideToggle();
                        $(self).parent().find('.text-shop-wg-dropdown').toggleClass('active');
                    }
                });
            }
        });

        /* Show formal popup - start */
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
        /* Show formal popup - end */

        //Toggle reason point
        <?php if($isSmartPhone) : ?>
        $('.list-reason .item-reason .title-item-reason').click(function(){
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
            this.scrollIntoView();
        });
        <?php else: ?>
        $('.list-reason .item-reason').click(function(){
            var index = $(this).index();
            var target = $('.wrap-content-reason .content-reason').eq(index);
            target.siblings().hide();
            target.show();

            $(this).addClass('active');
            $(this).siblings().removeClass('active');
        });
        <?php endif; ?>

        //Toggle shop list
        $('.search-list').click(function(){
        	$(this).toggleClass('active');
        	$(this).closest('.area-item').find('.list-shop').slideToggle('fast');
        })

        var category = '<?php echo $post->post_name; ?>';

        // Ajax loading for Product Ranking Section
        var productRankingBox = $('.wrap-product-list');
        var productRankingBoxLoaded = false;
        $(window).scroll(function () {
            if (productRankingBox.visible() && productRankingBoxLoaded == false) {
                productRankingBoxLoaded = true;
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getProductRanking/' + category + '?isSmartPhone=<?php echo $isSmartPhone ? 'true' : 'false'; ?>',
                    success: function(data) {
                        if (data != null && data != "") {
                            productRankingBox.html(data);
                            $("img").lazy();
                            $(".wrap-img-ranking").lazy();
                        }}
                });
            }
        });

        // Ajax loading for Customer Review Section
        var customerReviewBox = $('.wrap-box-review');
        var customerReviewBoxLoaded = false;
        $(window).scroll(function () {
            if (customerReviewBox.visible() && customerReviewBoxLoaded == false) {
                customerReviewBoxLoaded = true;
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getCustomerReview/' + category + '?isSmartPhone=<?php echo $isSmartPhone ? 'true' : 'false'; ?>',
                    success: function(data) {
                        if (data != null && data != "") {
                            customerReviewBox.html(data);
                            $("img").lazy();
                        }}
                });
            }
        });

        var shop_id = '16';
        /* Show formal popup - start */
        $(document).on('click', '.formal-preview-popup-handle', function(){
            event.preventDefault();
            if ($("#wrap-formal-preview-popup").is(':empty')) {
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getFormalPreview?shop_id=' + shop_id,
                    success: function (data) {
                        if (data != null && data != "") {
                            $("#wrap-formal-preview-popup").html(data);
                            openPreviewPopup();
                        }							                        }
                });
            } else {
                openPreviewPopup();
            }

        });

        function openPreviewPopup() {
            $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
            $('#formal-preview-popup').show(0, function () {
                $("html").addClass("modal-open");
                if(!$("#formal-preview-popup input.preview-shops:checked").length){
                    $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
                } else {
                    $("#formal-preview-popup input.preview-shops:checked").attr('checked','checked').trigger('change');
                }
            });
            $('#botDiv').hide();
        }

        //Toggle faq
        $('.box-faqs-item .box-faqs-title').click(function(){
            $(this).toggleClass('active');
            $(this).parent().next().slideToggle('fast');
        });
    })
</script>
