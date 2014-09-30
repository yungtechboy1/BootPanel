<?php 
session_start();
ob_start();
	require 'lib/assets/includes/header.php';
	$combination = "0000";
	
		if(isset($_GET['file_created']) && empty($_GET['file_created'])) {
			echo '<center><p class="alert alert-success">File created successfully!</p></center>';
		}
		
		if(isset($_GET['file_deleted']) && empty($_GET['file_deleted'])) {
			echo '<center><p class="alert alert-success">File deleted successfully!</p></center>';
		}
		
		if(isset($_GET['file_not_deleted']) && empty($_GET['file_not_deleted'])) {
			echo '<center><p class="alert alert-danger">Unable to delete file!</p></center>';
		}
		
		if(isset($_GET['file_error']) && empty($_GET['file_created'])) {
			echo '<center><p class="alert alert-danger">Unable to create file!</p></center>';
		}
		
		if(isset($_GET['file_uploaded']) && empty($_GET['file_created'])) {
			echo '<center><p class="alert alert-success">File uploaded successfully!</p></center>';
		}
		
		if(isset($_GET['file_unzipped']) && empty($_GET['file_created'])) {
			echo '<center><p class="alert alert-success">File uploaded and unzipped successfully!</p></center>';
		}
		
		if(isset($_GET['file_warning']) && empty($_GET['file_created'])) {
			echo '<center><p class="alert alert-warning">File uploaded but was not able to be unzipped!</p></center>';
		}
		
		if(isset($_GET['file_big']) && empty($_GET['file_created'])) {
			echo '<center><p class="alert alert-danger">File is too large!</p></center>';
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
		
		if(isset($_GET['db_created']) && empty($_GET['plugin_removed'])) {
			echo '<center><p class="alert alert-success">Database created successfully!</p></center>';
		}
		
		if($combination == $BootPanel_Combination) {
			Theme::panel();
		} else {
			Theme::login();
		}
		
		foreach(glob("plugins/*.php") as $plugin) {
			require $plugin;
			$class = str_replace("plugins/", "", str_replace(".php", "", $plugin));
			$class::load();
		}
	
	require 'lib/assets/includes/footer.php';