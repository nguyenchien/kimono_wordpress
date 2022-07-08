<?php
/**
 * Template Name: List kimono by plan type id
 *
 * Description: get kimono of plan
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
	Yii::app()->controller->widget('application.components.widgets.ListKimono', array('plan_type_id' => get_field('plan_type_id')));
get_footer();