<?php
/**
 * Template Name: New Formal Ubugi Brand
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
get_header('formal-v2');

if($isSmartPhone){
    wp_register_style('sidebar-left-formal-sp-style', get_template_directory_uri() . '/css/sidebar-left-formal-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('sidebar-left-formal-sp-style');
    wp_register_style('new-formal-ubugi-brand-sp-style', get_template_directory_uri() . '/css/new-formal-ubugi-brand-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-ubugi-brand-sp-style');
}else{
    wp_register_style('sidebar-left-formal-pc-style', get_template_directory_uri() . '/css/sidebar-left-formal-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('sidebar-left-formal-pc-style');
    wp_register_style('new-formal-ubugi-brand-pc-style', get_template_directory_uri() . '/css/new-formal-ubugi-brand-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-ubugi-brand-pc-style');
}
?>
<link rel="preload" href="/css/searchform.css?v=26062019" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=26062019"></noscript>
<style>
    .wrap-languages{
        display: none;
    }
    .wrap-ranking-ubugi-brand ul.list{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }
    p.name.namefurisode{
        text-align: center!important;
    }
</style>
<div class="container-box clearfix">
    <?php
        if ((function_exists('yoast_breadcrumb')) && (!$isSmartPhone)) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
        }
    ?>
    <h1 class="title-name-formal">お宮参りに高級感のあるブランド産着（祝着・祝い着）レンタル｜きものレンタルwargo</h1>
</div>

<div class="banner-top-v2 ubugi-brand">
    <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v3/main-banner-ubugi-brand.jpg" />
</div>

    <div class="container-box clearfix">
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column hidden-sidebar">
                                    <?php
                                    if($isSmartPhone){
                                        echo FormalSidebarLeftCodeNewStyle(array());
                                    }else{
                                        if($postName != 'list'){
                                            echo FormalSidebarLeftCodeNewStyle(array());
                                        }else if($postName == 'list'){
                                            echo FormalSidebarLeftCodeNewStyle(array());
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="right-column right-column-list right-cate-list-v3 <?= $postName?>">
                                    <div class="padding-v2">
                                        <div class="wrap-content-ubugi-brand">
                                            <div class="wrap-banner-child-bugi-brand ubugi-brand-boy">
                                                <h2 class="wrap-infor-brand-banner flexbox">
                                                    <div class="top-title">お宮参りに男の子の</div>
                                                    <div class="wrap-title-bt flexbox">
                                                        <div class="title-ubugi-brand">ブランド産着レンタル</div>
                                                        <p class="sub-text-en-brand">Boy</p>
                                                    </div>
                                                </h2>
                                            </div>
                                            <div class="wrap-ranking-ubugi-brand">
                                                <div class="widget-list-product-highend more-items">
                                                    <?= do_shortcode('[filter_formal_product product_ids=18499,18500,18580,18498,18583,18494, show_filter=false enable_lazy_load=0]'); ?>
                                                </div>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox" style="margin-top: 10px;">
                                                <a href="<?= home_url(); ?>/formal/ubugi/boy" class="btn-v2 btn-list">
                                                    <div class="text">
                                                        <span class="text-link">男の子の全ての産着商品を見る</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="wrap-banner-child-bugi-brand ubugi-brand-girl">
                                                <h2 class="wrap-infor-brand-banner flexbox">
                                                    <div class="top-title">お宮参りに女の子の</div>
                                                    <div class="wrap-title-bt flexbox">
                                                        <div class="title-ubugi-brand">ブランド産着レンタル</div>
                                                        <p class="sub-text-en-brand">Girl</p>
                                                    </div>
                                                </h2>
                                            </div>
                                            <div class="wrap-ranking-ubugi-brand">
                                                <div class="widget-list-product-highend more-items">
                                                    <?= do_shortcode('[filter_formal_product product_ids=18440,19509,18443,18445,18447,18449,18804 show_filter=false enable_lazy_load=0]'); ?>
                                                </div>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox" style="margin-top: 10px;">
                                                <a href="<?= home_url(); ?>/formal/ubugi/girl" class="btn-v2 btn-list">
                                                    <div class="text">
                                                        <span class="text-link">女の子の全ての産着商品を見る</span>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="wrap-btn-v2 flexbox" style="margin-top: 10px;">
                                                <a href="<?= home_url(); ?>/formal/ubugi">
                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v3/banner-back-ubugi-page.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer('formal-v2'); ?>
<?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
    'id' => 'formal-preview-popup',
    'htmlOptions' => array(
        'style' => 'display: none'
    ),
))
?>
<style>
    *{
        min-height: 0;
        min-width: 0;
    }
</style>
<script>
    $(document).ready(function(){

		//Toggle sidebar
		$('[data-sub-shop]').click(function(){
			var self    = this;
			var target  = $(self).data('sub-shop');
			var $other  = $('[data-sub-shop="'+target+'"]');
			if(target){
				$other.each(function(index, el){
					if(el !== self){
						$(el).siblings(target).slideUp();
						$(el).parent().find('.text-shop-wg-dropdown').removeClass('active');
					}else{
						$(self).siblings(target).slideToggle();
						$(self).parent().find('.text-shop-wg-dropdown').toggleClass('active');
					}
				});
			}
		});
		$('[data-collapse-cate]').click(function(){
			var self    = this;
			var target  = $(self).data('collapse-cate');
			var $other  = $('[data-collapse-cate="'+target+'"]');
			if(target){
				$other.each(function(index, el){
					if(el === self){
						$(self).siblings(target).slideToggle();
						$(self).parent().toggleClass('active');
						$(self).toggleClass('active');
					}
				});
			}
		});

        /* Show formal popup - start */
        $('.formal-preview-popup-handle').click(function (event) {
            event.preventDefault();
            $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
            $('#formal-preview-popup').show(0, function () {
                $("html").addClass("modal-open");
                if(!$("#formal-preview-popup input.preview-shops:checked").length){
                    $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
                }
            });
            $('#botDiv').hide();
        });

        $(document).on('click', '#closeStep, #backStep', function(){
            $("html").removeClass("modal-open");
        });
        /* Show formal popup - end */

        //Toggle reason point
        <?php if($isSmartPhone) : ?>
        $('.list-reason .item-reason .title-item-reason').click(function(){
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
            this.scrollIntoView();
        });
        <?php else: ?>
        $('.list-reason .item-reason').click(function(){
            var index = $(this).index();
            var target = $('.wrap-content-reason .content-reason').eq(index);
            target.siblings().hide();
            target.show();

            $(this).addClass('active');
            $(this).siblings().removeClass('active');
        });
        <?php endif; ?>

        //Toggle shop list
        $('.search-list').click(function(){
            $(this).toggleClass('active');
            $(this).closest('.area-item').find('.list-shop').slideToggle('fast');
        });

        //Show product list
        $('.items-product-landing-ubugi').click(function(){
        	var target = $(this).attr('data-target');
			var content = $('.wrap-product-list').find('.product-list-content#' + target);
			$(this).addClass('active');
        	$(this).siblings().removeClass('active');
        	content.fadeIn('fast');
        	content.siblings().fadeOut('fast');
        });
        $('.list-product-landing-ubugi .items-product-landing-ubugi:first-child').click();
    })
</script>


