<?php 
include_once 'settings/config.php';

spl_autoload_register(function ($class) {
	$applications = [
		/* Default Folderes */
			'settings/routers/',
			'application/controllers/',
			'settings/api/',
			'application/models/'
	];
	$extensions = [
		/* File Extension*/
		'.class.php',
		'.php',
		'.interface.php'
	];
	foreach ($applications as $folder) {
		loadFile($extensions, "{$folder}{$class}");
	}
});
function loadFile($extensions = [], $path = '') {
	foreach ($extensions as $extension) {
		if (!empty($path . $extension) && file_exists($path . $extension)) {
			return include_once $path . $extension;
		}
	}
}
$rm = new RouterManager();
$rm->run();