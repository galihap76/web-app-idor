<?php
session_start();

// Code
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    
    <!-- Simple protection-->
    <?php if($results['username_login'] === $_SESSION['username_login']){ ?>
    <h2>Your username : <?php echo $_SESSION['username_login']; ?>.</h2>
    <p>===============================================</p>
    <h3>Your full name : <?php echo $name; ?>.</h3>
    <h3>Your password: <?php echo $password; ?>.</h3>
    <h3>Your incoming financial code: <?php echo $incoming_financial_code; ?>.</h3>
    <?php } else if($results['username_login'] !== $_SESSION['username_login']){ ?>
    <p>Something is wrong!</p>
    <?php } ?>
    
</body>
</html>
