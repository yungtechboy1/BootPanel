<?php
session_start();
ob_start();

	$location = $_POST['location'];
	$filename = $_POST['filename'];
	$content = $_POST['content'];
	if($location == null) {
		$newFile = fopen("../../" . $filename, "w") or die(header("Location: ../?file_error"));
		$txt = $content . "\n";
		fwrite($newFile, $txt);
		fclose($newFile);
		header("Location: ../?file_created");
	} else {
		mkdir("../../" . $location);
		$newFile = fopen("../../" . $location . "/" . $filename, "w") or die(header("Location: ../?file_error"));
		$txt = $content . "\n";
		fwrite($newFile, $txt);
		fclose($newFile);
		header("Location: ../?file_created");
	}
	