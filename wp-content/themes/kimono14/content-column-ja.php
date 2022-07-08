<?php
global $post;
$term = get_category_permalink($post);
$cate_link = get_category_link($term);
$view_count = do_shortcode('[post-views]');
$img = has_post_thumbnail() ? swe_get_the_post_thumbnail($post->ID, array(216,219)) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
//$img = '<img src="'.WP_HOMES.'/images/formal-rental/img-blog-cat.jpg" alt="">';
?>
<li class="item-col-cate">
	<?php if (isNewBlog($post)): ?>
		<div class="sp post-new">New</div>
	<?php endif; ?>
	<div class="box-content-cate flexbox">
		<div class="wrap-image-cate"><a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>"><?php echo $img; ?></a></div>
		<div class="info-inner-cate">
			<div class="wrap-post-date flexbox pc">
				<?php if (isNewBlog($post)): ?>
					<div class="pc post-new">New</div>
				<?php endif; ?>
				<div class="pc post-date" ><?php echo get_the_date(); ?></div>
				<div class="pc wrap-feature">特集</div>
			</div>
			<div class="box-title-inner-info flexbox">
				<p class="title-inner-info-name"><a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></p>
			</div>
			<div class="box-bottom-inner-info flexbox justify-content-between">
				<div class="wrap-view-feature flexbox">
					<div class="sp wrap-feature">特集</div>
					<div class="wrap-num-view flexbox"><span class="num-view"><?php echo $view_count; ?></span><span class="name-view">view</span></div>
				</div>
				<div class="read-more-info"><a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>"><span>&gt;</span>記事を読む</a></div>
			</div>
		</div>
	</div>
</li>