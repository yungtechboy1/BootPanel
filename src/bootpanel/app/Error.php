<?php
	class Error {
		public static function mysql_connect() {
			die('
				<html>
				<head>
					<title>BootPanel | Error</title>
				</head>
				<body>
					<center>
						<h1>Couldn\'t Connect To MySQL Database!</h1><hr>
						<p>
							Check that your MySQL Database is active and that your credentials are correct in the BootPanel Config.
						</p>
					</center>
				</body>
			  </html>
			');
		}
		
		public static function invalid_requirement() {
			die('
				<html>
				<head>
					<title>BootPanel | Error</title>
				</head>
				<body>
					<center>
						<h1>Invalid Plugin Requirement!</h1><hr>
						<p>
							A plugin calls for an invalid requirement and can not be run.
						</p>
					</center>
				</body>
			  </html>
			');
		}
	}