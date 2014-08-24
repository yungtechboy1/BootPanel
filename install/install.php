<?php
session_start();
ob_start();

include_once '../assets/includes/header.php';

if(isset($_GET['step1']) && empty($_GET['step1'])) {
	$version = version_compare(phpversion(),  "5.4.1");
	if($version == "-1") {
		echo "<center>
				<div class='container'>
					</br></br></br></br></br></br></br></br></br></br></br>
					<p class='alert alert-warning'>Your PHP Version is too low!</p></br></br>
					<a class='btn btn-lg btn-warning btn-block' href='install.php?step1'>Recheck</a>
				</div>
			  <center>";
	} else {
		echo "<center>
				<div class='container'>
					</br></br></br></br></br></br></br></br></br></br></br>
					<p class='alert alert-success'>Your PHP Version meets requirements!</p></br></br>
					<a class='btn btn-lg btn-success btn-block' href='install.php?step2'>Continue</a>
				</div>
			  <center>";
	}
}elseif(isset($_GET['step2']) && empty($_GET['step2'])) {
	$writable = is_writable('../../bootpanel/');
	if(!$writable) {
		echo "<center>
				<div class='container'>
					</br></br></br></br></br></br></br></br></br></br></br>
					<p class='alert alert-danger'>The BootPanel Directory cannot be written!</p></br></br>
					<a class='btn btn-lg btn-warning btn-block' href='install.php?step2'>Recheck</a>
				</div>
			  <center>";
	} else {
		echo "<center>
				<div class='container'>
					</br></br></br></br></br></br></br></br></br></br></br>
					<p class='alert alert-success'>BootPanel can write to itself!</p></br></br>
					<a class='btn btn-lg btn-success btn-block' href='install.php?step3'>Continue</a>
				</div>
			  <center>";
	}
}elseif(isset($_GET['step3']) && empty($_GET['step3'])) {
	
}

include_once '../assets/includes/footer.php';
?>