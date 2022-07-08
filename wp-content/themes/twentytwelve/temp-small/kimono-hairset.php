<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
// init data
$galleryGroups = array('01', '02', '03');
?>
<?php foreach($galleryGroups as $galleryGroup): ?>
	<?php
		$listGalery = getGaleryFromPost($post, $galleryGroup);
		$firstGalery = is_array($listGalery) ? $listGalery[0] : false;
		$i=0;
	?>
	<?php if ($firstGalery): ?>
		<h3 class="title clearfix" id="groupTitle-<?php echo $galleryGroup; ?>">
			<?php echo $firstGalery['grouptitle']; ?>
			<img src="<?php echo WP_HOME . '/images/hairset/img-hairset-first.png' ?>" alt="<?php echo $firstGalery['grouptitle']; ?>" />
		</h3>
		<div class="content clearfix" id="groupContent-<?php echo $galleryGroup; ?>"><?php foreach($listGalery as $gallery): ?>
			<?php
				$i++;
				$galleryImages = $gallery['ids'];
				$showtitle = !empty($gallery['title']) && (empty($gallery['showtitle']) || 'true' == $gallery['showtitle']);
			?>
			<div class="hairset-item <?php echo ($i%3==0) ? 'last' : '' ?> clearfix">
				<?php if ($showtitle): ?>
					<h4><?php echo $gallery['title']; ?></h4>
				<?php endif; ?>
				
				<?php if (!empty($galleryImages) && count($galleryImages) > 0): ?>
					<div class="main-image">
						<?php
							$attachment_id = $galleryImages[0];
							$ok = swe_wp_get_attachment_image($attachment_id);
							if (!empty($ok)) {
								echo swe_wp_get_attachment_image($attachment_id, $size = 'full', $icon = 1, $attr = array(
									'class' => "attachment-$size $attachment_id",
									'alt' => trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true))),
								));
							}
						?>
					</div><!-- end main-image -->
					
					<div class="list-image"><ul class="clearfix"><?php foreach($galleryImages as $attachment_id): ?>
						<?php $ok = swe_wp_get_attachment_image($attachment_id); ?>
						<?php if (!empty($ok)): ?>
							<?php
								$image = swe_wp_get_attachment_image_src($attachment_id, 'full');
								$thumb = swe_wp_get_attachment_image_src($attachment_id);
							?>
							<li><img data-src="<?php echo $image[0]; ?>" src="<?php echo $thumb[0]; ?>" /></li>
						<?php endif; ?>
					<?php endforeach; ?></ul></div><!-- end list-image -->
				<?php endif; ?>
			</div><!-- end hairset-item -->
		<?php endforeach; ?></div><!-- end content -->
	<?php endif; ?>
<?php endforeach; ?>
<p id="short"></p>
<script type="text/javascript">
    $(document).ready(function(){
        $(".box-content-page.hairset .hairset-item .list-image ul li").click(function(){
            $(this).parents('.hairset-item').find('.main-image img').attr('src',$(this).find('img').attr('data-src'));
            $(this).addClass('active').siblings().removeClass('active');
		});
		$(".box-content-page.hairset .hairset-item .list-image ul li:first-child").trigger('click');
    });
</script>