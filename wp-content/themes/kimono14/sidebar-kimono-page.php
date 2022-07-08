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
$parent = $post->post_parent;
if($parent === 0){
	$parent = $current_page_id;
}

?>
<div class="page-kimono">

	<div class="box-sidebar-new">
		<p><?php echo Yii::t('wp_theme', 'プラン・価格');?></p>
		<ul class="sidebar-kimono-page" >
			<?php
				$page_childs = getChildPages($parent, 10, 0, 'is_plan_not_couple', 1);
				if (count($page_childs) > 0) {
					foreach ($page_childs as $child) {
						$class = '';
						if ($child->ID == $current_page_id) {
							$class = 'class="active"';
						}
						echo '<li '.$class.'>'
							. '<a href="' . get_permalink($child->ID) . '" title="' . get_field('sub-title-page', $child->ID, true) . '">' . get_field('sub-title-page', $child->ID, true)
							. '</a> </li> ';
					}
				}
			?>
		</ul>
	</div>

	<div class="box-sidebar-new">
		<p><?php echo Yii::t('wp_theme', 'ヘアセット');?></p>
		<ul class="sidebar-kimono-page" >
                    <li><a href="<?php echo esc_url( home_url( '/' ).'kimono/hairset#long' ); ?>">ロング・ミディアム</a></li>
                    <!--li><a href="<?php echo esc_url( home_url( '/' ).'kimono/hairset#short' ); ?>">ショート</a></li-->
		</ul>
	</div>

</div>
