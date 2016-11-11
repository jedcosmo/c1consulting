<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'conecons_wo6346');

/** MySQL database username */
define('DB_USER', 'conecons_wo6346');

/** MySQL database password */
define('DB_PASSWORD', 'S9cQi5gXmpEL');

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
define('AUTH_KEY', 'AmZP-|GrvWSeX^}-}!xWaR|]oPv=XEW>QZT+eiU*iKlZpS?RcAm?E?|@KAzkum>bMtMHW|ho!&y?UVKaGQ+?lXt/emR[Xp%uY/Gur]L}=v@R^OD>x<PrC_C<EJcZVM=!');
define('SECURE_AUTH_KEY', '(%+M$iPT|IC|oXBQ%*m@W^nX-oL;gAonvidb;T=iZzBTElBZpMR@Q+hePlE&*@c=Uc]faK;ARiO(/$TKsmDTgXb?UB^Irr>kd%+lJ(JXZbcPA(jHCIpZbGG=jThdNJb[');
define('LOGGED_IN_KEY', 'B[&XC+CyZmG_>c(rLbJ(%$L|OGx*+EjVN>pg^|yFo<+[}%_uy&bdTg(@!+NzvV/=GYWfsDN}u-M]FuyaEBUZx%>ij[DftY_u)$X>Avm^J!|DWZuuuSq=@+epfk)|Y/A&');
define('NONCE_KEY', '^X@fXM^oWxh$aiWFQo%xG(DRPYH(hV*c?tR}cHPH?!zaG{F+ilgt]i_CJ<+Z)NOf_/gO/SV>^Qn_u|/E@h|HIc_S;?-FtE[Pk$G--dSrs-BE&?LSQWc}]=oszw-?y@j&');
define('AUTH_SALT', 'PB{YIfU[OCu>_^-_|tBqnUMlt!zKX$/_jj];bceVus+SdFDON/cyX)]xD-X<f(GiPA=^O%y;Dfiq%cZ&^z+Q)+o&Zcv_oqk?cKi^iJmQR%?$u%!mSV=/VnD$pVn){jm@');
define('SECURE_AUTH_SALT', '(L=AeL<(<y[SzW@bEEL<T-mf=HXoUgUqgQXMM*?mFx&/oX}DouIYvx_nzcUc+eJp<QjC>$mJ>L[P/SIjrq!tb^VT]|zF*jPk<XAT]-l]L!;x)rw+R*MvaB<pTuSn_orF');
define('LOGGED_IN_SALT', 'uabYhygBp]PS!gB%c>r;uQ-O>r>=NT@OI_E{Ibip-rw@xfF|fJ}nE{;d$pG_epArnTOqO*M$>Vv)X!M%}>kD}|+iEL*Z?D];/yQR)_|{lrlMZt?+lZzEVE__Xe&L_T+T');
define('NONCE_SALT', 'J@K$oJ*}Z{svIZ%[ytb=gG*E%=GMo?icC$Z=xy!R/-NLj%K!=VS;*Et]%}{Jgt=rHQ[]zTwzG%Wq-%mykMDxrUzvjrWxDv-lJSUG$=epYY]qkEYzakj<ISZ%UYm)ul*^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_imad_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
