<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'web');

	// initialize variables
	$name = "";
	$email = "";
	$phone = "";
	$address = "";
	$gender = "";
	$department = "";
	$bio = "";
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone']; 
		$address = $_POST['address'];
		$gender = $_POST['gender']; 
		$department = $_POST['department'];
		$bio = $_POST['bio'];

		mysqli_query($db, "INSERT INTO employees (name, email, phone, address, gender, department, bio) 
		VALUES ('$name', '$email', '$phone', '$address', '$gender', '$department', '$bio')"); 
		$_SESSION['message'] = "Employee Saved Successfully"; 
		header('location: index.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone']; 
		$address = $_POST['address'];
		$gender = $_POST['gender']; 
		$department = $_POST['department'];
		$bio = $_POST['bio'];
	
		mysqli_query($db, "UPDATE employees SET name='$name', email='$email', phone='$phone', address='$address', gender='$gender',department='$department', bio='$bio' WHERE id=$id");
		$_SESSION['message'] = "Employee Updated Successfully!"; 
		header('location: index.php');
	}
?>