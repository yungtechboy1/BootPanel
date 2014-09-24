<?php
	class Disk {
		/**
		 * Get the percentage of remaining HDD space
		 * 
		 * @param Root Directory $dir
		 * @return Percentage Left
		 */
		public static function getHDD($dir) {
			return (100 - (round(disk_free_space($dir) / disk_total_space($dir), 2) * 100));
		}
		
		public static function getBandwidth() {
			return 35;
		}
		
		public static function getMySQL() {
			return 60;
		}
		
		public static function getWebmail() {
			return 50;
		}
	}