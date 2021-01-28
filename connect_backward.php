<?php
$connect = mysqli_connect("localhost", "ibnu", "0206", "db_backward", 3306);
if (mysqli_connect_errno()) {
	echo "Failed to Connect to Mysql : " . mysqli_connect_error();
}
