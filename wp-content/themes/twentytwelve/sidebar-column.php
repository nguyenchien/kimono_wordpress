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
        <?php elseif ($slug == RESTAURANT): ?>
			<h3 class="title column"><span><?php echo Yii::t('wp_theme', '新着のレストランスポット')  ?></span></h3>
		<?php endif; ?>
		<div class="content">
			<ul>
				<?php
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
				?>
			</ul>	
		</div>
	</div>
	<?php
		showlistColumnBySlug();
		getToppageTopics();
	?>
</div>


