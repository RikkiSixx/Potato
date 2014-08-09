<?php
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


/** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mash_fourteen');
// define('DB_NAME', 'mash');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');
// define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');
// define('DB_HOST', '127.0.0.1:3307');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'OX@Xj V5Z}@SGRKyH=Vbco`Et5k]Vitbj=u[2UA7pP_^3tCyv,7!<}j4E+V9}kZ@');
define('SECURE_AUTH_KEY',  '{@@iO^BQ7.&Z1^j~.)|_ut+]`fd6Gn9~FdMp|4@ %>7<R C]$d(;9J*@mK]|$Do]');
define('LOGGED_IN_KEY',    'ut$4:(B#}Ug!F+RM)i(_Sg tflLAED!O~$NCh|4JzWJ){k<z!$9:t.hM(xBE}.CO');
define('NONCE_KEY',        'hPXf_-CtvGl-W./N+dW2NmEYkbq#e|[4i=_v!|P!=Dm>{|?BN@-4xyOFqx6OAWii');
define('AUTH_SALT',        '/,dVUF7(+,L]$t1X_U?1Cmy:S &OcCY`*g:0D3&#{i]3$@|dKxhOulXxU@[@|O|3');
define('SECURE_AUTH_SALT', '&8f^Q~aPE.+O+4N-.tY)mGv2d74K@{6JO+X7I@<H6N+xeYV3)h6?ZRcMg&C,f4:H');
define('LOGGED_IN_SALT',   'm((S=}>4A}iFCo@;nyNh:p!jZxIS]+`Y}UO1ykU08A>^-Nu+KW&R6r4Wdz-ZoD&N');
define('NONCE_SALT',       ';-pq017bLesg6zLR8~!U4X<Y!KF>HVvQ%IbN+R 52jC~rJLK|W*]@&I&z}~z3Mg;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
