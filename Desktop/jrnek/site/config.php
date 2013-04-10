<?php

	error_reporting(-1);
	ini_set('display_errors', 1);
	
	$jr->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);
	$jr->config['timezone'] = 'Europe/Stockholm';
	$jr->config['charEncode'] = 'UTF-8';
	$jr->config['lang'] = 'en';
	
	$jr->config['controllers'] = array(
		'index' => array('enabled' => true, 'class' =>  'CCIndex'), 
	);
	
	$jr->config['theme'] = array(
		'name' => 'core',
	);
	
	$jr->config['base_url'] = null;
	
	/**
	* What type of urls should be used?
	* 
	* default      = 0      => index.php/controller/method/arg1/arg2/arg3
	* clean        = 1      => controller/method/arg1/arg2/arg3
	* querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
	*/
	$jr->config['url_type'] = 1;