<?php
$mysqli = new mysqli('localhost','root','root','product');
if($mysqli->connect_errno){
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    exit;
}