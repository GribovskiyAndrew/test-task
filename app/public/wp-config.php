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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         'kUiDKVhDvweaWWRHwsRTQ1DqpBnXwvV2wD/5hFwEy/j+hN+XdxtxMmQR8O22bPUugOZJecH0m+1HPGRNu6RJZA==');
define('SECURE_AUTH_KEY',  'HsX6j3i9x1YvSRzCaQa9zQPGdpejILNOx4TN+On1ocfQHMjamsyGql44loyIhwwbvduxtaFUEbUNduaHSW9+FA==');
define('LOGGED_IN_KEY',    'ejWEVDOiZRDEMTHWRzwP0ky10KOP2q43ZY49EOiQ386AW+B1EIoIJZLycFrhwohnRmn2FSHHIHjVwo0SVNfYmg==');
define('NONCE_KEY',        'aKS+4CC9aDJSk860yhnu6pxXfVhRK97waEH1wdsAKs4Q193MlK29Cm2ODkh+Kvmu7FS+6lFI8Fku2JeH6+9xAQ==');
define('AUTH_SALT',        'eTALYKGmsUztrPluooptVnw8O5TodVlEYij567O21F3EwKfNwHiRxS1HInrYQHDDHQRktunEQ7Lj5Z/FgQnQKg==');
define('SECURE_AUTH_SALT', 'No6uw25PUHqRfE+vNoiyaYXeEgXpy/EXlzCw1oeBC6GmPlBiGZQYl6Trh8b21kG07RvdKlKZBVKVdlWGPp1EHw==');
define('LOGGED_IN_SALT',   'dUJG28cdKMcD1TdtGar1bfhA4/D2cFoUVs6z3WdpX2QPn3aKmu87oXo3cZXMLyBv4In8jNvswql+7GHxjOjDMg==');
define('NONCE_SALT',       'I/t5JSFd+YsB1G0mzz2/Z+78zTKkATCWR3JQ1e2Yqocq+cPI9Kl+xkw2d2qm0vaN6ElmTYniPU/OLnuyytoaCA==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
