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
						<h1>Couldn\'t Connect To MySQL Database</h1><hr>
						<p>
							Check that your MySQL Database is active and that your credentials are correct in the BootPanel Config.
						</p>
					</center>
				</body>
			  </html>
			');
		}
	}