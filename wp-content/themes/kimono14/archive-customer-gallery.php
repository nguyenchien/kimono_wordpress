<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_register_style('customer-gallery', get_template_directory_uri() . '/css/customer-gallery.css', array('twentytwelve-style'));
wp_enqueue_style('customer-gallery');
//redirect_canonical( null, esc_url(home_url('news')) );
get_header();
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$plugin = 'wp-pagenavi/wp-pagenavi.php';
if(is_plugin_active($plugin)){
	$css_file = plugins_url( 'pagenavi-css.css', $plugin );
	wp_enqueue_style( 'wp-pagenavi', $css_file, false, '2.70' );
}

global $post;
$lang = Yii::app()->language;

//plan type id
$planTypeKimonoSlug = array(
	'all-kimono-plan' => '全てのプラン',
	'standard-kimono' => 'スタンダード着物',
	'premium-kimono' => 'プレミアム着物',
	'high-end-kimono' => 'ハイエンド着物',
	'mamechiyo-kimono' => '豆千代モダン着物',
	'antique-kimono' => 'アンティーク着物',
	'furisode-hanhaba' => '振袖お散歩半幅帯',
	'furisode-fukuro' => '振袖お散歩袋帯',
	'men-kimono' => 'メンズ着物',
	'kimono-girl' => '子供着物',
	'couple-standard-kimono' => 'カップル着物',
);
$planTypeYukataSlug = array(
	'all-yukata-plan' => '全てのプラン',
	'standard-yukata' => 'スタンダード浴衣',
	'premium-yukata' => 'プレミアム浴衣',
	'high-end-yukata' => 'ハイエンド浴衣',
	'mamechiyo-yukata' => '豆千代モダン浴衣',
	'brand-yukata' => 'ブランド浴衣',
	'summer-kimono' => '夏着物',
	'men-yukata' => 'メンズ浴衣',
	'boy-yukata' => '子供浴衣',
	'couple-standard-yukata' => 'カップル浴衣'
);
?>

<div class="container">
	<section class="wrap-customer-gallery">
        <!-- start top-banner-gallery -->
        <div class="top-banner-gallery dx-flex-gallery">
            <div class="banner-gallery">
				<h1>
					<?php
					$detect = Yii::app()->mobileDetect;
					$isSmartPhone = $detect->isSmartPhone();
					if ($isSmartPhone) {
						?>
						<img src="<?= get_template_directory_uri(); ?>/images/customer-gallery/gallery_mobile_topbanner_min_<?= $lang ?>.png" alt="<?php echo Yii::t('wp_theme', 'Customer Gallery');?>">
						<?php
					} else { ?>
						<img src="<?= get_template_directory_uri(); ?>/images/customer-gallery/gallery_pc_topbanner_min_<?= $lang ?>.png" alt="<?php echo Yii::t('wp_theme', 'Customer Gallery');?>">
					<?php } ?>
				</h1>
            </div>
            <div class="info-banner-gallery">
                <div class="title"><img src="<?= get_template_directory_uri();?>/images/customer-gallery/text-title-gallery-<?= $lang?>.jpg" alt=""></div>
                <div class="descript-gallery">
<!--                <p>--><?//= Yii::t('wp_theme','Wargoご利用のお客様をご紹介致します。');?><!--</p>-->
<!--                <p>--><?//= Yii::t('wp_theme','着物と浴衣を楽しむお客様をご覧ください。');?><!--</p>-->

                    <?= Yii::t('wp_theme','Wargoご利用のお客様をご紹介致します。着物と浴衣を楽しむお客様をご覧ください。');?>
                </div>
            </div>
        </div>
        <!--end top-banner-gallery-->
		<ul class="tab-choose-gallery dx-flex-gallery">
			<li class="item-tab-gallery yukata-gallery">
				<a class="gallery-tab" data-tab-type="3" href="<?php echo esc_url( home_url( '/' ).'gallery/all-yukata-plan' );?>"><?= Yii::t('wp_theme','浴衣プラン');?></a>
			</li>
			<li class="item-tab-gallery kimono-gallery">
				<a class="gallery-tab" data-tab-type="1" href="<?php echo esc_url( home_url( '/' ).'gallery/all-kimono-plan' );?>"><?= Yii::t('wp_theme','着物プラン');?></a>
			</li>
		</ul>
        <div class="wrap-sub-item" data-tab-type="3" style="display: none;">
            <select class="list-item">
                <?php foreach ($planTypeYukataSlug as $slug => $planTypeYukataName) { ?>
                    <option value="<?= $slug?>"><?= Yii::t('wp_theme',$planTypeYukataName);?></option>
                <?php } ?>
            </select>
        </div>
        <div class="wrap-sub-item" data-tab-type="1" style="display: none;">
            <select class="list-item">
                <?php foreach ($planTypeKimonoSlug as $slug => $planTypeKimonoName) { ?>
                    <option value="<?= $slug?>"><?= Yii::t('wp_theme',$planTypeKimonoName);?></option>
                <?php } ?>
            </select>
        </div>

		<div class="wrap-info-gallery" id="wrap-info-gallery">
		</div>
	</section>
