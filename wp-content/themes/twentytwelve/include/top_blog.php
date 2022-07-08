<?php
	$lang = Yii::app()->language; 
	global $custom_post_type, $custom_taxonomies, $isSmartPhone, $sites;
?>
<?php if($shortcode['customer_today']['display']==='on' && (!$isSmartPhone OR $lang == 'ko')): ?>

	<?php
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $plugin_swe_post = 'swe_post/swe_post.php';
	global $post, $blogs;
	$taxonomy = $custom_taxonomies['blog'];
	$post_type = $custom_post_type['blog'];
	$slug = $blogs[$lang];
	$blog_args = array (
		'post_type'              => $post_type,
		$taxonomy                => $slug,
		'post_status'            => 'publish',
		'order'                  => 'DESC',
		'orderby'                => 'date',
		'posts_per_page'		 => '4'
	);
    if(is_plugin_active($plugin_swe_post)){
        $blog_args['meta_query']  = array(
            'relation' => 'OR',
            array(
                'key'   => 'showtoday',
                'value' => '',
                'compare' => 'NOT EXISTs'
            ),
            array(
                'key'   => 'showtoday',
                'value' => 'yes',
                'compare' => '='
            )
        );
    }
	$the_query = new WP_Query( $blog_args );
	if($the_query -> have_posts()):
        $blockForTopPageHide = $lang == 'ko' ? 'none' : 'block';
		?>
		<section class="block-for-top-page" style="display: <?= $blockForTopPageHide?> ">
		<div class="block-title-top-page-title bg-top-page-title mrg-bt-10 blog">
			<h2>
				<span class="icon-icon-today"></span>
				<span class="en">Today's Customer</span>
				<?php if($lang =='th') : ?>
					<span class="small-title"><?php echo Yii::t('wp_theme','今日のお客様');?></span>
	            <?php else: ?>
					<?php if($lang != 'en') : ?>
					<span class="ja"><?php echo Yii::t('wp_theme','今日のお客様');?></span>
					<?php endif;?>
				<?php endif;?>
			</h2>
		</div>
		<div class="wrap-blogtop">
		<?php
		$i = 1;
		while ($the_query->have_posts()) {
			$the_query->the_post();
			if($slug == 'blog'){
				$term= get_category_permalink($post, $taxonomy);
				$category_data = get_category_data($term);
			}
			?>
			<div class="one-third column fl item-blog-top <?php echo ($i%4==0)?'last-pc':''; ?> <?php echo ($i%2==0)? 'last-sp' : '' ?>">
				<div class="image">
					<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
						<?php
						$attachment_id = get_post_thumbnail_id($post->ID);
						if (!empty($attachment_id)) {
                            swe_the_post_thumbnail($post, $size = array(367, 250), $icon = 1, $attr = array(
                                'class' => 'attachment-block-top-blog wp-post-image '.$attachment_id,
                                'id' => '',
                                'alt' => get_the_title(),
                            ));
						}
						?>
					</a>
				</div>
				<div class="text">
					<p class="first-title clearfix">
						<?php if($lang == 'ja'): ?>
						<a href='<?php echo get_term_link($term->term_id, $taxonomy); ?>' title='<?php echo $category_data['name']; ?>' >
							<span class="shop-name <?php echo $category_data['class']; ?>"><?php echo $category_data['shop']; ?></span>
						</a>
						<?php endif; ?>
                        <span class="date"><?php echo get_the_date('', $post->ID); ?></span>
					</p>
					<p class="title">
						<a href="<?php the_permalink() ?>" title="<?php the_title();?>"><?php splitPostTitle(get_the_title()); ?></a>
					</p>
					
				</div>
			</div><!-- end item -->
			<?php
			//if($i%3 == 0){ echo '<div class="clearAll"></div>';}
			$i++;
		}
		?>
			<div class="clearAll"></div>
		</div>
		</section>
		<?php
	endif;
	?>

<?php endif;?>
<?php
	// Check if topics variable exist
	if(!empty($shortcode['topics'])) {
		// Print topics content
		echo $shortcode['topics'];
	}
?>

