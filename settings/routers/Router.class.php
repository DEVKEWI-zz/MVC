<?php
class Router
{
	protected $action = 'index';
	protected $name = 'Home';
	protected $controller = "Controller";
	protected $params = [];

	/**
	 * Gets the action.
	 *
	 * @return     string  The action.
	 */
	public function getAction()
	{
		return $this->action;
	}

	/**
	 * Sets the action.
	 *
	 * @param      string  $action  The action
	 */
	public function setAction($action = '')
	{
		$this->action = $action;
	}

	/**
	 * Gets the controller name.
	 *
	 * @return     string  The controller name.
	 */
	public function getControllerName()
	{
		return $this->name;
	}

	/**
	 * Sets the controller name.
	 *
	 * @param      string  $name   The name
	 */
	public function setControllerName($name = '')
	{
		$this->name = $name;
	}

	/**
	 * Gets the controller.
	 *
	 * @return     string  The controller.
	 */
	public function getController()
	{
		return $this->name . $this->controller;
	}

	/**
	 * Sets the controller.
	 *
	 * @param      string  $controller  The controller
	 */
	public function setController($controller = '')
	{
		$this->controller = $controller;
	}

	/**
	 * Gets the parameters.
	 *
	 * @return     array  The parameters.
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * Sets the parameters.
	 *
	 * @param      array  $params  The parameters
	 */
	public function setParams($params = [])
	{
		$this->params = $params;
	}
}