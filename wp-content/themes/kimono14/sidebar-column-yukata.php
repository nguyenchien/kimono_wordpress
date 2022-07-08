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

global $post, $column_slugs, $kimono;

$current_cate = $kimono['current_cate'];
$taxonomy = $kimono['taxonomy'];
$parent = $kimono['parent'];
$parent_data = get_category_data($parent);
?>
<div class="hd-column-sidebar hd-sidebar sidebar-column">
	<?php
	$args = array(
		'posts_per_page' => 5,
		'category' => $parent->term_id,
		'post_status' => 'publish',
	);
	if(is_single()){
	    $args['exclude'] = array($post->ID);
    }
	$posts = get_posts($args);
	if($posts){
		?>
		<div class="page-childs sidebar-item <?php echo $current_cate->slug?>">
			<h3 class="title spot"><span><?php echo Yii::t('wp_theme', '新着のコラム') ?></span></h3>
			<div class="content">
				<ul>
		<?php
		foreach($posts as $post){
			echo '<li >'
				. '<a href="' . get_permalink($post->ID). '" title="' . get_the_title($post->ID) . '">' . get_the_title($post->ID)
				. '</a> </li> ';
		}
		?>
				</ul>
			</div>
		</div>
	<?php
	}
	?>
	<?php showlistColumnBySlug($kimono);?>
	<?php if(get_term_children($parent->term_id, $taxonomy)):?>
	<div class="links sidebar-item">
		<h3 class="title"><span><?php echo $parent_data['name']; ?></span></h3>
		<div class="content">
			<?php
			$args = array(				
				'orderby' => 'ID',
				'order' => 'ASC',
				'style' => 'list',
				'show_count' => 0,
				'hide_empty' => 0,
				'use_desc_for_title' => 0,
				'child_of' => $parent->term_id,
				'exclude' => 1,
				//'exclude_tree' => 1,
				//'include' => $parent->term_id,
				'hierarchical' => 1,
				'title_li' => '',
				'show_option_none' => __(''),
				'number' => null,
				'echo' => 1,
				'depth' => 0,
				//'current_category' => $current_cate == $parent ? 0 : $parent,
				'current_category' => $current_cate->term_id,
				'pad_counts' => 0,
				'taxonomy' => 'category',
				'walker' => null
			);
			?>
			<ul class="parent">
				<?php
				wp_list_categories($args);
				?>
			</ul>
		</div>
	</div>	
	<?php endif; ?>
	<?php getToppageTopics();?>
</div>


