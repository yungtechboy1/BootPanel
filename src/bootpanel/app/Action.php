<?php
	class Action {
		/**
		 * Uploads a file to the server
		 * 
		 * Returns true if file was uploaded
		 * Returns false if failure
		 * 
		 * Errors:
		 * 	- permission_fail (Not permitted)
		 * 	- file_exists (File is already existant)
		 * 	- invalid_dir (Folder couldn't be created or selected)
		 * 
		 * @param File $file
		 * @param String $location
		 * @return boolean
		 */
		public static function uploadFile($file, $location = null) {
			return false;
		}
		
		/**
		 * Deletes a file from the server
		 * 
		 * Returns true if file was deleted or doesnt exist
		 * Returns false if failure
		 * 
		 * Errors:
		 * 	- permission_fail (Not permitted)
		 * 
		 * @param String $file
		 * @return boolean
		 */
		public static function deleteFile($file) {
			@unlink("./".$file);
			if(!file_exists("./".$file)) {
				return true;
			} else {
				return false;
			}
		}
		
		/**
		 * Installs a plugin to BootPanel
		 * 
		 * Returns true if plugin was installed or already exists
		 * Returns false if failure
		 * 
		 * Errors:
		 * 	- permission_fail (Not permitted)
		 * 
		 * @param File $pluginFile
		 * @return boolean
		 */
		public static function addPlugin($pluginFile) {
			return false;
		}
		
		/**
		 * Uninstalls a BootPanel plugin
		 * 
		 * Returns true if plugin doesnt exist or was deleted
		 * Returns false if failure
		 * 
		 * @param unknown $plugin
		 * @return boolean
		 */
		public static function deletePlugin($plugin) {
			@unlink("./plugins/".$plugin.".php");
			if(!file_exists("./plugins/".$plugin.".php")) {
				return true;
			} else {
				return false;
			}
		}
		
		/**
		 * Checks for a MySQL Database
		 * 
		 * Returns true if database exists
		 * Returns false if database does not exist
		 * 
		 * Errors:
		 * 	- mysql_connect (Unable to connect to MySQL)
		 * 
		 * @param Database $db
		 * @return boolean
		 */
		public static function databaseExists($db) {
			mysql_connect(Config::MySQL_HOST .":". Config::MySQL_PORT, Config::MySQL_USER, Config::MySQL_PASS) or die(
				Error::mysql_connect()
			);
			if(mysql_select_db($db)) {
				return true;
			} else {
				return false;
			}
		}
		
		/**
		 * Creates a database
		 * 
		 * Returns true if database was created or already exists
		 * Returns false is the database could no be created
		 * 
		 * Errors:
		 * 	- mysql_connect (Unable to connect to MySQL)
		 * 
		 * @param Database $db
		 * @return boolean
		 */
		public static function createDatabase($db) {
			mysql_connect(Config::MySQL_HOST .":". Config::MySQL_PORT, Config::MySQL_USER, Config::MySQL_PASS) or die(
				Error::mysql_connect()
			);
			if(!Action::databaseExists($db)) {
				mysql_query("CREATE DATABASE $db");
				if(Action::databaseExists($db))
					return true;
				else
					return false;
			}
		}
		
		/**
		 * Drops a database
		 * 
		 * Returns true if database was deleted or doesnt exist
		 * Returns false if failure
		 * 
		 * Errors:
		 * 	- mysql_connect (Unable to connect to MySQL)
		 * 
		 * @param unknown $db
		 * @return boolean
		 */
		public static function deleteDatabase($db) {
			return false;
		}
		
		/**
		 * Executes a MySQL command
		 * 
		 * Returns statement information
		 * 
		 * Errors:
		 * 	- mysql_connect (Unable to connect to MySQL)
		 * 
		 * 
		 * @param unknown $db
		 * @param unknown $statement
		 * @return boolean
		 */
		public static function executeSQL($statement) {
			mysql_connect(Config::MySQL_HOST .":". Config::MySQL_PORT, Config::MySQL_USER, Config::MySQL_PASS) or die(
				Error::mysql_connect()
			);
			return mysql_query($statement);
		}
	}