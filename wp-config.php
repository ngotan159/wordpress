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
define( 'DB_NAME', 'db_test' );

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
define( 'AUTH_KEY',         'KVRya=7(E6t>efZT3>@83TpX0jh7v.6% 8c13o/%D|chFi*Zl^[v|-|#`9P+vlev' );
define( 'SECURE_AUTH_KEY',  '$_~mQNAxyOh$ucxaI8QabbWN3z/$gW_eeg~ON2PG*=q)z?4ZPC_x1ev%iLF97(H_' );
define( 'LOGGED_IN_KEY',    'irRBc2X[x*kq^]U0BKMoqr&eye|v0q[[Fw~BD3X9{c+Y:uXx9NX>lNho_jRSzUhz' );
define( 'NONCE_KEY',        'Cy&E ?Hg/|~nRep7-byR$HUU/dsel+jJN4_}r?j--75wx7aVZti$kbq61l+j((S{' );
define( 'AUTH_SALT',        'ereyT+%Ff`Yvfp+lnd]m^tGN63&x?JD{rCKgtWZ}JFC!q`qWcU$,<$jx~FnEPNGr' );
define( 'SECURE_AUTH_SALT', 'Em.l/MTCvh8rkN/Qf+|M?dFen;~3.#-gXc[pS!u8?S[F4Q<*,-z^-#QCv9xZj9,&' );
define( 'LOGGED_IN_SALT',   'M{+%*yBXa>huU5^;W3NNe6Y/mKBC-0]TFI[/>`s:e,4b^b57^y(-c851YEF/G7KM' );
define( 'NONCE_SALT',       '?]i_sU;/B~~5+aH9$m$>H1u_b[3ET*A^@5<9/^DLXOVqd]lWb)%<8uuFg`.V`&G&' );

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
