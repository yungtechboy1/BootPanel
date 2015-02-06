<?php
	interface Theme {
		public function onLoginRequested();
		
		public function onPanelRequested();
	}