<?php
	class ThemeLoader {
		public static function loadTheme() {
			static $theme_loaded = false;
			if(!$theme_loaded) {
				$theme = BootPanel::getConfig()->get("Theme");
				if($theme == "default") {
					require 'lib/theme/default/Theme.php';
					$theme = new Theme();
					if(BootPanel::getAuthenticator()->isLoggedIn())
						$theme->onPanelRequested();
					else
						$theme->onLoginRequested();
				} else {
					require './themes/'. $theme .'/Theme.php';
					$theme = new Theme();
					if(BootPanel::getAuthenticator()->isLoggedIn())
						$theme->onPanelRequested();
					else
						$theme->onLoginRequested();
				}
			}
		}
	}