<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD Operations Using Raw PHP & MySQL</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php  include('addEmployee.php'); ?>
<?php  include('updateEmployee.php'); ?>
<?php  include('deleteEmployee.php'); ?>
<h1>CRUD Operations Using Raw PHP & MySQL</h1>

	<div class="container">
		<?php if ($update == true): ?>
			<h2>Update Employee</h2> 
		<?php else: ?>
			<h2>Add Employee</h2> 
		<?php endif ?>
		
		<?php if (isset($_SESSION['message'])): ?>
			<div class="alert alert-info" role="alert">
				<?php 
					echo $_SESSION['message']; 
					unset($_SESSION['message']);
				?>
			</div>
		<?php endif ?>
		<form method="post" action="addEmployee.php" >
			<div class="mb-3">
				<label for="name" class="form-label">Employee Name</label>
				<input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Risfat Amin">
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email address</label>
				<input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="name@example.com">
			</div>
			<div class="mb-3">
				<label for="phone" class="form-label">Phone Number</label>
				<input type="phone" class="form-control" name="phone" value="<?php echo $phone; ?>" placeholder="+8801737757944">
			</div>
			<div class="mb-3">
				<label for="address" class="form-label">Address</label>
				<input type="text" class="form-control" name="address" value="<?php echo $address; ?>" placeholder="Asuliya Place, Asuliya Model Town, Savar">
			</div>
			<div class="mb-3">
					<label for="gender" class="form-label">Gender</label>
					<select class="form-select" aria-label="Gender" name="gender">
					<option value="male" <?php if($gender=='male') {echo 'selected';} ?>>Male</option>
					<option value="female" <?php if($gender=='female') {echo 'selected';} ?>>Female</option>
					</select>
			</div>
			<div class="mb-3">
					<label for="Department" class="form-label">Department</label>
					<select class="form-select" aria-label="Department" name="department">
					<option value="it" <?php if($department=='it') {echo 'selected';} ?>>IT & Software</option>
					<option value="marketing" <?php if($department=='marketing') {echo 'selected';} ?>>Marketing</option>
					<option value="others" <?php if($department=='others') {echo 'selected';} ?>>Others</option>
					</select>
			</div>
			<div class="mb-3">
			<label for="bio" class="form-label">Enter Your Bio</label>
			<textarea class="form-control" name="bio" rows="3" value="<?php echo $bio; ?>"><?php echo $bio; ?></textarea>
			</div>
			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<?php if ($update == true): ?>
				<button type="submit" class="btn btn-primary mb-3" name="update">Update Employee</button>
			<?php else: ?>
				<button type="submit" class="btn btn-primary mb-3" name="save">Add Employee</button>
			<?php endif ?>
			
		</form>
	</div>

	<?php $results = mysqli_query($db, "SELECT * FROM employees"); ?>

	<div class="container-sm">
	<h2>All Employees</h2> 
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Phone</th>
					<th scope="col">Address</th>
					<th scope="col">Gender</th>
					<th scope="col">Department</th>
					<th scope="col">Bio</th>
					<th scope="col" colspan="2">Action</th>
				</tr>
			</thead>
			
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['address']; ?></td>
					<td><?php echo $row['gender']; ?></td>
					<td><?php echo $row['department']; ?></td>
					<td><?php echo $row['bio']; ?></td>

					<td>
						<a href="index.php?edit=<?php echo $row['id']; ?>" >
						<button type="button" class="btn btn-dark">Edit</button>
						</a>
					</td>
					<td>
						<a href="index.php?del=<?php echo $row['id']; ?>">
						<button type="button" class="btn btn-danger">Delete</button>
						</a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>

</body>

</html>