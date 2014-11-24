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
		$res = new Phar("phar://Resources.phar");
		$res->extractTo("./");
		@chmod("../BootPanel", 0777);
		@chmod("./conf", 0777);
		@mkdir("./plugins");
			@chmod("./plugins", 0777);
		@chmod("./themes", 0777) && @chmod("./themes/default", 0777) && @chmod("./themes/default/api", 0777) && @chmod("./themes/default/assets", 0777) && @chmod("./themes/default/assets/img", 0777) && @chmod("./themes/default/assets/ajax", 0777) && @chmod("./themes/default/assets/bootstrap", 0777) && @chmod("./themes/default/assets/bootstrap/css", 0777) && @chmod("./themes/default/assets/bootstrap/fonts", 0777) && @chmod("./themes/default/assets/bootstrap/js", 0777);
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
								BootPanel was not able to install at this time.</br></br>
								If <a href="http://BootPanel.net">BootPanel.net</a> is not available at this time, wait until the website is back up and try installing BootPanel again.
							</p>
						</center>
					</body>
				</html>
			');
	}