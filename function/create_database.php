<?php
session_start();
ob_start();
	$dbhost = $_POST['host'];
	$dbuser = $_POST['user'];
	$dbpass = $_POST['pass'];
	$db = $_POST['db'];
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(!$conn)
		die('Could not connect: ' . mysql_error());
	echo 'Connected successfully!';
	$sql = 'CREATE Database ' . $db;
	$retval = mysql_query($sql, $conn);
	if(!$retval)
		die('Could not create database: ' . mysql_error());
	echo 'Database ' . $db . ' created successfully!';
	mysql_close($conn);
	echo $dbhost . " " . $dbuser . " " . $dbpass . " " . $db;
	header("Location: ../?db_created");