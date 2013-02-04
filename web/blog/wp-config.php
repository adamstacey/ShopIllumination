<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'kacblog');

/** MySQL database username */
define('DB_USER', 'kacblog');

/** MySQL database password */
define('DB_PASSWORD', 'D3rbysh1r3');

/** MySQL hostname */
define('DB_HOST', 'www.kitchenappliancecentre.co.uk');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'MD*lIi6Q`q=$_-Vj J.[JKJ HtNh=*c@O?8P<[P7_T]g1c5|I#pgFVp9e`h-0%qz');
define('SECURE_AUTH_KEY',  'jcw.i@({[tq+.S je yAd07|C5O}K~Qhy[x?-l-X|%x+JdSVfS=e#9(Jf@37im?%');
define('LOGGED_IN_KEY',    'uEysCw=npa6Bg%SDwZ{mu>,Lr86GGtzd29$Tlk4c+ZrCYehe<-GCnj<tqbd0j4t/');
define('NONCE_KEY',        '0/].S;fTxU9xf-A6[C?k:vPS*H)KtZTkrfh$ZHcJW72zR*|Kl7wi+]>>{1>6 v!h');
define('AUTH_SALT',        'e%qQ6jqkooX,~[9@~j6.3g#E]&hYYkCO@Y+Y0*lDC0gb+sz4MmBfPNKN:JO+tfQj');
define('SECURE_AUTH_SALT', '?!UqQ-:xnsIOsKMActfsk66.6]CnXh8Ag{N.*|HCUZFtb:#*`o1CNg9@B[cligW7');
define('LOGGED_IN_SALT',   'e6fdV)JwK`1KjnnH+^knml[GavyS/>#V_sM.!eztw*vx:6?S4/TF+BedY/L3L.LC');
define('NONCE_SALT',       '.WxO)=C1cs;HJskzcm:94aL`w|J6|,Md@A;:B?1xu- *+Q#Lo_B_i,`9?xJ 5Zg7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('WP_CACHE', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

