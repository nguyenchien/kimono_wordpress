<?php
/**
 * Created by PhpStorm.
 * User: chienvn
 * Date: 30/08/2016
 * Time: 9:43 AM
 */
global $root_lession;
$root_lesson = locate_template('lesson/');

/*[Lesson_News]*/
add_shortcode('Lesson_News','Lesson_News');
function Lesson_News($attr,$content = null) {
    global $root_lesson;
    ob_start();
    include($root_lesson .'include/lesson_news.php');
    return ob_get_clean();
}

/*[Lesson_Topic]<img src="#" />[/Lesson_Topic]*/
add_shortcode('Lesson_Topic','Lesson_Topic');
function Lesson_Topic($attr,$content = null) {
    $attr_shortcode = shortcode_atts(array(
        'title' => 'Topic',
        'sub_title' => null
    ),$attr);
    global $root_lesson;
    ob_start();
    include($root_lesson .'include/lesson_topic.php');
    return ob_get_clean();
}
// Modified radio button for create contact form in lesson/reserve page
remove_action('wpcf7_init', 'wpcf7_add_shortcode_checkbox');
add_action('wpcf7_init', 'swe_wpcf7_add_shortcode_checkbox');
function swe_wpcf7_add_shortcode_checkbox() {
    wpcf7_add_form_tag( array( 'checkbox', 'checkbox*', 'radio' ),
        'swe_wpcf7_checkbox_shortcode_handler', true );
}

function swe_wpcf7_checkbox_shortcode_handler($tag) {
    $tag = new WPCF7_Shortcode( $tag );

    if ( empty( $tag->name ) )
        return '';

    $validation_error = wpcf7_get_validation_error( $tag->name );

    $class = wpcf7_form_controls_class( $tag->type );

    if ( $validation_error )
        $class .= ' wpcf7-not-valid';

    $label_first = $tag->has_option( 'label_first' );
    $use_label_element = $tag->has_option( 'use_label_element' );
    $exclusive = $tag->has_option( 'exclusive' );
    $free_text = $tag->has_option( 'free_text' );
    $multiple = false;
    $label_allow_br = $tag->has_option('label_allow_br');

    if ( 'checkbox' == $tag->basetype )
        $multiple = ! $exclusive;
    else // radio
        $exclusive = false;

    if ( $exclusive )
        $class .= ' wpcf7-exclusive-checkbox';

    $atts = array();

    $atts['class'] = $tag->get_class_option( $class );
    $atts['id'] = $tag->get_id_option();
    $icon = $tag->get_option('icon_class', 'class', true);
    $tabindex = $tag->get_option( 'tabindex', 'int', true );

    if ( false !== $tabindex )
        $tabindex = absint( $tabindex );

    $defaults = array();

    if ( $matches = $tag->get_first_match_option( '/^default:([0-9_]+)$/' ) )
        $defaults = explode( '_', $matches[1] );

    $html = '';
    $count = 0;

    $values = (array) $tag->values;
    $labels = (array) $tag->labels;

    if ( $data = (array) $tag->get_data_option() ) {
        if ( $free_text ) {
            $values = array_merge(
                array_slice( $values, 0, -1 ),
                array_values( $data ),
                array_slice( $values, -1 ) );
            $labels = array_merge(
                array_slice( $labels, 0, -1 ),
                array_values( $data ),
                array_slice( $labels, -1 ) );
        } else {
            $values = array_merge( $values, array_values( $data ) );
            $labels = array_merge( $labels, array_values( $data ) );
        }
    }

    $hangover = wpcf7_get_hangover( $tag->name, $multiple ? array() : '' );

    foreach ( $values as $key => $value ) {
        $class = 'wpcf7-list-item';
        $checked = false;

        if ( $hangover ) {
            if ( $multiple ) {
                $checked = in_array( esc_sql( $value ), (array) $hangover );
            } else {
                $checked = ( $hangover == esc_sql( $value ) );
            }
        } else {
            $checked = in_array( $key + 1, (array) $defaults );
        }

        if ( isset( $labels[$key] ) )
            $label = $labels[$key];
        else
            $label = $value;

        $item_atts = array(
            'type' => $tag->basetype,
            'name' => $tag->name . ( $multiple ? '[]' : '' ),
            'value' => $value,
            'checked' => $checked ? 'checked' : '',
            'tabindex' => $tabindex ? $tabindex : '' );

        $item_atts = wpcf7_format_atts( $item_atts );

        if ( $label_first ) { // put label first, input last
            $item = sprintf(
                '<span class="wpcf7-list-item-label">%1$s</span>&nbsp;<input %2$s />',
                esc_html( $label ), $item_atts );
        } else {
            if ($icon) {
                $item = sprintf(
                    '<input %2$s />&nbsp;<span class="icon '.$icon.'"></span><span class="wpcf7-list-item-label">%1$s</span>',
                    esc_html($label), $item_atts );
            } else {
                $item = sprintf(
                    '<input %2$s />&nbsp;<span class="wpcf7-list-item-label">%1$s</span>',
                    esc_html( $label ), $item_atts);
            }
        }

        if ( $use_label_element )
            $item = '<label>' . $item . '</label>';

        if ( false !== $tabindex )
            $tabindex += 1;

        $count += 1;

        if ( 1 == $count ) {
            $class .= ' first';
        }

        if ( count( $values ) == $count ) { // last round
            $class .= ' last';

            if ( $free_text ) {
                $free_text_name = sprintf(
                    '_wpcf7_%1$s_free_text_%2$s', $tag->basetype, $tag->name );

                $free_text_atts = array(
                    'name' => $free_text_name,
                    'class' => 'wpcf7-free-text',
                    'tabindex' => $tabindex ? $tabindex : '' );

                if ( wpcf7_is_posted() && isset( $_POST[$free_text_name] ) ) {
                    $free_text_atts['value'] = wp_unslash(
                        $_POST[$free_text_name] );
                }

                $free_text_atts = wpcf7_format_atts( $free_text_atts );

                $item .= sprintf( ' <input type="text" %s />', $free_text_atts );

                $class .= ' has-free-text';
            }
        }

        $item = '<span class="' . esc_attr( $class ) . '">' . $item . '</span>';
        $html .= $item;
    }

    $atts = wpcf7_format_atts( $atts );

    $html = sprintf(
        '<span class="wpcf7-form-control-wrap %1$s"><span %2$s>%3$s</span>%4$s</span>',
        sanitize_html_class( $tag->name ), $atts, $html, $validation_error );

    return $html;
}
/**
 * Redirect the user, after a successful email is sent
 */
function cf7_success_page_form_submitted( $contact_form ) {
    $success_redirect_url = $contact_form->additional_setting('success_redirect_url',false);
    if(!empty($success_redirect_url)){
        if(is_array($success_redirect_url)){
            $success_redirect_url = $success_redirect_url[0];
        }
        wp_redirect( $success_redirect_url );
        die();
    }
}
add_action( 'wpcf7_mail_sent', 'cf7_success_page_form_submitted' );