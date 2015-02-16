<?php
	require 'lib/api/auth/Authentication.php';
	require 'lib/api/designer/Designer.php';
	
	class API {
		public function getAuth() {
			return new Authentication();
		}
		
		public function getDesigner() {
			return new Designer();
		}
	}