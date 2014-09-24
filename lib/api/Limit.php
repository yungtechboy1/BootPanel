<?php
	/**
	 * This is used to limit client usage
	 */
	class Limit {
		public static function HDD_Limit() {
			return disk_total_space("/");
		}
		
		public static function MySQL_Limit() {
			return 30;
		}
		
		public static function Webmail_Limit() {
			return 5;
		}
		
		public static function Bandwith_Limit() {
			return 10;
		}
		
		public static function HDD_Current() {
			return disk_free_space("/");
		}
		
		public static function Bandwith_Current() {
			return 0;
		}
		
		public static function MySQL_Current() {
			return 0;
		}
		
		public static function Webmail_Current() {
			return 0;
		}
	}