<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $post, $custom_taxonomies;
$taxonomy = $custom_taxonomies['blog'];
$term = get_category_permalink($post, $taxonomy);
if($term){
	$shop = get_field('shop_name', $term);
}
$cate_link = get_term_link($term, $custom_taxonomies['blog']);
$img = has_post_thumbnail() ? swe_get_the_post_thumbnail($post->ID, array(216,219)) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
//$img = '<img src="'.WP_HOMES.'/images/formal-rental/img-blog-cat.jpg" alt="">';
$new = isNewBlog($post);
$date = get_the_date();
?>
<li class="item-col-cate">
	<?php if ($new): ?>
		<div class="sp post-new">New</div>
	<?php endif; ?>
	<div class="box-content-cate flexbox">
		<div class="wrap-image-cate"><a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>"><?php echo $img; ?></a></div>
		<div class="info-inner-cate">
			<div class="wrap-post-date flexbox pc">
				<?php if($new): ?>
					<div class="pc post-new">New</div>
				<?php endif; ?>
				<div class="pc post-date"><?php echo $date; ?></div>
			</div>
			<div class="box-title-inner-info flexbox">
				<p class="title-inner-info-name"><a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></p>
			</div>
			<div class="box-bottom-inner-info flexbox justify-content-between">
				<div class="catname-info">日記</div>
				<div class="read-more-info"><a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>"><span>&gt;</span>記事を読む</a> </div>
				<div class="sp post-date"><?php echo $date; ?></div>
			</div>
		</div>
	</div>
</li>