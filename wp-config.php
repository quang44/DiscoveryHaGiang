<?php

//define('DISALLOW_FILE_EDIT',true);
//define('DISALLOW_FILE_MODS',true);


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
define('DB_NAME', 'discoveryhagiang_dbtest');

/** MySQL database username */
define('DB_USER', 'discoveryhagiang_dbtest');

/** MySQL database password */
define('DB_PASSWORD', 'mRNc9SKRz172');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'G*MyXs!@@Jd=i>6_-GYRL}`coqA*w^@gQ(,BsuHJwBCVLVuQFGgaD!8&$vNPbY-:');
define('SECURE_AUTH_KEY',  'j?WcD%r)j4D^%c}COhS`,ou%+>hM~7NDfum<YC{}U;Mi /dxnEZ)Cs0H`z 7F3SW');
define('LOGGED_IN_KEY',    'c%U%*b}*oXN#Hm7Vx-b=BO*{X^1108_^)}f2 }OJI~OX,L6{ cITdT+~qvv=yF>M');
define('NONCE_KEY',        'ta}(l)u,3$MYxgd{@QNUW5G?x$%]`FGB;.=-Z[?t_{%gp}=HB#MjH/Y$Tu@Yt_iF');
define('AUTH_SALT',        'E,KBqw58<(|{2$y;C]pLi`E$#^:A|&E(_tkbK{0{,Q8w]DB)K)>^cx]k=|Z[FGQo');
define('SECURE_AUTH_SALT', 'e^``oNp9u]Wt*lvoX}6&9Mftz_ @L3n[-eb!HYUxIn~j8/B`McJ^#1FUr]#{*j@V');
define('LOGGED_IN_SALT',   'U5J:^L#5KJ_w}u7nn<SkudQrH)95}0R#Hk2j}k@*jPw7Z?RL3KyCF]gbN]fbt_1x');
define('NONCE_SALT',       'hKu0vg,Wm3R=y*5];YqG~c.vVCLa`,2(!G.sU_FHzh{1~[I7j1|qM~.ki!{`H%9e');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'hg_';

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
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');





@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
