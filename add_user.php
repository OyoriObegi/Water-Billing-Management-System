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
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $stmt = mysqli_prepare($conn, "INSERT INTO users (username, fullname, email, password, role) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $username, $fullname, $email, $password, $role);
    mysqli_stmt_execute($stmt);

    mysqli_close($conn);

    header("Location: admin.php");
    exit();
}
?>
