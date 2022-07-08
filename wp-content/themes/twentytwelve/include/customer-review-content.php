<?php
    global $post;
$lang = Yii::app()->language;

    $is_review = is_page('review');
    $parent_id = wp_get_post_parent_id($post->ID);
    if ($is_review) {
        $shop_id = get_field( "shop_id", $parent_id);
    }
    else{
        $shop_id = get_field( "shop_id", $post->ID);
    }
    if (empty($shop_id)) {
        $shop_id = 16;
    }
    $review_list_page =  is_page('review');

    $parent_title = $review_list_page ? get_the_title($parent_id) : get_the_title();

    // get query and argument (must)
    wp_reset_postdata();
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$post_type = post_type_exists('yesterday-cust-voice') ? 'yesterday-cust-voice' : 'yesterday_cust_voice';
    $args_my_query = array(
        'post_type' => $post_type,
        'meta_key' => 'shop_id',
        'meta_value' => $shop_id,
        'pagination'  => true,
        'paged' => $paged,
        'posts_per_page' => $review_list_page ? 10 : 5
    );
    $query = new WP_Query($args_my_query);

    //Star List
    $star_list = array(
        1 => "★",
        2 => "★★",
        3 => "★★★",
        4 => "★★★★",
        5 => "★★★★★",
    );
    $total_rate = 0;
    // Create list for get value;
    $post_rate_list = array();
    $rate_customer_list = array();
    $rate_kimono_list = array();
    $rate_hair_list = array();

    $shop_rate_average = Yii::app()->cache->get('shop_rate_average_new_'.$shop_id.Yii::app()->language);
    $total_post = $query->found_posts;
    if ($shop_rate_average == false) {
        $args_query_all = array(
            'post_type' => $post_type,
            'meta_key' => 'shop_id',
            'meta_value' => $shop_id,
            'nopaging'  => true
        );
        $query_all = new WP_Query($args_query_all);
        while( $query_all->have_posts() ) :
            $query_all->the_post();
            $rate_customer = get_field("customer");
            $rate_customer = $rate_customer > 0 ? $rate_customer : rand(4,5);
            $rate_kimono = get_field("kimono");
            $rate_kimono = $rate_kimono > 0 ? $rate_kimono : rand(4,5);
            $rate_hair = get_field("hair");
            $rate_hair = $rate_hair > 0 ? $rate_hair : rand(4,5);
            $average_rate = ($rate_customer + $rate_kimono + $rate_hair)/3;
            $average_rate = round($average_rate,0,PHP_ROUND_HALF_UP);
            $total_rate += $average_rate;
        endwhile;
        wp_reset_postdata();

	    $shop_rate_average = $total_post > 0 ? ($total_rate)/($total_post) : 0;
        // Set cache for shop rate average
        Yii::app()->cache->set('shop_rate_average_new_'.$shop_id.Yii::app()->language, $shop_rate_average);
    }
    $shop_rate_average_decimal = $shop_rate_average;
	$shop_rate_average = round($shop_rate_average,0,PHP_ROUND_HALF_UP);
?>

<div class="customer-review-content">
    <div class="box-review-content">
        <div class="wrap-lg-total-review">
            <div class="wrap-title-lg-total wrap-padding">
                <div class="title-lg-total"><?=$parent_title .' ' . Yii::t('review-by-shop', 'の総合評価')?></div>
                <div clas="average-rank-total title-star star-large"><?php echo $star_list[$shop_rate_average]?><span class="title-sm-total" style="padding-left: 15px;font-size: 30px;"><?php echo number_format((float)$shop_rate_average_decimal, 1, '.', '');?></span><span class="title-sm-total">（<?php echo $total_post .' '. Yii::t('review-by-shop', '件の口コミ'); ?>）</span></div>
            </div>
        </div><!--end wrap-lg-total-review-->
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
                $customer_name = get_field("name");
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
                            <p class="title-star"><?php echo Yii::t('review-by-shop', '総合評価: '); ?><var class="average-rank-star title-star star-medium"><?php echo $star_list[$post_rate_list[get_the_ID()]]?><span style="padding-left: 10px;font-size: 25px;"><?php echo number_format((float)$post_rate_list_number[get_the_ID()], 1, '.', '');?></span></var></p>
                        </div>
                        <div class="wrap-infor-ctm-review wrap-padding">
                            <div class="total-kind-review">
                                <p class="title-rank title-rank-scustomer"><?php echo Yii::t('review-by-shop', '接客：'); ?><var class="title-star star-sm"><?php echo $star_list[$rate_customer_list[get_the_ID()]];?></var></p>
                                <p class="title-rank title-rank-kimono"><?php echo Yii::t('review-by-shop', '着付け：'); ?><var class="title-star star-sm"><?php echo $star_list[$rate_kimono_list[get_the_ID()]];?></var></p>
                                <?php if($shop_id != 23):?>
                                <p class="title-rank title-rank-hair"><?php echo Yii::t('review-by-shop', 'ヘア：'); ?><var class="title-star star-sm"><?php echo $star_list[$rate_hair_list[get_the_ID()]];?></var></p>
                                <?php endif;?>
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

    <?php
        $page_template_current = get_page_template();
        $page_template_name = basename($page_template_current, '.php');
        if($page_template_name != 'new-access-child-page' && $page_template_name != 'formal-new-access-child-page'):
    ?>
        <div class="paging-ctm-review">
            <?php wp_pagenavi(array('query' => $query, 'options' => array(
                'first_text' => 1,
                'last_text' => $query->max_num_pages,
                'prev_text' => '<span class="paging-nav prev"></span>',
                'next_text' => '<span class="paging-nav next"></span>')) ); ?>
        </div><!--end paging-ctm-review-->

        <div class="banner-bottom-ctm-review">
            <div class="row">
                <ul class="list-banner flexbox">
                    <li class="item item-1" style="display:none;"><a href="<?= home_url(); ?>/kimono"><img src="<?= WP_HOME; ?>/images/customer-review/banner-review-01<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt=""></a></li>
                    <li class="item item-2" style="display:none;"><a href="<?= home_url(); ?>/yukata"><img src="<?= WP_HOME; ?>/images/customer-review/banner-review-02.jpg" alt=""></a></li>
                    <li class="item item-3"><a href="<?= home_url(); ?>/formal"><img src="<?= WP_HOME; ?>/images/customer-review/banner-review-03<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt=""></a></li>
                    <li class="item item-4"><a href="<?= home_url(); ?>/takuhai"><img src="<?= WP_HOME; ?>/images/customer-review/banner-review-04<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt=""></a></li>
                </ul>
            </div>
        </div><!--end banner-bottom-ctm-review-->

        <div class="intro-top-general pc">
            <h3 class="title-intro-top"><?php echo Yii::t('wp_theme', 'きものレンタルwargoのご紹介') ?></h3>
            <div class="content-intro-top">
                <p class="intro-text">
                    <?php echo Yii::t('wp_theme', '金沢兼六園すぐの香林坊東急スクエアGF、せせらぎ通り沿いにあるレンタル着物・レンタル浴衣のお店『きものレンタルwargo』金沢香林坊店の、着付け師とスタッフが綴る着物と京都のブログ。金沢市日本三大名園の一つ、金沢の観光名所の代表である兼六園の桜・紅葉・雪景色・ライトアップなど兼六園の季節ごとの景色など、金沢に暮らしているローカルならではの旬でミクロな金沢便りをお届けします。') ?>
                </p>
            </div>
        </div><!-- end intro-top-general -->
    <?php endif; ?>
</div><!--end customer-review-content-->