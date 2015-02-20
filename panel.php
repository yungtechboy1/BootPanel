<?php
	$bypass_login = false;
	$demo_mode = true;

	if(file_exists('./lib/BootPanel.php')) {
		require './lib/BootPanel.php';
		BootPanel::__init($bypass_login, $demo_mode);
	} elseif(file_exists('./BootPanel.phar')) {
		$package = new Phar('./BootPanel.phar');
		$package->extractTo('./');
		@unlink('./BootPanel.phar');
		header('Location: ./');
	} else
		header('Location: http://error.BootPanel.net/no-installation');