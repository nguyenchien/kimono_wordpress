<?php
/**
 * Created by PhpStorm.
 * User: zen
 * Date: 07/08/2017
 * Time: 09:33
 */

//global $post;
//
//$shopId = get_field('shop');
//$shopName = 'shop_name_'.$shopId;
//
//$terms = get_the_terms( $post->ID , 'gallery-kimono-type' );
//$category = null;
//foreach ($terms as $term){
//    $category = $term->slug;
//    break;
//}
//
//$keyPlanType = array_search($category, $planTypeYukataSlug);
//if(empty($keyPlanType)){
//    $keyPlanType = array_search($category, $planTypeKimonoSlug);
//}
//

$planGroup = get_field("yukata_kimono_plan");
$planTypeName = "";
if($planGroup == 1){
    $classTitleBg = 'title-img-gallery-kimono';
	$planTypeName = get_field("kimono_plan_type");
}elseif($planGroup == 3){
    $classTitleBg = 'title-img-gallery-yukata';
	$planTypeName = get_field("yukata_plan_type");
}

$customerGalleryImage = get_field("customer_gallery_image");

$customerGalleryImage = swe_wp_get_attachment_image_src($customerGalleryImage, array(283,285))[0];

$langC = (isset($_GET['langC'])) ? $_GET['langC'] : "ja";
$post = WP_Post::get_instance(get_the_ID());

$shopName = Yii::t('new-kimono-gallery-shop',get_field('shop'), array(), null, $langC);
$planName = Yii::t('new-kimono-gallery-plan',$planTypeName, array(), null, $langC);
?>

<div class="box-img-gallery">
    <div class="img-gallery">
        <?php if(!empty($customerGalleryImage)){ ?>
            <img src="<?php echo $customerGalleryImage; ?>" alt="<?php echo $shopName." ".$planName ?>" />
        <?php } ?>
    </div>
    <div class="info-gallery">
        <h3 class="title-box">
            <span class="text-info text-status"><?= Yii::t('new-kimono-quick-booking','NEW!');?></span>
            <span class="text-info text-title"><?= Yii::t('new-kimono-gallery','ご利用店舗/プラン');?></span>
        </h3>
	<ul class="list-shop-plan">
            <li class="gallery-shop-name"><?= $shopName?></li>
            <li class="gallery-plan-name"><?= $planName?></li>
        </ul>
    </div>
	<?php //edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
</div>
