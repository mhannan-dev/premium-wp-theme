<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_next' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'h>O?}v<KaySufL*JWG <M?>m0PZRXP6q c8)b@*IgcPx5XFh}w7e1&NQ|*ePSc$O' );
define( 'SECURE_AUTH_KEY',  'r@Z2]Kb4hTLul^cx,]obP(h%DzTO;]jaPKoMD%)XVja#m| ^PIohwW.XjfR%32;Y' );
define( 'LOGGED_IN_KEY',    '@hCDYG{[{]cjkl>!`cr/a0~&y%M+AUusnrr~z}WyTH?_P}tObS~E6]hKC`v,8+U=' );
define( 'NONCE_KEY',        '-#XJNBc+}fEjI^zMVD|p!oK&$^kFbWB9[esP ?Wup^Tt0}Cls.IlKO$%iD6MHm?:' );
define( 'AUTH_SALT',        '&t|%_]@Q>T)&Y+)XUh.9k2*x]tcog6jHkm/{<sRfMb1d$UR,Iu7HX)&Jv6ksG1>0' );
define( 'SECURE_AUTH_SALT', 'JOBt a.Tvz bS@Vr`t%ilsD[+5NF@_u2lkbeu#K)rbc4$s),sMG+?qB&j](@Hx4(' );
define( 'LOGGED_IN_SALT',   'x&YR%IP%W}63,x!UyUY&woN{|e&8NZ,@_B.Cm)>= 2:5WC={lk<@BZD L`pmw,d}' );
define( 'NONCE_SALT',       'JRt`.~G2j7k_4!6EM^?zQ8Q[}%(@E7s}.s3#A!lYs3IN.j+WciJzGHn@r`)O:;TK' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
