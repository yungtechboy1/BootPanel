<?php
session_start();
ob_start();
	$file = "../" . $_GET['file'];
	if(is_dir($file)) {
		@rmdir($file);
		if(!(file_exists($file))) {
			header("Location: ../?file_deleted");
		} else {
			header("Location: ../?file_not_deleted");
		}
	} else {
		unlink($file);
		if(!(file_exists($file))) {
			header("Location: ../?file_deleted");
		} else {
			header("Location: ../?file_not_deleted");
		}
	}
	
	