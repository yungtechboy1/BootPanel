<?php
	class Plugin {
		public static function checkRequirement($requirement, $foobar) {
			$array = array(
				"BOOTPANEL.THEME",
				"BOOTPANEL.MYSQL",
				"BOOTPANEL.PLUGIN",
				"BOOTPANEL.VERSION",
				"PHP.VERSION"
			);
			if(in_array($requirement, $array)) {
				if($requirement == "BOOTPANEL.THEME") {
					if($foobar == Config::BootPanel_Theme)
						return true;
					else
						return false;
				} elseif($requirement == "MYSQL") {
					if(mysql_connect(Config::MySQL_HOST .":". Config::MySQL_PORT, Config::MySQL_USER, Config::MySQL_PASS))
						return true;
					else
						return false;
				} elseif($requirement == "BOOTPANEL.PLUGIN") {
					if(file_exists("./plugins/" . $foobar) && class_exists(str_replace("./plugins/", "", str_replace(".php", "", $foobar))))
						return true;
					else
						return false;
				} elseif($requirement == "BOOTPANEL.VERSION") {
					if($foobar == Variable::VERSION)
						return true;
					else
						return false;
				} elseif($requirement == "PHP.VERSION") {
					if($foobar == PHP_VERSION)
						return true;
					else
						return false;
				} else {
					return false;
				}
			} else {
				die(
					Error::invalid_requirement()
				);
			}
		}
	}