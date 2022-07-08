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

$customerGalleryImage = swe_wp_get_attachment_image_src($customerGalleryImage, 'full')[0];

$langC = (isset($_GET['langC'])) ? $_GET['langC'] : "ja";
$post = WP_Post::get_instance(get_the_ID());

$shopName = Yii::t('wp_theme',get_field('shop'), array(), null, $langC);
$planName = Yii::t('wp_theme',$planTypeName, array(), null, $langC);
?>

<div class="box-img-gallery">
    <h2 class="title-img-gallery <?= $classTitleBg?>">&nbsp;
        <?php //echo qtrans_use($langC, $post->post_title); ?>
    </h2>
    <div class="img-gallery">
        <?php if(!empty($customerGalleryImage)){ ?>
            <img src="<?php echo $customerGalleryImage; ?>" alt="<?php echo $shopName." ".$planName ?>" />
        <?php } ?>
    </div>
    <div class="sub-tt-gallery dx-flex-gallery"><span class="line"></span><span class="text"><?= Yii::t('wp_theme','ご利用店舗/プラン', array(), null, $langC);?></span></div>
    <div class="list-text-tt-gallery">
        <p><span class="name"><?= Yii::t('wp_theme','ご利用店舗', array(), null, $langC);?></span> <span>:</span> <?= $shopName?></p>
        <p><span class="name"><?= Yii::t('wp_theme','ご利用プラン名', array(), null, $langC);?></span> <span>:</span> <?= $planName?></p>
    </div>

	<?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
</div>