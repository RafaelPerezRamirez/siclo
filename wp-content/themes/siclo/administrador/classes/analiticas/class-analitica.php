<?php

class Analitica{
	protected $info;
	function __construct( $data ){
		$this->info	= $data;
	}
	protected function get_js(){
		return '';
	}
	protected function js_css(){
		return '<script type="text/javascript" src="'.admin(false).'/classes/analiticas/js/js-analitica.php"></script>';
	}
};
?>