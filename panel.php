<?php 
session_start();
ob_start();
	require 'lib/assets/includes/header.php';
	$combination = "0000"; //DO NOT CHANGE THIS!!!
		
		foreach(glob("plugins/*.php") as $plugin) {
			require $plugin;
			$class = str_replace("plugins/", "", str_replace(".php", "", $plugin));
			$class::load();
		}
		
		if($combination == $BootPanel_Combination) {
			Theme::panel();
		} else {
			Theme::login();
		}
	
	require 'lib/assets/includes/footer.php';