<?php
// Establish a database connection
$host = 'localhost: 3306';
$dbname = 'wbms';
$dbusername = 'root';
$dbpassword = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);

// Retrieve user information

$stmt = $conn->prepare('SELECT * FROM users WHERE id = :id');
$stmt->bindParam(':id', $user_name);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);


// Retrieve billing details
$stmt = $conn->prepare('SELECT * FROM billing WHERE id = :id');
$stmt->bindParam(':id', $user_name);
$stmt->execute();
$billings = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Page</title>
	<link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
	<header>
		<h1>Welcome to Your Dashboard</h1>
	</header>

	<nav>
		<ul>
			<li><a href="meter.html">Read Meter</a></li>
			<li><a href="history.html">Billing History</a></li>
			<li><a href="payments.html">Make Payment</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>

	<h2>Personal Information</h2>
	<ul>
        
		<li><strong>Username:</strong> <?php echo $user['username']; ?></li>
		<li><strong>Email:</strong> <?php echo $user['email']; ?></li>
		<li><strong>Meter Number:</strong> <?php echo $user['meter_number']; ?></li>
		<li><strong>Address:</strong> <?php echo $user['address']; ?></li>
	</ul>

	<h2>Billing Details</h2>
	<table>
		<thead>
			<tr>
				<th>Period</th>
				<th>Amount</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($billings as $billing) { ?>
			<tr>
				<td><?php echo $billing['period']; ?></td>
				<td><?php echo $billing['amount']; ?></td>
				<td><?php echo $billing['status']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>
