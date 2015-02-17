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
		header('Location: http://error.BootPanel.net/no-installation');