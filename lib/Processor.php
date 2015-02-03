<?php
	if(isset($_SESSION['password']))
		Authenticator::doLogin();
	
	if(isset($_GET['logout']))
		if(BootPanel::getAuthenticator()->isLoggedIn()) {
			session_destroy();
			header("Location: ./");
		}