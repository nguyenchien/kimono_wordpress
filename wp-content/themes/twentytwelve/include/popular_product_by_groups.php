<?php
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
if($isSmartPhone){
    $limit = 3;
}else{
    $limit = 5;
}

foreach ($attrShortCode['groups'] as $group){
?>
        <div class="widget-formal-popular-product-by-groups widget-formal-popular-product-by-groups-<?= $group;?> widget-top-product-formal-cate">
            <div class="group-title">
                <?php echo Yii::t('formal',"plan-group-$group")?>
            </div>
            <div class="wrap-list-product">
                <?php $arg =array(
                    'limit'=>$limit,
                    'shop_id'=>(string)$attrShortCode['shop_id'],
                    'id'=> "popular_product_by_group_{$group}_shop_{$attrShortCode['shop_id']}",
                    'list_view_id'=> "popular_product_by_group_{$group}_shop_{$attrShortCode['shop_id']}_ajaxListView",
                    'enable_lazy_load'=>false,
                    'sort' => MasterValues::MV_FORMAL_PRODUCT_SORT_POPULAR
                );
                $arg['plan_group']=(string) $group;
                echo filter_formal_product($arg);
                ?>
            </div>
        </div>
<?php
}

?>
<script>
    var observer = new MutationObserver(function(mutationsList) {
        $.each(mutationsList, function(index, mutation){
            if (mutation.type == 'childList') {
                $.each(mutation.addedNodes, function (indexNode, node) {
                    if($(node).find('.empty')){
                        $(".widget-formal-popular-product-by-groups:has('.list.dp-flex .empty')").css({'display':'none'})
                    }
                })
            }
        })
    });
    observer.observe($('.wrap-popular-product')[0], {childList: true});
</script>