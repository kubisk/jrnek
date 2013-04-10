<?php

class CJrnek implements ISingelton {
	
	private static $instance = null;
	
	public static function Instance() {
		if(self::$instance == null) {
			self::$instance = new CJrnek();
		}
		return self::$instance;
	}
	
	protected function __construct() {
		$jr = &$this;
		require(JRNEK_SITE_PATH.'/config.php'); 
	}
	
	public function FrontControllerRoute() {
		$this->request = new CRequest($this->config['url_type']);
		$this->request->Init($this->config['base_url']);
		
		$controller = $this->request->controller;
		$method = $this->request->method;
		$arguments = $this->request->arguments;
		
		$controllerExists = isset($this->config['controllers'][$controller]);
		$controllerEnabled = false;
		$className = false;
		$classExists = false;
		
		if($controllerExists) {
			$controllerEnabled = ($this->config['controllers'][$controller]['enabled'] == true);
			$className = $this->config['controllers'][$controller]['class'];
			$classExists = class_exists($className);
		}
		
		if($controllerExists && $controllerEnabled && $classExists) {
			$rc = new ReflectionClass($className);
			if($rc->implementsInterface('IController')) {
				if($rc->hasMethod($method)) {
					$controllerObj = $rc->newInstance();
					$methodObj = $rc->getMethod($method);
					$methodObj->invokeArgs($controllerObj, $arguments);
				} else {
					die("404. " . get_class() . ' error: Controller does not contain method.');
				}
			} else {
				die('404. ' .get_class() . 'error: Controller does not implement interface.');
			}
		} else {
			die('404. Page is not found.');
		}
		
		
	}
	
	public function ThemeEngineRender() {
		$themeName = $this->config['theme']['name'];
		$themePath = JRNEK_INSTALL_PATH . "/themes/{$themeName}";
		//$themeUrl = "themes/{$themeName}";
		$themeUrl = $this->request->base_url . "themes/{$themeName}";
		
		$this->data['stylesheet'] = "{$themeUrl}/style.css";
		
		$jr = &$this;
		$functionPath = "{$themePath}/functions.php";
		if(is_file($functionPath)) {
			include $functionPath;
		}
		extract($this->data);
		include("{$themePath}/default.tpl.php");
		
		/*
		echo "<h1>I'm CJrnek::ThemeEngineRender</h1><p>You are most welcome. Nothing to render at the moment</p>";
		echo "<h2>The content of the config array:</h2><pre>", print_r($this->config, true) . "</pre>";
		echo "<h2>The content of the data array:</h2><pre>", print_r($this->data, true) . "</pre>";
		echo "<h2>The content of the request array:</h2><pre>", print_r($this->request, true) . "</pre>";
		*/
	}
	
}