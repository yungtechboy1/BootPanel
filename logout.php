<?php

include_once 'config/conf.php';

setcookie($domain_code.'_uid', '');
setcookie($domain_code.'_cid', '');

header("LOCATION: login.php");

?>