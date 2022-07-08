<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 9/21/2018
 * Time: 10:38 AM
 */
    global $post;
    $isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
    $is_page_review_custom = false;
    $page_review_custom = array('asakusa');
    if(in_array($post->post_name,$page_review_custom)){
        $is_page_review_custom = true;
    }

// Customer Review By Shop
wp_enqueue_script('new-customer-review-script', get_template_directory_uri() . '/js/customer-review.js');
wp_register_style('style-customer-review', get_template_directory_uri() . '/css/customer-review.css' , array('twentytwelve-style'));
wp_enqueue_style('style-customer-review');
    // get query and argument (must)
    wp_reset_postdata();
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args_my_query=array(
    'post_status'   => 'publish',
    'post_type' => array('customer-remark'),
    'nopaging'		 => false,
    'paged'		     => $paged,
    'posts_per_page' => $page_review_custom ? 4 : 5,
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
?>
<div class="customer-review-content">
    <ul class="box-review-content">
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
//                $customer_name = get_field("customer_info");
//                $customer_name = !empty($customer_name) ? $customer_name : substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1).'.'.substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1);
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
                <li class="box-review">
                    <div class="review-img">
                        <div class="wrap-pd-img">
                            <div class="pd-img">
                                <?php if ($image_product) :?>
                                    <?php
                                    $ext = end(explode('.', $image_product['url']));
                                    $newUrl = str_replace('.'.$ext, '-271x271.'.$ext, $image_product['url']);
                                    ?>
                                    <a href="#" class="customer-product-img"><img data-src="<?php echo $newUrl;?>" alt="<?php echo Yii::t('formal.customer_remark', '{plan_type_name}「{product_name}」{product_code}', array('{plan_type_name}' => $planTypeName, '{product_name}' => $productName, '{product_code}' =>  $productCode));?>"></a>
                                <?php else: ?>
                                    <img src="<?= WP_HOME; ?>/images/no-image.png" alt="<?php echo Yii::t('formal.customer_remark', '{plan_type_name}「{product_name}」{product_code}', array('{plan_type_name}' => $planTypeName, '{product_name}' => $productName, '{product_code}' =>  $productCode));?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <ul class="review-info">
                        <?php if ($customer_date_visit){?><li class="date-visit"><?php echo Yii::t('review-by-shop', 'ご来店日：'); ?><?php echo $customer_date_visit_beauty;?></li><?php } ?>
                        <li class="comment">
                            <p><?php the_content(); ?></p>
                        </li>
                    </ul>
                    <div class="vote">
                        <div class="stat">
                            <div class="vote-name"><span><?php echo Yii::t('review-by-shop', '総合評価 '); ?><var>:</var></span></div>
                            <div class="vote-star">
                                <?php echo $star_list[$post_rate_list[get_the_ID()]]?>
                            </div>
                        </div>
                    </div>
                    <div class="pd-review">
                        <div class="link-more">
                            <a href="#" class="go-detail"><?php echo Yii::t('formal.customer_remark', 'ご利用いただいたお着物');?></a>
                        </div>
                    </div>
                </li>
                <?php
            endwhile;
            ?>
            <?php wp_reset_postdata(); ?>
        <?php endif;?>
    </ul><!--end box-review-content-->

    <?php
        $page_template_current = get_page_template();
        $page_template_name = basename($page_template_current, '.php');
        if($page_template_name != 'new-access-child-page' && $page_template_name != 'formal-new-access-child-page'):
    ?>

    <?php endif; ?>
</div><!--end customer-review-content-->
