<?php
/**
 * Error Controler
 */
class ErrorController extends Controller
{
	
	/**
	 * Call a error index page
	 */
	public function index()	{
		$this->loadTemplate("error");
	}
	
}