<?php
	class Configuration {
		public function __construct($config) {
			$this->config = "lib/config/data/". $config .".db";
			$this->table = $config;
		}
		
		public function create($table_data) {
			$db = new SQLite3($this->config);
			$db->exec("CREATE TABLE IF NOT EXISTS $this->table($table_data)");
			$db->close();
		}
		
		public function add($fields, $values) {
			$db = new SQLite3($this->config);
			$db->exec("INSERT INTO $this->table($fields) VALUES($values)");
			$db->close();
		}
		
		public function get($option) {
			$db = new SQLite3($this->config);
			$result = $db->query("SELECT $option FROM $this->table");
			while($row = $result->fetchArray()) {
				return $row[$option];
			}
			$db->close();
		}
		
		public function set($columm, $new, $old) {
			$db = new SQLite3($this->config);
			$db->exec("UPDATE $this->table SET $columm='$new' WHERE $columm='$old'");
			$db->close();
		}
		
		public function delete($condition) {
			$db = new SQLite3($this->config);
			$db->exec("DELETE FROM $this->table WHERE $condition");
			$db->close();
		}
	}