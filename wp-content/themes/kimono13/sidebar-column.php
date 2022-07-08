<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
if (!is_page()) {
	return;
}

global $post, $column_slugs;

$current_page_id = $post->ID;
$data = checkColumnPage();
$slug = $data['slug'];
$parent = $data['parent'];

?>
<div class="hd-column-sidebar hd-sidebar sidebar-column">
	<div class="page-childs sidebar-item">
		<?php if ($slug == COLUMN): ?>
			<h3 class="title column"><span><?php echo Yii::t('wp_theme', '着物豆知識')  ?></span></h3>
		<?php elseif ($slug == COURSE): ?>
			<h3 class="title course"><span><?php echo Yii::t('wp_theme', '観光コース紹介') ?></span></h3>
		<?php elseif ($slug == SPOT): ?>
			<h3 class="title spot"><span><?php echo Yii::t('wp_theme', '新着の観光スポット') ?></span></h3>
        <?php elseif ($slug == RESTAURANT): ?>
			<h3 class="title column"><span><?php echo Yii::t('wp_theme', '新着のレストランスポット')  ?></span></h3>
		<?php endif; ?>
		<div class="content">
			<ul>
				<?php				
					if(is_page(SPOT)){
						$page_childs = getChildPages(-1, "", $parent);
						if (count($page_childs) > 0) {
							$i = 0;
							foreach ($page_childs as $child) { 
								if($i >= 5) break;
								if(!getChildPages($child->ID) && get_page_template_slug( $child->ID) == 'page-templates/column-page.php'){
									
									echo '<li >'
									. '<a href="' . get_permalink($child->ID) . '" title="' . get_the_title($child->ID) . '">' . get_the_title($child->ID)
									. '</a> </li> ';
									$i++;
								}
							}
						}
					}						
					else{
						$page_childs = getChildPages($parent, 5);
						if (count($page_childs) > 0) {							
							foreach ($page_childs as $child) {								
								$class = '';
								if ($child->ID == $current_page_id) {
									$class = 'active';
								}

								echo '<li class="' . $class . '">'
								. '<a href="' . get_permalink($child->ID) . '" title="' . get_the_title($child->ID) . '">' . get_the_title($child->ID)
								. '</a> </li> ';								
							}
						}
					}
				?>
			</ul>	
		</div>
	</div>
	<div class="links sidebar-item">
		<h3 class="title"><span><?php echo Yii::t('wp_theme', 'その他コラム')?></span></h3>
		<div class="content">
			<ul>
				<?php				
				$pages = array();
				foreach ($column_slugs as $k => $v) {
					if ($slug !== $v) {
						$obj = get_page_by_path($v);
						?>
						<li>
							<a href="<?php echo get_permalink($obj->ID) ?>" title="<?php echo get_the_title($obj->ID) ?>">
								<?php echo get_the_title($obj->ID) ?>
							</a>
						</li>
						<?php
					}
				}
				?>
			</ul>
		</div>
	</div>
	<?php if ($slug == 'spot'): ?>
		<?php
		$spot = get_page_by_path('spot');
		
		$lists = getChildPages($spot->ID);
		
		if (count($lists) > 0):
			?>
			<div id="spot-links" class="spot-links sidebar-item">	
				<h3 class="title"><span><?php echo Yii::t('wp_theme', 'その他地域を見る') ?></span></h3>
				<div class="content">
					<ul class="page level_2 parent">
						<?php foreach ($lists as $page) :?>
							<li class="">								
								<a href="<?php echo get_the_permalink($page->ID); ?>" title="<?php echo get_the_title($page->ID); ?>"><?php echo get_field('spot_location', $page->ID) ? get_field('spot_location', $page->ID) : get_the_title($page->ID); ?></a> 								
								<?php
								$subs = getChildPages($page->ID);
								if (count($lists) > 0) :
									?>
									<ul class="page level_3 children">
										<?php
										foreach ($subs as $p) :
											?>
											<li>								
												<a href="<?php echo get_the_permalink($p->ID); ?>" title="<?php echo get_the_title($p->ID); ?>"><?php echo get_field('spot_location', $p->ID) ? get_field('spot_location', $p->ID) : get_the_title($p->ID); ?></a> 								
											</li>
											<?php
										endforeach;
										?>
									</ul>
									<?php
								endif;
								?>
							</li>
							<?php
						endforeach;
						?>
					</ul>
				</div><!--end content -->
			</div> <!--end spot-links -->
		<?php endif; ?>
	<?php endif; ?>
                        
        <?php if ($slug == COLUMN): ?>
            <div class="banner-lesson">
                <a href="<?php echo esc_url( home_url( '/' ).'lesson/1day' ); ?>"><img src="<?php echo WP_HOME.'/images/img-lesson-banner.png'?>" alt="" /></a>
            </div><!-- end banner-lesson -->          
        <?php endif; ?>          
</div>


