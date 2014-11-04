<?php
	class Auth {
		public static function login($password) {
			if($password == md5(Config::BootPanel_Password)) {
				$_SESSION['login'] = $password;
				return true;
			} else
				return false;
		}
		
		public static function isLoggedIn() {
			if(isset($_SESSION['login']) && $_SESSION['login'] == md5(Config::BootPanel_Password))
				return true;
			else
				return false;
		}
		
		public static function logout() {
			session_destroy();
		}
	}