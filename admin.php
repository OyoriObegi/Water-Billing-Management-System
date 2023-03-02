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
		
		<tbody>
			<?php
			include ("getdata.php");
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["user_id"] . "</td>";
				echo "<td>" . $row["meter_number"] . "</td>";
				echo "<td>" . $row["username"] . "</td>";
				echo "<td>" . $row["fullname"] . "</td>";
				echo "<td>" . $row["email"] . "</td>";
				echo "<td>" . $row["password"] . "</td>";
				echo "<td>" . $row["role"] . "</td>";
				echo "<td>" . $row["address"] . "</td>";
				echo "<td>" . $row["created_on"] . "</td>";
				echo "<td>";
				echo "<form method='POST' action='edit_user.php'>";
				echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
				echo "<button type='submit'>Edit</button>";
				echo "</form>";
				echo "<form method='POST' action='delete_user.php'>";
				echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
				echo "<button type='submit'>Delete</button>";
				echo "</form>";
				echo "</td>";
				echo "</tr>";
			}
			mysqli_free_result($result);
			
			?>
		</tbody>
	</table>
	<button onclick="showForm()">Add User</button>
	<div id="add-user-form" style="display:none;">
		<form action="add_user.php" method="POST">
			<label>Meter Number:</label>
			<input type="text" name="meter_number"><br>
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
			<label>Address</label>
			<input type="text" name="address"><br>
			
			<input type="submit" value="Add User">
			<button onclick="hideForm()">Cancel</button>
		</form>
	</div>
</body>
</html>
