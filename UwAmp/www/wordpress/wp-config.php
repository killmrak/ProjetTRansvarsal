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
define('DB_NAME', 'Wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '+m1W.O>?ZddAD=^{6l*] LQ%lQt48|89Uq}DUMZRX82{.6=B;<I!eUr*|t-R~Z$a');
define('SECURE_AUTH_KEY',  '&N&C?Vax+h>37fnv2< +Q%@I4K}}-MKoLcbJ^|oqL|!@Fm{s;nK9_{r[d?t=[t5j');
define('LOGGED_IN_KEY',    'F])BfR6^-NtWKi8z+E+S=gwj>PN+RL+8C:?(XAptHD^<p);P+r!AKJ=S0~9|/g^Z');
define('NONCE_KEY',        'C;IdSpjd<_1LPfpP?v ]0[<wJD&Re2a07jai<ONBaPU]+P_jse^>:i%}p2W+RTVh');
define('AUTH_SALT',        'i&kIM37z=2mdAX(Q%!Sb&;AmE:|=NM^dOx&u(#|6c[?*Zs8%!d|<_o)#:T|rg5D.');
define('SECURE_AUTH_SALT', 'a&Z-Q8&@tJ`,M0|8j=@<|=3a3-i-lYQJ#b#}}VV-7NW ,}Wz|=$|Ql8k0h|Z6K$D');
define('LOGGED_IN_SALT',   '2j:sypo8{S%em*C3#JPDk+ifIH&BIFNt(!Rb)`D1et1|}v<K,S+7PB8>E+feWZ)`');
define('NONCE_SALT',       '1A5jkNoV(DcYiPS%>Q]X}_~ZOa=}flCpnKL!fx@~V(5P1lNIDUQF^tb1?(<N?=Th');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
