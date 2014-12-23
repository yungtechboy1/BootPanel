<?php
	class Auth {
		public function isLoggedIn() {
			if(isset($_SESSION['loginid']) && $_SESSION['loginid'] == Config::BootPanel_PASS)
				return true;
			return false;
		}
		
		public function doLogin($password) {
			if($password == Config::BootPanel_PASS) {
				$_SESSION['loginid'] = $password;
				return true;
			}
			return false;
		}
		
		public function logout() {
			if(BootPanel::getAuthClient()->isLoggedIn())
				session_destroy();
			if(!BootPanel::getAuthClient()->isLoggedIn())
				return true;
			return false;
		}
	}