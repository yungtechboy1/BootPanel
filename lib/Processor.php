<?php
	if(isset($_POST['password']) && !empty($_POST['password']))
		Authenticator::doLogin(BootPanel::secure($_POST['password']));
	
	if(isset($_GET['logout'])) {
		session_destroy();
		header("Location: ./");
	}