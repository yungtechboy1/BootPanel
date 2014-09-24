<?php
	class Disk {
		/**
		 * Get the percentage of remaining HDD space
		 * 
		 * @param Root Directory $dir
		 * @return Percentage Left
		 */
		public static function getHDD() {
			return (100 - (round(disk_free_space("/") / disk_total_space("/"), 2) * 100));
		}
		
		public static function getBandwidth() {
			return ((round(1 / 20, 2) * 100));
		}
		
		public static function getMySQL() {
			return ((round(3 / 5, 2) * 100));
		}
		
		public static function getWebmail() {
			return ((round(13 / 15, 2) * 100));
		}
	}