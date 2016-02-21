<?php

$db_username = 'root';
$db_password = 'BH2Ml1t4vu';
$db_name = 'techwire';
$db_host = 'localhost';


$connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
?>