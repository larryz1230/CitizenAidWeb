<?php
	
if ($_SERVER['REQUEST_METHOD']== 'POST'){

	$name = $_POST['name'];
	$email = $_POST ['email'];
	$password = $_POST ['password'];
	$isCitizen = $_POST ['isCitizen'];


	$password = password_hash($password, PASSWORD_DEFAULT);

	require_once 'connect.php';

	$sql = "INSERT INTO citizen_aid_table(name, email, password, isCitizen) VALUES ('$name', '$email', '$password', '$isCitizen')";

	if (mysqli_query($conn, $sql)) {

		$result["success"] = "1";
		$result ["message"] = "success";

		echo json_encode($result);
		mysqli_close($conn);

	} else {

		$result["success"] = "0";
		$result ["message"] = "error";

		echo json_encode($result);
		mysqli_close($conn);
	}


}


?>