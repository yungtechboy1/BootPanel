<?php
	require 'app/Action.php';
	require 'app/Error.php';
	require 'app/Auth.php';

	if(file_exists("./conf/config.php") && is_dir("./themes") && is_dir("./plugins")) {
		require './conf/config.php';
		require './themes/'.Config::BootPanel_Theme."/Theme.php";
		
		Action::createDatabase("BootPanel");
		
		foreach(glob("./plugins/*.php") as $plugin) {
			require $plugin;
			$plugin_class = str_replace("./plugins/", "", str_replace(".php", "", $plugin));
			if(class_exists($plugin_class))
				$plugin_class::onLoad();
		}
		
		if(Auth::isLoggedIn())
			$request = "panel";
		else
			$request = "login";
		
		Theme::onLoad($request);
	} else {
		@mkdir("./plugins");
		@mkdir("./conf");
			copy("phar://./BootPanel.phar/res/conf/config.php", "./conf/config.php");
		@mkdir("./themes") && @mkdir("./themes/default") && @mkdir("./themes/default/bootstrap") && @mkdir("./themes/default/bootstrap/css") && @mkdir("./themes/default/bootstrap/fonts") && @mkdir("./themes/default/bootstrap/js");
			copy("phar://./BootPanel.phar/res/themes/default/Theme.php", "./themes/default/Theme.php");
			copy("phar://./BootPanel.phar/res/themes/default/bootstrap/css/bootstrap-theme.css", "./themes/default/bootstrap/css/bootstrap-theme.css");
			copy("phar://./BootPanel.phar/res/themes/default/bootstrap/css/bootstrap-theme.css.map", "./themes/default/bootstrap/css/bootstrap-theme.css.map");
			copy("phar://./BootPanel.phar/res/themes/default/bootstrap/css/bootstrap-theme.min.css", "./themes/default/bootstrap/css/bootstrap-theme.min.css");
			copy("phar://./BootPanel.phar/res/themes/default/bootstrap/css/bootstrap.css", "./themes/default/bootstrap/css/bootstrap.css");
			copy("phar://./BootPanel.phar/res/themes/default/bootstrap/css/bootstrap.css.map", "./themes/default/bootstrap/css/bootstrap.css.map");
			copy("phar://./BootPanel.phar/res/themes/default/bootstrap/css/bootstrap.min.css", "./themes/default/bootstrap/css/bootstrap.min.css");
			copy("phar://./BootPanel.phar/res/themes/default/bootstrap/fonts/glyphicons-halflings-regular.eot", "./themes/default/bootstrap/fonts/glyphicons-halflings-regular.eot");
			copy("phar://./BootPanel.phar/res/themes/default/bootstrap/fonts/glyphicons-halflings-regular.svg", "./themes/default/bootstrap/fonts/glyphicons-halflings-regular.svg");
			copy("phar://./BootPanel.phar/res/themes/default/bootstrap/fonts/glyphicons-halflings-regular.ttf", "./themes/default/bootstrap/fonts/glyphicons-halflings-regular.ttf");
			copy("phar://./BootPanel.phar/res/themes/default/bootstrap/fonts/glyphicons-halflings-regular.woff", "./themes/default/bootstrap/fonts/glyphicons-halflings-regular.woff");
			copy("phar://./BootPanel.phar/res/themes/default/bootstrap/js/bootstrap.js", "./themes/default/bootstrap/js/bootstrap.js");
			copy("phar://./BootPanel.phar/res/themes/default/bootstrap/js/bootstrap.min.js", "./themes/default/bootstrap/js/bootstrap.min.js");
		header("Location: ./");
	}