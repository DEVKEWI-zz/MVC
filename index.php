<?php 
include_once 'application/settings/config.php';
spl_autoload_register(function ($class)
{
	$extensions = [
		'.php',
		'.class.php',
		'.interface.php'
	];
	$applications = [
		'application/settings/',
		'application/controller/',
		'application/model/',
		'application/views/'
	];
	foreach ($applications as $folder) {
		if (file_exists("{$folder}{$class}" . $extensions[0])) {
			include_once "{$folder}{$class}" . $extensions[0];
		}
		if (file_exists("{$folder}{$class}" . $extensions[1])) {
			include_once "{$folder}{$class}" . $extensions[1];
		}
		if (file_exists("{$folder}{$class}" . $extensions[2])) {
			include_once "{$folder}{$class}" . $extensions[2];
		}
	}
});
$rm = new RouterManager();
$rm->run();
?>