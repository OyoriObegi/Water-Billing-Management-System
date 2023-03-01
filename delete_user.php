<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Establish a database connection
    $servername = "localhost:3306";
    $user_name = "root";
    $password = "";
    $dbname = "wbms";
    $conn = mysqli_connect($servername, $user_name, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL query to delete the user
    $sql = "DELETE FROM users WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);

    // Redirect back to the admin page
    header("Location: admin.php");
    exit();
}
?>
