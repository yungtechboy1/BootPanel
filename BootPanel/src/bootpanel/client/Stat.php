<?php
	class Stat {
		public function getHDD() {
			return (100 - (round(disk_free_space("./") / disk_total_space("./"), 4) * 100));
		}
	}