<?php
/**
 * Template Name: Customer Remark
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
wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-flexslider');
wp_enqueue_script('customer-remark-script', get_template_directory_uri() . '/js/customer-remark.js');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'), '201802021658');
wp_enqueue_style('new-formal-rental-style');
wp_register_style('customer-remark-style', get_template_directory_uri() . '/css/customer-remark.css', array('twentytwelve-style'), '201802021121');
wp_enqueue_style('customer-remark-style');
wp_enqueue_script('new-customer-review-script', get_template_directory_uri() . '/js/customer-review.js');
wp_register_style('style-customer-review', get_template_directory_uri() . '/css/customer-review.css' , array('twentytwelve-style'));
wp_enqueue_style('style-customer-review');
get_header('formal');
    $isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
    $baseUrl = Yii::app()->baseUrl;
    global $post;
    global $wp;
    $postName = $post->post_name;

    $formalPlanSlugs = array(
        'homongi',
        'kurotomesode',
        'irotomesode',
        'seijin',
        'sotsugyou',
        'shichigosan'
    );

    /* get category highend-cust-remark */
    wp_reset_postdata();
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    // Get current queried object
    $queried_obj = get_queried_object();
    $category = $queried_obj->slug;
    // Get current queried object's taxonomies
    /*$taxonomies = $queried_obj->taxonomies;
    $taxonomies = !empty($taxonomies) ? $taxonomies : $queried_obj->taxonomy;*/
    // Check if taxonomy
    /*if (!empty($taxonomies)) {
        $limit = getTaxonomyField($taxonomies, 'category_limit');
    }else{
        $limit = 10;
    }*/
    //if(empty($limit) || !is_numeric($limit) || $limit <= 0) {
        $limit = 12;
    //}
    $numberFormatter = Yii::app()->numberFormatter;
    $currencyFormat = DateTimeUtils::getCurrencyFormat();
    $currencySymbol = Yii::app()->locale->getCurrencySymbol('JPY');
    $args=array(
        'post_status'            => 'publish',
        'tax_query' => array( // filter following category slug
            array(
                'taxonomy' => 'customer-remark-tax', // taxonomy type
                'field' => 'slug', // filter following slug
                'terms' => $category// category slug name
            )
        ),
        'post_type' => array('customer-remark'),
        'pagination'		     => true,
        'paged'					 => $paged,
        'posts_per_page'         => $limit,
        'order'                  => 'DESC',
        'orderby'                => 'date',
    );

    $the_query  = new WP_Query($args);
    $total_pages = $the_query -> max_num_pages;
    $posts = $the_query->posts;
    $productIds = array();
    // Get all product from all post contain product_id custom_field
    foreach($posts as $postItem) {
        $product_id = get_field('product_id', $postItem->ID);
        if (!empty($product_id) && $product_id = (int)$product_id) {
            $productIds[] = $product_id;
        }
    }
    $productModel = new Product();
    $productList = $productModel->with('planTypeHighend')->findAllByPk($productIds);
    // generate product list
    $products = array();

    foreach ($productList as $product) {
	    $products[$product->product_id] = $product;
    }

    $category_link = home_url($wp->request);


    //Star List
        $star_list = array(
        1 => "★",
        2 => "★★",
        3 => "★★★",
        4 => "★★★★",
        5 => "★★★★★",
    );
