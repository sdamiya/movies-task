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
define( 'DB_NAME', 'hometask' );

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
define( 'AUTH_KEY',         '{Et_5iIk_W*4G9Z=md6R?}+909]3^Ii[3lwi(cMI%U+t.YR}#Ykl($34%l#MLY&V' );
define( 'SECURE_AUTH_KEY',  'B9YN:Fcn&7}]hTj^;fm+bJG]bV,$ii}rhPRy8kG3EX9{{Z,|}~qBWNnP{#|=hcji' );
define( 'LOGGED_IN_KEY',    ',|6CuvF#h!nh:^;w4&)qZ%6Bb@ ,)!6un7vpr^s#44n3Oel=Z=6tmdq;Dvh+r)s+' );
define( 'NONCE_KEY',        '-SI*pz%B>:16u3v!c)GFx:}A]z?m{IZcqj^r-)va{LzMK(oo{{]-`VP/[qLu0 gQ' );
define( 'AUTH_SALT',        ']Mtn%fw+7RN4_(#m0zTJ?>SUv.(0CHpU!9NM8&2&E~vKW:b2|vhoo:Msy R`k`,o' );
define( 'SECURE_AUTH_SALT', '$9>,d2inUPpji(1EMSAVBx^9{2j<;<L4D[>WN_-w%qgS;d5D@vJ0v}WYS +Nii(d' );
define( 'LOGGED_IN_SALT',   '9yUM18w5KV@e/ccna/nnZJMUit=,BTe4>7oQhWiE>uq`uy>TT` 1T9h5%7v2Us^C' );
define( 'NONCE_SALT',       '>7Rykqo5,Nxi*f.H}P-w9ZL%hq6IJuSn0Q@e#3%Hy=FiTvM$AzQEj*z/dwZGr{(o' );

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
