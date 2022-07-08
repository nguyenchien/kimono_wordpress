<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'), '201802132015');
wp_enqueue_style('new-formal-rental-style');
wp_register_style('customer-remark-style', get_template_directory_uri() . '/css/customer-remark.css', array('twentytwelve-style'), '201802021121');
wp_enqueue_style('customer-remark-style');
get_header('formal');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
global $wp_query;
$postName = isset($post->post_name) ? $post->post_name: '';
$numberFormatter = Yii::app()->numberFormatter;
$currencyFormat = DateTimeUtils::getCurrencyFormat();
$currencySymbol = Yii::app()->locale->getCurrencySymbol('JPY');

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
$searchInput = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);
$limit = 10;

$args=array(
    'post_status'   => 'publish',
	'post_type' => array('customer-remark'),
	'pagination'		     => true,
	'paged'					 => $paged,
	'posts_per_page'         => $limit,
	'order'                  => 'DESC',
	'orderby'                => 'date',
);

$the_query  = new WP_Query(array_merge($wp_query->query_vars, $args));
$total_pages = $the_query ->max_num_pages;
$posts =  $the_query->posts;
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
														$taxonomies = get_post_taxonomies(get_post());

														if (isset($taxonomies[0]) && $taxonomy = $taxonomies[0]) {
															$current_cate = get_category_permalink($post, $taxonomy);
                                                        }

														$product_id = get_field('product_id');
														$product = isset($products[$product_id]) ? $products[$product_id]: false;
														$planModel = isset($product->planTypeHighend) ? $product->planTypeHighend: false;
														$productDetailLink = Yii::app()->createAbsoluteUrl('formal/product', array('id' => $product_id));
														$planTypeName = !empty($planModel) ? $product->planTypeHighend->plan_type_name: '';
														$productName = !empty($product->product_name) ? $product->product_name: '';
														$productCode = !empty($product->product_code) ? $product->product_code: '';
														$priceData = $planModel ? $planModel->getPrice(): false;
														$price = $numberFormatter->format($currencyFormat, $priceData ? $priceData['rental_price_reduced']: 0, $currencySymbol);
														$image_product = get_field("image_product");
														?>
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
                                                                <div class="customer-feedback-info flexbox">
                                                                    <div class="feedback-product-name"><?php echo Yii::t('formal.customer_remark', '{plan_type_name}<br>「{product_name}」{product_code}', array('{plan_type_name}' => $planTypeName, '{product_name}' => $productName, '{product_code}' =>  $productCode));?></div>
                                                                    <div class="feedback-product-price flexbox"><span class="visit"><?php echo Yii::t('formal.customer_remark', '訪問着');?></span><span class="feedback-price"><?php echo $price;?> <small><?= Yii::t('takuhai.product','+tax')?></small></span></div>
                                                                    <div class="see-detail"><a href="<?php echo $productDetailLink;?>" class="go-detail"><?php echo Yii::t('formal.customer_remark', 'この商品を見る');?></a></div>
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
<?php get_footer('formal'); ?>
