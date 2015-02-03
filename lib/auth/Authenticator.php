<?php
	class Authenticator {
		public function isLoggedIn() {
			return true;
		}
		
		public function logout() {
			session_destroy();
		}
	}