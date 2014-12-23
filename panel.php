<?php
	if(is_file("./BootPanel.phar"))
		require './BootPanel.phar';
	elseif(is_file("./BootPanel/src/bootpanel/BootPanel.php"))
		require './BootPanel/src/bootpanel/BootPanel.php';
	else
		die('<html>
				<head>
					<title>BootPanel | ERROR</title>
				</head>
				<body>
					<center>
						<h3>Couldn\'t Find BootPanel Installation!</h3><hr>
						<p>
							No BootPanel installation was found in "'. __DIR__ .'"!<br>
							Please download one from <a href="http://BootPanel.net/bp/?download">HERE</a> and place it in "'. __DIR__ .'"
						</p>
					</center>
				</body>
			 </html>');