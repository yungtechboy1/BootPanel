<?php
	class Default_Theme implements Theme {
		public function onLoginRequested() {
			require 'lib/theme/Default_Theme/page/login.php';
		}
		
		public function onPanelRequested() {
			require 'lib/theme/Default_Theme/page/panel.php';
		}
	}