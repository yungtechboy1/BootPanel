<?php 
session_start();
ob_start();
	require 'lib/assets/includes/header.php';
	$loggedin = true;
	
		if($loggedin) {
			Theme::panel();
		} else {
			Theme::login();
		}
	
	require 'lib/assets/includes/footer.php';