<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "wbms";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Check if any data is returned
if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>User ID</th>";
    echo "<th>Meter Number</th>";
    echo "<th>Username</th>";
    echo "<th>Full Name</th>";
    echo "<th>Email</th>";
    echo "<th>Password</th>";
    echo "<th>Role</th>";
    echo "<th>Created On</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Loop through the data and display each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["meter_number"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["fullname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>" . $row["role"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
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

    // End the table
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No users found.";
}

mysqli_close($conn);
?>