<?php 
if($shortcode['ranking']['display']==='on'):
	$page = get_page_by_path('ranking');
	if ($page) :
		//get page data
		$ranking_data=get_page($page->ID);
		$ranking_data = $ranking_data;
		//get first gallery => return [ids,src]
		$gallery_data = get_post_gallery( $ranking_data,false );
		if(!empty($gallery_data['ids'])):
			$galleries = explode(",",$gallery_data['ids']);
			$flagCollapseContent = false;
			if($lang =='en' || $lang =='fr' || $lang =='tw' || $lang =='id') {
				$flagCollapseContent = true;
			}
			?>
			<div class="box-ranking-top" style="padding-bottom: 10px;">
				<div class="block-title-top-page-title bg-top-page-title ranking">
					<h2>
						<?= Yii::t('wp_theme','<span class="en">Yukata ranking</span><span class="ja">人気ランキング</span>')?>
						<?php 
						edit_post_link('Edit', '<span class="edit_link">', '</span>',$page->ID);
						?>
						<?php if($flagCollapseContent) {?>
							<span id="rankingArrow" class="fa-icon-collapsed icon-click icon-fa-collapsed-down icon-collapsed-ranking" onclick="toggleRanking()"></span>
			            <?php }?>
					</h2>
				</div>
				<script>
					function toggleRanking() {
						$(".ranking-content").slideToggle();
						$("#rankingArrow").toggleClass('icon-fa-collapsed-down');
						$("#rankingArrow").toggleClass('icon-fa-collapsed-top');
					}
				</script>
				<div class="<?php echo $flagCollapseContent ? "ranking-content" : ""?>" <?php echo $flagCollapseContent ? 'style="display: none;"' : '' ?>>
					<ul id="block_ranking" class="clearfix">
					<?php
						foreach($galleries as $k => $attachment_id){
						    if(checkPostIDInSiteMedia($attachment_id)){
                                switch_to_blog($sites['blog_media']);
                                $attachment = get_post( $attachment_id );
                                //get comment
                                $caption = getTranslateContent($attachment->post_excerpt);
                                $description = getTranslateContent($attachment->post_content);
                                // get product name from product_id
                                $alt = getTranslateContent(trim(strip_tags(get_post_meta($attachment->ID, '_wp_attachment_image_alt', true))));
                                $src = swe_wp_get_attachment_image_src($attachment->ID, 'full');
                                $src = $src[0];
                                restore_current_blog();
                            }else{
                                $attachment = get_post( $attachment_id );
                                //get comment
                                $caption = $attachment->post_excerpt;
                                $description = $attachment->post_content;
                                // get product name from product_id
                                $alt = trim(strip_tags(get_post_meta($attachment->ID, '_wp_attachment_image_alt', true)));
                                $src = wp_get_attachment_image_src($attachment->ID, 'full');
                                $src = $src[0];
                            }
							?>
							<?php if ($k < 7):?>
								<li class='number-<?php echo ($k+1);?>'>
									<div class="ranking-image">
										<img src="<?php echo $src?>" id="id_<?php echo $attachment->ID?>" alt="<?php echo $alt; ?>">
										<span class="text text<?php echo ($k+1);?>"><?php echo ($k+1);?></span>
										<span class="box-reserve">
											<a href="<?php echo esc_url(home_url('reserve')) ?>"><?php echo yii::t('wp_theme', '予約する')?></a>
										</span>
									</div>
									<p><?php echo $caption;?></p>
								</li>
							<?php else:
								?>
								<li>
									<div class="ranking-adv">
										<!-- href via description of image no.6-->
										<a href='<?php echo $description; ?>' ><?php echo "<img src='$src' id='id_$attachment->ID' alt='$alt' >"?></a>
									</div>
								</li>
							<?php endif;?>

						<?php }?>
					</ul>
				</div>
				<div class="clearAll"></div>
			</div>
		<?php endif;?>
	<?php endif;?>
<?php endif;?>

