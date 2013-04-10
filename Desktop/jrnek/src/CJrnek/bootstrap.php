<?php 

function __autoload($className) {
	$classFile = "/src/{$className}/{$className}.php";
	$file1 = JRNEK_INSTALL_PATH . $classFile;
	$file2 = JRNEK_SITE_PATH . $classFile;
	
	if(is_file($file1)) {
		require_once($file1);
	} elseif(is_file($file2)) {
		require_once($file2); 
	}
}
