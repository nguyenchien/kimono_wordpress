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
global $post, $custom_post_type, $kimono;
$language = Yii::app()->language;
$taxonomy = $kimono['taxonomy'];
$blog = $kimono['parent'];
$args = array(
	'post_type' => $custom_post_type['blog'],
	$taxonomy => $blog->slug
);
if(is_single()){
	$args['post__not_in'] = array($post->ID);
}
// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ):
?>
<div class="box-sb-blog">
    <h2 class="tn-title-cat-blog"><?php echo Yii::t('wp_theme', '最近の記事')?></h2>
    <ul class="swe_latest_blog" id="swe_latest_blog">
        <?php while ( $the_query->have_posts() ): $the_query->the_post();?>
		<li><a href="<?php the_permalink() ?>" title="<?php the_title();?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
    </ul>
</div>
<?php
endif;
/* Restore original Post Data */
wp_reset_postdata();
?>
<?php
if(!in_array($language, array('fr','cn', 'hi'))):
    $lang = ($language == 'ja' ? '' : '-'.$language);
?>
<div class="banner-square-blog">
    <ul>
        <li><a href="<?php echo esc_url(home_url('/access/gion-shijo')); ?>">
                <img
                    src="<?php echo WP_HOME . '/images/square-banner/square-banner-gionshijyou' . $lang . '.png'; ?>"
                    alt="<?php echo Yii::t('wp_theme.blog','1/4(月)京都祇園四条店4F増床OPEN'); ?>"/>
            </a></li>
        <li><a href="<?php echo esc_url(home_url('/access/kyotostation')); ?>">
                <img
                    src="<?php echo WP_HOME . '/images/square-banner/square-banner-kyotostation' . $lang . '.png'; ?>"
                    alt="<?php echo Yii::t('wp_theme.blog','京都駅近徒歩2分、75坪京都最大級!京都タワー店京都タワービル3F')?>"/>
            </a></li>
        <li><a href="<?php echo esc_url(home_url('/bring')); ?>">
                <?php if (Yii::app()->language == 'ja'): ?>
                    <img src="<?php echo WP_HOME . '/images/square-banner/square-banner-motikomi.jpg'; ?>"
                         alt="<?php echo Yii::t('wp_theme.blog','着物持ち込みプランは上級師範のみが行う着付けで1900円(税別)から'); ?>"/>
                <?php else: ?>
                    <img
                        src="<?php echo WP_HOME . '/images/square-banner/square-banner-motikomi' . $lang . '.png'; ?>"
                        alt="<?php echo Yii::t('wp_theme.blog','着物持ち込みプランは上級師範のみが行う着付けで1900円(税別)から'); ?>"/>
                <?php endif; ?>
            </a></li>
        <li><a href="<?php echo esc_url(home_url('/kimono/photo-studio')); ?>">
                <?php if (Yii::app()->language == 'ja'): ?>
                    <img src="<?php echo WP_HOME . '/images/square-banner/square-banner-photostudio.jpg'; ?>"
                         alt="<?php echo Yii::t('wp_theme.blog','本格写真撮影始めました。フルセット1500円(税別)!'); ?>"/>
                <?php else: ?>
                    <img src="<?php echo WP_HOME . '/images/square-banner/square-banner-photostudio' . $lang . '.png'; ?>"
                         alt="<?php echo Yii::t('wp_theme.blog','本格写真撮影始めました。フルセット1500円(税別)!'); ?>"/>
                <?php endif; ?>
            </a></li>
    </ul>
</div><!-- end banner-square-blog -->
<?php endif;?>