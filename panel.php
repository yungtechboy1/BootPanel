<?php
	session_start();
	ob_start();

	if(isset($_GET['install']) && empty($_GET['install']))
		copy("http://BootPanel.net/download/file/BootPanel.phar", "./") && header("Location: ./");
	if(file_exists("./BootPanel.phar"))
		require 'phar://BootPanel.phar/src/bootpanel/BootPanel.php';
	else
		echo '<html>
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
			  </html>';
