<?php
	require 'lib/api/auth/Authentication.php';
	require 'lib/api/designer/Designer.php';
	require 'lib/api/key/LicenseKey.php';
	require 'lib/api/stats/Usage.php';
	require 'lib/api/stats/Console.php';
	
	class API {
		public function auth() {
			return new Authentication();
		}
		
		public function designer() {
			return new Designer();
		}
		
		public function license() {
			return new LicenseKey();
		}
		
		public function usage() {
			return new Usage();
		}
                
                public function console(){
                    return new Console();
                }
	}