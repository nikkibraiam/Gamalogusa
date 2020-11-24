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
define( 'DB_NAME', 'gamalog_2020' );

/** MySQL database username */
define( 'DB_USER', 'gamalog' );

/** MySQL database password */
define( 'DB_PASSWORD', 'U@CZbC2iDc73Wb6' );

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
define( 'AUTH_KEY',         '^+^TPB~]Gk+t~|3Et]V~,|.KEH=}@-N&3Y>dZ<7M>*vD|5y]q*<ki8t!R,~,yToo' );
define( 'SECURE_AUTH_KEY',  '_;$3IxYp@RVDjD@N-8yXpJ<^D_/j>ctxs>66Dj/i;2P4gB:JbZKY>($Ccz~P!m6G' );
define( 'LOGGED_IN_KEY',    'd4xhus3pI||W^lR}G7R>8zVH]MAYZmD&5hTrD65m!Lo}MWIOk3%(oTv8`P;OW5om' );
define( 'NONCE_KEY',        '8N>RNIKy2SnHK/MYR94<b@H+&*MtyQ3 MpHAtuBTFWeYc~S%j>LgHCD35=!hbk3@' );
define( 'AUTH_SALT',        'R^}=`mJQ/RaF&N4E*2`hV[=n*!`#JFp(5bo-rFB92M P`H2dV>CU5n kT&^oMz0(' );
define( 'SECURE_AUTH_SALT', 'g~ rl6/U?z|`x|Tb`S3fM~_h7it6FHF~n99g1xhsLR#7E0fmHCi=5&~=Rz4_B-88' );
define( 'LOGGED_IN_SALT',   'an%U7{5Q`!1/^F?I_ 2Ln>_]lybey0MKfG.O(o1):og7}r&TKd$5Ta;S;txh`OZ ' );
define( 'NONCE_SALT',       '|F0^#.D@oYkr!Ya=o{kIKA]ywO w }rlFCflTib;JFh%eo?BZXtSe6z-IC/]Rc `' );

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
