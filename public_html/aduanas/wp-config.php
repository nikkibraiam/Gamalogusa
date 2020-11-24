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
define( 'DB_NAME', 'aduanas_2020' );

/** MySQL database username */
define( 'DB_USER', 'user_aduanas' );

/** MySQL database password */
define( 'DB_PASSWORD', '@A7RM8jAL924@cM' );

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
define( 'AUTH_KEY',         'zCpk:d=!K1M(y9A.?F,LVHL#fVY{[~{zOJuf1e;rwm1qlttc?/6KPnaKxYgkYhBT' );
define( 'SECURE_AUTH_KEY',  'TavJ<dzqrU^w/c593:bjCw3{=O5,!nIA+KO[Ugaz*osU#yVb!AlSHTnZ~_bOd;rp' );
define( 'LOGGED_IN_KEY',    '[&gaDMxk*7nY!~z{U=V/Z*%SoXk98)60YfgqDaAocAr9W>PBBNtHez~L^M(@=LRH' );
define( 'NONCE_KEY',        '7=^T$--QB|8eN/[mm2H%]E3[2M7^qDBn:c[aV(CEd|1T>E7cv,=PS$ifq_7=1fhO' );
define( 'AUTH_SALT',        '2(l6zwPeK}tUT>_`wD;,!ThtDs&*&?P;e~/,k_zf,ks@M80y3UUsnln*71y`K+2I' );
define( 'SECURE_AUTH_SALT', 'gvfZ?TD;7BCk6PG{CE)J.c];.lrQqU9jA/|8BJ-L@XFNlqhdrsZ}6Oa]h=31&a[4' );
define( 'LOGGED_IN_SALT',   'G0EBA/x!(jKd+)b QrfTdI,uc;X mv[u;w+fnS%f?4}4F~vG,=7]9~MvJHGp*<il' );
define( 'NONCE_SALT',       'RFh4W6&Aj/.K~IIT$3?Hmo![5cnCoC!m6l(J|{X>=$^)8Cw}TN-*g7,UCqtL1}nL' );

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
