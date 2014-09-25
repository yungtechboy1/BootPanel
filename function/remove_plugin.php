<?php
session_start();
ob_start();
	$plugin = "../" . $_GET['plugin'];
	unlink($plugin);
	header("Location: ../?plugin_removed");