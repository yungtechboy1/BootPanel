<?php
	$bypass_login = false;

	if(file_exists("./lib/BootPanel.php")) {
		require './lib/BootPanel.php';
		BootPanel::__init($bypass_login);
	} elseif(file_exists('./BootPanel.phar')) {
		$package = new Phar("./BootPanel.phar");
		$package->extractTo("./");
		@unlink("./BootPanel.phar");
		header("Location: ./");
	} else
		die('<html>
				<head>
					<title>BootPanel | ERROR</title>
				</head>
				<body>
					<center>
						<h1>No BootPanel Installation Found!</h1><hr>
						No \'BootPanel.phar\' file could be found in \''. __DIR__ . DIRECTORY_SEPARATOR .'\'!<br>
						Please upload a \'BootPanel.phar\' file to your BootPanel Directory (Shown Above) and try again.<br><br>
						Download the most recent \'BootPanel.phar\' file <a target="_blank" href="http://download.BootPanel.net/BootPanel.phar">HERE</a>
					</center>
				</body>
			 </html>');