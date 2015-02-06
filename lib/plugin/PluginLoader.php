<?php
	require 'lib/plugin/Plugin.php';

	class PluginLoader {
		public static function loadPlugins() {
			static $loadPlugins_called;
			if(!$loadPlugins_called)
				foreach(glob("./plugins/*.php") as $plugin) {
					require $plugin;
					$plugin = str_replace("./plugins/", null, str_replace(".php", null, $plugin));
					if(class_exists($plugin))
						$plugin = new $plugin();
						if(in_array("Plugin", class_implements($plugin))) {
								$plugin->onLoad();
						}
				}
		}
	}