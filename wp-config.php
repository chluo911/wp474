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
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'chluo');

/** MySQL database password */
define('DB_PASSWORD', 'chluo');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '(I0k3&Fj0p+/qz@Ldb&1~9kj4?t&Qrh?37}!2RYT[jYw*P+#cw ,/}Kcc(gpFt)W');
define('SECURE_AUTH_KEY',  '|IV}Trj,.#rhV?@E<,!Vzo|%9^yL<`MBre.!an:yG)Z%i5SxVaka7gTi @HN(e5r');
define('LOGGED_IN_KEY',    'vkN z{t>^0,LQd#eUX[6.p~&1Sl$X~L(9D[W*ja_tGbN:@lp%vgC6H2NOh}$Zvj1');
define('NONCE_KEY',        '*Sf~bAP.Ew~,@$(spsn}``YjKv?1eu29!=Hh^EJ39Hu=bJ4b^$gH*}d;Lm?|UnHl');
define('AUTH_SALT',        'Kv`#,d}{O @z|WkU><oN]]rhSmQK_6;cOjpbSKD~/p1MdYI_A>NWW|_JG`nI|luf');
define('SECURE_AUTH_SALT', '9er`$Orqv/z47awQQ)ap=1gAXNLDOl,?RELZY_ m1MN/uGTBF.PF I&KJA2Ww&@!');
define('LOGGED_IN_SALT',   'OJP9,f]IRq,|:G5=8pnU-_p5L]0_ZG5q;+W-)Q(5a,wDHmlE>ljujM;WcBXugua5');
define('NONCE_SALT',       ']SH431y#vQ[fW;$|V;]6[TE9$ed/KaC$4Oua7/Jp?/3c1w 3`IRi.s`K0h:)b=[`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
