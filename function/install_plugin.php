<?php
session_start();
ob_start();

$allowedExts = array("php", "Php", "PHp", "PHP", "pHp", "phP");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if (($_FILES["file"]["size"] < 20000) && in_array($extension, $allowedExts)) {
	if ($_FILES["file"]["error"] > 0) {
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	} else {
		echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		echo "Type: " . $_FILES["file"]["type"] . "<br>";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
		if (file_exists("../plugins/" . $_FILES["file"]["name"])) {
			echo $_FILES["file"]["name"] . " already exists. ";
			header("Location: ../?plugin_exists");
		} else {
			move_uploaded_file($_FILES["file"]["tmp_name"], "../plugins/" . $_FILES["file"]["name"]);
			echo "Plugin: " . $_FILES["file"]["name"] . " Installed!";
			header("Location: ../?plugin_success");
		}
	}
} else {
	echo "BootPanel only supports plugins written in PHP!";
	header("Location: ../?plugin_failed");
}