<?php
session_start();
ob_start();

	$filename = $_POST['filename'];
	$content = $_POST['content'];
	$newFile = fopen("../".$filename, "w") or die("Failed to create file!");
	$txt = $content . "\n";
	fwrite($newFile, $txt);
	fclose($newFile);
	rename("../$filename", "../../$filename");
	header("Location: ../?file_created");
	