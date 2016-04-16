<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*		DATABASE		*/
if( ENVIRONMENT == 'development' ) {
	define('db_host', 'localhost');
	define('db_user', 'root');
	define('db_pwd', '');
	define('db_name', 'fishcart');
	define('sess_encrypt_cookie', FALSE);
	
} else {
	define('db_host', 'localhost');
	define('db_user', 'softecin_fishcar');
	define('db_pwd', 'softecin_fishcar');
	define('db_name', 'softecin_fishcart');
	define('sess_encrypt_cookie', TRUE);
}


/*		SESSION 		*/

define( 'encryption_key', md5('unlock-me') );
define( 'sess_use_database', FALSE );
define( 'sess_time_to_update', 3000 );


/*		EMAIL 		*/

define( 'email_protocol', "smtp" );
define( 'email_smtp_host', "ssl://md-in-15.webhostbox.net" );
define( 'email_smtp_user', "test@softecinfo.in" );
define( 'email_smtp_pass', "test1" );
define( 'email_smtp_port', 465 );

/*		GENERAL 		*/

define( 'upload_path', 'uploads' );
define( 'upload_multy', true );


define( 'sms_key', 'xxxxxxxxxxxxxxx' );
define( 'sms_sid', 'xxxxxxxxxxxxxxx' );

