<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
	global $post, $language;
	$language = Yii::app()->language;
	global $getLanguage;
	global $isAvailableIn;
	global $q_config;

	$language_support = array();
	$is_singular = is_singular();
	if(empty($getLanguage)){
		// Check is qtrans or qtranxf function exists
		$getLanguage = function_exists('qtrans_getLanguage') ? 'qtrans_getLanguage': (function_exists('qtranxf_getLanguage') ? 'qtranxf_getLanguage': null);
	}
	if(empty($isAvailableIn)){
		// Check qtrans or qtranxf's isAvailable exists
		$isAvailableIn = function_exists('qtrans_isAvailableIn')  ? 'qtrans_isAvailableIn': (function_exists('qtranxf_isAvailableIn') ? 'qtranxf_isAvailableIn': null);
	}
	if (!$is_singular) {
		// is category and get
		if (is_category()) {
			$cat = get_query_var('cat');
			$cat = get_category($cat);
			$language_support = get_field('language_support', $cat);
			$language_support = is_array($language_support) ? $language_support: array();
		}

		//is taxonomy
		// Get current queried object
		$taxonomies = get_queried_object();
		// Get current queried object's taxonomies
//		$taxonomies = !empty($queried_obj->taxonomies)  ? $queried_obj->taxonomies : $queried_obj->taxonomy;

		if (!empty($taxonomies)) {
			$language_support = getTaxonomyField($taxonomies, 'language_support');
			$language_support = is_array($language_support) ? $language_support: array();
		}
	}

	status_header(404);
	nocache_headers();
	get_header('new-kimono');
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
									<?php get_sidebar('top-page-left') ?>
								</div>
								<div class="right-column">
									<div class="container container-column-page clearfix" style="min-height:30px; padding: 5px 0;">
										<?php
										if ($is_singular) {
											echo $post->post_content;
										} else if (!$is_singular) { ?>
											<p>
												<?php
												$available_lang = array();
												foreach ($language_support as $language) {
													$available_lang[]= '<a href="'.qtranxf_convertURL('', $language, false, true).'"><span>'.$q_config['language_name'][$language].'</span></a>';
												}
												?>
												<?php if ($available_lang) {
													echo Yii::t('wp_theme', 'Sorry, this entry is only available in').'&nbsp' ;
													$lang_link = implode(' ', $available_lang);
													echo $lang_link;
													?>
												<?php } else { ?>
													<?php echo Yii::t('wp_theme','Sorry, this entry is unavailable'); ?>
												<?php } ?>
											</p>
										<?php }
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>