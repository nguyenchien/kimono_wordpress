<?php
/**
 * Created by PhpStorm.
 * User: huutu
 * Date: 19/01/2018
 * Time: 13:56
 */
if (false === class_exists('WP_Custom_Post_Type_Widgets_Categories')) {
	return false;
}

class We_Custom_Post_Type_Widgets_Categories extends WP_Custom_Post_Type_Widgets_Categories{
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Categories', 'custom-post-type-widgets' ) : $instance['title'], $instance, $this->id_base );
		$taxonomy = ! empty( $instance['taxonomy'] ) ? $instance['taxonomy'] : 'category';
		$c = ! empty( $instance['count'] ) ? '1' : '0';
		$h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
		$d = ! empty( $instance['dropdown'] ) ? '1' : '0';

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$cat_args = array(
			'orderby' => 'name',
			'taxonomy' => $taxonomy,
			'show_count' => $c,
			'hierarchical' => $h
		);

		if ( $d ) {
			$dropdown_id = "{$this->id_base}-dropdown-{$this->number}";

			echo '<label class="screen-reader-text" for="' . esc_attr( $dropdown_id ) . '">' . $title . '</label>';

			$cat_args['show_option_none'] = __( 'Select Category', 'custom-post-type-widgets' );
			$cat_args['name'] = 'category' === $taxonomy ? 'category_name' : $taxonomy;
			$cat_args['id'] = $dropdown_id;
			$cat_args['value_field'] = 'slug';
			?>
			<form action="<?php bloginfo( 'url' ); ?>" method="get">
				<?php
				wp_dropdown_categories( apply_filters( 'widget_categories_dropdown_args', $cat_args ) );
				?>
				<script>
                    (function() {
                        /* <![CDATA[ */
                        var dropdown = document.getElementById( "<?php echo esc_js( $dropdown_id ); ?>" );
                        function onCatChange() {
                            if ( dropdown.options[dropdown.selectedIndex].value ) {
                                return dropdown.form.submit();
                            }
                        }
                        dropdown.onchange = onCatChange;
                    })();
                    /* ]]> */
				</script>
			</form>
			<?php
		}
		else {
			?>
			<ul class="list-cate-right-sb">
				<?php
				$cat_args['title_li'] = '';
				$this->wp_list_categories( apply_filters( 'widget_categories_args', $cat_args));
				?>
			</ul>
			<?php
		}

