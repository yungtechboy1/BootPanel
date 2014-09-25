<?php 
session_start();
ob_start();
	require 'lib/assets/includes/header.php';
	$loggedin = true;
		if(isset($_GET['file_created']) && empty($_GET['file_created'])) {
			echo '<center><p class="alert alert-success">File created successfully!</p></center>';
		}
		
		if(isset($_GET['file_deleted']) && empty($_GET['file_deleted'])) {
			echo '<center><p class="alert alert-success">File deleted successfully!</p></center>';
		}
	
		if(isset($_GET['plugin_failed']) && empty($_GET['plugin_failed'])) {
			echo '<center><p class="alert alert-danger">Unable to install plugin!</p></center>';
		}
		
		if(isset($_GET['plugin_exists']) && empty($_GET['plugin_exists'])) {
			echo '<center><p class="alert alert-warning">Plugin is already installed!</p></center>';
		}
		
		if(isset($_GET['plugin_success']) && empty($_GET['plugin_success'])) {
			echo '<center><p class="alert alert-success">Plugin installed successfully!</p></center>';
		}
		
		if(isset($_GET['plugin_removed']) && empty($_GET['plugin_removed'])) {
			echo '<center><p class="alert alert-success">Plugin removed successfully!</p></center>';
		}
		
		if($loggedin) {
			Theme::panel();
		} else {
			Theme::login();
		}
	
	require 'lib/assets/includes/footer.php';