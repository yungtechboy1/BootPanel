<?php
	class Theme {
		public static function onLoad($request) {
			if($request == "login")
				Theme::loadLogin();
			elseif($request == "panel")
				Theme::loadPanel();
		}
		
		public static function loadLogin() {
			
		}
		
		public static function loadPanel() {
			
		}
	}