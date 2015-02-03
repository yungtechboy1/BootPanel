<?php
	class Theme {
		public function onLoginRequested() {
			require 'lib/theme/default/page/login.php';
		}
		
		public function onPanelRequested() {
			require 'lib/theme/default/page/panel.php';
		}
	}