<?php

class HomeController extends Controller
{
	
	public function index() 
	{
		$data['homepage'] = $this->getLanguage()->PAGES->HOMEPAGE;
		$this->loadTemplate('home', $data);
	}

}