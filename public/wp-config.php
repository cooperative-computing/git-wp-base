<?php
/**
 * Check all the required files exist
 */
$current_path = __DIR__ . DIRECTORY_SEPARATOR . '../';

if (!file_exists($current_path . 'vendor/autoload.php')) {
    die('Please install the composer dependencies for this to work!');
}

if (!file_exists($current_path . '.env')) {
    die('Please create the .env file containing the environment variables');
}

/**
 * Load Environment Settings from .env file into $_ENV superglobal
 */
require_once $current_path . 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createUnsafeImmutable($current_path);
$dotenv->load();
unset($dotenv);

// Check if HTTPS is coming from a Reverse Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_NAME'));

/** MySQL database username */
define('DB_USER', getenv('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASS'));

/** MySQL hostname */
define('DB_HOST', getenv('DB_HOST'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', getenv('DB_CHARSET'));

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', getenv('DB_COLLATE'));

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
# INSERT WP SALT HERE

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = getenv('DB_PREFIX');

/**
 * WordPress Address (URL)
 */
define('WP_SITEURL', getenv('WP_SITEURL'));

/**
 * WordPress Blog Address (URL)
 */
define('WP_HOME', getenv('WP_HOME'));

/**
 * Enable/Disable Post Revisions
 */
define('WP_POST_REVISIONS', getenv('WP_POST_REVISIONS'));

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', getenv('WP_DEBUG'));
define('WP_DEBUG_LOG', getenv('WP_DEBUG_LOG'));
define('WP_DEBUG_DISPLAY', getenv('WP_DEBUG_DISPLAY'));

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