?>
<div class="container clearfix">
    <div class="wrap-highend-v2">
		<?php if (!empty($postName) && in_array($postName, $formalPlanSlugs)): ?>
            <div class="banner-top-highend-v2">
                <div class="container-box">
					<?php
					echo swe_wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, array('alt' => strip_tags(get_the_title())));
					?>
                </div>
            </div>
		<?php endif; ?>
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="right-column right-column-list">
                                <div class="wrap-customer-remark">
									<?php
									if (function_exists('yoast_breadcrumb')) {
										yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
									}
									?>
									<?php // Begin content ?>
                                    <div class="customer-remark-wrap">
                                        <div class="row">
                                            <div class="banner-customer-remark">
                                                <img class="pc" src="<?php echo WP_HOME;?>/images/formal-rental/banner-customer-remark-pc.jpg" alt="">
                                                <img class="sp" src="<?php echo WP_HOME;?>/images/formal-rental/banner-customer-remark-sp.jpg" alt="">
                                            </div>
                                            <div class="menu-toggle"><span id="toggle-sidebar" class="icon icon-formal-menu-toggle-open"></span></div>
                                            <div class="customer-remark-wrap-content">
                                                <div class="customer-remark-left-content">

                                                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
	                                                <?php
                                                        $product_id = get_field('product_id');
                                                        $product = isset($products[$product_id]) ? $products[$product_id]: false;
                                                        $planModel = isset($product->planTypeHighend) ? $product->planTypeHighend: false;
                                                        $productDetailLink = "#";
                                                        if (is_numeric($product_id)) {
                                                            $productDetailLink = Yii::app()->createAbsoluteUrl('formal/product', array('id' => $product_id));
                                                        }
                                                        $planTypeName = !empty($planModel) ? $product->planTypeHighend->plan_type_name: '';
                                                        $productName = !empty($product->product_name) ? $product->product_name: '';
                                                        $productCode = !empty($product->product_code) ? $product->product_code: '';
                                                        $priceData = $planModel ? $planModel->getPrice(): false;
                                                        $price = $numberFormatter->format($currencyFormat, $priceData ? $priceData['rental_price_reduced']: 0, $currencySymbol);
	                                                    $image_product = get_field("image_product");

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
                                                    <?php if (!empty($image_product['url']) && !empty($productName) && $price != "￥0"):?>
                                                    <div class="customer-remark-box flexbox">
                                                        <div class="customer-product-img-wrap pc">
                                                            <?php if ($image_product) :?>
                                                            <a href="<?php echo $productDetailLink;?>" class="customer-product-img"><img src="<?php echo $image_product['url'];?>" alt="<?php echo $image_product['alt'];?>"></a>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="customer-product-info flexbox">
                                                            <div class="wrap-pic-sp">
                                                                <div class="customer-product-img-wrap sp">
                                                                    <?php if ($image_product) :?>
                                                                        <a href="<?php echo $productDetailLink;?>" class="customer-product-img"><img src="<?php echo $image_product['url'];?>" alt="<?php echo $image_product['alt'];?>"></a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="customer-feedback-info">
                                                                <div class="wrap-customer-feedback flexbox">
                                                                    <div class="feedback-product-name"><?php echo Yii::t('formal.customer_remark', '{plan_type_name}<br>「{product_name}」{product_code}', array('{plan_type_name}' => $planTypeName, '{product_name}' => $productName, '{product_code}' =>  $productCode));?></div>
                                                                    <?php if ($priceData > 0 || $priceData['rental_price_reduced'] > 0) {?>
                                                                        <div class="feedback-product-price flexbox">
                                                                        <?php if($category=='customer-remark-kurotomesode') { ?>
                                                                            <span class="visit"><?php echo Yii::t('formal.customer_remark', '黒留袖');?></span>
                                                                        <?php }elseif($category=='customer-remark-irotomesode') { ?>
                                                                            <span class="visit"><?php echo Yii::t('formal.customer_remark', '色留袖');?></span>
                                                                        <?php }elseif($category=='customer-remark-seijin') { ?>
                                                                            <span class="visit"><?php echo Yii::t('formal.customer_remark', '振袖');?></span>
                                                                        <?php }elseif($category=='customer-remark-ubugi') { ?>
                                                                            <span class="visit"><?php echo Yii::t('formal.customer_remark', '産着');?></span>
                                                                        <?php }else{ ?>
                                                                            <span class="visit"><?php echo Yii::t('formal.customer_remark', '訪問着');?></span>
                                                                        <?php } ?>
                                                                            <span class="feedback-price"><?php echo $price;?> <small><?= Yii::t('takuhai.product','+tax')?></small></span>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <div class="see-detail"><a href="<?php echo $productDetailLink;?>" class="go-detail"><?php echo Yii::t('formal.customer_remark', 'この商品を見る');?></a></div>
                                                                </div>
                                                                <div class="wrap-infor-ctm-review wrap-infor-ctm-review-tax">
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

                                                            <?php
                                                            $customer_remark_image = get_field("new_customer_remark_image");
                                                            $customer_feedback_text = get_field("customer_feedback_text");

                                                            if (!empty($customer_remark_image)):?>
                                                            <div class="customer-feedback-img"><img src="<?php echo $customer_remark_image['url'];?>" alt="<?php echo $customer_remark_image['alt']?>"></div>
                                                            <?php endif; ?>
                                                            <div class="customer-feedback-text">
                                                                <p class="feedback-text"><?php echo $customer_feedback_text;?></p></div>
                                                            <div class="post-date"><?php echo the_field('customer_info');?>|<?php the_date();?></div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                <?php endwhile; endif; ?>
                                                    <div style="text-align: center;">
                                                        <div class="paging-customer-remark"><?php wp_pagenavi(array('query' => $the_query, 'options' => array(
                                                                'first_text' => 1,
                                                                'last_text' => $total_pages,
                                                                'prev_text' => '<span class="paging-nav prev"></span>',
                                                                'next_text' => '<span class="paging-nav next"></span>')) ); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="customer-remark-right-content" id="right-sidebar">
                                                    <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                                                        <?php dynamic_sidebar( 'sidebar-4' ); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<?php // End content ?>
                                </div>
                            </div><!--end right-column-->

                        </div><!--end wrap-boths-column-->

                    </div><!--end left-column-content-->

                </div><!--end wrap-column-content-->
            </div>

        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->
</div><!-- end container -->
<style>
    @media screen and (max-width: 767px){
        .wrap-description-ctm-review.title-rank {
            padding-bottom: 50px;
        }
    }
</style>
<?php get_footer('formal'); ?>