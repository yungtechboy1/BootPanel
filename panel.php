<?php
	session_start();
	ob_start();

	if(isset($_GET['install']) && empty($_GET['install'])) {
		if(!ini_get('allow_url_fopen')) {
			ini_set('allow_url_fopen', true);
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
			}
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
								There was an issue while downloading BootPanel.</br>
								Please try again later.  If the error persists, please report the issue.
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
