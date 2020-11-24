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
define( 'DB_NAME', 'procargo_2020' );

/** MySQL database username */
define( 'DB_USER', 'userpro_2020' );

/** MySQL database password */
define( 'DB_PASSWORD', 'jjwuAN6PbdpA5rV' );

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
define( 'AUTH_KEY',         '+Fep$P<l@i)c0l$P5_!sU|MzmSbmxiIF)57x?E88aG1W9mMr&hhr!d@dZK8|]QXG' );
define( 'SECURE_AUTH_KEY',  'PTI1sRvIY=</P?FabkJUMo}CQxDSK%8Dgw8lTFjE;t<H.?#acd;zbZSTisdVw08!' );
define( 'LOGGED_IN_KEY',    'Dr%8LwTrZ~4,_NX9FjVH*?->^IVL+M6LueU2Z3t7a3[nq-y2FM6 .8kQUd5)Qu5F' );
define( 'NONCE_KEY',        '2{!@9)uc*B^$cm>iqJ>l4?^ea[H-rt<oub7^_isl)>fk5!Eo di[w}J(H0PW8v}D' );
define( 'AUTH_SALT',        'cM(Mx.xLNNDL;e# h3+tzqNj*|7){{PWH>51GgwR(K``k0%oLraj(#dG]S&y,T2f' );
define( 'SECURE_AUTH_SALT', 'hd R_:(;YE)?j;i{~><#_er&^oI1u0|J<_s=p;tDD4rb?YmJIV%g<qn?{[viDIG4' );
define( 'LOGGED_IN_SALT',   'wda366Sg(Di:8-P#2<sW41KGw*`+iM<=i}7:C26Yv7mOhAl*:oaf]gKq7#pksUq+' );
define( 'NONCE_SALT',       '` ]-!e5v^}6^O)^[;ak,-A~f7#`S%b{I{k=:b{i]x;d{KQ&+= }N9kfU#+.QDUmM' );

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
