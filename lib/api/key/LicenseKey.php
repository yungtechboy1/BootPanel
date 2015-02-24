<?php
	class LicenseKey {
		public function keyExists() {
			if(file_exists('./license.key'))
				return true;
			return false;
		}
		
		public function getKey() {
			if(BootPanel::getAPI()->license()->keyExists())
				return file_get_contents('./license.key');
		}
		
		//Licenses are not ready yet and will cost ~$5
		public function isValid() {
			if(BootPanel::getAPI()->license()->keyExists()) {
				$key = BootPanel::getAPI()->license()->getKey(); 
				return true;
			} else
				return false;
		}
	}