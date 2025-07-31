<?php
class Controller {

	protected $db;
	protected $lang;

	public function __construct() {
		global $config;

	
	}
	
	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		include 'views/'.$viewName.'.php';
	}

	public function loadTemplate($template, $viewName, $viewData = array()) {
		include 'views/template' . $template . '.php';
	}

	public function loadViewInTemplate($viewName, $viewData) {
		extract($viewData);
		include 'views/'.$viewName.'.php';
	}

	//Definir action, quando necessário ignorar no construct
	public function getAction()
 	{
		// Supondo que a URL seja algo como 'controller/action/param1/param2'
		$url = isset($_GET['url']) ? $_GET['url'] : '';
		$url = explode('/', $url);
		return isset($url[1]) ? $url[1] : 'index'; // 'index' é a ação padrão se não estiver definida
  	}

}