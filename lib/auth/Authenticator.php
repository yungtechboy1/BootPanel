<?php
	class Authenticator {
		public static function doLogin($password) {
			static $dologin_called = false;
			if(!$dologin_called)
				$_SESSION['login'] = $password;
		}
		
		public function isLoggedIn() {
			if(isset($_SESSION['login']) && $_SESSION['login'] == BootPanel::getConfig()->get("Password"))
				return true;
			return false;
		}
		
		public function logout() {
			session_destroy();
		}
	}