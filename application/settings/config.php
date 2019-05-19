<?php  

/* Basic configurations */
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('url', 'http://localhost/mvc/');
date_default_timezone_set('America/Sao_Paulo');

/* MySQL initializing */
define("mysql", serialize([
	'host'=>'localhost',
	'user'=>'root',
	'pass'=>'',
	'db'=>'test'
]));
