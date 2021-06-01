<?php

session_start();

require_once 'db_connect.php';

if(isset($_POST['login-btn'])) {

    $user = $_POST['username'];
    $password = $_POST['password'];

    try {
      $sql = "SELECT * FROM users WHERE username = :username";
      $statement = $conn->prepare($sql);
      $statement->execute(array(':username' => $user));

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