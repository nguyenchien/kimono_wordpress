<?php
/**
 * Header template
 * Author: Loi Dang
 * Date: 10/5/2015
 * Time: 4:58 PM
 */
	global $isSmartPhone, $language;
?>
	<header id="masthead" class="site-header" role="banner">
		<div class="container clearfix">
                            <div class="box-logo clearfix">
                            <?php
                                $current_page = Yii::app()->controller->id . '/' . Yii::app()->controller->action->id;
                         ?>
<div class="site-title">
	<?php
		$locale = isset($language) ? $language : 'en';
	?>
	<a href="<?php echo esc_url( home_url( 'takuhai' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		<img src="<?php echo WP_HOME; ?>/images/logo-takuhai-ja.png" alt="京都きものレンタル" />
	</a>
</div>
</div><!-- end box-logo -->

<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
<?php endif; ?>


</div><!-- container -->
</header><!-- #masthead -->