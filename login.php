<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="login-container">
      <h1>Login</h1>
      <form id="login-form" action="loginconn.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br>
    
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
    
        <button type="submit">Login</button>
      </form>
    </div>

    
  </body>
</html>
