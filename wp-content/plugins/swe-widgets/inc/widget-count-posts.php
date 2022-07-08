<?php

/**
 * Count posts widget class
 *
 * @since 1.0.0
 * @package SWE Widgets
 */
class WE_Count_Posts extends WP_Widget
{
    private $types;
    private $types_link;
    public function __construct()
    {
        $widget_ops = array('classname' => 'widget_count_posts', 'description' => __('Count posts in selected post types', 'swe-widgets'));
        parent::__construct('widget-count-posts', __('Count Posts', 'swe-widgets'), $widget_ops);
        $this->types = array('news'=> 'お知らせ', 'column' => '着物豆知識', 'blog'=>'着物日記');
        $this->types_link = array('news'=>'news', 'column' => 'column', 'blog' => 'blog');
    }

    public function widget($args, $instance)
    {

        $types = !empty($instance['type']) ? $instance['type'] : array();
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Tags', 'swe-widgets') : $instance['title'], $instance, $this->id_base);
        $html = array();

        foreach ( $types as $type) {
            $type_name = $this->types[$type];
            $link = esc_url( home_url( $this->types_link[$type] ) );
            $count = $this->get_total_post($type);
            $html[] = '<li class="'.$type.'"> <a href="'.$link.'" title="'.$type_name.'" target="_blank">'.$type_name.' (' . $count . ')</a> </li>';
        }
        if (empty($html)) {
            return;
        }

        echo $args['before_widget'];
        if ($title) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        echo '<div class="swe-count-posts container-rsb"><ul class="archive-list">';
        echo implode("\n",$html);
        echo '</ul></div>';
        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {

        $instance['title'] = sanitize_text_field($new_instance['title']);
        // types
        if ( isset( $new_instance['type'] ) ) {
            $types = array();

            foreach ( $new_instance['type'] as $type ) {
                if ( isset( $this->types[$type] ) )
                    $types[] = $type;
            }

            $instance['type'] = array_unique( $types );
        } else
            $instance['type'] = array();
        return $instance;
    }

    public function form($instance)
    {
        $title = isset($instance['title']) ? strip_tags($instance['title']) : '';
        $title_id = $this->get_field_id('title');
        ?>
        <p><label for="<?php echo $title_id; ?>"><?php _e('Title:', 'custom-post-type-widgets'); ?></label>
            <input class="widefat" id="<?php echo $title_id; ?>" name="<?php echo $this->get_field_name('title'); ?>"
                   type="text" value="<?php echo $title; ?>"/></p>

        <p><label><?php __('Types', 'swe-widgets') ?> </label><br />
        <?php
        foreach ( $this->types as $posttype => $posttype_name ) :
            $type_id = $this->get_field_id( 'type') .'-' . $posttype;
            $type_name = $this->get_field_name( 'type' );
        ?>
            <input id="<?php echo $type_id; ?>" type="checkbox" name="<?php echo $type_name; ?>[]" value="<?php echo $posttype;?>" <?php echo checked((!isset($instance['type']) ? true : in_array($posttype, $instance['type'], true)), true, false)?>>
            <label for="<?php echo $type_id; ?>"><?php echo esc_html($posttype_name). ' - ' . $posttype; ?></label> <br>
        <?php endforeach; ?>
        </p>
        <?php
    }
    private function get_total_post($type){
        global $wpdb;
        if($type == 'column'){
            $category = get_category_by_slug($type);
            $count = $category->count;
        }
        if($type == 'blog'){
            $term = get_term_by('slug',$type,'shop-blog');
            $count = $term->count;
        }
        if($type == 'news'){
            $count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = '$type' AND `post_status`='publish'");
        }
        return $count;
    }
}

