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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '*$)L0VTG+)2Gk,k6sV0dt?v-5_N.(eVh7GU(ol9#R/o&d?%1kuR:WWhv)ri|ej76' );
define( 'SECURE_AUTH_KEY',  'D ^DoG2Xof/cpuM%4c}I=!YZyW: 5-8Y7Qj[+6V</XR3uZmGEp/b-oSkm6NvRPY1' );
define( 'LOGGED_IN_KEY',    'k1:VjvJLv7J%,FRBW/=j 2#Zu-jPZ2=4<_G&:>8)nY*52%?TF8PN%3!y(LcEd$~)' );
define( 'NONCE_KEY',        'G2X*bgw[{~&dO(@b]l}qOqM0o~0nafN&u2d{Yv=Rf^L1goc;#:E(Bc!^@dc]C<Dh' );
define( 'AUTH_SALT',        '*]0FnKsqh4#$g<15J_G`^JpzY>1Yob+`d(tHdV^J.od)HSLh+re(g!Y`{Ci+-F#C' );
define( 'SECURE_AUTH_SALT', 'cX:ZuAinr]+;{8Z~4f[VB;3=86et00Ry6/Fr-jf}V=Qzc?Su;:{rE,P2Scr[bLRT' );
define( 'LOGGED_IN_SALT',   'i7h&St9R3.3ri /.wvk=-J#jz(Z(?tg{o}&gI2!m@rFLVu6@R,|3r[L-(uUneb[X' );
define( 'NONCE_SALT',       'tpI!NHJ^;knKM<uIN``FfWAv,x2@Z5E*uL2sQ=eJl!Nqhan:Hwj`HFe5 (qrwxZ ' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
