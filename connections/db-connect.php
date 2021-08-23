<?php
 session_start();
$servername = "localhost:3308";
$username = "root";
$password = ""; 
try {
    $conn = new PDO("mysql:host=$servername;dbname=agriculture", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    } 
 //error_reporting(0);
?>