<?php
	session_start();
	ob_start();
	
	ini_set("display_errors", true);
	
	require 'lib/api/API.php';
	require 'lib/theme/ThemeLoader.php';
	require 'lib/plugin/PluginLoader.php';
	require 'lib/config/Configuration.php';
	
	require 'lib/Process.php';
	
	class BootPanel {
		const VERSION = "1.1.0";
		const API_VERSION = 0;
		
		public static function __init($bypass_login = false) {
			static $init_called;
			if(!$init_called) {
				if(is_dir("./themes") && is_dir("./plugins")) {
					$init_called = true;
					if($bypass_login)
						BootPanel::getAPI()->getAuth()->doLogin(BootPanel::getConfig("BootPanel")->get("Password"));
					ThemeLoader::loadTheme();
					PluginLoader::loadPlugins();
				} else
					BootPanel::__create();
			}
		}
		
		public static function getAPI() {
			return new API();
		}
		
		public static function getConfig($config) {
			return new Configuration($config);
		}
		
		public static function secure($string) {
			return bin2hex(hash("sha512", $string ."&<421#1$+09=L%acx*", true) ^ hash("whirlpool", "&<421#1$+09=L%acx*". $string, true));
		}
		
		private static function __create() {
			@mkdir("./themes");
			@mkdir("./plugins");
		}
	}