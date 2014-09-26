<?php
session_start();
ob_start();

$zip = new ZipArchive();

$allowedExts = array("zip", "Zip", "ZIp", "ZIP", "zIP", "ziP", "zIp", "ZiP");
$temp = explode(".", $_FILES["file"]["name"]);
$unzip = $_POST['unzip'];
$extension = end($temp);

if (($_FILES["file"]["size"] < 20000000)) {
	if ($_FILES["file"]["error"] > 0) {
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	} else {
		echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		echo "Type: " . $_FILES["file"]["type"] . "<br>";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
		if (file_exists("../" . $_FILES["file"]["name"])) {
			echo $_FILES["file"]["name"] . " already exists. ";
		} else {
			if($unzip) {
				if(in_array($extension, $allowedExts)) {
					move_uploaded_file($_FILES["file"]["tmp_name"], "../../" . $_FILES["file"]["name"]);
					$zip->open("../../" . $_FILES["file"]["name"]);
					$zip->extractTo("../../");
					$zip->close();
					@unlink($_FILES["file"]["name"] . $extension);
					header("Location: ../?file_unzipped");
					return;
				} else {
					echo 'Invalid ZIP file!';
					move_uploaded_file($_FILES["file"]["tmp_name"], "../../" . $_FILES["file"]["name"]);
					header("Location: ../?file_warning");
				}
			} else {
				move_uploaded_file($_FILES["file"]["tmp_name"], "../../" . $_FILES["file"]["name"]);
			}
			echo "Stored: " . $_FILES["file"]["name"];
			header("Location: ../?file_uploaded");
		}
	}
} else {
	echo "Invalid file!";
	header("Location: ../?file_big");
}