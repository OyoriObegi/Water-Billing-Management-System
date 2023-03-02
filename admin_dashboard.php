<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="admin.css">
	<script src="admin.js"></script>
</head>
<body>
	<header>
		<h1>Admin Dashboard</h1>
		<nav>
			<ul>
                <li><a href="admin.php">User Management</a></li>
				<li><a href="#customers">Customers</a></li>
				<li><a href="#bills">Bills</a></li>
				<li><a href="#payments">Payments</a></li>
				<li><a href="#reports">Reports</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section id="customers">
			<h2>Customers</h2>
			
				<?php
				// Display customer data from database
                // Connect to database
                $host = "localhost: 3306";
                $user = "root";
                $password = "";
                $database = "wbms";
                $conn = mysqli_connect($host, $user, $password, $database);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Retrieve customer data
                $sql = "SELECT * FROM users WHERE role='user'";
                $result = mysqli_query($conn, $sql);

                // Display customer data in a table
                echo "<table>";
                echo "<tr><th>Customer ID</th><th>Meter Number</th><th>Username</th><th>Full Name</th><th>Email</th><th>Address</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["meter_number"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["fullname"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                // Close database connection
                mysqli_free_result($result);
                mysqli_close($conn);
				?>
			
			
		</section>
		<section id="bills">
			<h2>Bills</h2>
			<table>
				<tr>
					<th>Bill ID</th>
					<th>Customer ID</th>
					<th>Period</th>
					<th>Amount</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
				<?php
                // Connect to database
                $conn = mysqli_connect($host, $user, $password, $database);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Fetch bill data from database
                $sql = "SELECT * FROM billing";
                $result = mysqli_query($conn, $sql);

                // Display bill data in a table
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Bill ID</th>";
                    echo "<th>Customer ID</th>";
                    echo "<th>Meter Number</th>";
                    echo "<th>Consumption</th>";
                    echo "<th>Amount Due</th>";
                    echo "<th>Due Date</th>";
                    echo "<th>Status</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["bill_id"] . "</td>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["meter_number"] . "</td>";
                        echo "<td>" . $row["consumption"] . "</td>";
                        echo "<td>" . $row["amount_due"] . "</td>";
                        echo "<td>" . $row["due_date"] . "</td>";
                        echo "<td>" . $row["payment_status"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No bills found.";
                }

                // Close database connection
                mysqli_close($conn);
                ?>

			</table>
			
		</section>
		<section id="payments">
			<h2>Payments</h2>
			
				<?php
                // connect to database
                $conn = mysqli_connect($host, $user, $password, $database);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // retrieve payment data from database
                $sql = "SELECT * FROM payments";
                $result = mysqli_query($conn, $sql);

                // display payment data in a table
                echo "<table>";
                echo "<tr><th>Payment ID</th><th>Customer ID</th><th>Amount</th><th>Date</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["payment_id"] . "</td>";
                    echo "<td>" . $row["customer_id"] . "</td>";
                    echo "<td>" . $row["amount"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                // close database connection
                mysqli_free_result($result);
                mysqli_close($conn);
                ?>

						
		</section>
		<section id="reports">
			<h2>Reports</h2>
			<ul>
				<li><a href="#">Monthly revenue report</a></li>
				<li><a href="#">Customer account summary report</a></li>
				<li><a href="#">Meter reading history report</a></li>
			</ul>
		</section>
	</main>
</body>
</html>
