<?php

$dbHostName = 'localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'post_system';


$conn = mysqli_connect($dbHostName, $dbUserName, $dbPassword, $dbName);

if($conn){
    // echo "connected";
}