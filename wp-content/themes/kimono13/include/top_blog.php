<section class="block-for-top-page">
	<div class="block-title-top-page-title bg-top-page-title mrg-bt-10">
		<h2><?php _e('今日のお客様','twentytwelve');?></h2>
	</div>

	<?php
	$blog_args = array (
		'post_status'            => 'publish',
		'category_name'          => 'blog',
//		'posts_per_page'         => '6',
		'order'                  => 'DESC',
		'orderby'                => 'date',
	);
	$detect = Yii::app()->mobileDetect;
	if ($detect->isSmartPhone()){ // Smartphone
		$blog_args['posts_per_page'] = '4';
	}else{ // PC
		$blog_args['posts_per_page'] = '6';
	}
	$the_query = new WP_Query( $blog_args );
	if($the_query -> have_posts()):
		$i = 1;
		while ($the_query->have_posts()) {
			$the_query->the_post();
			if ($i%3 == 1) {
				$addClass = 'alpha-blog';
			} elseif ($i%3 == 0) {
				$addClass = 'omega-blog';
			} else {
				$addClass = '';
			}
			$terms = get_the_terms($post->ID, 'category');
			$category_data = get_category_data($terms);
			?>
			<div class="one-third column <?= $addClass ?> fl item-blog-top">
				<div class="image">
					<a href="<?php the_permalink(); ?>">
						<?php
						$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						echo '<img data-src="'.$url.'" width="293" height="209" class="attachment-block-top-blog wp-post-image" />';
						//echo get_the_post_thumbnail($page->ID, 'block-top-blog');
						?>
					</a>
				</div>
				<div class="text">
					<p class="first-title">
						<a href='<?php echo get_category_link($category_data['id']); ?>' title='<?php echo $category_data['name']; ?>' >
							<span class="shop-name <?php echo $category_data['class']; ?>"><?php echo $category_data['shop']; ?></span>
						</a>
						<span><?php echo get_the_date('', $post->ID); ?></span>
					</p>
					<p class="title">
						<?php if(isNewBlog($post)): ?>
							<span class="newtitle-top">New</span>
						<?php endif; ?>
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					</p>
					<p class="more">
						<?php
						if(has_excerpt($post->ID))
							echo wp_trim_words( $post->post_excerpt, $num_words = 80, $more = null );
						else
							echo wp_trim_words( $post->post_content, $num_words = 80, $more = null );
						?>
					</p>
				</div>
			</div><!-- end item -->
			<?php
			if($i%3 == 0){ echo '<div class="clearAll"></div>';}
			$i++;
		}
	endif;
	?>
	<div class="clearAll"></div>

</section>

<?php
global $post;
$args = array (
	'post_status'            => 'publish',
	'category_name'          => 'news',
	'posts_per_page'         => '5',
	'order'                  => 'DESC',
	'orderby'                => 'date',
);
$the_query = new WP_Query( $args );
if($the_query -> have_posts()):
	echo '<div class="box-news-top" style="padding-bottom: 10px;">';
	echo '<div class="block-title-top-page-title bg-top-page-title">';
	echo '<h2>お知らせ</h2>';
	echo '</div>';
	echo '<div class="topp-box-news">';
	echo '<ul>';
	while ($the_query -> have_posts()){
		$the_query -> the_post();
		echo '<li>';
		echo '<span>'.get_the_date('', $post->ID).'</span>';
		the_title();
		echo '</li>';
	}
	echo '</ul>
            </div>
            </div>';
endif;
?>
