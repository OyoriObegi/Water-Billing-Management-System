<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $meter_number = $_POST['meter_number'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Update user in database
    $servername = "localhost:3306";
    $user_name = "root";
    $password = "";
    $dbname = "wbms";

    $conn = mysqli_connect($servername, $user_name, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_query($conn, "UPDATE users SET username = '$username', meter_number = '$meter_number', fullname = '$fullname', email = '$email', password = '$password', role = '$role' WHERE id = '$id'");

    mysqli_close($conn);

    header("Location: admin.php");
    exit();
} else {
    $id = $_GET['id'];

    // Get current user data from database
    $servername = "localhost:3306";
    $user_name = "root";
    $password = "";
    $dbname = "wbms";

    $conn = mysqli_connect($servername, $user_name, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    mysqli_close($conn);
?>

<form method="POST" action="edit_user.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>"><br>
    <label for="meter_number">Meter Number:</label>
    <input type="text" id="meter_number" name="meter_number" value="<?php echo $row['meter_number']; ?>"><br>
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>"><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>"><br>
    <label for="role">Role:</label>
    <select id="role" name="role">
        <option value="admin" <?php if ($row['role'] == 'admin') echo 'selected'; ?>>Admin</option>
        <option value="user" <?php if ($row['role'] == 'user') echo 'selected'; ?>>User</option>
    </select><br>
    <button type="submit">Save Changes</button>
</form>

<?php } ?>
