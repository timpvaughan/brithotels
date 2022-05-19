<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define( 'DB_NAME', 'projects_brithotels' );

/** MySQL database username */
define( 'DB_USER', 'brithotel' );

/** MySQL database password */
define( 'DB_PASSWORD', 'cxr5@5LzrMe1goZh' );

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
	define('AUTH_KEY',         'L$Z1p~j8*lA(;gqCS+Y8;r_m_O9IQWsl?C~KpI(nVo5{d XHi4-=Omu_MCK;0:aQ');
	define('SECURE_AUTH_KEY',  'kH`j(, 41F`BYE9qh IMrgGhT(jtg;6uI{}XuD+Np?i*O(gi8g7jqSw9p/6!?@:|');
	define('LOGGED_IN_KEY',    '/*Xw`zDVDAl2KyT.48j]s+#%)8^5)e-W1If585)2&OAlqE*)?]^R5HQ2<Up~%lD,');
	define('NONCE_KEY',        ';)ntt,:tQCs7#MR5V<PMQ2 +pz[szz2-G%pBAz:d^v1g9M8#*Rw8(owy<#@OGEM0');
	define('AUTH_SALT',        ']V~e! p^=e]hamC o./!h+w|Fo#+,g/sD{&>[,-b|P8RcK|]DccLl~N,+}>i4ogK');
	define('SECURE_AUTH_SALT', 'g)pW;41$iYLYk-|:;)-+L9S}Rm$+Y{S0j-7Yc/B7++<wfQYLAK@0i,e!!96=~c +');
	define('LOGGED_IN_SALT',   'S6#g`>n}9Z?-RrV@EY.$+YI6~E7pX+qKY+W[m<-m`e<gISM2](@]87bSCn}QV#-u');
	define('NONCE_SALT',       '[lEQt66_H|Oq)$[Cc/@~VWQY~>4eeidZZ>j*O/ZF|0.y =|1]G7D6h%>7O#%jBe&');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bhs_';

	/* for Contact-Form-7 */
	define('WPCF7_AUTOP', false);

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
define( 'WP_DEBUG', false);
define( 'WP_DEBUG_DISPLAY', false);
define( 'WP_DEBUG_LOG', false);
define( 'SCRIPT_DEBUG', false );

define( 'WP_HOME','http://brithotels.com/');
define( 'WP_SITEURL','http://brithotels.com/');

define( 'WP_ALLOW_MULTISITE', true);

define( 'MULTISITE', true);
define( 'SUBDOMAIN_INSTALL', false);
define( 'DOMAIN_CURRENT_SITE', 'brithotels.com');
define( 'PATH_CURRENT_SITE', '/');
define( 'SITE_ID_CURRENT_SITE', 1);
define( 'BLOG_ID_CURRENT_SITE', 1);

define( 'AUTOPTIMIZE_WP_CONTENT_URL', 'https://brithotels.com/wp-content');

//only for dev debug for email testing
//define('CBXWPWRITELOG_EMAIL_FAILED', false);
//define('CBXWPWRITELOG_EMAIL_SENT', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
