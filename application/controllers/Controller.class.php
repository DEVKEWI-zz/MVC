<?php 
class Controller
{
	/**
	 * Loads a view.
	 *
	 * @param      string  $view   The view
	 * @param      array   $data   The data
	 */
	private function loadView($view = '', $data = []) 
	{
		extract($data);
		loadFile([
			".html",
			".php"
		], "application/views/{$view}");
	}

	/**
	 * Loads a template.
	 *
	 * @param      string  $view   The view
	 * @param      array   $data   The data
	 */
	public function loadTemplate($view = '', $data = [])
	{
		$this->loadView('default/header', $data);
		$this->loadView("pages/{$view}", $data);
		$this->loadView('default/footer', $data);
	}

}