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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wpuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wppass' );

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
define( 'AUTH_KEY',         '7hZaY+Bb;RboX}HagLLMxpgHk9XU,~*QO52V()K9_<kvm~RYX[#9{QTTpBuD<tGX' );
define( 'SECURE_AUTH_KEY',  '#Dk5}ED/UvPY=|:1=qoM53-v5CMoD}[uS{w9HBAd.omjuX@4I}f;o&fu-jyza >u' );
define( 'LOGGED_IN_KEY',    'd~v=2x};9K2<Z}X|=J!bXMV#T9iG>L%2a62|1{q1NrGug;4z 1nCE>H;i*le@yd)' );
define( 'NONCE_KEY',        ')L:Rl]<+C dz|6qj4X0c)wk}S;a*>g<?.L?k_=[VS+HCp:&8uhHn[|`y$?is/5O9' );
define( 'AUTH_SALT',        ' rC3Ck-$%]E7+_ZjHE2?YKLL2)07jW6=[ErqQ;f8>)<36/5>zRjkB+ww=Wt?fR3P' );
define( 'SECURE_AUTH_SALT', 'pE9g+~0P8hjw!kWdnjB,G-DxjD|1ITd0>.0ONhilSJ0TRY0/Ct,%Mr7# DQuLdDZ' );
define( 'LOGGED_IN_SALT',   '?)7=I8jA8]Dhs!a_d;N5_2]SY3n@44/apE@NA<Ib!6vUP@LyO5DY9b@x0 D[d.Sr' );
define( 'NONCE_SALT',       'AP!Z4;X5wo-X~7biGL,^KaRL>qGPAL&g$@;Cg?)wdd9&/jriuhTJ/0PQ?oz.X~GI' );

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
