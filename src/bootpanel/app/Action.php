<?php
	class Action {
		/**
		 * Adds a plugin to the server
		 * 
		 * Returns true if file added
		 * Returns false if failure
		 * 
		 * @param File $file
		 * @param Location $location
		 * @return boolean
		 */
		public static function uploadFile($file, $location = null) {
			return false;
		}
		
		/**
		 * Deletes a server file
		 * 
		 * Returns true if deleted
		 * Returns false if failure
		 * 
		 * @param File $file
		 * @return boolean
		 */
		public static function deleteFile($file) {
			@unlink("./".$file);
			if(!file_exists("./".$file))
				return true;
			else
				return false;
		}
		
		/**
		 * Installs a BootPanel plugin
		 * 
		 * Returns true if installed
		 * Returns false if failure
		 * 
		 * @param File $pluginFile
		 * @return boolean
		 */
		public static function addPlugin($pluginFile) {
			return false;
		}
		
		/**
		 * Deletes a BootPanel plugin
		 * 
		 * Returns true if deleted
		 * Returns false if failure
		 * 
		 * @param Plugin $plugin
		 * @return boolean
		 */
		public static function deletePlugin($plugin) {
			@unlink("./plugins/".$plugin.".php");
			if(!file_exists("./plugins/".$plugin.".php"))
				return true;
			else
				return false;
		}
		
		/**
		 * Checks if a database exists
		 * 
		 * Returns true if database exists
		 * Returns false if database could not be found
		 * 
		 * @param Database $db
		 * @return boolean
		 */
		public static function databaseExists($db) {
			mysql_connect(Config::MySQL_HOST .":". Config::MySQL_PORT, Config::MySQL_USER, Config::MySQL_PASS) or die(
				Error::mysql_connect()
			);
			if(mysql_select_db($db))
				return true;
			else
				return false;
		}
		
		/**
		 * Creates a database
		 * 
		 * Returns true if database now exists
		 * Returns false if failure
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
			} else
				return true;
		}
		
		/**
		 * Deletes a database
		 * 
		 * Returns true if database no longer exists
		 * Returns false if failure
		 * 
		 * @param Database $db
		 * @return boolean
		 */
		public static function deleteDatabase($db) {
			mysql_connect(Config::MySQL_HOST .":". Config::MySQL_PORT, Config::MySQL_USER, Config::MySQL_PASS) or die(
				Error::mysql_connect()
			);
			if(Action::databaseExists($db)) {
				mysql_query("DROP DATABASE $db");
				if(Action::databaseExists($db))
					return true;
				else
					return false;
			} else
				return true;
		}
		
		/**
		 * Executes a MySQL Statement/Command
		 * 
		 * Returns data sent back from MySQL Server
		 * 
		 * @param Statement $statement
		 */
		public static function executeSQL($statement) {
			mysql_connect(Config::MySQL_HOST .":". Config::MySQL_PORT, Config::MySQL_USER, Config::MySQL_PASS) or die(
				Error::mysql_connect()
			);
			return mysql_query($statement);
		}
	}