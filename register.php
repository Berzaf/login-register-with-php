<?php

require_once 'db_connect.php';

if(isset($_POST['register-btn'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    

    try {
    $sql = "INSERT INTO users (username, password, email, to_date)
                VALUES (:username, :password, :email, now())";

    $statement = $conn->prepare($sql);
    $statement->execute(array(':username' => $username, ':password' => $hashed_password, ':email' => $email));

    if($statement->rowCount() == 1) {
    header('location: index.html');
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
    
    <div id="form" >
        <h1>Register</h1>
        <form action="register.php" method="post">
            <input type="text" name="username" class="input-box" placeholder="User Name">
            <input type="email" name="email" class="input-box" placeholder="Email">
            <input type="password" name="password" class="input-box" placeholder="Password">
            <input type="submit" name="register-btn" class="btn" value="Register">

            <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>

        </form>
    </div>


</body>
</html>