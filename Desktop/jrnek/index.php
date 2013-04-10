<?php
//Phase: Bootstrap
define('JRNEK_INSTALL_PATH', dirname(__FILE__));
define('JRNEK_SITE_PATH', JRNEK_INSTALL_PATH . '/site');

require(JRNEK_INSTALL_PATH.'/src/CJrnek/bootstrap.php');
$jr = CJrnek::Instance();

//Phase: Frontcontrollerroute 
$jr->FrontControllerRoute();

//Phase ThemeEningeRender
$jr->ThemeEngineRender();
