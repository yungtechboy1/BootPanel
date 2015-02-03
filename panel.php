<?php
	if(file_exists("./lib/BootPanel.php")) {
		require './lib/BootPanel.php';
		BootPanel::__init();
	} elseif(file_exists('./BootPanel.phar')) {
		$package = new Phar("./BootPanel.phar");
		$package->extractTo("./");
	} else
		die('<html>
				<head>
					<title>BootPanel | ERROR</title>
				</head>
				<body>
					<center>
						<h1>No BootPanel Installation Found!</h1><hr>
						No \'BootPanel.phar\' file could be found in \''. __DIR__ . DIRECTORY_SEPARATOR .'\'!<br>
						Please upload a \'BootPanel.phar\' file to your BootPanel Directory (Shown Above) and try again.
					</center>
				</body>
			 </html>');