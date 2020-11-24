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
define( 'DB_NAME', 'redgama_2020' );

/** MySQL database username */
define( 'DB_USER', 'user_redgama' );

/** MySQL database password */
define( 'DB_PASSWORD', 'p83Y7SD@XikhsdG' );

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
define( 'AUTH_KEY',         '7=M9Q<9CI9|ODIejHa0Qpl~byw^gS;Q<{73,vYdnF=b(RhnCh4Z:/hTo:RXd=H91' );
define( 'SECURE_AUTH_KEY',  'ftJwK~6+b|,I!JIT--Zy/H8_tUNg7bV-#p/*4#~cQ%@#-~>]P8sjy8aH4Sj{ndVY' );
define( 'LOGGED_IN_KEY',    'H4K6En2M6{EVwlCV)x+nVqBW0?#y_2X)+Y<*npUj*{$yfmun,uUD[/!~NV^V6oJP' );
define( 'NONCE_KEY',        'tRqV;%lV!]i]@2VOUE~7X _RH9Rha%-*Y_h9vx:t@R8ZJhL-Z>bdJ]Q^o[eDfk@N' );
define( 'AUTH_SALT',        'w7%=m3Z;rzWZLa_#~V`Ye*[Y6Ilf=5S=JJskS:H!HjH[v=+1+j>r}pEQ7WJqR=LY' );
define( 'SECURE_AUTH_SALT', ']Ee5Jbx_3ddjs6w/wLe}kG/Uc%vy]*STV/]zo8M~%(O$`d4%k6qz3.,R-qCGHlk^' );
define( 'LOGGED_IN_SALT',   'Tvm|`WkUQ#sq8p6 ^F|z3P*GCmA(,/;s]ADSe*x1M!hbN0:ra1vFs.=^eIe:p_ #' );
define( 'NONCE_SALT',       'X|*A<lvf{sX%(:6)0n30-|Nx`8mW-O=U(k?u&B@%t]t_#3fCyf[>oj;=jjNg,=>}' );

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
