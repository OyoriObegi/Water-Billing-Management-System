<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "wbms";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $meter_number = $_POST['meter_number'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $stmt = mysqli_prepare($conn, "INSERT INTO users (username, meter_number, fullname, email, password, role) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssssss", $username, $meter_number, $fullname, $email, $password, $role);
    mysqli_stmt_execute($stmt);

    mysqli_close($conn);

    header("Location: admin.php");
    exit();
}
?>


<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "wbms";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Meter Number</th><th>Username</th><th>Full Name</th><th>Email</th><th>Role</th><th>Created On</th><th>Action</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["meter_number"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["fullname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["role"] . "</td>";
        echo "<td>" . $row["created_on"] . "</td>";
        echo "<td>";
        echo "<form method='POST' action='edit_user.php'>";
        echo "<input type='hidden' name='user_id' value='" . $row["id"] . "'>";
        echo "<button type='submit'>Edit</button>";
        echo "</form>";
        echo "<form method='POST' action='delete_user.php'>";
        echo "<input type='hidden' name='user_id' value='" . $row["id"] . "'>";
        echo "<button type='submit'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}

mysqli_close($conn);
?>
