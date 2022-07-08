<?php
/**
 * Template Name: New Formal Low Price
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
wp_enqueue_script('new-formal-rental-script', get_template_directory_uri() . '/js/new-formal-rental.js');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
wp_register_style('new-formal-product-detail', get_template_directory_uri() . '/css/new-formal-product-detail.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-detail');
wp_register_style('new-formal-product-low-price', get_template_directory_uri() . '/css/new-formal-product-low-price.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-low-price');
wp_register_style('new-formal-product-cart', get_template_directory_uri() . '/css/new-formal-product-cart.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-cart');
wp_register_style('new-formal-popup', get_template_directory_uri() . '/css/new-formal-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-popup');
get_header('formal');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;
$numberFormatter = Yii::app()->numberFormatter;
$currencySymbol = Yii::app()->locale->getCurrencySymbol('JPY');
$currencyFormat = DateTimeUtils::getCurrencyFormat();
$decimalNoneDigitsFormat = DateTimeUtils::getNumberFormat();

//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;

$productIds = array();
$productContents = array();
for($i = 1; $i <= 10; $i++) {
    $productId = get_field("product_id_$i");

    if ((int)($productId)) $productIds[] = $productId;
}

$products = Product::getPublicProductsByIds($productIds, array(),false,array('planTypeHighend' => array('joinType'=>'LEFT JOIN')), false);
$initProductId = false;
$listSize = Product::productSizes();

for ($i = 1; $i <= 10; $i++) {
    $productSizes = array();
    $content = get_field("product_content_$i");
    $productId = (int)get_field("product_id_$i");
    $product = isset($products[$productId]) ? $products[$productId] : null;
    $productSize = isset($product->product_size) ? $product->product_size: null;
    if ($product) {
        $productRootId = $product->product_root_id;
        if ($productRootId) {
            $productRoot = Product::getPublicProductsByIds(array($productRootId), array(),false,array('planTypeHighend' => array('joinType'=>'LEFT JOIN')), false);
            if ($productRoot) {
                $product = $productRoot[$productRootId];
                $content = preg_replace('/data-pid="'.$productId.'"/i', 'data-pid="'.$product->product_id.'"', $content);
                $content = preg_replace('/carousel-'.$productId.'/i', 'carousel-'.$product->product_id, $content);
                $content = preg_replace('/sliderProduct-'.$productId.'/i', 'sliderProduct-'.$product->product_id, $content);
                $content = preg_replace('/data-slider-id="'.$productId.'"/i', 'data-slider-id="'.$product->product_id.'"', $content);
                $productId = $product->product_id;
            }
        }

        $productSizes = $product ? Product::getProductSizesBy($product->product_id, $product): array();
        if(!isset($productSizes[$productSize]))
            $productSize = isset($product->product_size) ? $product->product_size: null;
    }

    if (false == $initProductId && $product) {
        $initProductId = $productId;
    }

    $longName = !empty($product) ? $product->getLongName() : '';
    $productCode = !empty($product) ? $product->getProductCode() : '';

    if (empty($product->planTypeHighend)) {
        $priceData = array(
            'rental_price' => isset($product->rental_price) ? $product->rental_price : '',
            'rental_price_reduced' => isset($product->rental_price_reduced) ? $product->rental_price_reduced : ''
        );
        $planModel = null;
    } else {
        $planModel = $product->planTypeHighend;
        $priceData = $planModel ? $planModel->getPrice() : array('rental_price_reduced' => '', 'rental_price' => '');
    }
	if (empty($priceData['rental_price_reduced'])) {
		$priceData['rental_price_reduced'] = $priceData['rental_price'];
	}

    $planTypeGroup = !empty($planModel) ? $planModel->for_group : null;
    $longName = '<div class="title-name-product">' . $longName . '</div>';
    $productCode = '<div class="wrap-model content-col-info">' . Yii::t('takuhai.product', '型番') . ':' . $productCode . '</div>';
    $red_price = '<span class="web-bg-red">' . Yii::t('wp_theme', 'Web決済価格') . '</span>';
    $sm_price = '<span class="sm-price">' . $numberFormatter->format($currencyFormat, $priceData['rental_price'], $currencySymbol) . '<var class="tax-reduce">' . Yii::t('takuhai.product', '+tax↓') . '</var></span>';
    $lg_price = '<div class="wrap-lg-price flexbox align-items-center">' . $numberFormatter->format($currencyFormat, $priceData['rental_price_reduced'], $currencySymbol) . "<span>" . Yii::t('takuhai.product', '+tax') . "</span></div>";
    if($longName) $content = preg_replace('/<h1\s*class="title-name-product.*".[^>].*\s*<\/h1>/i', $longName, $content);
    if($productCode) $content = preg_replace('/<div\s*class="wrap-model\s*content-col-info.*>.*<\/div>/i', $productCode, $content);

    if ($priceData['rental_price'] < $priceData['rental_price_reduced']) {
        $content = preg_replace('/<(div\s*class="wrap-web-payment.*")[^>]?>.*\s*<\/div>/i', '', $content);
    }

    if($red_price) $content = preg_replace('/<(span\s*class="web-bg-red")[^>]?>.*\s*<\/span>/i', $red_price, $content);
    if($sm_price) $content = preg_replace('/<(span\s*class="sm-price")[^>]?>.*\s*<\/span>/i', $sm_price, $content);
    if($lg_price) $content = preg_replace('/<div\s*class="wrap-lg-price\s*flexbox\s*.*>.*<\/div>/i', $lg_price, $content);

    $li = '';
    $sizeLabel = isset($listSize[$productSize]) ? $listSize[$productSize]: null;
    if ($productSizes): ob_start(); ?>
        <li class="item-size-info flexbox">
            <div class="product-size-list flexbox" data-root-id = "<?php echo $productId;?>">
                <?php foreach ($productSizes as $product_id => $size): ?>
                    <?php $selected = $size == $sizeLabel; ?>
                    <div class="size-item flexbox <?php echo $selected ? 'active' : ''; ?>">
                        <input id="product-size-detail<?= $product_id; ?>" <?php echo $selected ? 'checked="checked"' : ''; ?>
                               type="radio" name="product-size" value="<?php echo $product_id; ?>" data-root-id= "<?php echo $productId;?>"/>
                        <label for="product-size-detail<?php echo $product_id; ?>"><?php echo $size; ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </li>
        <?php $contentSize = ob_get_contents(); ob_end_clean();$li.= $contentSize; ?>
    <?php endif; ?>

    <?php
    if (is_object($product) && $product->length_search_from && $product->length_search_from > 0 && $product->length_search_to) {
        $li .= "<li class=\"item-size-info flexbox\"> <span class=\"left-item-size\">" . Yii::t('takuhai.product', '身長') . "</span> <span class=\"right-item-size\">" . Yii::t('takuhai.product', '{from} ~ {to} cm', array('{from}' => $numberFormatter->format($decimalNoneDigitsFormat, $product->length_search_from), '{to}' => $numberFormatter->format($decimalNoneDigitsFormat, $product->length_search_to))) . "</span></li>";
    }
    if (is_object($product) && $product->hip_size && $hipSize = MasterValues::itemByValue('product_hip_size', $product->hip_size)) {
        $li .= "<li class=\"item-size-info flexbox\"> <span class=\"left-item-size\">" . Yii::t('takuhai.product', 'ヒップ') . "</span> <span class=\"right-item-size\">" . $hipSize . "</span></li>";
    }
    if (is_object($product) && $product->shoe_size && $shoeSize = MasterValues::itemByValue('product_shoe_size', $product->shoe_size)) {
        $li .= "<li class=\"item-size-info flexbox\"> <span class=\"left-item-size\">" . Yii::t('takuhai.product', '足のサイズ') . "</span> <span class=\"right-item-size\">" . $shoeSize . Yii::t('takuhai.product', ' まで') . "</span></li>";
    }

    $size = $li ? '<ul class="list-size-info">' . $li . '</ul>' : '';
    $content = preg_replace('~<ul\s*class="list-size-info.*"[^>]*>\K.*(?=</ul>)~Uis', $size, $content);

    $subNameItem = '<span class="lg-sub-name-item align-items-end">セット内容</span><span class="sm-sub-name-item">※着付けに必要な一式をすべて含みます。</span>';

    if ($planTypeGroup == MasterValues::PLAN_TYPE_GROUP_FURISODE) {
        $subNameItem = '<span class="lg-sub-name-item align-items-end">セット内容</span>';
    }
    $subNameItem = Yii::t('takuhai.product', $subNameItem);
    $content = preg_replace('/<h3\s*class="sub-name-item\s*flexbox\s*align-items-center\s*icon.*">.*<\/h3>/i', '<h3 class="sub-name-item flexbox align-items-center">' . $subNameItem . '</h3>', $content);
    $item_icon_set = Yii::getPathOfAlias('application.views.formal._item_icon_set') . '.php';

    $icons = Yii::app()->controller->renderFile($item_icon_set, array(
        'planTypeGroup' => $planTypeGroup,
        'planTypeId' => !empty($planModel) ? $planModel->plan_type_id : null
    ), true);

    $content = preg_replace('~<div\s*class="list-option-items.*"[^>]*>.*</div>~Uis', '<div class="list-option-items list-option-items-' . $planTypeGroup . '">' . $icons . '</div>', $content);
    $carousel = $slider = '';

    if ($product && $sliderImage = Utils::getSliderProduct($product)) {
        $li_image = '';
        foreach ($sliderImage['img'] as $image) {
            $li_image .= CHtml::tag('li', array(), $image);
        }
        $slider = '<div data-slider-id="' . $productId . '" id="sliderProduct-' . $productId . '" class="slider-product flexslider"><ul class="slides">' . $li_image . '</ul></div>';
        $li_image_s = '';
        foreach ($sliderImage['img_thumb'] as $image) {
            $li_image_s .= CHtml::tag('li', array(), $image);
        }

        $carousel = '<div id="carousel-' . $productId . '" class="carousel flexslider pc"><ul class="slides">' . $li_image_s . '</ul></div>';
    } else {
        $images = '<div class="photo-gallery no-image"><img src="' . Yii::app()->getBaseUrl(true) . '/images/no-image.png"/>';
    }

    if (!empty($slider)) $content = preg_replace('~<div\s*data-slider-id="'.$productId.'"[^>]*>.*<\/div>~Uis', $slider, $content);
    if (!empty($carousel)) $content = preg_replace('~<div\s*id="carousel-'.$productId.'"[^>]*>.*<\/div>~Uis', $carousel, $content);

    $formalBtn = '';

    if (!$product || $product->status != MasterValues::PRODUCT_STATUS_PUBLISHED) {
        $formalBtn = "<a class=\"btn-formal btn-color-grey\">".Yii::t('takuhai.product','宅配レンタルで予約する')."</a>";
        $formalBtn .= "<span class=\"text-notice\">". Yii::t('takuhai.product','Product is not stock')."</span>";
    }

    if ($formalBtn) $content = preg_replace('/<a\s*class="btn-formal\s*.*".*>*.*<\/a>/i', $formalBtn, $content);

    $productContents[] = $content;
}
?>
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
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal">', '</div>');
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
                                    echo FormalSidebarLeftCode(array());
                                }else{
                                    if($postName != 'list'){
                                        echo FormalSidebarLeftCode(array('type'=>'planlist'));
                                        echo FormalSidebarFilterCode(array('type'=>'planlist'));
                                    }else if($postName == 'list'){
                                        echo FormalSidebarFilterCode(array());
                                    }
                                }
                                ?>
                            </div>
                            <div class="right-column right-column-list">
                                <?php if (!empty($postName)): ?>
                                    <?php
                                    $post_thumbnail = get_post_thumbnail_id();
                                    if($post_thumbnail != ""){
                                        ?>
                                        <div class="banner-top-highend-v2">
                                            <div class="container-box">
                                                <a href="<?= home_url();?>/formal/<?= $parent_slug_name; ?>/list"><?php
                                                    the_post_thumbnail( 'full'); ?>
                                                </a></div>
                                        </div>
                                    <?php } ?>
                                <?php endif; ?>
                                <div class="product-excerpt"><?php the_excerpt() ?></div>
                                <?php if ($productContents) : ?>
                                <div class="wrap-products-low-price">
                                    <?php
                                    $h2LowPrice = get_field('h2_low_price');
                                    if ($h2LowPrice){
                                        echo $h2LowPrice;
                                    }
                                    ?>
                                    <div class="list-product-lp">
                                        <?php foreach ($productContents as  $content) : ?>
                                            <?php  echo $content;?>
                                        <?php endforeach;?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="wrap-btn-to-list">
                                        <a href="<?= home_url();?>/formal/<?= $parent_slug_name; ?>/list"><?=Yii::t('wp_theme','View list page of ' . $parent_slug_name);?></a>
                                    </div>
                                    <?php
                                    $groupBannerLowPrice = get_field('group_banner_low_price');
                                    if ($groupBannerLowPrice) {
                                        echo php_set_base_url($groupBannerLowPrice);
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
    <?php
    if ($initProductId && $initProductId > 0) {
        Yii::app()->controller->widget('application.components.widgets.popup.BookingFlowPopup', array('productId' => $initProductId));
    }
    ?>
</div><!-- end container -->
<?php get_footer('formal'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        <?php
        if($isSmartPhone):
        ?>
        var num_scroll = $(".closed-filter").outerHeight();

        $(window).on("scroll", function(){
            if($(this).scrollTop() > num_scroll){
                $(".closed-filter").addClass("fixed-icon-filter");
                $(".wrap-header").hide();
            }else{
                $(".closed-filter").removeClass("fixed-icon-filter");
                $(".wrap-header").show();
            }
        });
        var numHeight = $(".num-height").outerHeight();
        $(".icon-toggle-filter-sidebar").on('click', function () {
            $(".toggle-filter-list-sidebar").addClass("active").css("top", + numHeight);
            $("body, .wrap-overlay-filter").addClass("fixed-scroll overlay-toggle-filter");
            $(".closed-filter").addClass("icon-formal-check-ok");
        });
        $(".close-sidebar .closed-filter").on("click", function(){
            $("body, .toggle-filter-list-sidebar, .wrap-overlay-filter, .closed-filter").removeClass("active fixed-scroll overlay-toggle-filter icon-formal-check-ok");
        });

        var calendarWidth = $(window).width();
        $('.item-nav-top-search .wrap-dropdown-search .search_box_top_date_picker_wrapper').width(calendarWidth - 10);

        var calendarLeftPos = $('.item-nav-top-search').width() - 3;
        $('.item-nav-top-search .wrap-dropdown-search .search_box_top_date_picker_wrapper').css('left', "-" + calendarLeftPos + 'px');

        <?php endif?>

        // Call flexslider
        if ( $('.carousel').length ) {
            var containerWidth = $('.carousel').width();
            var itemWidthSliderProduct = containerWidth <=  640 ? (containerWidth -10)/4: (containerWidth-20)/4;
            var itemMarginWidthSliderProduct = 10;
            var minItemsSliderProduct = 4;
            var maxItemsSliderProduct = 4;

            $('[data-slider-id]').each(function (index, elem) {
                var sliderID = $(this).data('slider-id');
                $('#carousel-'+sliderID).flexslider({
                    slideshowSpeed  : 4000,
                    animationSpeed  : 400,
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: true,
                    prevText: "",
                    nextText : "",
                    itemWidth: itemWidthSliderProduct,
                    itemMargin: itemMarginWidthSliderProduct,
                    minItems: minItemsSliderProduct,
                    maxItems: maxItemsSliderProduct,
                    asNavFor: '#sliderProduct-'+sliderID
                });
            });

            // Slide for main image
            $('.slider-product').flexslider({
                slideshowSpeed  : 4000,
                animationSpeed  : 400,
                animation: "slide",
                controlNav: true,
                animationLoop: false,
                slideshow: true,
                prevText: "",
                nextText : "",
            });
        }

        // Begin popup
        //Detect smart phone
        var is_sp = "<?= Yii::app()->mobileDetect->isSmartPhone(); ?>";
        //Close popup when click outside
        $(document).on('click','#wrapBookingFlow.wrap-booking-flow-overflow',function(e){
            if($(e.target).hasClass('wrap-booking-flow-overflow') === true){
                PopupTab.closePopup();
            }
        });
        $('body').on('click', '#closeStep', function(e) {
            e.preventDefault();
            PopupTab.closePopup();
        });

        $("#wrapBookingFlow.wrap-booking-flow .title-plan .text").click(function () {
            $(this).parents(".title-plan").addClass("active");
            $(this).parents(".item-booking-type").siblings().find(".title-plan").removeClass("active");
        });

        $("#wrapBookingFlow.wrap-booking-flow .content-plan").click(function () {
            $(this).siblings(".title-plan").addClass("active");
            $(this).parents(".item-booking-type").siblings().find(".title-plan").removeClass("active");
        });

        if(is_sp){
            $("#wrapBookingFlow.wrap-booking-flow .radio-booking-type + label .content-plan").slideUp();
            $("#wrapBookingFlow.wrap-booking-flow .radio-booking-type:checked + label .content-plan").slideDown();

            $("#wrapBookingFlow.wrap-booking-flow .title-plan .arrow").click(function () {
                $(this).parents(".title-plan").toggleClass("closed");
                $(this).parents(".title-plan").siblings(".content-plan").slideToggle();
            });

            $("#wrapBookingFlow.wrap-booking-flow .title-plan .text").click(function () {
                $(this).parents(".title-plan").siblings(".content-plan").slideDown();
                $(this).parents(".item-booking-type").siblings().find(".content-plan").slideUp();
            });
        }
        if($('#wrapBookingFlow .radio-booking-type:checked').length){
            BookingFormal.formalType = $('#wrapBookingFlow .radio-booking-type:checked').val();
            var popup = $('#wrapBookingFlow');

            if(BookingFormal.formalType == 1 || BookingFormal.formalType == 3){
                popup.addClass('two-step');
            }else{
                popup.removeClass('two-step');
            }
        }
        $('#wrapBookingFlow .radio-booking-type').on('change', function () {
            BookingFormal.formalType = this.value;
            var popup = $(this).parents('#wrapBookingFlow');
            if(BookingFormal.formalType == 1 || BookingFormal.formalType == 3){
                popup.addClass('two-step');
            }else{
                popup.removeClass('two-step');
            }
        })
        $('#wrapBookingFlow #formal-datepicker').on('choose-hour', function () {
            if(BookingFormal.allocateInfo.success){
                var tmp = new Date(BookingFormal.allocateInfo.time_date);
                var weekDay = tmp.getDay();
                $('#wrapBookingFlow .get-selected-date').html(tmp.dateFormat(BookingFormal.dateFormat)+' ('+BookingFormal.datePickerOptions.locale.daysMin[weekDay]+') '+BookingFormal.allocateInfo.from_time_display);
            }else{
                $('#wrapBookingFlow .get-selected-date').html('<?php echo Yii::t('formal','カレンダーから選択して下さい')?>');
            }
        });

        $('#wrapBookingFlow #formal-takuhai-datepicker').on('choose-date', function () {
            if(BookingFormal.takuhaiAllocateInfo.success){
                var tmpUseDay = new Date(BookingFormal.takuhaiAllocateInfo.useDate);
                var weekDay = tmpUseDay.getDay();
                $('#wrapBookingFlow #takuhai-use-date').html(tmpUseDay.dateFormat(BookingFormal.dateFormat)+' ('+BookingFormal.datePickerOptions.locale.daysMin[weekDay]+')');
                $('#wrapBookingFlow #takuhai-use-date-short').html(tmpUseDay.dateFormat(monthDateFormat));
                var tmpArrivalDay = new Date(BookingFormal.takuhaiAllocateInfo.arrivalDate);
                $('#wrapBookingFlow #takuhai-arrival-date').html(tmpArrivalDay.dateFormat(monthDateFormat));
                tmpArrivalDay.setDate(tmpArrivalDay.getDate() + 1);
                $('#wrapBookingFlow #takuhai-buffer-date').html(tmpArrivalDay.dateFormat(monthDateFormat));
                var tmpReturnDay = new Date(BookingFormal.takuhaiAllocateInfo.returnDate);
                $('#wrapBookingFlow #takuhai-return-date').html(tmpReturnDay.dateFormat(monthDateFormat));
            }else{
                $('#wrapBookingFlow #takuhai-use-date').html('<?php echo Yii::t('formal','カレンダーから選択して下さい')?>');
                $('#wrapBookingFlow #takuhai-use-date-short').html('');
                $('#wrapBookingFlow #takuhai-buffer-date').html('');
                $('#wrapBookingFlow #takuhai-arrival-date').html('');
                $('#wrapBookingFlow #takuhai-return-date').html('');
            }
        });

        $('#wrapBookingFlow .year-month-list').on('change', function () {
            var target = $(this).data('target');

            if(!target || !$(target).length){
                return false;
            }
            try{
                if (typeof $.fn.WeDatePickerSetCurrent !== 'undefined') {
                    $(target).WeDatePickerSetCurrent(new Date($(this).val()));
                }
            } catch (error) {}
        });

        /* Change calendar when choose shop */
        var skyTreeOpeningDate = new Date('<?php echo MasterValues::SHOP_TOKYO_SKYTREE_OPENING_DATE?>');
        $("#wrapBookingFlow #wrapListChooseShop .item-choose-shop").click(function () {
            var shopId = parseInt($(this).data("shop-id"));
            if(typeof shopsHaveProduct != 'undefined' && $.inArray(shopId,shopsHaveProduct) != -1){
                $('#wrapBookingFlow .note-for-other-shop').hide();
            }else{
                $('#wrapBookingFlow .note-for-other-shop').show();
            }
            $(this).find(".info-choose-shop").addClass("active").parents(".item-choose-shop").siblings().find(".info-choose-shop").removeClass("active");
            BookingFormal.shopId = shopId;

            if(BookingFormal.datePicker) {
                if (shopId === <?php echo MasterValues::SHOP_TOKYO_SKYTREE_ID?>) {
                    var currentDatePicker = BookingFormal.datePicker.WeDatePickerGetCurrent();
                    if (currentDatePicker.getYear() !== skyTreeOpeningDate.getYear() || currentDatePicker.getMonth() < skyTreeOpeningDate.getMonth()) {
                        BookingFormal.datePicker.WeDatePickerSetCurrent(skyTreeOpeningDate);
                    } else {
                        BookingFormal.datePicker.WeDatePickerReload();
                    }
                } else {
                    BookingFormal.datePicker.WeDatePickerReload();
                }
            }
            BookingFormal.backupShop = BookingFormal.shopId;
            $("#wrapBookingFlow .get-selected-shop").html($(this).find('.info-choose-shop').html());
        });

        if (typeof selectedShop != 'undefined') {
            $("#wrapBookingFlow #wrapListChooseShop .item-choose-shop[data-shop-id="+selectedShop+"]").trigger('click');
        }

        if (typeof disableFormalFlow != 'undefined' && typeof disableFormalTakuhaiFlow != 'undefined') {
            // start - Hanble about disableFormalFlow && disableFormalTakuhaiFlow
            if(disableFormalFlow == 0 && disableFormalTakuhaiFlow == 0){
                $('.wrap-btn-link .btn-formal').html('<?php echo Yii::t('takuhai.product','店舗・宅配でレンタルする');?>')
            }else if(disableFormalFlow == 0){
                $('.wrap-btn-link .btn-formal').html('<?php echo Yii::t('takuhai.product','店舗で予約する');?>')
            }

            if(typeof disableFormalFlow != 'undefined' && disableFormalFlow == 1){
                $('.wrap-btn-goto .btn-formal.store').addClass('disabled').prop("disabled", true);;
            }else{
                $('.wrap-btn-goto .btn-formal.store').removeClass('disabled').prop("disabled", false);;
            }

            if( typeof disableFormalTakuhaiFlow != 'undefined'  && disableFormalTakuhaiFlow == 1){
                $('.wrap-btn-goto .btn-formal.delivery').addClass('disabled').prop("disabled", true);;
            }else{
                $('.wrap-btn-goto .btn-formal.delivery').removeClass('disabled').prop("disabled", false);;
            }
        }

        // end - Hanble about disableFormalFlow && disableFormalTakuhaiFlow

        /* Toggle for wrap-items-info */
        $(document).on('click', "[data-collapse-reserve]", function(e){
            var target = $(this).data("collapse-reserve");
            $(this).toggleClass('active');
            $(this).siblings(target).slideToggle();
            $(this).parent().siblings(target).slideToggle();
        });
        // add event click button rent
        $('.list-product-lp .btn-formal').on('click', function() {
            var item = $(this).closest('.wrap-product-lp-item');
            if ($(this).hasClass('btn-color-grey')) {
                return false;
            }

            var  sizeChecked = $(this).closest('.wrap-cols').find('input[name="product-size"][checked]');
            if (sizeChecked.length) {
                BookingFormal.currentProductId = sizeChecked.val();
            }else{
                var $productSizes = $(this).closest('.wrap-cols').find('input[name="product-size"]');
                if($productSizes.length){
                    $productSizes[0].checked = true;
                    BookingFormal.currentProductId = $productSizes[0].value;
                }
            }

            if (item) {
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('ajax/getBookingFormalPopup');?>",
                    type: "post",
                    dataType: 'json',
                    data: {productId: BookingFormal.currentProductId},
                    beforeSend: function( xhr ) {
                        BookingFormal.callBarLoadingBookingJs();
                    },
                    success: function (result) {
                        try {

                            if (typeof  result.canBook == 'undefined' || result.canBook == 0) {
                                alert('<?php echo Yii::t('takuhai.product','Product is not stock');?>');
                                BookingFormal.loadingBookingJSError();
                                return;
                            }

                            var data = result;
                            // set again init data
                            activeFlow = data.activeFlow;
                            var canBook = data.canBook;
                            disableFormalFlow = data.disableFormalFlow;
                            disableFormalTakuhaiFlow = data.disableFormalTakuhaiFlow;
                            disableFormalPreviewFlow = data.disableFormalPreviewFlow;
                            shopsHaveProduct = data.shopsHaveProductById;
                            popupImageProduct = data.sliderImage && data.sliderImage['img'] != 'undefined' ? data.sliderImage['img'][0] : '';

                            $('#wrapBookingFlow .popup-image-product').html(popupImageProduct);

                            if (disableFormalFlow) {
                                $('.formal-booking-type').addClass('disabled').prop("disabled", true);
                            } else {
                                $('.formal-booking-type').removeClass('disabled');
                            }

                            if (disableFormalTakuhaiFlow) {
                                $('.takuhai-booking-type').addClass('disabled').prop("disabled", true);
                            } else {
                                $('.takuhai-booking-type').removeClass('disabled');
                            }

                            var flows = {2: '.formal-booking-type', 3: '.takuhai-booking-type'};
                            $('.item-booking-type').siblings().find('.title-plan').removeClass('active');
                            if (typeof flows[activeFlow] !== 'undefined') {
                                $(flows[activeFlow] + ' .title-plan').addClass('active')
                            }

                            if (disableFormalTakuhaiFlow || disableFormalFlow || disableFormalPreviewFlow) {
                                if (!disableFormalTakuhaiFlow) {
                                    $('.popup-notice-plan.popup-plan-takuhai').show();
                                } else {
                                    $('.popup-notice-plan.popup-plan-takuhai').hide();
                                }
                                if (!disableFormalFlow) {
                                    $('popup-notice-plan.popup-notice-formal').show();
                                } else {
                                    $('popup-notice-plan.popup-notice-formal').hide();
                                }
                                if (!disableFormalPreviewFlow) {
                                    $('.popup-notice-plan.popup-notice-preview').show();
                                } else {
                                    $('.popup-notice-plan.popup-notice-preview').hide();
                                }
                            }
                            BookingFormal.metaForLoadOptionPopup = {
                                planTypeId : data.planModel ? data.planModel.plan_type_id : 'null',
                                productId : data.productModel ? data.productModel.product_id: 'null',
                                shopId: BookingFormal.shopId,
                                datetimeSelected : {success: false, time_date: "", from_time: ""},
                                isOptionLoaded: false
                            };
                            BookingFormal.currentProductId = data.bookingFormalProperties.currentProductId;
                            BookingFormal.productIds = [];
                            rental_price_reduced = data.priceData.rental_price_reduced;
                            BookingFormal.loadingBookingJSError();
                            availableShops = data.availableShops;
                            productsVisited = data.productsVisited;
                            cartShop = data.shopByCart && data.shopByCart.shop_id != 'undefined' ? data.shopByCart.shop_id : 'null';

                            if (availableShops.indexOf(cartShop) > -1) {
                                selectedShop = cartShop;
                            } else {
                                selectedShop = data.shopByProduct.shop_id;
                            }

                            BookingFormal.shopId = selectedShop;
                            PopupTab.showPopup();
                        }catch (error) {
                            BookingFormal.loadingBookingJSError();
                        }

                        var bookTypeFormal = $('#wrapBookingFlow .radio-booking-type[value="'+BookingFormal.formalType+'"]');
                        var titlePlanFormal = bookTypeFormal.siblings(".wrap-item-booking-type").find(".title-plan");
                        var contentPlanFormal = bookTypeFormal.siblings(".wrap-item-booking-type").find(".content-plan");
                        $(titlePlanFormal).trigger('click');
                        $(contentPlanFormal).trigger('click');

                        if (is_sp) {
                            $(titlePlanFormal).find(".text").trigger('click');
                        }
                    }
                });
            }
        });
        /* choose product size*/
        $('.list-product-lp .product-size-list input:radio[name="product-size"]').on('change', function () {
            var choose = chooseProductSize($(this));

            if (choose) {
                var productId = $(this).val();
                // update size in popup
                var elementSizePopup = $('.product-size-wrap input:radio[name="product-size"][value="'+productId+'"]');
                if (elementSizePopup) {
                    elementSizePopup.attr('checked', 'checked');
                    chooseProductSize(elementSizePopup)
                }
            }
        });
    });

    var chooseProductSize = function(obj, setCurrentProductId) {
        if (typeof obj === 'undefined') {
            return false;
        }

        if (typeof setCurrentProductId === 'undefined') {
            setCurrentProductId = true;
        }

        $(obj).closest('.product-size-list').find('input:radio').removeAttr('checked');
        $(obj).attr('checked', 'checked');

        var productId = obj.val();
        var parentItem = obj.parent();

        if (productId) {
            parentItem.siblings().removeClass('active');
            parentItem.addClass('active');

            if (setCurrentProductId && typeof BookingFormal !== 'undefined') {
                BookingFormal.currentProductId = productId;
            }

            return true;
        }

        return false;
    }
</script>
