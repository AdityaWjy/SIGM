<?php 

$host = "localhost";
$user = "root";
$password = "";
$db_name = "db_sigm";

try {
    //create PDO connection 
    $db = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
} catch (PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}