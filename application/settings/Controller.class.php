<?php 

class Controller 
{

	private function loadView($view, $data = []) 
	{
		extract($data);
		include_once 'application/views/' . $view . '.php';
	}

	public function loadTemplate($view, $data = [])
	{
		$this->loadView('default/header', $data);
		$this->loadView("pages/{$view}", $data);
		$this->loadView('default/footer', $data);
	}

	public function error404() 
	{
		$this->loadTemplate('404');
	}
	
}