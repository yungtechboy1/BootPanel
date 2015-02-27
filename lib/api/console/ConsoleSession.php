<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConsoleSession
 *
 * @author carlt_000
 */
class ConsoleSession {
    
    public $db;
    
    public function __construct() {
        $file = "lib/config/data/". $config .".db";
        $this->db = new SQLite3($file);
        $this->CreateTable();
    }
    
    /**
     * Gets The Screen's ID
     * 
     * @param type $SID Session ID
     * @return type Return Screen's ID
     */
    public function GetScreen($SID) {
        $a = $this->db->query("SELECT * FROM `ConsoleSession` WHERE `SID` = '$SID' LIMIT 0,1");
        $b = $a->fetchArray();
        return $b['SCREEN'];
    }
    
    /**
     * Checks If the Session ID is Valid 
     * 
     * @param type $SID Session ID
     * @return boolean Returns SID Status
     */
    public function CheckSID($SID) {
        $a = $this->db->query("SELECT * FROM `ConsoleSession` WHERE `SID` = '$SID' LIMIT 0,1");
        $b = $a->fetchArray();
        if ($b['SCREEN']){
            return true;
        }else{
            return false;
        }
    }
    
    public function CreateTable(){
        $this->db->query("CREATE TABLE IF NOT EXISTS `ConsoleSession` (`ID` INTEGER PRIMARY KEY AUTOINCREMENT,`SID` VARCHAR,`USER` VARCHAR, `SCREEN` VARCHAR);");
        return true;
    }
    
    /**
     * Get a Value From the Database
     * 
     * @param type $key The Coloum Name
     * @param type $val The Coloum Value
     * @param type $param The Paramter Used to Match the $key and $val
     * @return array The 1st Row To Match the Parameters
     */
    public function GetValue($key,$val,$param = "=") {
        $a = $this->db->query("SELECT * FROM `ConsoleSession` WHERE $key $param $val LIMIT 0,1");
        $b = $a->fetchArray();
        return $b;
    }

}
