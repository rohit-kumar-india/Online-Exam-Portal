<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'online_examination';

$link = mysqli_connect($host, $username, $password);
mysqli_select_db($link, $dbname);

?>