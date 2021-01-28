<?php
include "connect_backward.php";

if (isset($_POST['submit'])) {
	$query = 'SELECT id FROM rule_backward where ';
	array_pop($_POST);
	$rule_input = array();
	foreach ($_POST as $where) {
		$query .= $where . "=1 and ";
		array_push($rule_input, $where);
	}
	$query .= "1=1";
	// echo $query;

	// echo $connect;
	$data = mysqli_query($connect, $query);

	echo $list_id['id'];


	$rule = array(
		array("R001", "R002", "R003", "R004"),
		array("R005", "R006", "R007", "R008"),
		array("R009", "R010"),
	);

	// $status = false;
	// for ($i = 0; $i < ob_get_length($rule); $i++) {
	// 	$result = ($rule_input == $rule[$i]);
	// 	if ($result) {
	// 		$status = true;
	// 		echo "true";
	// 	} else {
	// 		echo "false";

	// 	}
	// }

	// $id = '';
	// if ($status == true) {
	while ($lst_id = mysqli_fetch_assoc($data)) {
		$id = $list_id['id'];
	}
	echo $id;
	$cari_penyakit = "SELECT * from penyakit where id=$id";
	$db = mysqli_query($connect, $cari_penyakit);
	while ($data = mysqli_fetch_assoc($db)) {
		$penyakit = $data['penyakit'];
		$info = $data['info'];
		$solusi = $data['solusi'];
		include 'result.php';
		// 	}
		// } else {
		// 	include "result_not_found.php";
		// }
	}
}
