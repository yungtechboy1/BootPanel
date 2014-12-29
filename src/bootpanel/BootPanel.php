<?php
	session_start();
	ob_start();
	
	ini_set("display_errors", true);
	set_time_limit(0);
	
	BootPanel::init();
	
	class BootPanel {
		const VERSION = "1.5.1dev";
		
		public static function init() {
			static $init_called = false;
			if(!$init_called) {
				if(is_file("./conf/config.php") && is_dir("./plugins")) {
					$init_called = true;
					BootPanel::grabRes();
					require 'src/bootpanel/Process.php';
					foreach(glob("./plugins/*.php") as $plugin) {
						require $plugin;
						$plugin = str_replace("./plugins/", null, str_replace(".php", null, $plugin));
						if(class_exists($plugin)) {
							$plugin = new $plugin;
							$plugin->onLoad();
						}
					}
					require './themes/'. Config::BootPanel_THEME .'/Theme.php';
				} else
					BootPanel::create();
			} else
				BootPanel::throwError("BootPanel can not be initialized more than once!");
		}
		
		public static function getAuthClient() {
			return new Auth();
		}
		
		public static function getBPService() {
			return new BPService();
		}
		
		public static function getStatisticsClient() {
			return new Stat();
		}
		
		public static function getFileManager() {
			return new File();
		}
		
		public static function getConfig() {
			return new Config();
		}
		
		public static function getUIManager() {
			return new UIManager();
		}
		
		public static function throwError($message) {
			echo '<b>BootPanel Error:</b> '. $message;
		}
		
		private static function grabRes() {
			require './conf/config.php';
			require 'src/bootpanel/UIManager.php';
			require 'src/bootpanel/client/Auth.php';
			require 'src/bootpanel/client/Stat.php';
			require 'src/bootpanel/mgr/File.php';
			require 'src/bootpanel/BPService.php';
		}
		
		public static function ping($host, $port = 80, $timeout = 6) {
			$sock = @fsockopen($host, $port, $errno, $errstr, $timeout);
			if(!$sock)
				return false;
			return true;
		}
		
		private static function create() {
			$Phar = new Phar("src/res/Resources.phar");
			if(!is_file("./conf/config.php"))
				$Phar->extractTo("./");
			@mkdir("./plugins");
			BootPanel::init();
		}
	}
	
	__HALT_COMPILER();