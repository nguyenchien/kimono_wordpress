<?php
//echo "<pre>";var_dump($_SERVER);
//var_dump($_SERVER['HTTP_X_FORWARDED_PROTO']);
/*    header( 'Content-Type: text/plain' );
    echo 'Host: ' . $_SERVER['HTTP_HOST'] . "\n";
    echo 'Remote Address: ' . $_SERVER['REMOTE_ADDR'] . "\n";
    echo 'X-Forwarded-For: ' . $_SERVER['HTTP_X_FORWARDED_FOR'] . "\n";
    echo 'X-Forwarded-Proto: ' . $_SERVER['HTTP_X_FORWARDED_PROTO'] . "\n";
    echo 'Server Address: ' . $_SERVER['SERVER_ADDR'] . "\n";
    echo 'Server Port: ' . $_SERVER['SERVER_PORT'] . "\n\n";
die;*/

define('ADMIN_COOKIE_PATH', '/');
define('COOKIE_DOMAIN', '');
define('COOKIEPATH', '');
define('SITECOOKIEPATH', '');

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('DB_NAME', 'kimono_release');

/** MySQL database username */
//define('DB_USER', 'local');

/** MySQL database password */
//define('DB_PASSWORD', 'localhanabi321!');

/** MySQL hostname */
//define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
//echo "<pre>"; var_dump($_SERVER,$_SERVER['SERVER_NAME']);die;
switch ($_SERVER['SERVER_NAME']) {
    // PRODUCTION
    case 'before.kyotokimono-rental.com':
        define('DB_NAME', 'kimono.com');
        define('DB_USER', 'local');
        define('DB_PASSWORD', 'localhanabi321!');
        define('DB_HOST', 'localhost');
        define('WP_SITEURL', 'http://'.$_SERVER['SERVER_NAME'].'/wordpress');
        define('WP_CACHE', true );
        define('V_HOST', true);
        //define('FS_METHOD', 'direct');
        //define('WPHTTPS_RESET', true);
        break;
    // STAGE
    case 'release.kyotokimono-rental.com':
        define('DB_NAME', 'kimono_release');
        define('DB_USER', 'local');
        define('DB_PASSWORD', 'localhanabi321!');
        define('DB_HOST', 'localhost');
        define('WP_SITEURL', 'http://'.$_SERVER['SERVER_NAME'].'/wordpress');
        define('V_HOST', true);
        break;
    // TEST ENV
    case '192.168.1.20':
    case 'test.vtown.vn':
    case 'swe-srv':
        define('DB_NAME', 'kimono');
        define('DB_USER', 'swedev');
        define('DB_PASSWORD', 'swedev');
        define('DB_HOST', 'localhost');
        define('WP_SITEURL', 'http://'.$_SERVER['SERVER_NAME'].'/dev/kimono/data/wordpress');
        define('V_HOST', false);
        break;
    // LOCALHOST
    case 'localhost':
    case '127.0.0.1':
    case 'test.kimono.com':
    default:
        define('DB_NAME', 'kimono_test');
        define('DB_USER', 'root');
        define('DB_PASSWORD', '123');
        define('DB_HOST', '127.0.0.1');
        define('V_HOST', true);
}

// Path configuration
$base_dir = '/'.implode('/', array_slice(explode('/', __DIR__), -3, 2));
//$base_dir = '';
define('WP_HOME','http://'.$_SERVER['SERVER_NAME'].(V_HOST?'':$base_dir));
define('WP_HOMES','http://'.$_SERVER['SERVER_NAME'].(V_HOST?'':$base_dir));
define('WP_SITEURL', WP_HOME.'/wordpress');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Ev|/OS@x8PJ;?nB0N:bfOw!$$@jhS6CAx+Gg|H>/pMLC.tIGPHct-!}DHN=b7)i~');
define('SECURE_AUTH_KEY',  '$+x{_ mF62c3PJ<lkSjI#A1.)E@wZnk[:EytWUS%hRQ1R$0Uc{v#yC,&Qa[`kQs ');
define('LOGGED_IN_KEY',    'Dl|O]K0sNFvE;g;08Szyov|K/L{Ss@14+nWb`i4y,B^/0Q0nV:xYUo/%u-r?lb;0');
define('NONCE_KEY',        'rg<Hu+s=z*?XQ%c:f,P+q8]iM!FG`fvAg^>:M6>cC1^qZ;l;j}Qi;{uKO$9jR;r|');
define('AUTH_SALT',        'pf1:]n3f*hUsa,4},5]$meLfTx>dN*.j}TrSydf]JNT9iq!cD<qc+hvO<7OtUD[A');
define('SECURE_AUTH_SALT', 'Uk><J+A511xh&yp|6_Q]ss3*/+_ZU*;E!Y0|C}R:-h({~<=[kmlYl tSI>PR?TvP');
define('LOGGED_IN_SALT',   'Hk[?!fO+&-M$UXP~<EwnpFO}[Vi,Gu+,Io#>(|1T1Wy;raiiRA@9wQqTO,rnZT9a');
define('NONCE_SALT',       '_MCG~1s7Jz6i_,,KNT4a.l:%MQ#yChD[V&[~e$dCZJS_iM<YVPkB8c%W!0g`|U#&');
define( 'AUTOMATIC_UPDATER_DISABLED', true );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'we_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if ($_SERVER['REMOTE_ADDR']=='115.79.33.251' || $_SERVER['REMOTE_ADDR']=='113.172.147.24' ){
    define('WP_DEBUG', false);
}else{
    define('WP_DEBUG', false);
}

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', $_SERVER['SERVER_NAME']);
define('PATH_CURRENT_SITE', "$base_dir/");
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
define('SUNRISE', 'r7.rel.kyotokimono-rental'.'.com');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
