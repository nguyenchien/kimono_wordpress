<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 2/28/2018
 * Time: 3:52 PM
 */
global $isSmartPhone;
if ($isSmartPhone) {
	return;
}
?>
<div class="right-column-content">
    <?php echo do_shortcode('[SpotNewArrival]'); ?>
	<?php echo do_shortcode('[NewKimonoOptionsSidebar]'); ?>
</div>