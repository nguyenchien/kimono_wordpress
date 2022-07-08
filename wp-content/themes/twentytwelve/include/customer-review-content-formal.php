<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 9/21/2018
 * Time: 10:38 AM
 */

    global $post;
    $isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();

    $review_list_page =  is_page('review');
	$is_list_page = is_page('list');
	if ($is_list_page) {
		$parents = get_post_ancestors( $post->ID );
		$id = ($parents) ? $parents[0]: $post->ID;
		$post_parent = get_post( $id );
		$parent_slug = $post_parent->post_name;
		$category_formal_name = isset($post_parent->post_name) ? $post_parent->post_name : '';
	} else {
		$category_formal_name = isset($post->post_name) ? $post->post_name : '';
	}
$is_page_review_custom = false;
$page_review_custom = array('dazaifu', 'kurashiki', 'asakusa', 'kyotostation' );
if ( in_array($category_formal_name, $page_review_custom) ) {
    $is_page_review_custom = true;
}

// Customer Review By Shop
wp_enqueue_script('new-customer-review-script', get_template_directory_uri() . '/js/customer-review.js');
wp_register_style('style-customer-review', get_template_directory_uri() . '/css/customer-review.css' , array('twentytwelve-style'));
wp_enqueue_style('style-customer-review');
// get query and argument (must)
wp_reset_postdata();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$formalPlanSlugs = array(
    'homongi' => 'homongi',
    'kurotomesode' => 'kurotomesode',
    'irotomesode' => 'irotomesode',
    'furisode' => 'seijin',
    'hakama' => 'sotsugyou',
    'shichigosan' => 'shichigosan'
);
$args_my_query=array(
    'post_status'   => 'publish',
    'post_type' => array('customer-remark'),
    'nopaging'		 => false,
    'paged'		     => $paged,
    'posts_per_page' => $is_page_review_custom ? 3 : 5,
    'order'          => 'DESC',
    'orderby'        => 'date',
);
if ($is_page_review_custom) {
    $args_my_query['post_type'] = array('yesterday-cust-voice');
    if (!empty($attr['shop_id'])) {
        $args_my_query['meta_key'] = 'shop_id';
        $args_my_query['meta_value'] = $attr['shop_id'];
    }
}
$query = new WP_Query($args_my_query);

    //Star List
    $star_list = array(
        1 => "★",
        2 => "★★",
        3 => "★★★",
        4 => "★★★★",
        5 => "★★★★★",
    );

// Page new style
$page_has_new_style = array('ginza-honten', 'yukata', 'kamakura', 'kanazawa', 'osaka-shinsaibashi-opa', 'okinawa-naha', 'wedding');
?>

