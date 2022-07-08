<?php
/**
 * Custom Post Type Archives widget class
 *
 * @since 1.0.0
 * @package Custom Post Type Widgets
 */

if (false === class_exists('WP_Custom_Post_Type_Widgets_Archives')) {
	return false;
}

class We_Custom_Post_Type_Widgets_Archives extends WP_Custom_Post_Type_Widgets_Archives {
	public function widget( $args, $instance ) {
		$posttype = ! empty( $instance['posttype'] ) ? $instance['posttype'] : 'post';
		$c = ! empty( $instance['count'] ) ? '1' : '0';
		$d = ! empty( $instance['dropdown'] ) ? '1' : '0';
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Archives', 'custom-post-type-widgets' ) : $instance['title'], $instance, $this->id_base );

//		add_filter( 'month_link', array( $this, 'get_month_link_custom_post_type' ), 10, 3 );
		add_filter( 'get_archives_link', array( $this, 'trim_post_type' ), 10, 1 );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ( $d ) {
?>
			<select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
				<option value=""><?php echo esc_attr( __( 'Select Month', 'custom-post-type-widgets' ) ); ?></option>
				<?php
				wp_get_archives( apply_filters( 'widget_archives_dropdown_args', array(
					'post_type' => $posttype,
					'type' => 'monthly',
					'format' => 'option',
					'show_post_count' => $c,
				) ) );
				?>
			</select>
<?php
		}
		else {
?>
			<ul class="list-cate-right-sb">
			<?php
			wp_get_archives( apply_filters( 'widget_archives_args', array(
				'post_type' => $posttype,
				'type' => 'monthly',
				'show_post_count' => $c,
			) ) );
			?>
			</ul>
<?php
		}

//		remove_filter( 'month_link', array( $this, 'get_month_link_custom_post_type' ) );
		remove_filter( 'get_archives_link', array( $this, 'trim_post_type' ) );

		echo $args['after_widget'];
	}
}
