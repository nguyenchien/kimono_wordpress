<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 2/28/2018
 * Time: 3:52 PM
 */
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
if($isSmartPhone){
    wp_register_style('sidebar-left-v3-sp-style', get_template_directory_uri() . '/css/sidebar-left-v3-sp.css', array('twentytwelve-style'),'20220114');
    wp_enqueue_style('sidebar-left-v3-sp-style');
}else{
    wp_register_style('sidebar-left-v3-pc-style', get_template_directory_uri() . '/css/sidebar-left-v3-pc.css', array('twentytwelve-style'), '20220114');
    wp_enqueue_style('sidebar-left-v3-pc-style');
}
$clientScript = Yii::app()->clientScript;
?>
<link rel="preload" href="<?=$clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css'?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?=$clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css'?>"></noscript>

<div class="left-column hidden-sidebar">
    <?php include(locate_template('include/content-sidebar-left-v3.php')); ?>
</div>
<script>
    $(document).ready(function(){
        $('[data-sub-cates]').click(function(){
            var self    = this;
            var target  = $(self).data('sub-cates');
            var $other  = $('[data-sub-cates="'+target+'"]');
            if(target){
                $other.each(function(index, el){
                    if(el === self){
                        $(self).parents(".title-category").siblings(target).slideToggle();
                        $(self).parents(".title-category").toggleClass('active');
                    }
                });
            }
        });
        $('[data-collapse-cate]').click(function(){
            var self    = this;
            var target  = $(self).data('collapse-cate');
            var $other  = $('[data-collapse-cate="'+target+'"]');
            if(target){
                $other.each(function(index, el){
                    if(el === self){
                        $(self).siblings(target).slideToggle();
                        $(self).parent().toggleClass('active');
                        $(self).toggleClass('active');
                    }
                });
            }
        });
    });
</script>