</div>

<script>
	var planTypeKimonoSlug = [
		'all-kimono-plan',
		'standard-kimono',
		'premium-kimono',
		'mamechiyo-kimono',
		'men-kimono',
		'couple-standard-kimono',
		'high-end-kimono',
		'furisode-hanhaba',
		'furisode-fukuro',
		'antique-kimono',
		'kimono-girl'
	];
	var planTypeYukataSlug = [
		'all-yukata-plan',
		'standard-yukata',
		'premium-yukata',
		'high-end-yukata',
		'mamechiyo-yukata',
		'brand-yukata',
		'summer-kimono',
		'men-yukata',
		'boy-yukata',
		'couple-standard-yukata'
	];
	jQuery(function($){
		var currentLangT = "";
		if(curLang != 'ja'){
			currentLangT = "/" + curLang;
		}

		// Init page number, default is 1
		var page = 1;
		// Init Loading flag
		var loading = true;
		// Get the content element that need to be replace
		var $content = $("#wrap-info-gallery");

		var hrefOrg = "";
		var planType = "";

		// Init load post function for request ajax data
		var load_posts = function(page, planTypeName){
			// Set page = 1 if not defined
			page == undefined ? page = 1 : page;
			planTypeName == undefined ? planTypeName = "" : planTypeName;
			// Calling Ajax request with param
			$.ajax({
				type       : "GET",
				data       : {page: page, plan_type: planTypeName, langC: curLang},
				dataType   : "html",
				url        : "<?php echo get_template_directory_uri(); ?>/ajaxCustomerGallery.php",
				// Function before send Ajax
				beforeSend : function(){
					if(page != 1){
						//
						$content.html('<div id="temp_load" style="text-align:center">\
                            <img src="images/ajax-loader.gif" />\
                            </div>');
						}
					},
					success: function(data){
						$data = $(data);
						if($data.length){
//						$data.hide();
							// Set contetnt as data
							$content.html($data);
							$content.fadeIn(500, function(){
								// Remove loading gif
								$("#temp_load").remove();
								loading = false;
							});
							// Modify pagination link for ajax request
							modify_pagination();
						} else {
							// Remove loading gif
							$("#temp_load").remove();
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						// Remove loading gif
						$("#temp_load").remove();
						// Alert error
						alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
					}
			});
		}
		var modify_pagination = function() {
			$(".wp-pagenavi a").click(function(e) {
				// Init page default as 1
				var page = 1;
				// Stop going to another page where clicking
				e.preventDefault();
				// Get page number
				page = $(this).text();
				page == undefined ? 1 : page;
				// Get current page
				var current = $(".wp-pagenavi .current").text();
				current = parseInt(current);
				// Detect if is nex post link
				if ($(this).hasClass('nextpostslink')) {
					// Increase current page by 1
					current++;
					// Set page number
					page = current;
				} else if ($(this).hasClass('previouspostslink')) {
					// Decrease current page by 1
					current--;
					// Set page number
					page = current;
				}
				// Calling Ajax with page number
				load_posts(page, planType);

				if(planType == ""){
					window.history.pushState( {} , 'gallery', baseUrl + currentLangT + "/gallery/" +  page);
				}else{
					window.history.pushState( {} , 'gallery', baseUrl + currentLangT + "/gallery/" +  planType + "/" + page);
				}

				$('html, body').animate({ scrollTop: $('.tab-choose-gallery').offset().top}, 'slow');
			});
			$(".wp-pagenavi a.last").hide();
			$(".wp-pagenavi a.first").hide();
		};

		// Handle when reload page with parameters of URL
		var currentUrl = window.location.href;
		var pageUrl = getParameterByName('page', currentUrl) !== null ? getParameterByName('page', currentUrl) : "";
		var planTypeUrl = getParameterByName('plan_type', currentUrl) !== null ? getParameterByName('plan_type', currentUrl) : "";
		if(pageUrl == "" && planTypeUrl == ""){
			$('.wrap-sub-item[data-tab-type="1"]').toggle();
			$(".wrap-sub-item select.list-item").val('all-kimono-plan');
			load_posts(undefined, 'all-kimono-plan'); // default open Kimono Tab
		}else{
			load_posts(pageUrl, planTypeUrl);
		}


		if(planTypeUrl != ""){
			if($.inArray(planTypeUrl, planTypeYukataSlug) != -1){ // Yukata
				$('.wrap-sub-item[data-tab-type="3"]').toggle();
			}else if($.inArray(planTypeUrl, planTypeKimonoSlug) != -1){ // Kimono
				$('.wrap-sub-item[data-tab-type="1"]').toggle();
			}
			$(".wrap-sub-item select.list-item").val(planTypeUrl);

			if(pageUrl != ""){
				window.history.replaceState( {} , 'gallery', baseUrl + currentLangT + "/gallery/" +  planTypeUrl + "/" + pageUrl);
			}else{
				window.history.replaceState( {} , 'gallery', baseUrl + currentLangT + "/gallery/" +  planTypeUrl);
			}
		}else{
			if(pageUrl != ""){
				window.history.replaceState( {} , 'gallery', baseUrl + currentLangT + "/gallery/" +  pageUrl);
			}
		}


		// Load post following plan type
		$(".wrap-sub-item select.list-item").change(function(e){
			e.preventDefault();
			var slug = $(this).val();
			window.history.replaceState( {} , 'gallery', baseUrl + currentLangT + "/gallery/" +  slug);
			load_posts(undefined, slug);
		});


		// Handle for kimono/yukata tab
		$(".tab-choose-gallery .item-tab-gallery a.gallery-tab").click(function(e){
			e.preventDefault();
			var allItem = $('.wrap-sub-item');
			var elParent = $(this).closest('.wrap-customer-gallery');
			allItem.hide();
			if($(this).attr('data-tab-type') == 1){ // kimono
				elParent.find('.wrap-sub-item[data-tab-type="1"]').toggle();
				window.history.replaceState( {} , 'gallery', baseUrl + currentLangT + "/gallery/all-kimono-plan");
				$(".wrap-sub-item select.list-item").val('all-kimono-plan');
				load_posts(undefined, 'all-kimono-plan');
			}else{ // yukata
				elParent.find('.wrap-sub-item[data-tab-type="3"]').toggle();
				window.history.replaceState( {} , 'gallery', baseUrl + currentLangT + "/gallery/all-yukata-plan");
				$(".wrap-sub-item select.list-item").val('all-yukata-plan');
				load_posts(undefined, 'all-yukata-plan');
			}
			return false;
		});

		//Hover for paging
		$('body').on("mouseenter", ".wp-pagenavi a", function() {
			hrefOrg = $(this).attr("href");
			planType = getParameterByName('plan_type', hrefOrg);
			var page = $(this).text();
			var hrefHover = "";
			if(planType != ""){
				hrefHover = baseUrl + currentLangT + "/gallery/" +  planType + "/" + page;
			}else{
				hrefHover = baseUrl + currentLangT + "/gallery/" +  page;
			}

			$(this).attr("href", hrefHover);
		});
		$('body').on("mouseleave", ".wp-pagenavi a", function() {
			$(this).attr("href", hrefOrg);
		});

	});

	function getParameterByName(name, url) {
		if (!url) url = window.location.href;
		var name = name.replace(/[\[\]]/g, "\\$&");
		var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
			results = regex.exec(url);
		if (!results) return null;
		if (!results[2]) return '';
		return decodeURIComponent(results[2].replace(/\+/g, " "));
	}
</script>
<?php get_footer(); ?>