<?php 

$host = "localhost";
$user = "root";
$password = "";
$db_name = "db_sigm";

$db = mysqli_connect($host, $user, $password, $db_name);

if(!$db) {
    die("Gagal terhubung dengan database : " . mysqli_connect_error());
}