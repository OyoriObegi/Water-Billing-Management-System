<?php
// connect to the database
$conn = mysqli_connect("localhost:3306", "root", "", "wbms");

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // process the form data and add the user to the database
    // ...
}

// query the database for the list of users
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// display the table of users
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="admin.css">
	<script src="admin.js"></script>
</head>
<body>
	<h1>User Management</h1>
	<table>
		<tr>
			<th>Username</th>
			<th>Full Name</th>
			<th>Email</th>
			<th>Role</th>
			<th>Actions</th>
		</tr>
		<tr>
			<td>john_doe</td>
			<td>John Doe</td>
			<td>doe@example.com</td>
			<td>
				<select name="role">
					<option value="admin">Admin</option>
					<option value="user" selected>User</option>
				</select>
			</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			<td>jane_hoe</td>
			<td>Jane Hoe</td>
			<td>jane@example.com</td>
			<td>
				<select name="role">
					<option value="admin" selected>Admin</option>
					<option value="user">User</option>
				</select>
			</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
	</table>
	<button onclick="showForm()">Add User</button>
	<div id="add-user-form" style="display:none;">
		<form action="add_user.php" method="POST">
			<label>Username:</label>
			<input type="text" name="username"><br>
			<label>Full Name:</label>
			<input type="text" name="fullname"><br>
			<label>Email:</label>
			<input type="text" name="email"><br>
			<label>Password:</label>
			<input type="password" name="password"><br>
			<label>Role:</label>
			<select name="role">
				<option value="admin">Admin</option>
				<option value="user" selected>User</option>
			</select><br>
			<input type="submit" value="Add User">
			<button onclick="hideForm()">Cancel</button>
		</form>
	</div>
</body>
</html>
