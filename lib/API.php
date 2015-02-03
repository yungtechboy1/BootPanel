<?php
	require 'lib/calc/Usage.php';

	class API {
		public function getStat() {
			return new Usage();
		}
	}