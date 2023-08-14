<?php
session_start();
include "db.php";

?>

<html>
<head>
<title>Login App</title>    
</head>

    
<body>
    
    <form method="post">
        <ul>
        
        <li>
            <label for="username">Username : </label>
            <input type="text" id="username" name="username" autocomplete="off" required/>
            </li>
            
         <li>
            <label for="password">Password : </label>
            <input type="password" id="password" name="password" autocomplete="off" required/>
            </li>
        
        </ul>
    
        <button type="submit" name="submit">Submit</button>
    
    </form>
    
    <?php
    
    if(isset($_POST['submit'])){
    $username = $_POST['username'];  // Get the submitted username
    $password = $_POST['password'];  // Get the submitted password
    
    // Prepare the SQL statement to retrieve user data
    $sql = "SELECT * FROM tbl_users WHERE username_login = :username AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":username", $username);  // Bind the username parameter
    $stmt->bindParam(":password", $password);  // Bind the password parameter
    $stmt->execute();  // Execute the SQL statement
    $results = $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch the results
    
    if($results){
        $redirect = "index.php?id=" . $results['id'];  // Prepare the redirect URL
        $_SESSION['login'] = true;  // Set a session variable to indicate successful login
        $_SESSION['username_login'] = $results['username_login'];  // Store the username in the session
        header("Location: " . $redirect);  // Redirect the user to the specified page
    } else {
        echo "Invalid login. Please try again!";  // Display an error message for invalid login
    }
  }
    
    ?>
    
</body>
</html>