<?php
session_start();
ob_start();

class actions{
	public function login() {
		$_SESSION['loggedin'] = true;
		return true;
	}
	
	public function logout() {
		session_destroy();
		header("index.php");
	}
	
	public function checkLoggedin() {
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			return true;
		}
	}
}

?>