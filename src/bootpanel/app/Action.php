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
		public static function uploadFile($file, $unzip, $location = null) {
			$zip = new ZipArchive();
			$allowedExts = array("zip", "Zip", "ZIp", "ZIP", "zIP", "ziP", "zIp", "ZiP");
			$temp = explode(".", $_FILES["file"]["name"]);
			$unzip = $_POST['unzip'];
			$extension = end($temp);
			if(($_FILES["file"]["size"] < 20000000)) {
				if($_FILES["file"]["error"] > 0)
					return false;
				else {
					if(file_exists("../" . $_FILES["file"]["name"]))
						return false;
					else {
						if($unzip) {
							if(in_array($extension, $allowedExts)) {
								move_uploaded_file($_FILES["file"]["tmp_name"], "../" . $_FILES["file"]["name"]);
								$zip->open("../" . $_FILES["file"]["name"]);
								$zip->extractTo("../");
								$zip->close();
								@unlink($_FILES["file"]["name"] . $extension);
								return true;
							} else {
								move_uploaded_file($_FILES["file"]["tmp_name"], "../" . $_FILES["file"]["name"]);
								return true;
							}
						} else
							move_uploaded_file($_FILES["file"]["tmp_name"], "../" . $_FILES["file"]["name"]);
						return true;
					}
				}
			} else
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
			if(is_dir($file))
				@rmdir($file);
			else
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
			$allowedExts = array("php", "Php", "PHp", "PHP", "pHP", "phP");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			if(($_FILES["file"]["size"] < 20000000) && in_array($extension, $allowedExts)) {
				if($_FILES["file"]["error"] > 0)
					return false;
				else {
					if(file_exists("./plugins/" . $_FILES["file"]["name"]))
						return false;
					else {
						move_uploaded_file($_FILES["file"]["tmp_name"], "./plugins/" . $_FILES["file"]["name"]);
						return true;
					}
				}
			} else
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
				Error::ec_2874()
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
				Error::ec_2874()
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
				Error::ec_2874()
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
				Error::ec_2874()
			);
			mysql_query($statement);
		}
	}