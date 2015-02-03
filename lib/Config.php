<?php
	class Config {
		public function get($option) {
			$db = new SQLite3("lib/Configuration.db");
			$r = $db->query("SELECT $option FROM BootPanel WHERE 1;");
			while($row = $r->fetchArray()) {
				return $row[$option];
			}
		}
		
		public function set($option, $new) {
			$db = new SQLite3("lib/Configuration.db");
			$old = BootPanel::getConfig()->get($option);
			$db->exec("UPDATE BootPanel SET $option='$new' WHERE $option='$old';");
		}
	}