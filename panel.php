<?php 
session_start();
ob_start();
	require 'lib/assets/includes/header.php';

		Theme::create();
	
	require 'lib/assets/includes/footer.php';