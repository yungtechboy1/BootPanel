<?php
	class Design {
		
		/**
		 * Header API
		 */
		public static function startHead() {
			echo '<head>';
		}
		
		public static function setTitle($title) {
			echo '<title>' . $title . '</title>';
		}
		
		public static function loadCSSFromFile($theme, $file) {
			echo '<link href="themes/' . $theme . '/' . $file . '" rel="stylesheet">';
		}
		
		public static function loadCSSFromURL($url) {
			echo '<link href="' . $url . '" rel="stylesheet">';
		}
		
		public static function endHead() {
			echo '</head>';
		}
		
		/**
		 * Body API
		 */
		public static function startBody() {
			echo '<body>';
		}
		
		public static function endBody() {
			echo '</body>';
		}
		
		/**
		 * Footer API
		 */
		public static function startFoot() {
			echo '<footer>';
		}
		
		public static function setTag($text) {
			echo '<div class="footer">
					<div class="container">
						<p class="text-muted" align="right">' . $text . '</p>
					</div>
				  </div>';
		}
		
		public static function loadJSFromFile($theme, $file) {
			echo '<script src="themes/' . $theme . '/' . $file . '"></script>';
		}
		
		public static function loadJSFromURL($url) {
			echo '<script src="' . $url . '"></script>';
		}
		
		public static function endFoot() {
			echo '</footer>';
		}
	}