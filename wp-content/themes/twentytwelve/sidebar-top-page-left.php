<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 2/28/2018
 * Time: 3:52 PM
 */

global $language;
$language = Yii::app()->language;
?>
<?php
	function contains($str, array $arr)
	{
		foreach($arr as $a) {
			if (stripos($str,$a) !== false) return true;
		}
		return false;
	}

	$currentLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$listHideSidebar = array("newBooking/cart", "newBooking/cart-confirm", "newBooking/thankyou", "newBooking/orderDetail");
?>


<?php if ($language != 'ja') : ?>
	<div class="left-column">
        <?php echo do_shortcode('[HowtoSidebarLeft pc="true"]'); ?>
        <?php echo do_shortcode('[TopicsBannerSidebarLeft]'); ?>
        <?php echo do_shortcode('[SightSeeingSidebarLeft]'); ?>
        <?php echo do_shortcode('[CeremonialSidebarLeft]'); ?>
        <?php echo do_shortcode('[ShopListNewKimono]'); ?>
        <?php echo do_shortcode('[PopularOptionsSidebarLeft]'); ?>
	</div>
<?php else: ?>
    <?php if (contains($currentLink, $listHideSidebar)) : ?>
		<style>
			.wrap-boths-column .left-column{
				display: none;
			}
		</style>
    <?php endif; ?>

    <?php if (!contains($currentLink, $listHideSidebar)) : ?>
		<div class="left-column">
            <?php echo do_shortcode('[HowtoSidebarLeft pc="true"]'); ?>
            <?php echo do_shortcode('[TopicsBannerSidebarLeft]'); ?>
            <?php echo do_shortcode('[SightSeeingSidebarLeft]'); ?>
            <?php echo do_shortcode('[CeremonialSidebarLeft]'); ?>
            <?php echo do_shortcode('[ShopListNewKimono]'); ?>
            <?php echo do_shortcode('[PopularOptionsSidebarLeft]'); ?>
		</div>
    <?php endif; ?>
<?php endif; ?>



