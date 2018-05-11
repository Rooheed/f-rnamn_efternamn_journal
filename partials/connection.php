<?php
$user = 'root';
$password = 'root';
$DB = "Journal";
$connection = new mysqli('localhost', "$user", "$password", "$DB") or die ("Unable to Connect");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 


?>

