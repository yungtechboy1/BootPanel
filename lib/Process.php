<?php
	//Process Login
	if(isset($_POST['bootpanel_user']) && isset($_POST['bootpanel_password'])) {
		BootPanel::getAPI()->getAuth()->doLogin($_POST['bootpanel_user'], BootPanel::secure($_POST['bootpanel_password']));
		header("Location: ./");
	}
	
	//Logout of BootPanel
	if(isset($_GET['logout'])) {
		if(BootPanel::getAPI()->getAuth()->isLoggedIn())
			BootPanel::getAPI()->getAuth()->logout();
		header("Location: ./");
	}
	
	//Change Password
	if(isset($_POST['new_password']) && isset($_POST['confirm_new_password'])) {
		if(BootPanel::getAPI()->getAuth()->isLoggedIn())
			if($_POST['new_password'] == $_POST['confirm_new_password']) {
				BootPanel::getAPI()->getAuth()->changePass(BootPanel::getConfig("BootPanel"), BootPanel::secure($_POST['new_password']));
			}
		header("Location: ./");
	}