<?php

function replace_siteurl($value) {
    return str_replace('kyotokimono-rental.com', $_SERVER['SERVER_NAME'], $value);
}

add_filter('option_siteurl', 'replace_siteurl');
add_filter( 'option_home',    'replace_siteurl');

function wepre_get_site_by_path($aaa, $domain, $path, $sergment, $paths){

    $domains = array( 'kyotokimono-rental.com' );
    if ( 'www.' === substr( $domain, 0, 4 ) ) {
        $domains[] = substr( $domain, 4 );
    }

    $args = array(
        'domain__in' => $domains,
        'path__in' => $paths,
        'number' => 1,
    );

    if ( count( $domains ) > 1 ) {
        $args['orderby']['domain_length'] = 'DESC';
    }

    if ( count( $paths ) > 1 ) {
        $args['orderby']['path_length'] = 'DESC';
    }

    $result = get_sites( $args );
    $site = array_shift( $result );


    if ( $site ) {
        //echo "<pre>";var_dump($site);die;
        $site->domain = $_SERVER['SERVER_NAME'];
        return $site;
    }
    return false;

}

add_filter('pre_get_site_by_path', 'wepre_get_site_by_path',5,99);
