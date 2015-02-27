<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include('lib/SSH/Net/SSH2.php');
use ConsoleSession;
/**
 * Description of Console
 *
 * @author Yungtech
 */
class Console {
    //put your code here
    private $sessionid;
    
    
    public function GetConsole($sessionid) {
        $a = new ConsoleSession();
        if (!$a->CheckSID($sessionid)){
            return "Their was An Error Verifying the Session ID";
        }
        
        //SSH Code to Open Screen
    }
}
