<?php
$lang = Yii::app()->language;
global $custom_post_type, $custom_taxonomies;
?>
<?php if ($shortcode['search_form']['display'] === 'on'): ?>
	<div class="SearchForm toppage-item clearfix"><?php
	Yii::app()->controller->widget( 'application.components.widgets.takuhai.SearchForm', array(
		'id' => 'ajax_form',
		'url' => 'takuhai/products',
	), false );
	?></div>
<?php endif; ?>
<?php if ($shortcode['scene']['display'] === 'on'): ?>
	<div id="scene" class="ListScene toppage-item clearfix"><?php
	Yii::app()->controller->widget('application.components.widgets.takuhai.ListScene');
	?></div>
	<!--<p>Shortcode #14389: Create Widget to get Scene List</p>-->
<?php endif; ?>
<?php if ($shortcode['category']['display'] === 'on'): ?>
	<div id="type" class="ListCategory toppage-item clearfix">
	<?php
	Yii::app()->controller->widget('application.components.widgets.takuhai.ListCategory');
	?></div>
<?php endif; ?>
<?php
if ($shortcode['blog']['display'] === 'on'):
//	$lang = Yii::app()->language;
	global $custom_post_type, $custom_taxonomies;
	global $post;
	wp_reset_postdata();
	$blog_args = array (
		'post_status'            => 'publish',
		'order'                  => 'DESC',
		'orderby'                => 'date',
		'posts_per_page'		 => '4'
	);
	$blog_args['post_type'] = $custom_post_type['blog'];
	$blog_args[$custom_taxonomies['blog']] = 'takuhai-blog';

	$the_query = new WP_Query( $blog_args );
	if($the_query -> have_posts()):?>
		<div class="Blog">
			<h2><?php echo Yii::t('widget','Blog');?></h2>
			<ul class="dp-flex">
			<?php
			while ($the_query->have_posts()): $the_query->the_post();
				?>
				<li>
					<div class="image">
						<a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php
							$attachment_id = get_post_thumbnail_id($post->ID);
							if (!empty($attachment_id)) {
							    swe_the_post_thumbnail($post, array(367, 250), array(
                                    'class' => 'attachment-block-top-blog wp-post-image '.$attachment_id,
                                    'id' => '',
                                    'alt' => get_the_title(),
                                ));
							}
							?></a>
					</div>
					<div class="info">
						<p class="date"><?php echo get_the_date(); ?></p>
						<p class="title"><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title(); ?></a></p>
					</div>
				</li>
				<?php
			endwhile;
			?>
			</ul>
		</div>
		<?php
		wp_reset_postdata();
	endif;
endif;
?>
<?php
if ($shortcode['news']['display'] === 'on'):
	global $post, $custom_post_type;
	$args = array(
		'post_status' => 'publish',
		'posts_per_page' => '3',
		'order' => 'DESC',
		'orderby' => 'date',
	);
	if (post_type_exists('news')) {
		$args['post_type'] = $custom_post_type['news'];
	}
	$the_query = new WP_Query($args);
	if ($the_query->have_posts()):
		?>
		<div class="News toppage-item clearfix">
			<h2><?php echo Yii::t('widget','News');?></h2>
			<ul>
				<?php
				while ($the_query->have_posts()) {
					$the_query->the_post();
					echo '<li class="clearfix">';
					$attachment_id = get_post_thumbnail_id($post->ID);
					if (!empty($attachment_id)) {
					    swe_get_the_post_thumbnail($post, $size = array(121, 114), $attr = array(
                            'class' => 'attachment-' . implode('x', $size) . ' ' . $attachment_id,
                            'id' => '1_1_main',
                            'alt' => strip_tags(get_the_title()),
                            'title' => strip_tags(get_the_title()),
                        ));
					} else {
						$url = WP_HOME . '/images/news-noimage.jpg';
						echo '<img data-src="' . $url . '" width="121" height="114" class="attachment-block-top-blog wp-post-image" title="' . strip_tags(get_the_title()) . '" alt="' . strip_tags(get_the_title()) . '" />';
					}
					?>
					<p class="date"><?php echo get_the_date('', $post->ID) ?></p>
					<p class="title-news"> <?php the_title(); ?></p>
					<div class="content-news"> <?php echo $post->post_content; ?></div></li>
				<?php }
				?>
			</ul>
			<p class="link-more"><a href="<?php echo esc_url(home_url('news')) ?>" title="もっと見る"> もっと見る</a></p>
		</div>
		<?php
	endif;
    wp_reset_postdata();
endif;
?>
<?php if ($shortcode['new_products']['display'] === 'on'): ?>
	<div class="NewProduct toppage-item clearfix"><?php
	Yii::app()->controller->widget('application.components.widgets.takuhai.NewProduct', array('_limit'=>4));
	?></div>
<?php endif; ?>
<?php if ($shortcode['column']['display'] === 'on'):
	?>
	<div class="column toppage-item clearfix">
		<h2>Column</h2>
	getColumnList();
	</div>
<?php
endif; //Shortcode #14392: Create Shortcode to get Column ?>
