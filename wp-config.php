<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'commen');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Oyvp{{?L }-dkGlZD(9Ty1yvKra]2%M,A{=fTthE_<|h}QyT3cV;7S7SK!{NAS@P');
define('SECURE_AUTH_KEY',  '5wQ{cIOHC&`O8Ps?oK/[KN;h`R5F!yN{>!tU#ir%r6?HsNZ[xt{%{P3G,G#<N&H$');
define('LOGGED_IN_KEY',    'Wbh2_ZquVjN?{Wt;aRea1CB&`!IF3*v,>nI|NheuD%=oc9--zQ0IGlk+Y#oIHwKL');
define('NONCE_KEY',        'VWl{njqYWY%b7-p?5l:O6aA,TDOZ1m_tY$#FM^PvNFN<$N^XB`I67B`JeA>-A9<&');
define('AUTH_SALT',        '?blfwsIjk6P!T2SMZ:b{7JBB(oY>+n7C&uW6r@5vR/]S%t.p3hjCM!Y_R0ha-vZU');
define('SECURE_AUTH_SALT', '$,Z0 Y](c8EJ1;J&b|[Dy+~YZQt2th2!JF9Vaho]&jdbG8*#lVIOtZIbQ_7258gu');
define('LOGGED_IN_SALT',   '$j$dkLS)c|ex-l!zc+f}:a^7RS^e(+o)s0QQuB$d`r<H1i.FJ1!AO3S1H.Yy)42V');
define('NONCE_SALT',       'DWJ)3J~;;y@w429-k*DMJW8?ubN(e,G6$+U` >7p{061<9TADt{9aVHHXt5zG}=@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cm_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
