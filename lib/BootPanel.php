<?php
	session_start();
	ob_start();
	
	require 'lib/Config.php';
	require 'lib/theme/ThemeLoader.php';
	require 'lib/auth/Authenticator.php';
	
	require 'lib/Processor.php';
	
	class BootPanel {
		const VERSION = "v1.0.0";
		
		public static function __init() {
			static $init_called = false;
			if(!$init_called) {
				if(is_dir("./plugins") && is_dir("./themes")) {
					if(file_exists("./Configuration.db"))
						Update::installConf();
					else {
						$init_called = true;
						ThemeLoader::loadTheme();
						//PluginLoader::loadPlugins();
					}
				} else
					BootPanel::__create();
			}
		}
		
		public static function getAuthenticator() {
			return new Authenticator();
		}
		
		public static function getConfig() {
			return new Config();
		}
		
		public static function throwError($error) {
			die(require 'lib/error/'. $error .'.html');
		}
		
		public static function secure($string) {
			return bin2hex(hash("sha512", $string."&<421#1$+09=L%acx*", true) ^ hash("whirlpool", "&<421#1$+09=L%acx*".$string, true));
		}
		
		private static function __create() {
			@mkdir("./plugins");
			@mkdir("./themes");
			BootPanel::__init();
		}
	}