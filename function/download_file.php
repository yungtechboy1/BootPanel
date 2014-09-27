<?php
session_start();
ob_start();

	$file = $_GET['file'];
	$zipfile = $file . '.zip';
	if(is_dir($file)) {
		$zip = new ZipArchive();
		$zip->open($zipfile, ZipArchive::CREATE);
		$zip->addFile($file);
		$zip->close();
		header('Content-disposition: attachment; filename="' . $zipfile . '"');
		header("Content-type: application/zip");
		readfile($zipfile);
	} else {
		header('Content-disposition: attachment; filename="' . $file . '"');
		readfile($file);
	}
	//header("Location: ../");
	