		echo $args['after_widget'];
	}

	/**
	 * Display or retrieve the HTML list of categories.
	 *
	 * @since 2.1.0
	 * @since 4.4.0 Introduced the `hide_title_if_empty` and `separator` arguments. The `current_category` argument was modified to
	 *              optionally accept an array of values.
	 *
	 * @param string|array $args {
	 *     Array of optional arguments.
	 *
	 *     @type int          $child_of              Term ID to retrieve child terms of. See get_terms(). Default 0.
	 *     @type int|array    $current_category      ID of category, or array of IDs of categories, that should get the
	 *                                               'current-cat' class. Default 0.
	 *     @type int          $depth                 Category depth. Used for tab indentation. Default 0.
	 *     @type bool|int     $echo                  True to echo markup, false to return it. Default 1.
	 *     @type array|string $exclude               Array or comma/space-separated string of term IDs to exclude.
	 *                                               If `$hierarchical` is true, descendants of `$exclude` terms will also
	 *                                               be excluded; see `$exclude_tree`. See get_terms().
	 *                                               Default empty string.
	 *     @type array|string $exclude_tree          Array or comma/space-separated string of term IDs to exclude, along
	 *                                               with their descendants. See get_terms(). Default empty string.
	 *     @type string       $feed                  Text to use for the feed link. Default 'Feed for all posts filed
	 *                                               under [cat name]'.
	 *     @type string       $feed_image            URL of an image to use for the feed link. Default empty string.
	 *     @type string       $feed_type             Feed type. Used to build feed link. See get_term_feed_link().
	 *                                               Default empty string (default feed).
	 *     @type bool|int     $hide_empty            Whether to hide categories that don't have any posts attached to them.
	 *                                               Default 1.
	 *     @type bool         $hide_title_if_empty   Whether to hide the `$title_li` element if there are no terms in
	 *                                               the list. Default false (title will always be shown).
	 *     @type bool         $hierarchical          Whether to include terms that have non-empty descendants.
	 *                                               See get_terms(). Default true.
	 *     @type string       $order                 Which direction to order categories. Accepts 'ASC' or 'DESC'.
	 *                                               Default 'ASC'.
	 *     @type string       $orderby               The column to use for ordering categories. Default 'ID'.
	 *     @type string       $separator             Separator between links. Default '<br />'.
	 *     @type bool|int     $show_count            Whether to show how many posts are in the category. Default 0.
	 *     @type string       $show_option_all       Text to display for showing all categories. Default empty string.
	 *     @type string       $show_option_none      Text to display for the 'no categories' option.
	 *                                               Default 'No categories'.
	 *     @type string       $style                 The style used to display the categories list. If 'list', categories
	 *                                               will be output as an unordered list. If left empty or another value,
	 *                                               categories will be output separated by `<br>` tags. Default 'list'.
	 *     @type string       $taxonomy              Taxonomy name. Default 'category'.
	 *     @type string       $title_li              Text to use for the list title `<li>` element. Pass an empty string
	 *                                               to disable. Default 'Categories'.
	 *     @type bool|int     $use_desc_for_title    Whether to use the category description as the title attribute.
	 *                                               Default 1.
	 * }
	 * @return false|string HTML content only if 'echo' argument is 0.
	 */
	private function wp_list_categories( $args = '' ) {
		$defaults = array(
			'child_of'            => 0,
			'current_category'    => 0,
			'depth'               => 0,
			'echo'                => 1,
			'exclude'             => '',
			'exclude_tree'        => '',
			'feed'                => '',
			'feed_image'          => '',
			'feed_type'           => '',
			'hide_empty'          => 1,
			'hide_title_if_empty' => false,
			'hierarchical'        => true,
			'order'               => 'ASC',
			'orderby'             => 'name',
			'separator'           => '<br />',
			'show_count'          => 0,
			'show_option_all'     => '',
			'show_option_none'    => __( 'No categories' ),
			'style'               => 'list',
			'taxonomy'            => 'category',
			'title_li'            => __( 'Categories' ),
			'use_desc_for_title'  => 1,
		);

		$r = wp_parse_args( $args, $defaults );

		if ( !isset( $r['pad_counts'] ) && $r['show_count'] && $r['hierarchical'] )
			$r['pad_counts'] = true;

		// Descendants of exclusions should be excluded too.
		if ( true == $r['hierarchical'] ) {
			$exclude_tree = array();

			if ( $r['exclude_tree'] ) {
				$exclude_tree = array_merge( $exclude_tree, wp_parse_id_list( $r['exclude_tree'] ) );
			}

			if ( $r['exclude'] ) {
				$exclude_tree = array_merge( $exclude_tree, wp_parse_id_list( $r['exclude'] ) );
			}

			$r['exclude_tree'] = $exclude_tree;
			$r['exclude'] = '';
		}

		if ( ! isset( $r['class'] ) )
			$r['class'] = ( 'category' == $r['taxonomy'] ) ? 'categories' : $r['taxonomy'];

		if ( ! taxonomy_exists( $r['taxonomy'] ) ) {
			return false;
		}

		$show_option_all = $r['show_option_all'];
		$show_option_none = $r['show_option_none'];

		$categories = get_categories( $r );
		/* Start sort ASC follow custom field order*/
		$sorted_cats = array();

		foreach($categories as $cat){
			$order = getTaxonomyField($cat, 'order');
			if(!empty($order)){
                $sorted_cats[$order] = $cat;
            }
		}
        if(!empty($sorted_cats)){
            ksort($sorted_cats);
            $categories = $sorted_cats;
        }

		$output = '';
		if ( $r['title_li'] && 'list' == $r['style'] && ( ! empty( $categories ) || ! $r['hide_title_if_empty'] ) ) {
			$output = '<li class="' . esc_attr( $r['class'] ) . '">' . $r['title_li'] . '<ul>';
		}
		if ( empty( $categories ) ) {
			if ( ! empty( $show_option_none ) ) {
				if ( 'list' == $r['style'] ) {
					$output .= '<li class="cat-item-none">' . $show_option_none . '</li>';
				} else {
					$output .= $show_option_none;
				}
			}
		} else {
			if ( ! empty( $show_option_all ) ) {

				$posts_page = '';

				// For taxonomies that belong only to custom post types, point to a valid archive.
				$taxonomy_object = get_taxonomy( $r['taxonomy'] );
				if ( ! in_array( 'post', $taxonomy_object->object_type ) && ! in_array( 'page', $taxonomy_object->object_type ) ) {
					foreach ( $taxonomy_object->object_type as $object_type ) {
						$_object_type = get_post_type_object( $object_type );

						// Grab the first one.
						if ( ! empty( $_object_type->has_archive ) ) {
							$posts_page = get_post_type_archive_link( $object_type );
							break;
						}
					}
				}

				// Fallback for the 'All' link is the posts page.
				if ( ! $posts_page ) {
					if ( 'page' == get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) ) {
						$posts_page = get_permalink( get_option( 'page_for_posts' ) );
					} else {
						$posts_page = home_url( '/' );
					}
				}

				$posts_page = esc_url( $posts_page );
				if ( 'list' == $r['style'] ) {
					$output .= "<li class='cat-item-all'><a href='$posts_page'>$show_option_all</a></li>";
				} else {
					$output .= "<a href='$posts_page'>$show_option_all</a>";
				}
			}

			if ( empty( $r['current_category'] ) && ( is_category() || is_tax() || is_tag() ) ) {
				$current_term_object = get_queried_object();
				if ( $current_term_object && $r['taxonomy'] === $current_term_object->taxonomy ) {
					$r['current_category'] = get_queried_object_id();
				}
			}

			if ( $r['hierarchical'] ) {
				$depth = $r['depth'];
			} else {
				$depth = -1; // Flat.
			}
			$output .= walk_category_tree( $categories, $depth, $r );
		}

		if ( $r['title_li'] && 'list' == $r['style'] && ( ! empty( $categories ) || ! $r['hide_title_if_empty'] ) ) {
			$output .= '</ul></li>';
		}

		/**
		 * Filters the HTML output of a taxonomy list.
		 *
		 * @since 2.1.0
		 *
		 * @param string $output HTML output.
		 * @param array  $args   An array of taxonomy-listing arguments.
		 */
		$html = apply_filters( 'wp_list_categories', $output, $args );

		if ( $r['echo'] ) {
			echo $html;
		} else {
			return $html;
		}
	}
}