<?php  
	$db = mysqli_connect("localhost", "root", "", "agro_farm");

	if ($db) {
		// echo "Database Connected Successfully";
	}
	else {
		die("Mysqli Error." . mysqli_error($db));
	}
?>