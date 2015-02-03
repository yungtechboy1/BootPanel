<?php
	class Update {
		//No updates have been made so just delete the DB
		public static function installConf() {
			@unlink("./Configuration.db");
			BootPanel::__init();
		}
	}