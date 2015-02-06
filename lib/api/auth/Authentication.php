<?php
	class Authentication {
		public function isLoggedIn() {
			if(isset($_SESSION['login']))
				if($_SESSION['login'] == BootPanel::getConfig("BootPanel")->get("Password"))
					return true;
			return false;
		}
		
		public function doLogin($password) {
			$_SESSION['login'] = $password;
		}
		
		public function changePass($old, $new) {
			BootPanel::getConfig("BootPanel")->set("Password", $new, $old);
		}
		
		public function logout() {
			session_destroy();
		}
	}