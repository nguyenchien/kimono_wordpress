<?php
/**
 * Created by PhpStorm.
 * User: zen
 * Date: 07/08/2017
 * Time: 10:49
 */

define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Set environment
require_once('../../../../../protected/extensions/yii-environment/Environment.php');
$env = new Environment();require_once($env->yiiPath);$env->runYiiStatics(); // like Yii::setPathOfAlias()
require_once('../../../../../protected/components/SweYii.php');
spl_autoload_unregister(array('YiiBase', 'autoload'));
spl_autoload_register(array('SweYii','autoload'));
SweYii::createWebApplication($env->configWeb);

$planTypeYukataMap = array(
	'all-yukata-plan' => '全てのスラン',
	'standard-yukata' => 'スタンダード浴衣',
	'premium-yukata' => 'プレミアム浴衣',
	'high-end-yukata' => 'ハイエンド浴衣',
	'mamechiyo-yukata' => '豆千代モダン浴衣',
	'brand-yukata' => 'ブランド浴衣',
	'summer-kimono' => '夏着物',
	'men-yukata' => 'メンズ浴衣',
	'boy-yukata' => '子供浴衣',
	'couple-standard-yukata' => 'カップル浴衣'
);

$planTypeKimonoMap = array(
	'all-kimono-plan' => '全てのスラン',
	'standard-kimono' => 'スタンダード着物',
	'premium-kimono' => 'プレミアム着物',
	'mamechiyo-kimono' => '豆千代モダン着物',
	'men-kimono' => 'メンズ着物',
	'high-end-kimono' => 'ハイエンド着物',
	'furisode-hanhaba' => '振袖お散歩半幅帯',
	'furisode-fukuro' => '振袖お散歩袋帯',
	'antique-kimono' => 'アンティーク着物',
	'kimono-girl' => '子供着物',
	'couple-standard-kimono' => 'カップル着物',
);


$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$planTypeName = (isset($_GET['plan_type'])) ? (string)$_GET['plan_type'] : "";
$langC = (isset($_GET['langC'])) ? $_GET['langC'] : "ja";

$linkReserve = "";
$planGroup= "";
if($planTypeName != ""){
	if(in_array($planTypeName, array_keys($planTypeYukataMap))){
		$linkReserve = "reserve#yukata";
		$planGroup = "yukata";
		if($planTypeName == "all-yukata-plan"){
			$groupType = 'yukata_kimono_plan';
			$planTypeN = 3;
		}else{
			$groupType = 'yukata_plan_type';
			$planTypeN = $planTypeYukataMap[$planTypeName];
		}
	}else{
		$linkReserve = "reserve#kimono";
		$planGroup = "kimono";
		if($planTypeName == "all-kimono-plan"){
			$groupType = 'yukata_kimono_plan';
			$planTypeN = 1;
		}else{
			$groupType = 'kimono_plan_type';
			$planTypeN = $planTypeKimonoMap[$planTypeName];
		}
	}

	$args_my_query = array(
		'post_type' => 'customer-gallery',
		'post_status' => 'publish',
		'meta_key'		=> $groupType,
		'meta_value'	=> $planTypeN,
		'pagination' => true,
		'paged' => $page,
		'posts_per_page' => 10,
		'order' => 'DESC',
		'orderby' => 'date'
	);
}else{
	$linkReserve = "reserve";
	$args_my_query = array(
		'post_type' => 'customer-gallery',
		'post_status' => 'publish',
		'pagination' => true,
		'paged' => $page,
		'posts_per_page' => 10,
		'order' => 'DESC',
		'orderby' => 'date'
	);
};
query_posts($args_my_query);

if ( have_posts() ) { ?>

    <!-- start content -->
    <?php if(true) { ?>
            <div class="container-gallery">
                <div class="container-box-img-gallery dx-flex-gallery">
                    <?php
                    while( have_posts() ) {
                        the_post();
                        get_template_part('content', 'customer-gallery');
                    } ?>
                </div><!--end container-box-img-gallery-->
                <div class="wrap-button-gallery">
                    <a class="link-to" href="<?= WP_HOME?>/<?= $linkReserve?>"><?= Yii::t('wp_theme','予約する', array(), null, $langC);?></a>
                </div>

                <div class="wrap-paging-gallery">
                    <div class="paging-gallery">
                        <?php wp_pagenavi(
	                        array('options' => array(
		                        'prev_text' => '<span class="paging-prev">'.Yii::t('wp_theme','前へ', array(), null, $langC).'</span>',
		                        'next_text' => '<span class="paging-next">'.Yii::t('wp_theme','次へ', array(), null, $langC).'</span>'
                            ))
                        ); ?>
                    </div>
                </div>

            </div>
    <?php } else { ?>
        <div class="">
            <p>This is somewhat embarrassing, isn’t it?</p><p>It seems we can’t find what you’re looking for.</p>
        </div>
    <?php } ?>
<?php } else { ?>
	<p style="margin-bottom: 20px;text-align: center;font-size: 17px;"><?= Yii::t('wp_theme','申し訳ありません、現在準備中です', array(), null, $langC);?></p>
<?php } ?>

<script>
	$(document).ready(function(){
		if("yukata" == "<?= $planGroup?>"){
			$('.wrap-customer-gallery').find('.wrap-paging-gallery').addClass('yukata-paging-gallery').removeClass('kimono-paging-gallery');
		}else if("kimono" == "<?= $planGroup?>"){
			$('.wrap-customer-gallery').find('.wrap-paging-gallery').addClass('kimono-paging-gallery').removeClass('yukata-paging-gallery');
		}
	})
</script>
