<?php
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
if($isSmartPhone){
    $limit = 6;
}else{
    $limit = 10;
}
?>
<script type="application/javascript">
    function ajaxSearchProductByShop (group) {
        LazyLoad.executeOnDependAvailable("$.fn.yiiListView", function () {
            e = window.event;
            if (typeof e != 'undefined' && e.preventDefault)
                e.preventDefault();
            var request = {
                shop_id : <?php echo $attrShortCode['shop_id']?>,
                plan_group: group
            };
            $.fn.yiiListView.update(
                // id of the CListView
                '<?php echo $attrShortCode['id'].'_list_view'?>',
                {
                    data: request,
                }
            )
        }, false);
        $(".custom-display-group").find('.active').removeClass('active');
        $(".custom-display-group .group-btn[value*='"+group+"']").addClass('active');
        $(this).addClass('active');
    }
    if(typeof afterAjaxUpdate != 'function'){
        function afterAjaxUpdate () {
            var scrollTop = typeof mobile === "number" && mobile === 1 ? $("#highend_product_list").offset().top - 50: $("#highend_product_list").offset().top;
            //$("html, body").animate({ scrollTop: scrollTop - 60}, "slow");
            $('.main-image img').lazyLoadXT();
            $('#result-count-display').text($('#result-count-hidden').text());
        }
    }
</script>
<div class="widget-formal-product-by-shop widget-formal-product-by-shop-<?= $attrShortCode['shop_id'];?> widget-top-product-formal-cate">
    <div class="custom-display-group">
        <?php
        if(!empty(MasterValues::$PRODUCT_FOR_GROUP_BY_ACCESS_SHOP[$attrShortCode['shop_id']])){
            $isActive=true;
            foreach (MasterValues::$PRODUCT_FOR_GROUP_BY_ACCESS_SHOP[$attrShortCode['shop_id']] as $group){?>
                <button type="button" class="group-btn <?php echo $isActive?'active':'' ?>" value="<?php echo $group;?>" onclick="ajaxSearchProductByShop(<?php echo $group;?>)"><?php echo Yii::t('formal',"plan-group-$group")?></button>
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
            'shop_id'=>(string)$attrShortCode['shop_id'],
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
    <?php if(!empty($attrShortCode['link'])&&!empty($attrShortCode['title'])):?>
    <p class="link-to-cate">
        <a href="<?= WP_HOME ?>/<?= $attrShortCode['link'];?>"><?= Yii::t('wp_theme.access', $attrShortCode['title']); ?></a>
    </p>
    <?php endif ?>
</div>