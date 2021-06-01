<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body style="background: url(bk2.jpg)">

    <?php if(!isset($_SESSION['username'])): header("location: logout.php");?>

    <?php else: ?>

    <?php endif ?>

    <h2 style="text-align: right; color: white; margin-right: 40px; font-size: 50px;"><a href="logout.php">Logout</a></h2>
    <?php echo "<h1 style='text-align: center; color: white; margin-top: 200px; font-size: 50px;'> Welcome ".$_SESSION['username']."</h1>" ?>


</body>
</html>