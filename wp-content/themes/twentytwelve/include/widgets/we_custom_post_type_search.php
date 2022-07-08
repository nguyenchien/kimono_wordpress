<?php
/**
 * Custom Post Type Search widget class
 *
 * @since 1.0.3
 * @package Custom Post Type Widgets
 */

if (false === class_exists('WP_Custom_Post_Type_Widgets_Search')) {
	return false;
}

class We_Custom_Post_Type_Widgets_Search extends WP_Custom_Post_Type_Widgets_Search {
	public function __construct() {
		$widget_ops = array( 'classname' => 'widget_search', 'description' => __( 'A search form for your site.', 'custom-post-type-widgets' ) );
		parent::__construct( 'custom-post-type-search', __( 'Search (Custom Post Type)', 'custom-post-type-widgets' ), $widget_ops );
		$this->alt_option_name = 'widget_custom_post_type_search';

		if ( ! is_admin() ) {
			add_action( 'pre_get_posts', array( $this, 'query_search_filter_only_post_type' ) );
		}
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		add_filter( 'get_search_form', array($this, 'we_search_form'), 100, 1);
		add_filter( 'get_search_form', array( $this, 'add_form_input_post_type' ), 10, 1 );
		get_search_form();
		remove_filter( 'get_search_form', array( $this, 'add_form_input_post_type' ));

		echo $args['after_widget'];
	}

	public function we_search_form() {
		$options = get_option( $this->option_name );
		$posttype = ! empty( $options[$this->number]['posttype'] ) ? $options[$this->number]['posttype'] : '';
		$insert = '<input type="hidden" name="post_type" value="' . $posttype . '">';

		$form = '<form role="search" method="get" class="right-sb-form sb-search-form flexbox" action="' . esc_url( home_url( '/' ) ) . '">
                <input type="text" class="sb-search-input" placeholder="フリーワード検索" value="' . get_search_query() . '" name="s" id="s" />
                <button class="submit-search"><i class="icon icon-formal-search flexbox"></i></button>
			</form>';

		$form = str_replace( '</form>', $insert . '</form>', $form );

		return $form;
	}
}
