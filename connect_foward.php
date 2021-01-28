<?php
// error_reporting(0);
// //Setting session start
// session_start();
// //Database connect
// $databaseHost = 'localhost';
// $databaseName = 'db_foward_chaining';
// $databaseUsername = 'ibnu';
// $databasePassword = '0206';

// $conn = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//START KONVERSI VERSI PHP KE PHP 7 OTOMATIS
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
//JIKA MASIH ERROR, COBA OPSI LAIN (ADA 4 OPSI PEMANGGILAN)
//require_once "parser-php-version.php"; OPSI 1
//include_once "parser-php-version.php"; OPSI 2
//require_once ("parser-php-version.php"); OPSI 3
//include_once ("parser-php-version.php"); OPSI 4
// require_once "parser-php-version.php";
//END KONVERSI VERSI PHP KE PHP 7 OTOMATIS

$server = "localhost";
$username = "dimas";
$password = "";
$database = "db_foward_chaining";
$connect = mysqli_connect($server, $username, $password, $database, 3306);
if (mysqli_connect_errno()) {
	echo "Failed to Connect to Mysql : " . mysqli_connect_error();
}