<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpressproject' );

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
define( 'AUTH_KEY',         'y>VLhF]iF9Lpj:YiS_zjl<^`Y,j&G.8zc p],dCwH)6P->MMF[>2IQl.phGSd12f' );
define( 'SECURE_AUTH_KEY',  '(lhc]oG=N9SkDCctJLJ;/LZlGj;&q> ufKv2,FVigd[ w<?GrtR`zD0VeI7Xe:Ri' );
define( 'LOGGED_IN_KEY',    'x?#/%Wd|F]2l2NkQN&J? R,yL>O3Ul&+Xx;yGNGVD0@A&E|D]VbCvJ1dYQasApq`' );
define( 'NONCE_KEY',        'J j40cXpR~$KQ:;^bH1:r7N?2o^}VQu4~ }lP8Jw?H,{2=DP]C2)po!>HO$Tq2T$' );
define( 'AUTH_SALT',        '7_G;ddSuqIFF6F.Y2RfaRTiismHJ>YrhS3MjJOOaLw A =GjNvB>ezN5H?Bc,%$5' );
define( 'SECURE_AUTH_SALT', '#q7|7&h!{nSRl uRTCPz9?|J`gT`6|N(KYQyxH3a6cera!q._[hyIL},%8W(.JkL' );
define( 'LOGGED_IN_SALT',   'HU[kYTlrk-CYOFtDvh!BF7b9$^Sc?Gp@FrRBG7w*rm?ej(Ob*c#uLj:JNj_4HFEi' );
define( 'NONCE_SALT',       't{<4rQh= +vR@[TfO7X7Tmjs]~(@pnx>Y$9u}CXl|XfbuUl#nbrL4-Jbr3NO;EzA' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
