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
define( 'DB_NAME', 'aprox_2020' );

/** MySQL database username */
define( 'DB_USER', 'aprox' );

/** MySQL database password */
define( 'DB_PASSWORD', '3D2a@JEyDqr5hpW' );

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
define( 'AUTH_KEY',         '<2y*XQg 4ddZj3|yq,JB6R],BmZmkI^$X_hGnV([7CZ&3CXX|;w:nJ}f(U[(|YUf' );
define( 'SECURE_AUTH_KEY',  'lU=^ <0ym^|H)P`XIA.,!oq91iOU{:BFocy`,U0cs)e{|jx)*SMjhu9s9Q<R.39r' );
define( 'LOGGED_IN_KEY',    '1<z0=}Yep)^G;jGT)P;K+q)~%toW1n4TLrJz9pJr{>Z+$~$U:p|{nO:@Z#([<+pS' );
define( 'NONCE_KEY',        '`C16qJ:#3+4pOgeYb9,ozidytLyu:onA3O{Tm%pl^E)dBr+:fPWK.z%: vnmv~X3' );
define( 'AUTH_SALT',        'y8 3w%H]YTQd;0j!kPS6J|mcKt-Ek1z+)L)#K6JD6ebuzvSiA0Ksx_jr-$8XSv{3' );
define( 'SECURE_AUTH_SALT', ';ar2uvp>6MG}ZP7&{wbw-!DC5Qa61On_*Mtblu4PUTdZJdm|g<<A1uZvP53(2WVX' );
define( 'LOGGED_IN_SALT',   'qTW,}AB19%t[!!K2Vmb,Ys^%L~c!0_?_FRE2I%rjz.8-QU8-{!YB3S=.KD#/,kW[' );
define( 'NONCE_SALT',       ')pbUiuK*pz 2rh.-JH{4)IR}>S[IgRzp^2S+1tq4XhgxGmM;`c^67|VAB?Dk1y7b' );

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
