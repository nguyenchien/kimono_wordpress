<?php
/**
 * Template Name: High End Column
 * Link: /seijin/xxxx, /homongi/xxxx, /kurotomesode/xxxx, /irotomesode/xxxx, /sotsugyou/xxxx, /shichigosan/xxxx, hakamamale/xxxx,
 */
wp_enqueue_style('highend-column-style', get_template_directory_uri() . '/css/highend_column.css', array('twentytwelve-style'));
get_header('new-kimono');
global $post, $language;
$language = Yii::app()->language;
$parent = get_page($post->post_parent);
$relative_pages = get_field($parent->post_name . '_relative_columns');
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
									<section class="list-template container clearfix">
										<div class="container-list">
											<div class="header-list">
												<div class="title-list">
													<h1><?php the_title(); ?></h1>
												</div>
												<div class="line-list">
													<img class="sp" src="<?php echo WP_HOME ?>/images/line-list-header-sp.png" alt="">
													<img class="pc" src="<?php echo WP_HOME ?>/images/line-list-header-pc.png" alt="">
												</div>
												<div class="description-list">
													<?php the_excerpt(); ?>
												</div>
											</div><!--end header-list-->
											<div class="widget-social-list <?php echo Yii::app()->mobileDetect->isSmartPhone()? 'sp': 'pc';?>">
												<?php if (!Yii::app()->mobileDetect->isSmartPhone()) { ?>
													<style>
														.ig-b- { display: inline-block; }
														.ig-b- img { visibility: hidden; }
														/*.ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }*/
														.ig-b-v-24 { background: url(<?php echo WP_HOME.'/images/social_network/instagram-pc.png';?>) no-repeat 0 0; }
													</style>
												<?php } ?>
												<!--{* twitter *}-->
												<script type="text/javascript" src="http://platform.twitter.com/widgets.js" async="true"></script>
												<!--{* line *}-->
												<script src=" http://scdn.line-apps.com/n/line_it/thirdparty/loader.min.js" async="async"　defer="defer"></script>
												<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
												<?php
												ob_start();
												$img_twitter = WP_HOME.'/images/social_network/twitter-sp.png';
												$img_line = WP_HOME.'/images/social_network/line-sp.png';
												$img_facebook = WP_HOME.'/images/social_network/facebook-sp.png';
												$img_hatena = WP_HOME.'/images/social_network/bi-sp.png';
												$og_url = get_permalink();
												$og_title = get_post_meta(get_the_ID(), '_yoast_wpseo_title', true);
												$og_description = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
												$href_twitter = 'http://twitter.com/share?text='.$og_description.'&url='.$og_url.'&via=wargo_nippon';
												$href_facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$og_url;
												$href_line = 'http://line.me/R/msg/text/?'.urlencode($og_description).$og_url;

												if (!Yii::app()->mobileDetect->isSmartPhone()) { // pc
													?>
													<!--  twitter-->
													<div class="child-btn">
														<a class="twitter-share-button" data-via="‎kyotokimonorent" href="<?php echo $og_url;?>" data-size="default">Tweet</a>
													</div>
													<div id="fb-root"></div>
													<!-- facebook button  -->
													<div class="fb-share-button child-btn" data-size="small" data-href="<?php echo $og_url;?>" data-layout="button"></div>
													<!-- line button -->
													<div class="child-btn"><div class="line-it-button" style="display: none;" data-type="share-a" data-lang="ja"></div></div>
													<!-- hatena button -->
													<div class="child-btn">
														<a href="#" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard-noballoon" data-hatena-bookmark-lang="<?php echo Yii::app()->language;?>" title="このエントリーをはてなブックマークに追加">
															<img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" />
														</a>
													</div>
													<!-- instagram button -->
													<div class="child-btn">
														<a target="_blank" href="https://www.instagram.com/kyotokimonorental_wargo/?ref=badge" class="ig-b- ig-b-v-24">
															<img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" />
														</a>
													</div>
												<?php  } else { // smartphone ?>
													<!--  twitter-->
													<div class="child-btn twitter">
														<a href="<?php echo $href_twitter;?>" target="_blank"><img src="<?php echo $img_twitter;?>" alt="<?php echo $og_title;?>" title="<?php echo $og_title;?>" /></a>
													</div>
													<div id="fb-root"></div>
													<!-- facebook button  -->
													<div class="child-btn facebook" data-size="small">
														<a href="<?php echo $href_facebook;?>" target="_blank"><img src="<?php echo $img_facebook;?>" alt="<?php echo $og_title;?>" title="<?php $og_title;?>" /></a>
													</div>
													<!-- line button -->
													<div class="child-btn line"><a href="<?php echo $href_line;?>"><img src="<?php echo $img_line;?>" alt="LINEで送る" /></a></div>
													<!-- hatena button -->
													<div class="child-btn">
														<a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="simple" title="<?php echo $og_title;?>"><img src="<?php echo $img_hatena;?>" alt="このエントリーをはてなブックマークに追加" style="border: none;" /></a>
													</div>
													<!-- instagram button -->
													<div class="child-btn">
														<a target="_blank" href="https://www.instagram.com/kyotokimonorental_wargo/?ref=badge" class="ig-b- ig-b-v-24">
															<img src="<?php echo WP_HOME.'/images/social_network/instagram-sp.png';?>" alt="Instagram" />
														</a>
													</div>
												<?php  } ?>
												<?php $outSocialBtnShare = ob_get_clean();  echo $outSocialBtnShare;?>
											</div><!--end widget-social-list-->

											<div class="wrap-column-list clearfix">
												<div class="left-column-list">
													<?php
													the_content();
													?>
													<div class="widget-social-list no-border <?php echo Yii::app()->mobileDetect->isSmartPhone()? 'sp': 'pc';?>">
														<?php echo $outSocialBtnShare;?>
													</div><!--end widget-social-list-->
													<?php if($relative_pages):?>
														<div class="widget-list-related style-sp-pc relative_columns">
															<h3><?php echo Yii::t('wp_theme.highendcolumn','あわせて読みたい');?><span class="see-more"><a href="#"><?php echo Yii::t('wp_theme.highendcolumn','こんな記事も人気です♪');?></a></span></h3>
															<ul class="list-item-related">
																<?php
																foreach ($relative_pages as $count => $id):
																	if($count <5):
																		$img = '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
																		if(has_post_thumbnail($id)){
																			$img = get_the_post_thumbnail($id, array(120,120));
																		}
																		?>
																		<li>
																			<div class="wrap-image-info clearfix">
																				<div class="image">
																					<a href="<?php echo get_permalink($id) ?>"><?php echo $img; ?></a>
																				</div>
																				<div class="info">
																					<a href="<?php echo get_permalink($id) ?>"
																					   title="<?php echo get_the_title($id) ?>"><?php echo get_the_title($id) ?></a>
																				</div>
																			</div>
																		</li>
																		<?php
																	endif;
																	$count++;
																endforeach;
																?>
															</ul>
														</div><!--end widget-list-related-->
														<div class="widget-social-list no-border pc">
															<?php echo $outSocialBtnShare;?>
														</div><!--end widget-social-list-->
													<?php endif; ?>
												</div><!--left-->
												<div class="right-column-list">
													<?php if($relative_pages):?>
														<div class="widget-list-related relative_columns">
															<h3><?php echo Yii::t('wp_theme.highendcolumn','こんなコラムも人気です♪');?></h3>
															<ul class="list-item-related">
																<?php
																foreach ($relative_pages as $count => $id):
																	if($count <5):
																		$img = '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
																		if(has_post_thumbnail($id)){
																			$img = swe_get_the_post_thumbnail($id, array(120,120));
																		}
																		?>
																		<li>
																			<div class="wrap-image-info clearfix">
																				<div class="image">
																					<a href="<?php the_permalink(); ?>"><?php echo $img; ?></a>
																				</div>
																				<div class="info">
																					<a href="<?php echo get_permalink($id) ?>"
																					   title="<?php echo get_the_title($id) ?>"><?php echo get_the_title($id) ?></a>
																				</div>
																			</div>
																		</li>
																		<?php
																	endif;
																	$count++;
																endforeach;
																?>
															</ul>
														</div><!--end widget-list-related-->
													<?php endif; ?>
													<?php
													wp_reset_postdata();
													$args = array(
														'parent' => $post->post_parent,
														'exclude'=> array($post->ID),
														'sort_column' => 'post_modified',
														'number'=>5,
														'sort_order' => 'DESC'
													);
													$pages = get_pages($args);
													if (!empty($pages)):
														?>
														<div class="widget-list-related new_columns">
															<h3><?php echo Yii::t('wp_theme.highendcolumn','新着コラム一覧♪');?></h3>
															<ul class="list-item-related">
																<?php
																foreach ($pages as $post) { setup_postdata($post);
																	$img = '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
																	if(has_post_thumbnail($post->ID)){
																		$img = swe_the_post_thumbnail($post->ID, array(120,120), array(), false);
																	}
																	?>
																	<li>
																		<div class="wrap-image-info clearfix">
																			<div class="image">
																				<a href="<?php the_permalink(); ?>"><?php echo $img; ?></a>
																			</div>
																			<div class="info">
																				<a href="<?php the_permalink(); ?>"
																				   title="<?php the_title(); ?>"><?php the_title(); ?></a>
																			</div>
																		</div>
																	</li>
																	<?php
																}
																wp_reset_postdata();
																?>
															</ul>
														</div><!--end widget-list-related-->
													<?php endif; ?>
													<div class="widget-social-list no-border sp">
														<?php echo $outSocialBtnShare;?>
													</div><!--end widget-social-list-->

												</div><!--right-->
											</div><!--end wrap-column-list clearfix-->

										</div><!--end container-list-->
									</section><!--end list-template-->
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