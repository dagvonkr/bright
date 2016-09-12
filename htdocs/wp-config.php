<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/srv/www/Bright/htdocs/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'Bright');

/** MySQL database username */
define('DB_USER', 'wp');

/** MySQL database password */
define('DB_PASSWORD', 'wp');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         '84Nl~+eXFWPw($BlBI.2GLSSzCsc`lzX-@n-%1HcOYo{<]0F}*ED&z557J>N6`ol');
define('SECURE_AUTH_KEY',  'BfKI&lMb-;FY,Lo4g8KQKuWy#d9+<U#FP|bIA[O+N|~R5_E0]*>-zfN/v)QGzQ(s');
define('LOGGED_IN_KEY',    'E+L/^c&yBf:;sl1YVmWRc>EjNN.s`m5~eizQE$ s8y ;84a8PL8DBfd|!C *@3wd');
define('NONCE_KEY',        '~,VQ8_j1B((RM8HSCRZc,A6q+ |~@^D19#56]_*xF_7Jb]^vk4z|cT|@+)`afb3N');
define('AUTH_SALT',        '*a$i=+kRk~c]K@B;#o0VB5BQpEf-0gSnYdd+D{,*JKZLk~vwqh[4]0Y1LDLmL]Q9');
define('SECURE_AUTH_SALT', 'uv&&bmK66 a&`s`C-$gy+|af6BkL+|;+qry<>~c4@3dt?c/fYf#sgea$}pBmTZ3&');
define('LOGGED_IN_SALT',   'SO7a|vAf)@=4#w:WQgQ?waz3l;vp-$$B23R$^{G;rjAmS6{!XC]PO$b2i-v(JLnH');
define('NONCE_SALT',       '-|`g0PD|f_!ftT/LK3 N%l3CBCp{XwYp,jy0Zd:<Af^/AMA|.Wix~bp;Yj,Ai)7Y');


$table_prefix = 'wp_';


define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', true);
define('SCRIPT_DEBUG', true);
define('JETPACK_DEV_DEBUG', true);



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
