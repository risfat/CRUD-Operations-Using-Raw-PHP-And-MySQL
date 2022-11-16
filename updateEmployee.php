<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM employees WHERE id=$id");

		if ($record) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$email = $n['email'];
			$phone = $n['phone'];
			$address = $n['address'];
			$gender = $n['gender'];
			$department = $n['department'];
			$bio = $n['bio'];
		}
	}
?>