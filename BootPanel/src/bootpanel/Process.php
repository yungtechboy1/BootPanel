<?php
	if(isset($_POST['login_password']))
		BootPanel::getAuthClient()->doLogin($_POST['login_password']);
	
	if(isset($_GET['logout']) && empty($_GET['logout'])) {
		BootPanel::getAuthClient()->logout();
		header("Location: ./");
	}
	
	if(isset($_GET['rmfile']) && !empty($_GET['rmfile'])) {
		if(BootPanel::getAuthClient()->isLoggedIn()) {
			$file = $_GET['rmfile'];
			BootPanel::getFileManager()->delete($file);
			header("Location: ./");
		}
	}