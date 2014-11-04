<?php
	class Design {
		public static function registerAPI($file) {
			require './themes/'. Config::BootPanel_Theme .'/'. $file;
		}
		
		public static function startHead() {
			echo '<!DOCTYPE html>
				  <html lang="en">
					<head>
						<meta charset="utf-8">
    					<meta http-equiv="X-UA-Compatible" content="IE=edge">
    					<meta name="viewport" content="width=device-width, initial-scale=1">';
		}
		
		public static function setIcon($icon) {
			echo '		<link rel="icon" href="./themes/'. Config::BootPanel_Theme .'/'. $icon .'">';
		}
		
		public static function setTitle($title) {
			echo '		<title>'. $title .'</title>';
		}
		
		public static function setDesc($description) {
			echo '		<meta name="description" content="'. $description .'">';
		}
		
		public static function setAuthor($author) {
			echo '		<meta name="author" content="'. $author .'">';
		}
		
		public static function loadCSS($file) {
			echo '		<link href="./themes/'. Config::BootPanel_Theme .'/'. $file .'" rel="stylesheet">';
		}
		
		public static function endHead() {
			echo '	</head>
					<body>';
		}
		
		public static function startFooter() {
			echo '	</body>
					<footer>';
		}
		
		public static function loadJS($file) {
			echo '		<script src="./themes/'. Config::BootPanel_Theme .'/'. $file .'"></script>';
		}
		
		public static function loadJSFromURL($url) {
			echo '		<script src="'. $url .'"></script>';
		}
		
		public static function setCopyright($content, $class = null, $other = null) {
			echo '		<p class="'. $class .'" '. $other .'>'. $content .'</p>';
		}
		
		public static function endFooter() {
			echo '	</footer>
				  </html>';
		}
	}