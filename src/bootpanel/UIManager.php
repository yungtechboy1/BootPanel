<?php
	class UIManager {
		public function setIcon($file) {
			echo '<link rel="icon" href="themes/'. Config::BootPanel_THEME .'/'. $file .'">';
		}
		
		public function useCSS($file) {
			echo '<style>';
				include './themes/'. Config::BootPanel_THEME .'/'. $file;
			echo '</style>';
		}
		
		public function useJS($file) {
			echo '<script type="text/javascript">';
				include './themes/'. Config::BootPanel_THEME .'/'. $file;
			echo '</script>';
		}
		
		public function loadResource($file) {
			require './themes/'. Config::BootPanel_THEME .'/'. $file;
		}
	}