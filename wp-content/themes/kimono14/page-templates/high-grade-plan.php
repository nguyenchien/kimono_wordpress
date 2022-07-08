	<?php
/**
 * Template Name: High Grade Plan page
 * Pages apply: /homongi, kurotomesode, irotomesode, seijin, sotsugyou, shichigosan
 */
global $post;

wp_register_style('style-single_plan', get_template_directory_uri() . '/css/high-grade-plan.css', array('twentytwelve-style'));
wp_enqueue_style('style-single_plan');
	wp_register_style('style-kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
	wp_enqueue_style('style-kimono');
get_header();
?>
<style>
.list-view-loading {
	background: none!important;
	background-color: #fff;
	opacity: 0.5;
	position: relative;
}

.list-view-loading .loading-icon{
	display: block;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto;
	background-size: contain;
	background: url('../images/reserve/ajax-loader.gif') no-repeat;
	height: 55px;
	width: 54px;
}
.link-to-page {visibility:hidden;}
</style>
<div class="container high-grade">
   <?php
   if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
   }
   ?>
   <?php echo the_content(); ?>
<!--	<p class="note">--><?php //echo Yii::t('kimono', '※現在、着物大量入荷中にて更新が間に合っておりません。店舗にはさらに沢山の着物をご用意。ご来店時に選んで頂くことも可能です。是非店頭へお越しください！！'); ?><!--</p>-->
	<div class="box-content-page content-<?php echo $post->post_name; ?> clearfix">
		<div class="cont-page-left clearfix">
	<?php 	//Yii::app()->controller->widget('application.components.widgets.ListKimonoHighGrade', array('plan_type_ids' => get_field('plan_type_list', $post->ID))); ?>
	<?php 
		$map = array(
5=>'homongi',
6=>'kurotomesode',
7=>'irotomesode',
8=>'seijin',
9=>'sotsugyou',
10=>'shichigosan',
12=>'hakamamale'
);
$map = array_flip($map);
//$_GET['group'] = $map[$post->post_name];
$hasCart = HighendCart::hasCart();	
//	var_dump($_GET['group'], $map[$post->post_name]);
	$html = Yii::app()->controller->widget( 'application.components.widgets.highend.SearchForm', array(
        'formHtmlOptions' => array(
            'id' => 'ajax_form',
        ),
        'hasBookingSession'=>$hasCart,//$hasBookingSession,
        'id' => 'highend_search_form',
        'enableAjax' => true,
        'idAjaxReturn'=>'ajaxListView', // id of the CListView
        'group' => array($map[$post->post_name])
), true ); 
///wp/index?group=5
$html = str_replace('wp/index',$post->post_name,$html);
echo $html;
?>

	</div></div>
</div>
<?php get_footer(); ?>
