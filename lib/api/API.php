<?php
	require 'lib/api/auth/Authentication.php';
	
	class API {
		public function getAuth() {
			return new Authentication();
		}
	}