<?php
session_start();

 // If the 'login' session variable is not set,
if(!isset($_SESSION['login'])){
    // Redirect the user to the login page
    header("Location: login.php");
    die();  // Terminate script execution
}

include "db.php";

$id = $_GET['id']; // Getting the 'id' parameter from the URL

$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE id = :id"); // Preparing a SQL statement
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // Binding the 'id' parameter to the statement
$stmt->execute(); // Executing the SQL statement

$results = $stmt->fetch(PDO::FETCH_ASSOC); // Fetching the results

if ($results) {
    $name = $results["name"]; // Extracting the 'name' from results
    $password = $results["password"]; // Extracting the 'password' from results
    $incoming_financial_code = $results["incoming_financial_code"]; // Extracting the 'incoming_financial_code' from results
} 

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    
    <h2>Your username : <?php echo $_SESSION['username_login']; ?>.</h2>
    <p>===============================================</p>
    <h3>Your full name : <?php echo $name; ?>.</h3>
    <h3>Your password: <?php echo $password; ?>.</h3>
    <h3>Your incoming financial code: <?php echo $incoming_financial_code; ?>.</h3>
    
</body>
</html>
