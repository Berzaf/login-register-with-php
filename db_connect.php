<?php

$username = 'pma';
$password = '';
$dsn = 'mysql:host=localhost; dbname=mydb';

$conn = new PDO($dsn, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>



