<?php
	require 'lib/theme/Theme.php';
	
	class ThemeLoader {
		public static function loadTheme() {
			static $loadTheme_called;
			if(!$loadTheme_called) {
				$theme = BootPanel::getConfig("BootPanel")->get("Theme");
				if(strtolower($theme) == "default") {
					require 'lib/theme/Default_Theme/Default_Theme.php';
					$theme = new Default_Theme();
					if(BootPanel::getAPI()->getAuth()->isLoggedIn())
						$theme->onPanelRequested();
					else
						$theme->onLoginRequested();
				} else {
					require './themes/'. $theme .'/'. $theme .'.php';
					if(class_exists($theme)) {
						$theme = new $theme();
						if(in_array("Theme", class_implements($theme)))
							if(BootPanel::getAPI()->getAuth()->isLoggedIn())
								$theme->onPanelRequested();
							else
								$theme->onLoginRequested();
					}
				}
			}
		}
	}