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
define('DB_NAME', 'wordpress_e');

/** MySQL database username */
define('DB_USER', 'wordpress_e');

/** MySQL database password */
define('DB_PASSWORD', 'yV1ta24#OSobgzzf123');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

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
define('AUTH_KEY',         'jsq5Pqjp%3tKrxfs%xlkh6l8F2aZlhgIRt4jyRPkgW8uTPIZhUahfHbx3wnwp1m@');
define('SECURE_AUTH_KEY',  'm^MzMxlgB72E%l@ztmw%0eqNmw^gNQdypq9pIO^e2l*)eOMKzOy7@cCDbHc*Rd!n');
define('LOGGED_IN_KEY',    'Ae3fV1DnQph4&V0#k35L*T4PCHquYGnJJBGnIX()EZrpWwC(Qwt%OZ4btD0ZR!Hf');
define('NONCE_KEY',        'oPky9UVyMpzv&en#YXK2pNoTkOR6TpPPV1Tq)y!NNG7&^H9c%)RP2aoDWh@ZQ*e4');
define('AUTH_SALT',        'JWm73BqSn%YLsgyQb!8tcVHQW2aRqgWyS5lqf0akZuP@XFf&W^#@UU2zNjWuuWj)');
define('SECURE_AUTH_SALT', '%vYq6GKvm4uSK&GCJ60ZU^CZK0yWaScjOFCMw7&PuPqX9h8cIUYX&6uFp86qW^Fs');
define('LOGGED_IN_SALT',   '8YpxCkt()BxFfLiwKHA(4JfYJtfSi(ROpCFydsW%@LoxplC5hFDd#q(MZ!7Ipe0I');
define('NONCE_SALT',       'bO&0K!7H2PH*qc0#Gyf!3vhe@cGYLsFdFF9&u@Ahid84Si#GGGKfmjPha0HhrPV0');
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

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
