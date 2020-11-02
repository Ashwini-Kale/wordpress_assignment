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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_assignment' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'K7^dhhJlO2k185mK57|k;FI9a1~-hH=GI85[0J>YgL]* p7qF>s|C7Bm$-~B3Usx' );
define( 'SECURE_AUTH_KEY',  '?Jpt>.8Ym,?#CrZddEA6:iA!I!-DQW A)[;U.XF5);0>u ouAnDOF.o{GCoy,9yj' );
define( 'LOGGED_IN_KEY',    'W88g<P-tH&{%?wvayH|pNUi`/m{FA64=6d@K1^1h T^2 -ZN >ZQuW/l/g+9-|BC' );
define( 'NONCE_KEY',        'o.sjLze4lbiy_c72o3-A<T<7eM2EzAHF0@a:FuZ3dCdxB:b,PRCLnM~XcQY1d?iu' );
define( 'AUTH_SALT',        'HCVbh+;;x1H)knQ~~Dq{7?U|$MdClZ+0TBofzA>/W7#lvKK>tGUiH@42N)5AR8G>' );
define( 'SECURE_AUTH_SALT', 'EwOitl:l+V[spU@8n&4PSn=Vvx3wQmV:1[WpzPYVIi=-{YR1P%P~?m7zO`gD%|hS' );
define( 'LOGGED_IN_SALT',   'zAWrcPEnv`,#18a;c)CoA6oFTmq{dH`:_~cMu#-$gL^jcI2[eoPaphMJJ$v)K2hi' );
define( 'NONCE_SALT',       'V#fA9Wt?TnJSMVNTUgo [)^0ao[.IAwaj2y`#rkKuzMEp#FO<zVog}2 *e xS-@_' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
