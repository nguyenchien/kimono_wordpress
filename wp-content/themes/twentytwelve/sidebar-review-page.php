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

global $post;

$current_page_id = $post->ID;
$slug = $post->post_name;
$review_page_list = array(
	'/access/kyoto-area/station-area/review' => Yii::t('review', '京都エリア'),
	'/access/osaka-area/review' => Yii::t('review', '大阪心斎橋大丸店'),
	'/access/asakusa-area/review' => Yii::t('review', '東京浅草店'),
	'/access/kamakura-area/review' => Yii::t('review', '鎌倉小町店')
);
?>
<div class="page-childs-howto-faq">
	<h3 class="title faqs"><span><?php echo Yii::t('review', '京都着物レンタルwargoの口コミ'); ?></span></h3>
	<div class="content">
		<ul class="sbar_faqs">
			<?php
				foreach ($review_page_list as $link=>$title) {
					$permalink = esc_url(home_url($link));
					$active = $permalink == get_permalink() ? true : false;
					if ($active) {
						echo sprintf('<li>%s</li>', $title);
					} else {
						echo sprintf('<li><a href="%s" title="%s">%s</a></li>', $permalink, $title, $title);
					}
				}
			?>
		</ul>
	</div>
</div>


