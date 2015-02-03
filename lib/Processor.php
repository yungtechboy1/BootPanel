<?php
	if(isset($_POST['password']) && !empty($_POST['password']))
		Authenticator::doLogin(BootPanel::secure($_POST['password']));
	
	if(isset($_GET['logout'])) {
		session_destroy();
		header("Location: ./");
	}
	
	if(isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['conf_new_password']) && !empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['conf_new_password'])) {
		if(BootPanel::getConfig()->get("Password") == BootPanel::secure($_POST['old_password']) && $_POST['new_password'] == $_POST['conf_new_password'])
			BootPanel::getAuthenticator()->changePass(BootPanel::secure($_POST['new_password']));
		header("Location: ./");
	}