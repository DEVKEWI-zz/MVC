<?php
/**
 * Router Manager
 */
class RouterManager
{
	
	private $action;
	private $controller;

	function __construct()
	{
		$this->action = 'index';
		$this->controller = 'HomeController';
	}

	public function run()
	{
		$router = explode('/', $_GET['path']);
		if(isset($router[0]) && $router[0] != null) {
			$this->controller = ucfirst($router[0]) . "Controller";
			if(!class_exists($this->controller)) {
				$this->controller = 'ErrorController';
			} else {
				array_shift($router);
				if(count($router) > 0 && !empty($router[0]) && $router[0] != '') {
					if(!method_exists(new $this->controller, $router[0])) {
						$this->controller = 'ErrorController';
					} else {
						$this->action = $router[0];
					}
					array_shift($router);
				}
			}
		}
		$params = array();
		if(count($router) > 0){
			$params = $router;
		}
		call_user_func_array([new $this->controller(), $this->action], $params);
	}
}