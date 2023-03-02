<?php
// Establish a database connection
$host = 'localhost: 3306';
$dbname = 'wbms';
$dbusername = 'root';
$dbpassword = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);

// Check if the user is logged in
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}

// Retrieve user information
$user_id = $_SESSION['user_name'];
$stmt = $conn->prepare('SELECT * FROM users WHERE id = :id');
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);


// Retrieve billing details
$stmt = $conn->prepare('SELECT * FROM billings WHERE customer_id = :customer_id');
$stmt->bindParam(':customer_id', $user_id);
$stmt->execute();
$billings = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Close database connection
$conn = null;

?>