<?php
if($shortcode['news']['display']==='on' && !$isSmartPhone):
	global $post;
	$args = array (
		'post_status'            => 'publish',		
		'posts_per_page'         => '3',
		'order'                  => 'DESC',
		'orderby'                => 'date',
	);
	if(post_type_exists('news')){
		$args['post_type'] = $custom_post_type['news'];
	}else{
		$args['category_name'] = "news";
	}	
	$the_query = new WP_Query( $args );
	if($the_query -> have_posts()):
		echo '<div class="box-news-top" style="padding-bottom: 10px;">';
				echo '<div class="block-title-top-page-title bg-top-page-title news">';
				echo '<h2><span class="icon-icon-news"></span><span class="en">News</span><span class="ja">'.Yii::t('wp_theme', 'お知らせ').'</span></h2>';
				echo '</div>';

				echo '<div class="topp-box-news">';
				echo '<ul>';
				while ($the_query -> have_posts()){
						$the_query -> the_post();
						echo '<li class="clearfix">';
                        $html_image = '';
                        $size = array(121,114);
                        $icon = 1;
                        $attr = array(
                            //	'src' => $src,
                            'class' => 'attachment-'.implode('x', $size) . ' '.$attachment_id,
                            'id' => '1_1_main',
                            'alt' => strip_tags(get_the_title()),
                            'title' => strip_tags(get_the_title()),
                        );
						if($image = swe_get_the_post_thumbnail($post, $size, $attr)){
						    echo $image;
                        }
                        else{
                            $url=WP_HOME.'/images/news-noimage.jpg';
                            echo '<img data-src="'.$url.'" width="121" height="114" class="attachment-block-top-blog wp-post-image" title="'.strip_tags(get_the_title()).'" alt="'.strip_tags(get_the_title()).'" />';
                        }
						//echo '<img data-src="'.$url.'" width="177" height="167" class="attachment-block-top-blog wp-post-image" />';
						echo '<p class="date">'.get_the_date('', $post->ID).'</p>';
						echo '<p class="title-news">';
								the_title();
						echo '</p>';
						echo '<div class="content-news">';
						echo $post->post_content;
						echo '</div>';
						echo '</li>';
				}
		echo '</ul>
				  </div>';
//		echo '<p><a class="top-block-news-readmove kimono" href="'. WP_HOME .'/news" title="'.Yii::t('wp_theme','これまでのニュースを一覧を見る').'"> '.Yii::t('wp_theme','これまでのニュースを一覧を見る').'</a></p>';
		echo '<p><a class="top-block-news-readmove kimono" href="'. esc_url(home_url('news')) .'" title="もっと見る"> もっと見る</a></p>';
		echo '</div>';
		
	endif;
endif;?>
<?php
if($shortcode['media']['display']==='on'):
	global $post;
	$args = array (
		'post_status'            => 'publish',
		'posts_per_page'         => '2',
		'order'                  => 'DESC',
		'orderby'                => 'date',
	);
	if(post_type_exists('media')){
		$args['post_type'] = 'media';
	}
	$the_query = new WP_Query( $args );
	if($the_query -> have_posts()):
		echo '<div class="box-media-top">';
		$sub_title = "";
		if(Yii::app()->language ==='ja') {
			$sub_title =  Yii::t('wp_theme', '雑誌・テレビ掲載情報');
		}
		echo '<div class="block-title-top-page-title bg-top-page-title"><h2><span class="en">Media</span><span class="ja">'.$sub_title.'</span></h2></div>';

		echo '<div class="content">';
		echo '<ul class="clearfix">';
		while ($the_query -> have_posts()){
			$the_query -> the_post();
			echo '<li class="clearfix">';
			echo '<div class="image">';
            $size = array(186,263);
            $icon = 1;
            $attr = array(
                //	'src' => $src,
                'class' => 'attachment-'.implode('x', $size) . ' '.$attachment_id,
                'id' => '1_1_main',
                'alt' => strip_tags(get_the_title()),
                'title' => strip_tags(get_the_title()),
            );
            if($image = swe_get_the_post_thumbnail($post, $size, $attr)) {
				echo $image;
			}else{
				$url=WP_HOME.'/images/no-image.png';
				echo '<img data-src="'.$url.'" width="121" height="114" class="attachment-block-top-blog wp-post-image" title="'.strip_tags(get_the_title()).'" alt="'.strip_tags(get_the_title()).'" />';
			}
			echo '</div>';
			//echo '<img data-src="'.$url.'" width="177" height="167" class="attachment-block-top-blog wp-post-image" />';
			echo '<div class="text">';
			echo '<p class="title">';
			the_title();
			echo '</p>';
			echo '<p class="desc">'.$post->post_content.'</p>';
			echo '<p class="date">'.get_the_date('', $post->ID).'</p>';
			echo '</div>';
			echo '</li>';
		}
		echo '</ul>
				  </div>';
//		echo '<p><a class="top-block-news-readmove kimono" href="'. WP_HOME .'/news" title="'.Yii::t('wp_theme','これまでのニュースを一覧を見る').'"> '.Yii::t('wp_theme','これまでのニュースを一覧を見る').'</a></p>';
		echo '<p class="more"><a href="'. esc_url(home_url('media')) .'" title="もっと見る"> もっと見る</a></p>';
		echo '</div>';

	endif;
endif;
?>
