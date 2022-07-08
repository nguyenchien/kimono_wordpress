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

global $post, $column_slugs, $kimono, $custom_taxonomies, $custom_post_type;

$taxonomy = $kimono['taxonomy'];
$current_cate = $kimono['current_cate'];
$parent = $kimono['parent'];
if(($parent->slug == 'osaka' && $current_cate->slug == 'osaka-spot') || ($parent->slug == 'asakusa' && $current_cate->slug == 'asakusa-spot')){
	$parent = $current_cate;
}
?>
<div class="hd-column-sidebar hd-sidebar sidebar-column">
	<div class="page-childs sidebar-item">		
		<h3 class="title spot"><span><?php echo Yii::t('wp_theme', '新着の観光スポット') ?></span></h3>        
		<div class="content">
			<ul>
				<?php	
				$args = array(
					'posts_per_page' => 5,
					'post_status' => 'publish'
				);
				if(post_type_exists($custom_post_type['spot']) && taxonomy_exists($custom_taxonomies['spot']) ){
					$args['post_type'] = $custom_post_type['spot'];
					$args[$custom_taxonomies['spot']] = $parent->slug;
				}else{
					$args['category_name'] = $parent->slug;
				}
				$posts = get_posts($args);
				
				foreach($posts as $post){
					echo '<li >'
						. '<a href="' . get_permalink($post->ID). '" title="' . get_the_title($post->ID) . '">' . get_the_title($post->ID)
						. '</a> </li> ';
				}			
				?>			
			</ul>	
		</div>
	</div>
	<?php showlistColumnBySlug($kimono);?>
	<?php
	$childs = get_term_children($parent->term_id, $taxonomy);
	if(count($childs)>0):		
	?>
	<div id="spot-links" class="spot-links sidebar-item">	
		<h3 class="title"><span><?php echo Yii::t('wp_theme', 'その他地域を見る') ?></span></h3>
		<div class="content">
			
			<ul class="parent">
				<?php
				foreach($childs as $term){
					$obj = get_term($term, $taxonomy);
					$term_name = $obj->name;
					$current = '';
				if($current_cate->term_id == $term) {$current = 'current-cat';}
				?>								
				<li class="cat-item <?php echo $current; ?>">
					<a href="<?php echo get_term_link($term, $taxonomy);?>" title="<?php echo $term_name;?>"><?php echo $term_name;?></a>
				</li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
<?php endif; ?>
	<?php getToppageTopics();?>
</div>
