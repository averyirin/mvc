<?php
class PagesController{
	public function home(){
		$first_name = 'Irin';
		$last_name = 'Avery';
		require_once('views/pages/home.php');
	}
	public function error(){
		require_once('views/pages/error.php');
	}
}
?>