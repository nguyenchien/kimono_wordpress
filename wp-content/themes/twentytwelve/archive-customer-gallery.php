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
wp_register_style('new-kimono-plan-list', get_template_directory_uri() . '/css/new-kimono-plan-list.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-plan-list');
wp_register_style('customer-gallery', get_template_directory_uri() . '/css/customer-gallery.css', array('twentytwelve-style'));
wp_enqueue_style('customer-gallery');
//redirect_canonical( null, esc_url(home_url('news')) );
get_header('new-kimono-landing-page');
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$plugin = 'wp-pagenavi/wp-pagenavi.php';
if(is_plugin_active($plugin)){
	$css_file = plugins_url( 'pagenavi-css.css', $plugin );
	wp_enqueue_style( 'wp-pagenavi', $css_file, false, '2.70' );
}

global $post, $language;
$language = Yii::app()->language;
$lang = Yii::app()->language;

//plan type id
$planTypeKimonoSlug = array(
	'all-kimono-plan' => '全てのプラン',
	'standard-kimono' => '選べるスタンダードプラン',
//    'premium-kimono' => 'プレミアム着物',
	'high-end-kimono' => '選べるハイエンドプラン',
	'denim-kimono' => 'デニム着物',
	'mamechiyo-kimono' => '豆千代モダン着物',
	'antique-kimono' => 'アンティーク着物',
	'furisode-hanhaba' => '振袖お散歩半幅帯',
	'furisode-fukuro' => '振袖お散歩袋帯',
	'men-kimono' => 'メンズ着物',
	'kimono-girl' => '子供着物',
	'couple-standard-kimono' => 'カップル着物',
    'taishoroman-kimono' => '大正ロマン着物プラン',
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

$shopListGallery = array(
    5 => array(
        '京都駅前店',
        '/access/kyoto-area/station-area/kyotostation/gallery'
    ),
    6 => array(
        '祇園四条店',
        '/access/kyoto-area/gion-area/gion-shijo/gallery'
    ),
    2 => array(
        '清水坂店',
        '/access/kyoto-area/kiyomizu-area/kiyomizuzaka/gallery'
    ),
    11 => array(
        '嵐山駅前店',
        '/access/kyoto-area/arashiyama-area/arashiyama/gallery'
    ),
    18 => array(
        '嵐山渡月橋店',
        '/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo/gallery'
    ),
    7 => array(
        '大阪大丸心斎橋店',
        '/access/osaka-area/osaka-shinsaibashi/gallery'
    ),
    8 => array(
        '浅草寺店',
        '/access/asakusa-area/asakusa/gallery'
    ),
    17 => array(
        '東京スカイツリータウンソラマチ店',
        '/access/asakusa-area/tokyoskytree/gallery'
    ),
    9 => array(
        '鎌倉小町店',
        '/access/kamakura-area/kamakura/gallery'
    ),
    10 => array(
        '金沢香林坊店',
        '/access/kanazawa-area/kanazawa/gallery'
    ),
    20 => array(
        '太宰府天満宮前店',
        '/access/fukuoka-area/dazaifu/gallery'
    ),
    16 => array(
        'フォーマル京都タワー店',
        '/access/kyoto-area/station-area/formal-kyototower/gallery'
    ),
    23 => array(
        '仙台PARCO2店',
        '/formal/access/tohoku-area/sendai-parco2/gallery'
    ),
    21 => array(
        '札幌すすきの店',
        '/formal/access/sapporo-area/sapporo-susukinostation/gallery'
    ),
    25 => array(
        '新宿店',
        '/access/tokyo-area/shinjuku-area/shinjuku-station/gallery'
    ),
    22 => array(
        '銀座本店',
        '/formal/access/tokyo-area/ginza-honten/gallery'
    ),
    24 => array(
        '倉敷美観地区店',
        '/access/okayama-area/kurashiki/gallery'
    ),
    26 => array(
        '清水茶わん坂店',
        '/access/kyoto-area/kiyomizu-area/chawanzaka/gallery'
    ),
    27 => array(
        '金沢兼六園店',
        '/access/kanazawa-area/kanazawa-kenrokuen/gallery'
    ),
);

?>
	<div class="container-box clearfix">
		<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		}
		?>
		<div class="wrap-highend-v2">
			<div class="wrap-content-v2">
				<div class="container-box">
					<div class="wrap-column-content flexbox">
						<div class="left-column-content">
							<div class="wrap-boths-column flexbox">
								<div class="left-column hidden-sidebar">
									<?php get_sidebar('top-page-left-v3') ?>
								</div>
								<div class="right-column">
									<div class="container">
										<section class="wrap-customer-gallery-new">
                                            <div class="wrap-banner-gallery">
                                                <div class="banner-gallery">
                                                    <?php
                                                    $detect = Yii::app()->mobileDetect;
                                                    $isSmartPhone = $detect->isSmartPhone();
                                                    if ($isSmartPhone) {
                                                        ?>
                                                        <img width="375" height="188" src="<?= WP_HOME; ?>/images/new-kimono/banner-gallery-sp-<?= $lang ?>.jpg" alt="<?php echo Yii::t('new-kimono-gallery', 'お客様ギャラリー');?>">
                                                        <?php
                                                    } else { ?>
                                                        <img src="<?= WP_HOME; ?>/images/new-kimono/banner-gallery-pc-<?= $lang ?>.jpg" alt="<?php echo Yii::t('new-kimono-gallery', 'お客様ギャラリー');?>">
                                                    <?php } ?>
                                                </div>
                                                <div class="des-gallery">
                                                    <h1 class="title-gallery"><?= Yii::t('new-kimono-gallery', 'お 気に入りの着物でお散歩♪'); ?></h1>
                                                    <p class="brief-gallery"><?= Yii::t('new-kimono-gallery', 'Wargoご利用のお客様をご紹介致します。<br class="sp">着物と浴衣を楽しむお客様をご覧ください。'); ?></p>
                                                </div>
                                            </div>
                                            <div class="wrap-filter-gallery pad-2-side flexbox">
                                                <div class="box-filter-wg-pl box-filter-wg-pl-gallery kimono-yukata-plan-type-wrap">
                                                    <div class="item-shop item-search">
                                                        <div class="wrap-search-wg-pl flexbox">
                                                            <select name="kimono_yukata_plan_type" id="kimono_yukata_plan_type" class="sl-search-shop">
                                                                <option data_type="all" value="0"><?= Yii::t('new-kimono-gallery','着物 + 浴衣');?></option>
	                                                            <option data_type="all" value="1"><?= Yii::t('new-kimono-gallery','着物プラン');?></option>
	                                                            <option data_type="all" value="3"><?= Yii::t('new-kimono-gallery','浴衣プラン');?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-filter-wg-pl box-filter-wg-pl-gallery plan-type-wrap">
                                                    <div class="item-shop item-search">
                                                        <div class="wrap-search-wg-pl flexbox">
                                                            <select name="plan_type" id="plan_type" class="sl-search-shop">
                                                                <option value="all_plan" class="all-plan"><?= Yii::t('new-kimono-gallery','全てのプラン');?></option>
	                                                            <?php foreach ($planTypeKimonoSlug as $slug => $planTypeKimonoName) { ?>
		                                                            <option value="<?= $slug?>" class="kimono-plan"><?= Yii::t('new-kimono-gallery-plan',$planTypeKimonoName);?></option>
	                                                            <?php } ?>
	                                                            <?php foreach ($planTypeYukataSlug as $slug => $planTypeYukataName) { ?>
		                                                            <option value="<?= $slug?>" class="yukata-plan"><?= Yii::t('new-kimono-gallery-plan',$planTypeYukataName);?></option>
	                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-filter-wg-pl box-filter-wg-pl-gallery plan-shop-wrap">
                                                    <div class="item-shop item-search">
                                                        <div class="wrap-search-wg-pl flexbox">
                                                            <select name="shop_plan" id="shop_plan" class="sl-search-shop">
                                                                <option value="all_shop"><?= Yii::t('new-kimono-gallery','全ての店舗');?></option>
	                                                            <?php
	                                                            $field = get_field_object('shop');
	                                                            $shopList = $field['choices'];
                                                                if (!empty($shopListGallery)) {
                                                                    foreach ($shopListGallery as $shopGallery){ ?>
                                                                        <option data-link="<?= $shopGallery[1];?>" value="<?= $shopGallery[0];?>"><?= Yii::t('new-kimono-gallery-shop',$shopGallery[0]);?></option>
                                                                    <?php }
                                                                }
	                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<div class="wrap-info-gallery pad-2-side" id="wrap-info-gallery"></div>
										</section>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->


<script>
	var planTypeKimonoSlug = [
		'all-kimono-plan',
		'standard-kimono',
		// 'premium-kimono',
		'mamechiyo-kimono',
		'men-kimono',
		'couple-standard-kimono',
		'high-end-kimono',
		'denim-kimono',
		'furisode-hanhaba',
		'furisode-fukuro',
		'antique-kimono',
		'kimono-girl',
		'taishoroman-kimono'
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
        $('#shop_plan option[value="all_shop"]').attr('selected','selected');

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
		var load_posts = function(page, planTypeName, planShopName){
			// Set page = 1 if not defined
			page == undefined ? page = 1 : page;
			planTypeName == undefined ? "all_plan" : planTypeName;
			planShopName == undefined ? "all_shop" : planShopName;
			// Calling Ajax request with param
			$.ajax({
				type	   : "GET",
				data	   : {page: page, plan_type: planTypeName, plan_shop: planShopName, langC: curLang},
				dataType   : "html",
				url		: "<?php echo get_template_directory_uri(); ?>/ajaxCustomerGallery.php",
				// Function before send Ajax
				beforeSend : function(){
					if(page != 1){
						//
						$content.html('<div id="temp_load" style="text-align:center"><img src="'+base_url+'/images/ajax-loader.gif" /></div>');
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
				var planTypeName = $('#plan_type').val();
				var planShopName = $('#shop_plan').val();
				load_posts(page, planTypeName,planShopName);

				if(planType == ""){
					window.history.pushState( {} , 'gallery', baseUrl + currentLangT + "/gallery/" +  page);
				}else{
					window.history.pushState( {} , 'gallery', baseUrl + currentLangT + "/gallery/" +  planType + "/" + page);
				}

				$('html, body').animate({ scrollTop: $('.wrap-filter-gallery').offset().top}, 'slow');
			});
			$(".wp-pagenavi a.last").hide();
			$(".wp-pagenavi a.first").hide();
		};

		// Handle when reload page with parameters of URL
		var currentUrl = window.location.href;
		var pageUrl = getParameterByName('page', currentUrl) !== null ? getParameterByName('page', currentUrl) : undefined;
		var planTypeUrl = getParameterByName('plan_type', currentUrl) !== null ? getParameterByName('plan_type', currentUrl) : undefined;
		if(pageUrl == "" && planTypeUrl == ""){
			load_posts();
		}else{
			load_posts(pageUrl, planTypeUrl);
		}

		// Handle for Kimono/Yukata plan select box
		$("#plan_type").change(function(){
			var slug = $(this).val();
			if(slug != 'all_plan'){
				window.history.replaceState( {} , 'gallery', baseUrl + currentLangT + "/gallery/" +  slug);
			}else{
				window.history.replaceState( {} , 'gallery', baseUrl + currentLangT + "/gallery");
			}

			var planTypeName = $('#plan_type').val();
			var planShopName = $('#shop_plan').val();
			load_posts(undefined, planTypeName, planShopName);

		});

		// Handle for Kimono/Yukata plan type select box
		$("#kimono_yukata_plan_type").change(function () {
			if($(this).val() == 1){
				$(".plan-type-wrap .kimono-plan").show();
				$(".plan-type-wrap .all-plan").hide();
				$(".plan-type-wrap .yukata-plan").hide();

				window.history.replaceState( {} , 'gallery', baseUrl + currentLangT + "/gallery/all-kimono-plan");
				$("#plan_type").val("all-kimono-plan");
			}else if($(this).val() == 3){
				$(".plan-type-wrap .yukata-plan").show();
				$(".plan-type-wrap .all-plan").hide();
				$(".plan-type-wrap .kimono-plan").hide();

				window.history.replaceState( {} , 'gallery', baseUrl + currentLangT + "/gallery/all-yukata-plan");
				$("#plan_type").val("all-yukata-plan");
			}else{
				$(".plan-type-wrap .all-plan").show();
				$(".plan-type-wrap .kimono-plan").show();
				$(".plan-type-wrap .yukata-plan").show();
				window.history.replaceState( {} , 'gallery', baseUrl + currentLangT + "/gallery");
			}
			var planTypeName = $('#plan_type').val();
			var planShopName = $('#shop_plan').val();
			load_posts(undefined, planTypeName, planShopName);
		});

		// Handle for shop plan select box
		$('#shop_plan').change(function () {
			var planTypeName = $('#plan_type').val();
			var planShopName = $('#shop_plan').val();
            var shopLink = $(this).find('option:selected').attr('data-link');
            var langT = (curLang == "ja") ? '' : '/' + curLang;
            var shopUrl = baseUrl + langT  + shopLink;

            if($(this).val() != 'all_shop'){
                window.location.href = shopUrl;
            } else{
                load_posts(undefined, planTypeName, planShopName);
            }
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
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>
