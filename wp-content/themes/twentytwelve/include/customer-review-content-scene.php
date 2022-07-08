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
    $scene_formal_name = isset($post_parent->post_name) ? $post_parent->post_name : '';
} else {
    $scene_formal_name = isset($post->post_name) ? $post->post_name : '';
}

// Customer Review By Shop
wp_enqueue_script('new-customer-review-script', get_template_directory_uri() . '/js/customer-review.js');
wp_register_style('style-customer-review', get_template_directory_uri() . '/css/customer-review.css' , array('twentytwelve-style'));
wp_enqueue_style('style-customer-review');
// get query and argument (must)
wp_reset_postdata();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$review_list_page =  is_page('review');

//Detect Slug
if ($review_list_page) {
    $post_data = get_post($post->post_parent);
    $slug = $post_data->post_name;
} else {
    $slug = $post->post_name;
}

$formalPlanSlugs = array(
    'wedding' => 'wedding',
    'seijinshiki' => 'seijinshiki',
    'sotsugyoushiki' => 'sotsugyoushiki',
    'shichigosanscene' => 'shichigosanscene'
);
$args_my_query=array(
    'post_status'   => 'publish',
    'post_type' => 'customer-remark',
    'meta_key' => 'scene_formal',
    'meta_value' => $formalPlanSlugs[$slug],
    'paged'		     => $paged,
    'posts_per_page' => $review_list_page ? 10 : 5,
    'order'          => 'DESC',
    'orderby'        => 'date',
);
$query = new WP_Query($args_my_query);
$hasPost = $query->post_count;
//Star List
$star_list = array(
    1 => "★",
    2 => "★★",
    3 => "★★★",
    4 => "★★★★",
    5 => "★★★★★",
);
?>
<?php if ($hasPost) : ?>
<div class="wrap-banner-formal-cate-list">
    <div class="banner-formal-cate-list">
        <img width="920" height="271" src="<?php echo WP_HOME; ?>/images/formal-rental/banner-ctm-review-<?php echo $scene_formal_name; ?>.jpg">
    </div>
</div>
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

                ?>
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
                </div><!--end list-total-ctm-review-->
            <?php
            endwhile;
            ?>
            <?php wp_reset_postdata(); ?>
        <?php endif;?>
    </div><!--end box-review-content-->
    <?php if ($review_list_page) : ?>
    <div class="paging-ctm-review">
        <?php wp_pagenavi(array('query' => $query, 'options' => array(
            'first_text' => 1,
            'last_text' => $query->max_num_pages,
            'prev_text' => '<span class="paging-nav prev"></span>',
            'next_text' => '<span class="paging-nav next"></span>')) ); ?>
    </div><!--end paging-ctm-review-->
    <?php endif; ?>
    <?php if ( array_key_exists($slug, $formalPlanSlugs) ) : ?>
        <div class="wrap-btn-detail"><a href="/formal/<?php echo $slug;?>/review">すべての口コミをみる</a></div>
    <?php endif; ?>
    <?php
    $page_template_current = get_page_template();
    $page_template_name = basename($page_template_current, '.php');
    if($page_template_name != 'new-access-child-page' && $page_template_name != 'formal-new-access-child-page'):
        ?>

    <?php endif; ?>
</div><!--end customer-review-content-->
<?php endif; ?>