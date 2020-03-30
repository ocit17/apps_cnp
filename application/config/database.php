<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	switch ($_SERVER['HTTP_HOST'])
	{
		case 'career.kampuscileungsi.id':
			$uname = 'u9309903_career';
			$pwd   = 'cileungsi123';
			$database = 'u9309903_career';
		break;
		default:
			switch ($_SERVER['SERVER_ADMIN'])
			{
				case 'admin@vmware.localdomain':
					$uname = 'root';
					$pwd   = 'mysql';
					$database = 'cnp';
				break;
				default:
					$uname = 'root';
					$pwd   = 'mysql';
					$database = 'cnp';
				break;
			}
		break;
	}
	
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => $uname,
	'password' => $pwd,
	'database' => $database,
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
