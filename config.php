<?php

// DB Constants
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_dbname = 'treasure_hunt2';

$CONN_ERROR = "Could not connect";


// DB Connection

$mysql_connect = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_dbname) or die($CONN_ERROR);


?>