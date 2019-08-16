<?php
/**
 * Homepage Controler
 */
class HomeController extends Controller
{
	
	/**
	 * Call a index page
	 */
	public function index()	{
		$this->loadTemplate("home");
	}
	
}