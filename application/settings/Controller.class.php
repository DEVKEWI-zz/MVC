<?php 
class Controller
{
	public function getLanguage()
	{
		$lang = new Language();
		return $lang->getTranslation();
	}

	private function loadView($view = '', $data = []) 
	{
		extract($data);
		include_once "application/views/{$view}.php";
	}

	public function loadTemplate($view = '', $data = [])
	{
		$this->loadView('default/header', $data);
		$this->loadView("pages/{$view}", $data);
		$this->loadView('default/footer', $data);
	}

	public function error404() 
	{
		$data['error'] = $this->getLanguage()->PAGES->NOTFOUND;
		$this->loadTemplate('404', $data);
	}

}