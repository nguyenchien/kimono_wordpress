<?php
/**
 * Template Name: New Formal Content
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
get_header('formal');

?>
<style>
	.page-title {
		margin-bottom: 20px;
	}
	.family-banner img {
		margin-bottom: 20px;
	}
	.family-price .desc {
		margin-bottom: 20px;
	}
	.family-price .desc p {
		line-height: 1.5;
	}
	.family-price .title {
		font-size: 20px;
		font-weight: bold;
		margin-bottom: 10px;
	}
	.discount-rate-list, .discount-group {
		margin-bottom: 40px;
	}
	.discount-group .title {
		margin-bottom: 25px;
	}
	.discount-rate-list small {
		font-size: 7px;
	}
	@media screen and (max-width:767px){
		.page-title {
			margin-bottom: 14px;
			font-size: 13px;
		}
		.family-banner img {
			margin-bottom: 10px;
		}
		.family-price {
			padding-left: 10px;
			padding-right: 10px;
		}
		.family-price .desc p {
			font-size: 12px;
			line-height: 1.3;
		}
		.family-price .title {
			font-size: 15px;
		}
		.discount-rate-list, .discount-group {
			margin-bottom: 30px;
		}
	}
</style>
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
										echo FormalSidebarLeftCodeNewStyle(array());
									} else if($postName == 'list'){
										echo FormalSidebarLeftCodeNewStyle(array());
                                    }
                                }
                                ?>
                            </div>
                            <div class="right-column right-column-list right-cate-list-v2 <?= $postName?>">
                                <div class="right-column-list">
                                    <?php if(get_field('page_h1')): ?>
		                                <h1 class="page-title">
                                            <?php the_field('page_h1'); ?>
		                                </h1>
                                    <?php endif; ?>
	                                <div class="family-banner">
                                        <?php if($isSmartPhone): ?>
	                                        <img src="<?=WP_HOME?>/images/family-price/family-price-banner-sp.jpg" alt="">
                                        <?php else: ?>
	                                        <img src="<?=WP_HOME?>/images/family-price/family-price-banner-pc.jpg" alt="">
                                        <?php endif; ?>
		                                <div class="desc">
			                                <p>お子様の行事に大人も一緒にレンタルで11,000円割引*となるお得なプランです。<br>
				                                七五三や産着の需要に合わせ、お母様やお父様も一緒に着用していただく「家族割」をスタートします！</p>
		                                </div>
		                                <div class="desc">
			                                <p>
				                                *ご家族3名様ご利用で11,000円割引となります。<br>
				                                ご利用プランや人数により割引額が異なります。
			                                </p>
		                                </div>
	                                </div>
	                                <div class="discount-rate-list">
		                                <h2 class="title">割引料金一覧表</h2>
		                                <div class="desc">
			                                <p>
				                                基本料金】<br>
				                                〈お母様〉訪問着「松竹梅」3プライス<br>
				                                〈お父様〉紋付き袴セット 「松竹梅」3プライス
			                                </p>
		                                </div>
		                                <div class="img">
			                                <img src="<?=WP_HOME?>/images/family-price/discount-1.jpg" alt="">
		                                </div>
	                                </div>
	                                <div class="discount-group">
		                                <h3 class="title">＜七五三＞</h3>
		                                <div class="img">
                                            <img src="<?=WP_HOME?>/images/family-price/discount-shichigosan.jpg" alt="">
		                                </div>
	                                </div>
	                                <div class="discount-group">
		                                <h3 class="title">＜産着＞</h3>
		                                <div class="img">
                                            <img src="<?=WP_HOME?>/images/family-price/discount-delivery.jpg" alt="">
		                                </div>
	                                </div>
	                                <div class="discount-rate-list">
		                                <h2 class="title">対応店舗</h2>
		                                <div class="desc">
			                                <p>
				                                きものレンタルwargo　銀座本店<br>
				                                きものレンタルwargo　明治神宮北参道店<br>
				                                きものレンタルwargo　金沢香林坊店<br>
				                                きものレンタルwargo　大阪心斎橋店<br>
			                                </p>
		                                </div>
	                                </div>
	                                <div class="discount-rate-list">
		                                <h2 class="title">適用条件</h2>
		                                <div class="desc">
			                                <p>
				                                <small>●</small>お子様の行事にてご家族さまでご利用いただく場合の割引となります。<br>
				                                <small>●</small>ご予約時に、ご家族さまであることを確認する場合があります。
			                                </p>
		                                </div>
	                                </div>
	                                <div class="discount-rate-list">
		                                <h2 class="title">ご注意事項</h2>
		                                <div class="desc">
			                                <p>
				                                <small>●</small>「家族割」と他割引サービスの併用は不可となります。<br>
				                                <small>●</small>ご家族さまの合計料金からの割引のため、お支払は一括してご請求となります。<br>
				                                <small>●</small>安全のため、妊娠中のお客様や感染症をお持ちの方は お着付けをお断りしております。
			                                </p>
		                                </div>
	                                </div>
                                </div><!--end padding-v2-->
                            </div><!--end right-column right-cate-list-v2-->
                        </div><!--end wrap-boths-column-->
                    </div><!--end left-column-content-->
                </div><!--end wrap-column-content-->
            </div>
        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->
</div><!-- end container -->
<?php get_footer('formal'); ?>
<style>
    *{
        min-height: 0;
        min-width: 0;
    }
</style>