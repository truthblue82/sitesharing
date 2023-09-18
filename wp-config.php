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
define('DB_NAME', 'gudi');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '(z!=9hv]G=rmJ}Gm,{m +q-q1E8!52k.+3?1On%kj2R9fQ)2gBj7tY%:U6Ag!c|u');
define('SECURE_AUTH_KEY',  '.QmIe|y!{7,>V30(iDzO{u #(zc$Bz`}z}0t[TI&hcj}SCeFr36.tJDP,o|4KX+k');
define('LOGGED_IN_KEY',    'Z1($n`N+F`hb[q~|k83j9%~j@|t.~6oyJES>kuCQ4lfvVXIMk3*hwsVEMm.[&J8H');
define('NONCE_KEY',        'oHyThX2otB]MG!NxL;y,D+<Tj>J`T}/?xV!ANE8M<RPO`uvh-FcU1.#DVBm2.%xp');
define('AUTH_SALT',        'J;#Wy4td~.*o{4#AXDq7N_r~~73oHv(Oq+g5YK!OYxQrXFUmQ+3<ptCQNizT,I`g');
define('SECURE_AUTH_SALT', '|P;:;@LB#DplDx0:Tl+L=iXFSVjsQK;O`Xuf-lfa^cec+qEZxrP$FJUh9CwGs^wR');
define('LOGGED_IN_SALT',   'TbZl3$o~%s#Cz|K|G~C+:Hxl)jz3mb2B<k&?4(]I9(~i:2JHq%S$h^K|)mw<?$){');
define('NONCE_SALT',       '<C*Trh 1gRGMqc-v2Nl4YC[#~9(i<eA]i69|4>n>|maLDbmcHQkoMR|(RVk;<||a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gd_';

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
