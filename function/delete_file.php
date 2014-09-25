<?php
session_start();
ob_start();
	$file = "../" . $_GET['file'];
	if(is_dir($file)) {
		@rmdir($file);
	} else {
		unlink($file);
	}
	header("Location: ../?file_deleted");