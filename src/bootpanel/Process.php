<?php
	if(isset($_POST['password']) && !empty($_POST['password'])) {
		$password = md5($_POST['password']);
		Auth::login($password);
	}

	if(isset($_GET['logout']) && empty($_GET['logout'])) {
		if(Auth::isLoggedIn())
			Auth::logout();
		header("Location: ./");
	}
	
	if(isset($_GET['upload']) && empty($_GET['upload'])) {
		$file = $_POST['file'];
		$unzip = $_POST['unzip'];
		Action::uploadFile($file, $unzip);
		header("Location: ./");
	}
	
	if(isset($_GET['delete_file']) && !empty($_GET['delete_file'])) {
		$file = $_GET['delete_file'];
		Action::deleteFile($file);
		header("Location: ./");
	}