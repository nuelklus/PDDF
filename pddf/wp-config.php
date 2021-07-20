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
define( 'DB_NAME', 'pddf_db' );

/** MySQL database username */
define( 'DB_USER', 'pddfuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'pddfpassword' );

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
define( 'AUTH_KEY',         '/@P%IsmP[3CLU}mRqZ;!pZP]o^b&*i[(xQB`BIBGpbx+Y8v#E#Sfls_!SF,]Q 6!' );
define( 'SECURE_AUTH_KEY',  '.-w-{y/#{Ap)J?9S6NhG=+<jeQ;-aHwb8E7).5$=5h5zlG#INQpzdn<P{JQ!iP?}' );
define( 'LOGGED_IN_KEY',    '$*$1h;<8J,]sevx`uX{X^,z@3)(>#{9DQ~a[9#BT,z-:y|78_sQa vh$1.xvu21s' );
define( 'NONCE_KEY',        '#V3 ,sF84/fwBJC,Bp.[,(,1Gs-b,Yr#66IhpuBp.OYC^2wZ0h]J>A[&Q@Ffeu}`' );
define( 'AUTH_SALT',        'WdO1?t7A>B{J:o&UE=~lR}n5w0;-`#tn3,^bcts>~CLbew6sSj~Pu(k*F)W{9?=8' );
define( 'SECURE_AUTH_SALT', 'C]M%hdH}a71ix7abw<hpTW!DS{[3LD0K.PrxC3-h?[|`(]0dM_cE]y8ywLQKzdag' );
define( 'LOGGED_IN_SALT',   'zS;#^M3&/=KQ0IST_-/9%>lL@)F>o+yV(af30D93Yc[wDvjj,R/Nj=)@*M,.~W4D' );
define( 'NONCE_SALT',       'Vr?4.ub}8dCviLG4r@<0D6<Xg-&$6btz)duNawfpuUnq7#^mG7$Q=A?A{2:2NfC=' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
