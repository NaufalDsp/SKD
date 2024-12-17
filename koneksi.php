<?php
$db_host = 'localhost';
$db_name = 'skd';
$db_username = 'root';
$db_password = '';
$mysqli = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
