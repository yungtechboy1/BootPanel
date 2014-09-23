<?php
	class Panel {
		public static function startLayout() {
			echo '<div class="container">
					</br>';
		}
		
		public static function addAlert($type, $text) {
			if(strtolower($type) == "default" || strtolower($type) == "primary" || strtolower($type) == "info" || strtolower($type) == "success" || strtolower($type) == "warning" || strtolower($type) == "danger"){
				echo '<center><p class="alert alert-' . $type . '">' . $text . '</p></center>';
			} else {
				echo '<center><h1 class="alert alert-danger">Unable to find a valid addAlert type!</h1></center>';
			}
		}
		
		public static function createBadge($number) {
			echo '<span class="badge">' . $number . '</span>';
		}
		
		public static function startPanel($type, $name) {
			if(strtolower($type) == "default" || strtolower($type) == "primary" || strtolower($type) == "success" || strtolower($type) == "info" || strtolower($type) == "warning" || strtolower($type) == "danger") {
				echo '<div class="panel panel-' . $type . '">
						<div class="panel-heading">
							<div class="panel-title"><h3>' . $name . '</h3></div>
						</div>
					  	<div class="panel-body">';
			} else {
				echo '<center><p class="alert alert-danger">Unable to find a valid startPanel type!</p></center>';
			}
		}
		
		public static function endPanel() {
			echo '	</div>
				  </div>
				  </br>';
		}
		
		public static function loadFileMgr() {
				
		}
		
		public static function loadMailMgr() {
				
		}
		
		public static function loadSQLMgr() {
				
		}
		
		public static function loadStats() {
				
		}
		
		public static function loadAccountMgr() {
				
		}
		
		public static function loadDomainMgr() {
		
		}
		
		public static function loadPluginMgr() {
		
		}
		
		public static function endLayout() {
			echo '</div>
				  </br>';
		}
	}