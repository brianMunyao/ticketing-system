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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ticketing-system' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         'M8]fIvPkH&YcLy}@[Ou=5,Yq]dm}s9HGPHXtuWj7b;bFlKH?T(|w+0}>:k|JO5,(' );
define( 'SECURE_AUTH_KEY',  '-ZyQ`%O675zBM9PD,$t[Pv?D~hFiuoq7d_;G881A_^d`#HO6.m5V}ahfYnyqQgdV' );
define( 'LOGGED_IN_KEY',    'im0j4.}PjHyKe9rZ?6Wb_SfEtO~#Bq|z2-0n,gL&GhP^cI]y=+=C@^<47j/^8G6{' );
define( 'NONCE_KEY',        '*&X]ccGsB&1*lfPo]yUE7~^SPo;M&wchB#vTaD-6HA7RG!:hF?ErpWLZsG*EE,xN' );
define( 'AUTH_SALT',        'NwpJ/[f<$@&3G+dKoQ&^#wb2k8U?|/-QP?4{UxHkGi<|i;!DRY4J6=@!(|P$NXd:' );
define( 'SECURE_AUTH_SALT', 'z~0mjQH+8L{Xrq6En9CT!OxnU=,FIDiIqx,}+r[f/{*B1gvTvnFMy+?O~U$e{-4J' );
define( 'LOGGED_IN_SALT',   '=-y3[2{cgJ^~RDmei%TP3!L.a=VDXXL7V%lM[!}Ig|:R`<+elk0{Ej}D]>$*S4[W' );
define( 'NONCE_SALT',       'XmwikT&,>*PX0xej&YnX/hCY.e*ONnQ#$p?j!-mYZ>, D #);lyy(Msw*B35s@K5' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