<div class="customer-review-content">
    <div class="box-review-content">
        <?php
        if( $query->have_posts() ) :
            while( $query->have_posts() ) :
                $query->the_post();
                //Create value
                $rate_customer = get_field("customer");
                $rate_customer = $rate_customer > 0 ? $rate_customer : rand(4,5);
                $rate_kimono = get_field("kimono");
                $rate_kimono = $rate_kimono > 0 ? $rate_kimono : rand(4,5);
                $rate_hair = get_field("hair");
                $rate_hair = $rate_hair > 0 ? $rate_hair : rand(4,5);
                $customer_name = get_field("customer_info");
                $customer_name = !empty($customer_name) ? $customer_name : substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1).'.'.substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1);
                $customer_address = get_field("address");
                $customer_date_visit = get_field("date_visit");

                // Format time customer date
                $time = strtotime($customer_date_visit);
                $customer_date_visit_beauty = date('Y m/d',$time);
                $average_rate = ($rate_customer + $rate_kimono + $rate_hair)/3;
                $average_rate_beauty = round($average_rate,0,PHP_ROUND_HALF_UP);

                //Get list
                $rate_customer_list[get_the_ID()] = $rate_customer;
                $rate_kimono_list[get_the_ID()] = $rate_kimono;
                $rate_hair_list[get_the_ID()] = $rate_hair;
                $post_rate_list[get_the_ID()] = $average_rate_beauty;
                $post_rate_list_number[get_the_ID()] = $average_rate;


                $productModel = new Product();
                $product_id = get_field('product_id');
                $product = $productModel->with('planTypeHighend')->findByPK($product_id);
                $image_product = get_field("image_product");
                $productDetailLink = "#";
                if (is_numeric($product_id)) {
                    $productDetailLink = Yii::app()->createAbsoluteUrl('formal/product', array('id' => $product_id));
                }

                $planModel = isset($product->planTypeHighend) ? $product->planTypeHighend: false;
                $planTypeName = !empty($planModel) ? $product->planTypeHighend->plan_type_name: '';
                $productName = !empty($product->product_name) ? $product->product_name: '';
                $productCode = !empty($product->product_code) ? $product->product_code: '';

                ?>

            <?php if (in_array($category_formal_name, $page_has_new_style)) : ?>
                <div class="box-review">
                    <ul class="review-info">
                        <li class="ctm-name">
                            <strong><?php echo $customer_name; ?></strong>
                        </li>
                        <li class="vote">
                            <div class="stat">
                                <div class="vote-name"><span><?php echo Yii::t('review-by-shop', '総合評価 '); ?><var>:</var></span></div>
                                <div class="vote-star">
                                    <span><?php echo $star_list[$post_rate_list[get_the_ID()]]?></span>
                                </div>
                            </div>
                            <div class="stat">
                                <div class="stat-name stat-name-dots"><span><?php echo Yii::t('review-by-shop', '着付け'); ?><var class="two-dots-stat">:</var></span></div>
                                <div class="vote-star vote-star-dots">
                                    <span><?php echo $star_list[$rate_kimono_list[get_the_ID()]];?></span>
                                </div>
                            </div>
                            <div class="stat">
                                <div class="vote-name"><span><?php echo Yii::t('review-by-shop', '接客'); ?><var>:</var></span></div>
                                <div class="vote-star">
                                    <span><?php echo $star_list[$rate_customer_list[get_the_ID()]];?></span>
                                </div>
                            </div>
                            <div class="stat">
                                <div class="stat-name"><span><?php echo Yii::t('review-by-shop', 'ヘア'); ?><var class="two-dots-stat">:</var></span></div>
                                <div class="vote-star vote-star-dots">
                                    <span><?php echo $star_list[$rate_hair_list[get_the_ID()]];?></span>
                                </div>
                            </div>
                        </li>
                        <li class="comment">
                            <p><?php the_content(); ?></p>
                        </li>
                    </ul>
                    <div class="review-img">
                        <div class="pd-review">
                            <div class="link-more">
                                <a href="<?php echo $productDetailLink;?>" class="go-detail"><?php echo Yii::t('formal.customer_remark', 'ご利用<br>いただいた<br>お着物<br><span class="arrow"></span>');?></a>
                            </div>
                            <?php if ($customer_date_visit){?><div class="date-visit"><?php echo Yii::t('review-by-shop', 'ご来店日：'); ?><br><?php echo $customer_date_visit_beauty;?></div><?php } ?>
                        </div>
                        <div class="wrap-pd-img">
                            <div class="pd-img">
                                <?php if ($image_product) :?>
                                    <a href="<?php echo $productDetailLink;?>" class="customer-product-img"><img data-src="<?php echo $image_product['url'];?>" alt="<?php echo $image_product['alt'];?>"></a>
                                <?php else: ?>
                                    <img data-src="<?= WP_HOME; ?>/images/no-image.png" alt="">
                                <?php endif; ?>
                            </div>
                            <ul class="pd-name">
                                <li><?php echo Yii::t('formal.customer_remark', '{plan_type_name}<br>「{product_name}」{product_code}', array('{plan_type_name}' => $planTypeName, '{product_name}' => $productName, '{product_code}' =>  $productCode));?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php if ( $is_page_review_custom ) : ?>
                    <div class="list-total-ctm-review list-total-ctm-review-custom list-total-ctm-review-<?= $category_formal_name; ?>">
                        <div class="item-total-ctm-review item-total-ctm-review-custom item-total-ctm-review-<?= $category_formal_name; ?>">
                            <div class="wrap-title-name-review wrap-padding wrap-title-name-review-custom wrap-title-name-review-<?= $category_formal_name; ?>">
                                <div class="wrap-name flexbox">
                                    <p class="title-name-review"><?php echo $customer_name . Yii::t('review-by-shop', 'さん'); ?><?php if ($customer_address) : ?><span class="address">from<?= $customer_address; ?></span><?php endif; ?></p>
                                    <p class="title-star"><?php echo Yii::t('review-by-shop', '総合評価: '); ?><var class="average-rank-star title-star star-medium"><?php echo $star_list[$post_rate_list[get_the_ID()]]?><span class="number"><?php echo number_format((float)$post_rate_list_number[get_the_ID()], 1, '.', '');?></span></var></p>
                                </div>
                                <div class="total-kind-review">
                                    <?php if ($customer_date_visit){?>
                                        <div class="infor-date-visit">
                                            <p class="title-rank title-date-visit"><?php echo Yii::t('review-by-shop', 'ご来店日：'); ?><var class="date-visit-customer"><?php echo $customer_date_visit_beauty;?></var></p>
                                        </div>
                                    <?php } ?>
                                    <div class="wrap-title-rank">
                                        <p class="title-rank title-rank-scustomer"><?php echo Yii::t('review-by-shop', '接客：'); ?><var class="title-star star-sm"><?php echo $star_list[$rate_customer_list[get_the_ID()]];?></var></p>
                                        <p class="title-rank title-rank-kimono"><?php echo Yii::t('review-by-shop', '着付け：'); ?><var class="title-star star-sm"><?php echo $star_list[$rate_kimono_list[get_the_ID()]];?></var></p>
                                        <p class="title-rank title-rank-hair"><?php echo Yii::t('review-by-shop', 'ヘア：'); ?><var class="title-star star-sm"><?php echo $star_list[$rate_hair_list[get_the_ID()]];?></var></p>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-infor-ctm-review wrap-padding wrap-infor-ctm-review-custom wrap-infor-ctm-review-<?= $category_formal_name; ?>">
                                <div class="wrap-description-ctm-review title-rank"><?php the_content(); ?></div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="list-total-ctm-review">
                        <div class="item-total-ctm-review">
                            <div class="wrap-title-name-review wrap-padding">
                                <p class="title-name-review"><?php echo $customer_name . Yii::t('review-by-shop', 'さん'); ?></var></p>
                                <p class="title-star"><?php echo Yii::t('review-by-shop', '総合評価: '); ?><var class="average-rank-star title-star star-medium"><?php echo $star_list[$post_rate_list[get_the_ID()]]?></var></p>
                            </div>
                            <div class="wrap-infor-ctm-review wrap-padding">
                                <div class="total-kind-review">
                                    <p class="title-rank title-rank-scustomer"><?php echo Yii::t('review-by-shop', '接客：'); ?><var class="title-star star-sm"><?php echo $star_list[$rate_customer_list[get_the_ID()]];?></var></p>
                                    <p class="title-rank title-rank-kimono"><?php echo Yii::t('review-by-shop', '着付け：'); ?><var class="title-star star-sm"><?php echo $star_list[$rate_kimono_list[get_the_ID()]];?></var></p>
                                    <p class="title-rank title-rank-hair"><?php echo Yii::t('review-by-shop', 'ヘア：'); ?><var class="title-star star-sm"><?php echo $star_list[$rate_hair_list[get_the_ID()]];?></var></p>
                                </div>
                                <?php if ($customer_date_visit){?>
                                    <div class="infor-date-visit">
                                        <p class="title-rank title-date-visit"><?php echo Yii::t('review-by-shop', 'ご来店日：'); ?><var class="date-visit-customer"><?php echo $customer_date_visit_beauty;?></var></p>
                                    </div>
                                <?php } ?>
                                <div class="wrap-description-ctm-review title-rank"><?php the_content(); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

                <?php
            endwhile;
            ?>
            <?php wp_reset_postdata(); ?>
        <?php endif;?>
    </div><!--end box-review-content-->

    <?php
        $page_template_current = get_page_template();
        $page_template_name = basename($page_template_current, '.php');
        if($page_template_name != 'new-access-child-page' && $page_template_name != 'formal-new-access-child-page'):
    ?>

    <?php endif; ?>
</div><!--end customer-review-content-->
