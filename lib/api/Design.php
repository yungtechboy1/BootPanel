<?php
	class Design {
		/**
		 * Starts the header tag
		 */
		public static function startHead() {
			echo '<head>';
		}
		
		/**
		 * Sets the browsers title to $title
		 * 
		 * @param Text $title
		 */
		public static function setTitle($title) {
			echo '<title>' . $title . '</title>';
		}
		
		/**
		 * Loads a CSS script from the $theme directory
		 * 
		 * @param Theme $theme
		 * @param File $file
		 */
		public static function loadCSSFromFile($theme, $file) {
			echo '<link href="themes/' . $theme . '/' . $file . '" rel="stylesheet">';
		}
		
		/**
		 * Loads a CSS script from a url
		 * 
		 * @param URL $url
		 */
		public static function loadCSSFromURL($url) {
			echo '<link href="' . $url . '" rel="stylesheet">';
		}
		
		/**
		 * Ends the header tag
		 */
		public static function endHead() {
			echo '</head>';
		}
		
		/**
		 * Starts the body tag
		 */
		public static function startBody() {
			echo '<body>';
		}
		
		/**
		 * Creates a small badge
		 * 
		 * @param Content $badgeContent
		 */
		public static function createBadge($badgeContent) {
			return '<span class="badge">' . $number . '</span>';
		}
		
		/**
		 * Creates a Callout based on its parameters
		 * 
		 * @param Type $type
		 * @param Name $name
		 * @param Content $text
		 */
		public static function addCallout($type, $name, $text) {
			if(strtolower($type) == "default" || strtolower($type) == "primary" || strtolower($type) == "info" || strtolower($type) == "success" || strtolower($type) == "warning" || strtolower($type) == "danger") {
				echo '<div class="bs-callout bs-callout-info">
						<h4>' . $name . '</h4>
							<p>' . $text . '</p>
					  </div>';
			} else {
				echo '<center><p class="alert alert-danger">Unable to find a valid addCallout type!</p></center>';
			}
		}
		
		/**
		 * Renders a Progress Bar with percentage at $percent
		 * 
		 * @param Type $type
		 * @param Numeric $percent
		 * @param Boolean $active (optional)
		 */
		public static function addProgressBar($type, $percent, $active = false) {
			if($active) {
				if(strtolower($type) == "primary" || strtolower($type) == "info" || strtolower($type) == "success" || strtolower($type) == "warning" || strtolower($type) == "danger") {
					if(is_numeric($percent) && $percent <= 100 && $percent >= 0) {
						echo '<div class="progress">
								<div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="' . $percent . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $percent . '%">
									<span class="sr-only">' . $percent . '% Complete</span>
									' . $percent . '%
								</div>
							  </div>';	
					} else {
						echo '<center><p class="alert alert-warning">The second parameter of addProgressBar expects to be between 0 and 100!</p></center>';
					}
				} else {
					echo '<center><p class="alert alert-danger">Unable to find a valid addProgressBar type!</p></center>';
				}
			} else {
				if(strtolower($type) == "primary" || strtolower($type) == "info" || strtolower($type) == "success" || strtolower($type) == "warning" || strtolower($type) == "danger") {
					if(is_numeric($percent) && $percent <= 100 && $percent >= 0) {
						echo '<div class="progress">
								<div class="progress-bar progress-bar"  role="progressbar" aria-valuenow="' . $percent . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $percent . '%">
									<span class="sr-only">' . $percent . '% Complete</span>
									' . $percent . '%
								</div>
							  </div>';
					} else {
						echo '<center><p class="alert alert-warning">The second parameter of addProgressBar expects to be between 0 and 100!</p></center>';
					}
				} else {
					echo '<center><p class="alert alert-danger">Unable to find a valid addProgressBar type!</p></center>';
				}
			}
		}
		
		/**
		 * Shows a Glyphicon
		 * 
		 * @param Glyphicon $glyphicon
		 */
		public static function useGlyphicon($glyphicon) {
			return '<span class="' . $glyphicon . '"></span>';
		}
		
		public static function startCenter() {
			echo '<center>';
		}
		
		public static function endCenter() {
			echo '</center>';
		}
		
		/**
		 * Ends the body tag
		 */
		public static function endBody() {
			echo '</body>';
		}
		
		/**
		 * Starts the footer tag
		 */
		public static function startFoot() {
			echo '<footer>';
		}
		
		/**
		 * Sets the footer text to $text
		 * 
		 * @param Text $text
		 */
		public static function setTag($text) {
			echo '<div class="footer">
					<div class="container">
						<p class="text-muted" align="right">' . $text . '</p>
					</div>
				  </div>';
		}
		
		/**
		 * Loads JavaScript file from the $theme directory 
		 * 
		 * @param Theme $theme
		 * @param File $file
		 */
		public static function loadJSFromFile($theme, $file) {
			echo '<script src="themes/' . $theme . '/' . $file . '"></script>';
		}
		
		/**
		 * Loads JavaScript from $url
		 * 
		 * @param URL $url
		 */
		public static function loadJSFromURL($url) {
			echo '<script src="' . $url . '"></script>';
		}
		
		/**
		 * Ends the footer tag
		 */
		public static function endFoot() {
			echo '</footer>';
		}
	}