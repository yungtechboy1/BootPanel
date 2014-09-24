<?php
	class Stats extends Limit {
		/**
		 * Get the percentage of remaining HDD space
		 * 
		 * @param Root Directory $dir
		 * @return Percentage Left
		 */
		public static function getHDD() {
			return (100 - (round(Limit::HDD_Current() / Limit::HDD_Limit(), 3) * 100));
		}
		
		public static function getBandwidth() {
			return (round(Limit::Bandwith_Current() / Limit::Bandwith_Limit(), 3) * 100);
		}
		
		public static function getMySQL() {
			return (round(Limit::MySQL_Current() / Limit::MySQL_Limit(), 2) * 100);
		}
		
		public static function getWebmail() {
			return (round(Limit::Webmail_Current() / Limit::Webmail_Limit(), 2) * 100);
		}
	}