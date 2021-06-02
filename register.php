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
