<?php

/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 2/1/2018
 * Time: 4:57 PM
 */
if (false === class_exists('Post_Views_Counter_List_Widget')) {
    return false;
}
class WE_Post_Views_Counter_List_Widget extends Post_Views_Counter_List_Widget
{
    public function widget( $args, $instance ) {
        $instance['title'] = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );

        $html = $args['before_widget'] . ( ! empty( $instance['title'] ) ? $args['before_title'] . $instance['title'] . $args['after_title'] : '');
        $html .= swe_pvc_most_viewed_posts( $instance, false );
        $html .= $args['after_widget'];

        echo $html;
    }
}