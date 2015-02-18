<?php
	require 'lib/api/auth/Authentication.php';
	require 'lib/api/designer/Designer.php';
	require 'lib/api/key/LicenseKey.php';
	
	class API {
		public function getAuth() {
			return new Authentication();
		}
		
		public function getDesigner() {
			return new Designer();
		}
		
		public function license() {
			return new LicenseKey();
		}
	}