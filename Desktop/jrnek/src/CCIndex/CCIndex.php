<?php

class CCIndex implements IController {
	public function Index() {
		global $jr;
		$jr->data['title'] = "Index Controller";
	}
	
	public function Add($text = "default", $bool = false) {
		global $jr;
		$jr->data['text'] = $text;
		$jr->data['title'] = "Addfunktionen";
		
		if($bool) {
			$jr->data['text2'] = "Success!";
		}
	}
}