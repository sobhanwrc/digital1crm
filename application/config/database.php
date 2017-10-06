<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['dsn']      The full DSN string describe a connection to the database.
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database driver. e.g.: mysqli.
|			Currently supported:
|				 cubrid, ibase, mssql, mysql, mysqli, oci8,
|				 odbc, pdo, postgre, sqlite, sqlite3, sqlsrv
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Query Builder class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['encrypt']  Whether or not to use an encrypted connection.
|
|			'mysql' (deprecated), 'sqlsrv' and 'pdo/sqlsrv' drivers accept TRUE/FALSE
|			'mysqli' and 'pdo/mysql' drivers accept an array with the following options:
|
|				'ssl_key'    - Path to the private key file
|				'ssl_cert'   - Path to the public key certificate file
|				'ssl_ca'     - Path to the certificate authority file
|				'ssl_capath' - Path to a directory containing trusted CA certificats in PEM format
|				'ssl_cipher' - List of *allowed* ciphers to be used for the encryption, separated by colons (':')
|				'ssl_verify' - TRUE/FALSE; Whether verify the server certificate or not ('mysqli' only)
|
|	['compress'] Whether or not to use client compression (MySQL only)
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|	['ssl_options']	Used to set various SSL options that can be used when making SSL connections.
|	['failover'] array - A array with 0 or more data for connections if the main should fail.
|	['save_queries'] TRUE/FALSE - Whether to "save" all executed queries.
| 				NOTE: Disabling this will also effectively disable both
| 				$this->db->last_query() and profiling of DB queries.
| 				When you run a query, with this setting set to TRUE (default),
| 				CodeIgniter will store the SQL statement for debugging purposes.
| 				However, this may cause high memory usage, especially if you run
| 				a lot of SQL queries ... disable this to avoid that problem.
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $query_builder variables lets you determine whether or not to load
| the query builder class.
*/


if($_SERVER['HTTP_HOST']=='localhost'){
   $active_group = 'default';
}
else if($_SERVER['HTTP_HOST']=='www.blogmo.co' || $_SERVER['HTTP_HOST']=='blogmo.co'){
    $active_group = 'blogmo';
}
else if($_SERVER['HTTP_HOST']=='www.plma.performlaw.com' || $_SERVER['HTTP_HOST']=='plma.performlaw.com'){
    $active_group = 'dev-live';
}
else if($_SERVER['HTTP_HOST']=='www.plma-aws.bitnamiapp.com' || $_SERVER['HTTP_HOST']=='plma-aws.bitnamiapp.com'){
    $active_group = 'dev-aws-bit';
}
else if($_SERVER['HTTP_HOST']=='www.plma-dev.performlaw.com' || $_SERVER['HTTP_HOST']=='plma-dev.performlaw.com'){
    $active_group = 'plma-dev';
}
else if($_SERVER['HTTP_HOST']=='192.168.1.119'){
    $active_group = 'default';
}
else if ($_SERVER['HTTP_HOST'] == 'jygsaw.com' || $_SERVER['HTTP_HOST'] == 'www.jygsaw.com') {
    $active_group = 'jygsaw';
    $hostname="localhost";
}
else{
    $active_group = 'live';
}
//echo $active_group;die();
//$active_group = 'default';
$query_builder = TRUE;

//$db['jygsaw']['hostname'] = $hostname;
//$db['jygsaw']['username'] = 'jygsaw_digital1'; 
//$db['jygsaw']['password'] = 'U^yI=h;5msM^'; 
//$db['jygsaw']['database'] = 'jygsaw_digital1crm';
//$db['jygsaw']['dbdriver'] = 'mysqli';
//$db['jygsaw']['dbprefix'] = 'tbl_';
//$db['jygsaw']['pconnect'] = TRUE;
//$db['jygsaw']['db_debug'] = FALSE;
//$db['jygsaw']['db_redirect']=FALSE;
//$db['jygsaw']['cache_on'] = TRUE;
//$db['jygsaw']['cachedir'] = '';
//$db['jygsaw']['char_set'] = 'utf8';
//$db['jygsaw']['dbcollat'] = 'utf8_general_ci';
//$db['jygsaw']['swap_pre'] = '';
//$db['jygsaw']['autoinit'] = TRUE;
//$db['jygsaw']['stricton'] = TRUE;

//For new server connection
//$db['jygsaw'] = array(
//	'dsn'	=> '',
//	'hostname' => $hostname,
//	'username' => 'jygsaw_digital1',
//	'password' => 'u0m}tqp#LKaP',
//	'database' => 'jygsaw_digital1crm',
//	'dbdriver' => 'mysqli',
//	'dbprefix' => '',
//	'pconnect' => FALSE,
//	'db_debug' => (ENVIRONMENT !== 'developement'),
//	'cache_on' => FALSE,
//	'cachedir' => '',
//	'char_set' => 'utf8',
//	'dbcollat' => 'utf8_general_ci',
//	'swap_pre' => '',
//	'encrypt' => FALSE,
//	'compress' => FALSE,
//	'stricton' => FALSE,
//	'failover' => array(),
//	'save_queries' => TRUE
//);
//end

//old server connection
$db['jygsaw'] = array(
	'dsn'	=> '',
	'hostname' => $hostname,
	'username' => 'jygsaw_digidev',
	'password' => 'xDx(zHIIud(c',
	'database' => 'jygsaw_digitalcrm_dev',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'developement'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
//end

//localhost connection
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => '192.168.1.109',
	'username' => 'jayanta',
	'password' => 'root',
	'database' => 'digital1crm',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'developement'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
//end

$db['dev-aws-bit'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'plma-ams',
	'password' => 'plma-ams123',
	'database' => 'plma-ams',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
$db['plma-dev'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'performl_plmadev',
	'password' => 'plma-dev@123$',
	'database' => 'performl_plmadev',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['dev-live'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'performl_plma',
	'password' => 'plma-@123$',
	'database' => 'performl_plma',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['blogmo'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'blogmoco_ams',
	'password' => 'dD{XTT1xZ0e[',
	'database' => 'blogmoco_ams',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
$db['blogmo2'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'blogmoco_ams2',
	'password' => 'dD{XTT1xZ0e[',
	'database' => 'blogmoco_ams2',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['live'] = array(
	'dsn'	=> '',
	'hostname' => '192.168.1.100',
	'username' => 'jayanta',
	'password' => 'root',
	'database' => 'attorney_management_system',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);