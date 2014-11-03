<?php
	class Action {
		public static function uploadFile($file, $location = null) {
			
		}
		
		public static function deleteFile($file) {
			@unlink("./".$file);
		}
		
		public static function addPlugin($pluginFile) {
			
		}
		
		public static function deletePlugin($plugin) {
			@unlink("./plugins/".$plugin.".php");
		}
		
		public static function createDatabase($db) {
			
		}
		
		public static function deleteDatabase($db) {
			
		}
		
		public static function executeSQL($db, $statement) {
			
		}
	}