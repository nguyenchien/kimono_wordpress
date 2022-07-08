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

global $post, $q_config;

$current_page_id = $post->ID;
$data = checkColumnPage();
$slug = $data['slug'];
$parent = $data['parent'];

?>
<div class="page-childs-howto-faq">
	<?php if ($slug == FAQ): ?>
		<h3 class="title faqs"><span><?php echo Yii::t('wp_theme', 'よくある質問')  ?></span></h3>
	<?php elseif ($slug == HOWTOs): ?>
		<!--h3 class="title howto"><span><?php echo Yii::t('wp_theme', '観光コース紹介') ?></span></h3-->
	<?php endif; ?>
	<div class="content">
		<ul class="<?php if($slug == FAQ){ echo 'sbar_faqs';}else{ echo 'sbar_howto';}?>" >
			<?php
			if(is_page(HOWTOs)){
				$page_childs = getChildPages($parent, 5);
				if (count($page_childs) > 0) {
					foreach ($page_childs as $child) {
						$class = '';
						if ($child->ID == $current_page_id) {
							$class = 'class="active"';
						}
						echo '<li '.$class.'>'
							. '<a href="' . get_permalink($child->ID) . '" title="' . get_the_title($child->ID) . '">' . get_the_title($child->ID)
							. '</a> </li> ';
					}
				}
			}
			else{
				$page_childs = getChildPages($parent, 10);
				if (count($page_childs) > 0) {
					foreach ($page_childs as $child) {
						$class = '';
						if ($child->ID == $current_page_id) {
							$class = 'class="active"';
						}
						echo '<li '.$class.'>'
							. '<a href="' . get_permalink($child->ID) . '" title="' . get_the_title($child->ID) . '">' . get_the_title($child->ID)
							. '</a> </li> ';
					}
				}
			}
			?>
		</ul>
	</div>
</div>


