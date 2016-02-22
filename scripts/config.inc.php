<?php
$db_username = 'root';
$db_password = 'fh8Dt60TaJ';
$db_name = 'techwire';
$db_host = 'localhost';
$connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
mysqli_set_charset($connecDB,'utf8');
?>
