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

get_header('new-kimono');
global $kimono, $category_data, $language;
$language = Yii::app()->language;
$is_blog = $kimono['is_gallery'];
$blog = $kimono['gallery'];
$cate = $kimono['current_cate'];
$category_data = get_category_data($cate);


function get_local_ids($continent_id){
	global $wpdb;
	$contQ = "SELECT wp_term_taxonomy.term_taxonomy_id FROM wp_term_taxonomy WHERE wp_term_taxonomy.parent = $continent_id AND wp_term_taxonomy.count > 0 limit 0,3 ";
	$locID = $wpdb->get_results($contQ, ARRAY_N);
	foreach($locID as $locVal){
		$loc_arr[] = $locVal[0];
		get_local_ids($locVal[0]);
	}
	return $loc_arr;
}

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
									<div class="container">
										<section id="category-description" class="sixteen columns row">
											<img data-src="<?php echo get_template_directory_uri();?>/images/gallary-kimono.jpg" height="378" alt="フォトギャラリー" />
											<h1 class="cate-name"><?php echo Yii::t('wp_theme', 'フォトギャラリー')?></h1>
											<div>
												<p><?php
													echo Yii::t('wp_theme', '京都着物レンタルwargoでお着物をレンタルしてくださったお客様の変身後の素敵なお写真を掲載しています。どんな着物にしようかお悩みのお客様は、ぜひご参考になさってください。')
													?></p>
											</div>
										</section>
										<section class="category-gallery-title sixteen columns row">
											<!--<h2>紅葉が美しい秋の京都</h2>-->
											<h2><?php echo get_cat_name(13); ?></h2>
										</section>

										<div class="box-gallery-images">

											<?php
											$id_cat_gallery = get_query_var('cat');

											/*
											$args = array(
													'type'					 => 'category',
													'child_of'				 => 0,
													'parent'				   => $id_cat_gallery,
													'orderby'				  => 'name',
													'order'					=> 'ASC',
													'hide_empty'			   => 1,
													'hierarchical'			 => 1,
													'exclude'				  => '',
													'include'				  => '',
													'number'				   => 3,
													'taxonomy'				 => 'category',
													'pad_counts'			   => false
												);
											*/
											$array_cat = get_local_ids($id_cat_gallery);
											foreach($array_cat as $k => $val_id){ ?>

												<div class="box-content clearfix">
													<div class="sixteen columns">
														<!--<h2 class="sixteen"><?php //echo get_cat_name(13); ?></h2>-->
														<div class="gallery-zone-one">
															<?php
															$query = new WP_Query('cat='.$val_id.'&posts_per_page=20');
															if ( $query->have_posts() ) {
																$i=1;
																while ( $query->have_posts()){
																	$query->the_post();
																	$featuredImage = swe_wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
																	$thumbImage = swe_wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
																	if($i <= 4){
																		?>
																		<div id="post-<?php the_ID();?>" class="g-item four columns tn-item-gallery" <?php post_class(); ?>>
																			<div class="image">
																				<?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
																				<a href="<?php echo $featuredImage; ?>" rel="lightbox[<?php echo $k;?>]" title="<?php the_field('live_place');?>">
																					<img data-src="<?php echo $thumbImage[0];?>" alt=""/>
																				</a>
																			</div><!-- end image -->

																			<div class="text">
																				<a href="<?php echo $featuredImage; ?>" rel="lightbox[<?php echo $k;?>]" title="<?php the_field('live_place');?>">
																					<p class="title"><?php the_title();?></p>
																				</a>
																				<p><?php the_field('live_place');?></p>
																				<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
																			</div><!-- end text -->
																		</div><!-- end gallery-item -->
																		<?php
																	}else{
																		echo '<a href="'.$featuredImage.'" rel="lightbox['.$k.']" title="'.the_field('live_place').'"></a>';
																	}
																	$i++;
																}
															}  ?>
															<div class="clearAll"></div>
														</div><!-- end gallery-zone-one -->
													</div><!-- end sixteen columns -->
												</div><!-- end box-content -->
												<?php
											} // end foreach
											?>

										</div><!-- box-gallery-images -->
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