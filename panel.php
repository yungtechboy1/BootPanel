<?php
	session_start();
	ob_start();

	//PHP Configuration Hacks
	ini_set("display_errors", false);
	ini_set("allow_url_fopen", true);
	
	//Download The BootPanel PHAR From BootPanel.net
	if(isset($_GET['install']) && empty($_GET['install'])) {
		if(!ini_get('allow_url_fopen'))
			die('
				<html>
					<head>
						<title>BootPanel | Error</title>
					</head>
					<body>
						<center>
							<h1>Can\'t Automatically Download BootPanel</h1><hr>
							<p>
								Your server is not compatible with the BootPanel auto-install.</br>
								Please contact your system/server admin or manually install the most recent BootPanel update.
							</p>
						</center>
					</body>
				</html>
			');
		$data = file_get_contents("http://BootPanel.net/download/file/BootPanel.phar");
		$handle = fopen("./BootPanel.phar", "w");
		fwrite($handle, $data);
		fclose($handle);
		if(!file_exists("./BootPanel.phar"))
			die('
				<html>
					<head>
						<title>BootPanel | Error</title>
					</head>
					<body>
						<center>
							<h1>Unable To Install BootPanel</h1><hr>
							<p>
								BootPanel was unable to auto-install at this time.</br></br>
								If <a href="http://BootPanel.net">BootPanel.net</a> is not available at this time, wait until the website is back up and try installing BootPanel again.
							</p>
						</center>
					</body>
				</html>
			');
	}
	
	if(file_exists("./BootPanel.phar"))
		require 'phar://BootPanel.phar/src/bootpanel/BootPanel.php';
	else
		die('
				<html>
					<head>
						<title>BootPanel | Error</title>
					</head>
					<body>
						<center>
							<h1>Couldn\'t Find BootPanel Installation</h1><hr>
							<p>
								No BootPanel installation was found in "'. __DIR__ .'"</br>
								Would you like to <a href="./?install">Install</a> now?
							</p>
						</center>
					</body>
				</html>
			');
