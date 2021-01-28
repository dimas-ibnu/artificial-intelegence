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
require_once "parser-php-version.php";
//END KONVERSI VERSI PHP KE PHP 7 OTOMATIS

$server = "localhost";
$username = "ibnu";
$password = "0206";
$database = "db_foward_chaining";
mysql_connect($server, $username, $password) or die("Gagal");
mysql_select_db($database) or die("Database tidak ditemukan");
