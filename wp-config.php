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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_webhorn' );

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
define( 'AUTH_KEY',         'mkMOKc/H5VL66TFW(Wdm.G$NpxQKVh<D2ReKe.T[!~L6*DWP3* P8)<6D*t1~0Qh' );
define( 'SECURE_AUTH_KEY',  'Gy<D$a= ]H%z%snn[$~9W:,nS=8eKu6yzn}~*P).R=?p+UqMD8Lmc/CQ2;T)VVi:' );
define( 'LOGGED_IN_KEY',    '*I84w*7zn4t;D(::BM^<cLVe(*a,UTg9?:qbs=A`j%H+$;q%Rkc9 [.mAX?#Ov&Y' );
define( 'NONCE_KEY',        'DJ?jbM7dVK<ZgO`Xq53~gTSPE9A+h16z+4Lpq*(B6S.WQdQ.caPZ|ii9z#f4wO/d' );
define( 'AUTH_SALT',        'Hq] mM {0ZAC+zAm=|^f.4x%iJR=oh?c,]J-+?kUF5P+g2Co]|Z^WC8L4zBftDh$' );
define( 'SECURE_AUTH_SALT', 'z+Zn0(4wPO?1eT7 Dzzp9u,Q1ThVDS,4c@W.qj25[*ypgQsFM1Fz;+k:X5H1(2Ks' );
define( 'LOGGED_IN_SALT',   'bW56Cm8zh5}.e+A<5Ui$op$dO(U-^Lry5nyTaZd)24993(7/^5[EqTh@B(%/.|uc' );
define( 'NONCE_SALT',       'GH>V9L/2x41#;Q|Ok0h,Ee1^f05Qz<*;B].Jsk$ggzixe#H$5LbDSjub5;_8K]_h' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
