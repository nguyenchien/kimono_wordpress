<?php
global $post;
$post_name = $post->post_name;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$limit = 8;
$list_text_button = array(
    'asakusa' => Yii::t('product', 'きものレンタルプラン一覧'),
    'kamakura' => Yii::t('product', 'すべての商品を見る'),
    'shinjuku-station' => Yii::t('product', 'すべての商品を見る'),
    'sendai-parco2' => Yii::t('product', 'すべての商品を見る'),
    'sapporo-susukinostation' => Yii::t('product', 'すべての商品を見る'),
    'okinawa-naha' => Yii::t('product', 'すべての商品を見る'),
);
?>
<script type="text/javascript">
    $(document).ready(function(){
    });
</script>
<script type="application/javascript">
function ajaxSearchProductByShop (group, id_list_view, elm) {
        if (id_list_view == undefined) {
            id_list_view = '<?php echo $attrShortCode['id'].'_list_view'?>';
        }
        LazyLoad.executeOnDependAvailable("$.fn.yiiListView", function () {
            e = window.event;
            if (typeof e != 'undefined' && e.preventDefault)
		    e.preventDefault();
	    shopId = '<?php echo $attrShortCode['shop_id']?>';
	    if (group == 18) {
		    group = "9,17,18";
		shopId= '';
	    }
            var request = {
                shop_id : '',
                plan_group: group
	    };
            $.fn.yiiListView.update(
                // id of the CListView
                id_list_view,
                {
                    data: request
                }
            );
        }, false);
        var filter_product_id = '#filter_product_' + id_list_view;
        $(filter_product_id + " .custom-display-group").find('.active').removeClass('active');
	 $(elm).addClass('active');
	/*$(filter_product_id + " .custom-display-group .group-btn[value*='"+group+"']").addClass('active');
	$(this).addClass('active');*/
    }
    function afterAjaxUpdate () {
        var scrollTop = typeof mobile === "number" && mobile === 1 ? $("#highend_product_list").offset().top - 50: $("#highend_product_list").offset().top;
        //$("html, body").animate({ scrollTop: scrollTop - 60}, "slow");
        $('.main-image img').lazyLoadXT();
        $('#result-count-display').text($('#result-count-hidden').text());

        //Slider shop ranking
        if($('.shop-ranking .list li').length > 0){
            $('.shop-ranking .list').not('.slick-initialized').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: true,
                lazyLoad: 'ondemand',
                responsive: [{
                    breakpoint: 750,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }]
            });
        }

        // Case: Empty product
        var has_empty_product = $('.wrap-list-product').find('.empty.slick-slide');
        if (has_empty_product) {
            $(has_empty_product).css('width', 'auto').parents('.slick-track').css('width', 'auto');
        }
    }
</script>
<div id="filter_product_<?php echo $attrShortCode['id'].'_list_view'?>" class="widget-formal-product-by-shop widget-formal-product-by-shop-<?= $attrShortCode['shop_id'];?> widget-top-product-formal-cate">
    <div class="custom-display-group filter-shop-ranking">
        <?php
        if ( !empty($attrShortCode['plan_group']) ) {
            $plan_group = explode(",", $attrShortCode['plan_group']);
            $isActive=true;
	    foreach ($plan_group as $group){?>
                <button type="button" class="group-btn <?php echo $isActive?'active':'' ?>" value="<?php echo $group;?>" onclick="ajaxSearchProductByShop(<?php echo $group;?>, '<?php echo $attrShortCode['id'].'_list_view'?>',this)"><?php echo Yii::t('formal',"plan-group-$group")?></button>
                <?php
                $isActive=false;
            }
            $activeGroup = $plan_group[0];
        } elseif ( !empty(MasterValues::$PRODUCT_FOR_GROUP_BY_ACCESS_SHOP[$attrShortCode['shop_id']]) ){
            $isActive=true;
            foreach (MasterValues::$PRODUCT_FOR_GROUP_BY_ACCESS_SHOP[$attrShortCode['shop_id']] as $group){?>
                <button type="button" class="group-btn <?php echo $isActive?'active':'' ?>" value="<?php echo $group;?>" onclick="ajaxSearchProductByShop(<?php echo $group;?>, '<?php echo $attrShortCode['id'].'_list_view'?>,this')"><?php echo Yii::t('formal',"plan-group-$group")?></button>
            <?php
                $isActive=false;
            }
            $activeGroup = MasterValues::$PRODUCT_FOR_GROUP_BY_ACCESS_SHOP[$attrShortCode['shop_id']][0];
        }
        ?>
    </div>
    <div class="wrap-list-product">
        <?php $arg =array(
            'limit'=>$limit,
//            'shop_id'=>(string)$attrShortCode['shop_id'],
            'id'=>(string)$attrShortCode['id'],
            'enable_lazy_load'=>false,
            'list_view_id' => $attrShortCode['id'].'_ajaxListView',
        );
        if (!empty($activeGroup)){
            $arg['plan_group']=(string) $activeGroup;
	} 
        echo filter_formal_product($arg);
        ?>
    </div>
    <?php if ( !empty($attrShortCode['link']) && empty($attrShortCode['no_button']) ) : ?>
    <div class="wrap-btn-v2 flexbox">
        <div class="btn-v2 btn-v2-asakusa btn-v2-<?= $post_name; ?>">
            <a href="<?= WP_HOME ?>/<?= $attrShortCode['link'];?>">
                <div class="pattern"></div>
                <div class="text">
                    <span class="text-link"><?= $list_text_button[$post_name] ? $list_text_button[$post_name] : ( !empty($attrShortCode['title']) ? $attrShortCode['title'] : '' ) ?></span>
                    <span class="icon-arrow-r-link"></span>
                </div>
                <div class="pattern last"></div>
            </a>
        </div>
    </div>
    <?php endif ?>
</div>
