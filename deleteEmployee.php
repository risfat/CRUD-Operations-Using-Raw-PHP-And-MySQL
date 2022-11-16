<?php

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM employees WHERE id=$id");
	$_SESSION['message'] = "Employee Deleted Successfully"; 
	header('location: index.php');
}

?>