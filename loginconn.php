<?php
// Establish a database connection
$host = 'localhost: 3306';
$dbname = 'wbms';
$username = 'root';
$password = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query the database for the user with the given username and password
  $stmt = $conn->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
  $stmt->execute(['username' => $username, 'password' => $password]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // If the user exists, redirect to the dashboard page
  if ($user) {
    header('Location: dashboard.html');
    exit();
  } else {
    // Otherwise, display an error message
    echo '<p>Invalid username or password.</p>';
  }
}
?>
