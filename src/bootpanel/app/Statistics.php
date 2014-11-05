<?php
	class Statistics {
		public static function getHDD() {
			return (100 - (round(disk_free_space("./") / disk_total_space("./"), 4) * 100));
		}
		
		public static function getBandwidth() {
			return 0;
		}
		
		public static function getMySQL() {
			//TODO: Fix Database Counter Bug :(
			return (100 - (round((Config::MAX_MySQL_DATABASES - Action::executeSQL("SELECT COUNT(*) FROM information_schema.SCHEMATA;")) / Config::MAX_MySQL_DATABASES, 2) * 100));
		}
		
		public static function getWebmail() {
			return 0;
		}
	}