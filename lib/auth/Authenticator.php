<?php
	class Authenticator {
		public static function doLogin($password) {
			static $dologin_called = false;
			if(!$dologin_called)
				if(strlen($password) == 128)
					$_SESSION['login'] = $password;
				else
					$_SESSION['login'] = BootPanel::secure($password);
		}
		
		public function isLoggedIn() {
			if(isset($_SESSION['login']) && $_SESSION['login'] == BootPanel::getConfig()->get("Password"))
				return true;
			return false;
		}
		
		public function changePass($newpass) {
			if(BootPanel::getAuthenticator()->isLoggedIn())
				BootPanel::getConfig()->set("Password", $newpass);
		}
		
		public function logout() {
			session_destroy();
		}
	}