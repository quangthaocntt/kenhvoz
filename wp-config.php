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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456a@');

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
define('AUTH_KEY',         'CBKr(*H/{qv/wQ!VY28%bnrC^j2002zr2aN8rLd8M%y}F*tutF=1c2yu)O!BUIkZ');
define('SECURE_AUTH_KEY',  'k_v{@dICz`;v:n&0Oj|`?RRrp<?/,X>K,M2qH^_G O1lXOs_sK@mJK.=>e;0,76B');
define('LOGGED_IN_KEY',    's:lzGa:Twm/O/4^+}g!+|e@_J>t3aI3I#~=vd4z4=BEU_o /6xt&mg1_T)BlBRb%');
define('NONCE_KEY',        '#,e$/_Y4_O-=d_R{c?/|!]Z&fcd9DEsKmm=Xr&:i,c~{DXNg_#o_STom8msgq)rN');
define('AUTH_SALT',        'W0Ds(y>lfEy$;S*:q%RpXIknvtjW<[}q:<2,@`>%FW $`87{fE$7uFL6J9wk#jc4');
define('SECURE_AUTH_SALT', 'Fde,Ryb/9V!z~mE-]_:Zu}N~Q@jax)AJA7>FG.^m(fBr}3Ft:^*htU%~B1#jxJ*S');
define('LOGGED_IN_SALT',   'A*aSf;1kmYst:nK).]a|%zQ`iR6xM([8_5+;q/N|b@<{4an=:=NA@%OeA)J:H%u/');
define('NONCE_SALT',       'qg9lG2d=[24x92jOi+23icAN04.kze8[^jR8@yZeu&rK},wyS 8,YE*#_,t|B?!F');

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
