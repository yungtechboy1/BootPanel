<?php
	class Authentication {
		public function isLoggedIn() {
			if(isset($_SESSION['user']) && isset($_SESSION['login'])) {
				$user = $_SESSION['user'];
				if($_SESSION['login'] == BootPanel::getConfig("BootPanel")->get("Password", "Username='$user'"))
					return true;
			}
			return false;
		}
		
		public function isDefault() {
			if(BootPanel::getConfig("BootPanel")->get("Password", "Username='BootPanel'") == BootPanel::secure("Admin"))
				return true;
			return false;
		}
		
		public function getName() {
			if(BootPanel::getAPI()->getAuth()->isLoggedIn())
				return $_SESSION['user'];
		}
		
		public function doLogin($username, $password) {
			$_SESSION['user'] = $username;
			$_SESSION['login'] = $password;
		}
		
		public function changePass($old, $new) {
			BootPanel::getConfig("BootPanel")->set("Password", $new, $old, "AND Username='". BootPanel::getAPI()->getAuth()->getName() ."'");
		}
		
		public function logout() {
			session_destroy();
		}
	}