<?php

session_start();
require_once 'db_connect.php';

if(isset($_POST['login-btn'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];

    try {
        $sql = "SELECT * FROM users WHERE username = :username";
        $statement = $conn->prepare($sql);
        $statement->execute(array(':username' => $username));
  
        while($row = $statement->fetch()) {
          $id = $row['id'];
          $hashed_password = $row['password'];
          $username = $row['username'];
  
          if(password_verify($password, $hashed_password)) {
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            header('location: welcome.php');
          }
          else {
            echo "Error: Invalid username or password";
          }
        }
      }
      catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <div id="form">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <input type="text" name="username" class="input-box" placeholder="User Name">
            <input type="password" name="password" class="input-box" placeholder="Password">
            <input type="submit" name="login-btn" class="btn" value="Login">


            <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>

        </form>
    </div>
    
    


</body>
</html>