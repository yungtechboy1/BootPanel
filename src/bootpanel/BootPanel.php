<?php
	require 'Variable.php';
	require 'app/Action.php';
	require 'app/Auth.php';
	require 'app/Design.php';
	require 'app/Error.php';
	require 'app/Plugin.php';
	require 'app/Statistics.php';

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
		
		require 'Process.php';
		
		if(Auth::isLoggedIn())
			$request = "panel";
		else
			$request = "login";
		
		Theme::onLoad($request);
	} else {
		$res = new Phar("phar://./BootPanel.phar/res/Resources.phar");
		$res->extractTo("./");
		//@chmod("../BootPanel", 0777);
		@mkdir("./plugins");
			@chmod("./plugins", 0777);
		//@mkdir("./conf");
			//@chmod("./conf", 0777);
			//copy("./phar://./BootPanel.phar/res/conf/config.php", "./conf/config.php");
		//@mkdir("./themes") && @mkdir("./themes/default") && @mkdir("./themes/default/api") && @mkdir("./themes/default/assets") && @mkdir("./themes/default/assets/img") && @mkdir("./themes/default/assets/ajax") && @mkdir("./themes/default/assets/bootstrap") && @mkdir("./themes/default/assets/bootstrap/css") && @mkdir("./themes/default/assets/bootstrap/fonts") && @mkdir("./themes/default/assets/bootstrap/js");
		//@chmod("./themes", 0777) && @chmod("./themes/default", 0777) && @chmod("./themes/default/api", 0777) && @chmod("./themes/default/assets", 0777) && @chmod("./themes/default/assets/img", 0777) && @chmod("./themes/default/assets/ajax", 0777) && @chmod("./themes/default/assets/bootstrap", 0777) && @chmod("./themes/default/assets/bootstrap/css", 0777) && @chmod("./themes/default/assets/bootstrap/fonts", 0777) && @chmod("./themes/default/assets/bootstrap/js", 0777);
			//copy("./phar://./BootPanel.phar/res/themes/default/Theme.php", "./themes/default/Theme.php");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/img/favicon.ico", "./themes/default/assets/img/favicon.ico");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/ajax/jquery.min.js", "./themes/default/assets/ajax/jquery.min.js");
			//copy("./phar://./BootPanel.phar/res/themes/default/api/Panel.php", "./themes/default/api/Panel.php");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/css/bootstrap-theme.css", "./themes/default/assets/bootstrap/css/bootstrap-theme.css");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/css/bootstrap-theme.css", "./themes/default/assets/bootstrap/css/bootstrap-theme.css");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/css/bootstrap-theme.css.map", "./themes/default/assets/bootstrap/css/bootstrap-theme.css.map");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/css/bootstrap-theme.min.css", "./themes/default/assets/bootstrap/css/bootstrap-theme.min.css");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/css/bootstrap.css", "./themes/default/assets/bootstrap/css/bootstrap.css");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/css/bootstrap.css.map", "./themes/default/assets/bootstrap/css/bootstrap.css.map");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/css/bootstrap.min.css", "./themes/default/assets/bootstrap/css/bootstrap.min.css");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/fonts/glyphicons-halflings-regular.eot", "./themes/default/assets/bootstrap/fonts/glyphicons-halflings-regular.eot");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/fonts/glyphicons-halflings-regular.svg", "./themes/default/assets/bootstrap/fonts/glyphicons-halflings-regular.svg");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/fonts/glyphicons-halflings-regular.ttf", "./themes/default/assets/bootstrap/fonts/glyphicons-halflings-regular.ttf");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/fonts/glyphicons-halflings-regular.woff", "./themes/default/assets/bootstrap/fonts/glyphicons-halflings-regular.woff");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/js/bootstrap.js", "./themes/default/assets/bootstrap/js/bootstrap.js");
			//copy("./phar://./BootPanel.phar/res/themes/default/assets/bootstrap/js/bootstrap.min.js", "./themes/default/assets/bootstrap/js/bootstrap.min.js");
		if(file_exists("./conf/config.php") && is_dir("./themes") && is_dir("./plugins"))
			die('
				<html>
					<head>
						<title>BootPanel | Installed</title>
					</head>
					<body>
						<center>
							<h1>BootPanel Install Complete</h1><hr>
							<p>
								BootPanel was correctly installed.</br>
								Please refresh the page to begin.
							</p>
						</center>
					</body>
				</html>
			');
		else
			die('
				<html>
					<head>
						<title>BootPanel | Error</title>
					</head>
					<body>
						<center>
							<h1>BootPanel Install Issue</h1><hr>
							<p>
								BootPanel could not be installed.</br>
								Please be sure that the following directories have permission 0777:</br>
									- '. __DIR__ .'</br>
									- '. __DIR__ .'/conf</br>
									- '. __DIR__ .'/plugins</br>
									- '. __DIR__ .'/themes</br>
							</p>
						</center>
					</body>
				</html>
			');
	}