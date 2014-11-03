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
			$link = mysql_connect($MySQL_HOST, $MySQL_USER, $MySQL_PASS);
			if(!$link) {
				die(
					Error::mysql_connect()
				);
			}
			$db_selected = mysql_select_db($db, $link);
			if(!$db_selected) {
				$sql = 'CREATE DATABASE '.$db;
				if (mysql_query($sql, $link)) {
					return true;
				} else {
					return false;
				}
			} else {
				return true;
			}
			mysql_close($link);
		}
		
		public static function deleteDatabase($db) {
			
		}
		
		public static function executeSQL($db, $statement) {
			
		}
	}