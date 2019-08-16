<?php
/**
 * Router Manager
 */
class RouterManager extends Router
{
	
	private $path;

	function __construct()
	{
		$this->path = explode('/', $_GET['path']);
	}

	/**
	 * Run Routers to Controller Manager
	 */
	public function run()
	{
		if ($this->hasPath()){
			if (class_exists($this->getController()) && $this->hasAction()) {
				$this->setParams(array_slice($this->path, 2));
			} else {
				$this->setControllerName("Error");
			}
		}
		$obj = [$this->getController(), $this->getAction()];
		call_user_func_array([new $obj[0], $obj[1]], $this->getParams());
	}

	/**
	 * Gets the path.
	 *
	 * @return     array  The path.
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * Sets the path.
	 *
	 * @param      array  $path   The path
	 */
	public function setPath($path = [])
	{
		$this->path = $path;
	}

	/**
	 * Determines if it has path.
	 *
	 * @return     boolean  True if has path, False otherwise.
	 */
	public function hasPath()
	{
		if (isset($this->path[0]) && $this->path[0] != null) {
			$this->setControllerName(ucfirst($this->path[0]));
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Determines if it has action.
	 *
	 * @return     boolean  True if has action, False otherwise.
	 */
	public function hasAction()
	{
		if (count($this->path) > 1 && !empty($this->path[1]) && $this->path[1] != '') {
			$controller = $this->getController();
			if (method_exists(new $controller, $this->path[1])) {
				$this->setAction($this->path[1]);
				return true;
			}
		} else {
			return false;
		}
	}

}