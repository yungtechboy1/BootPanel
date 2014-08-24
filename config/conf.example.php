<?php
class conf {
	public function checkLogin($username, $password) {
		$ROOT_USER = "BootPanel";
		$ROOT_PASS = "BootPanelPass123";
		if($username == $ROOT_USER) {
			if($password == $ROOT_PASS) {
				login();
			}
		}
	}
	
	public function login() {
		$loggedin = true;
	}
	
	public function logout() {
		$loggedin = false;
		header("Location: index.php");
	}
	
	public function isLoggedin() {
		if($loggedin === true) {
			return true;
		}
	}
}
?>