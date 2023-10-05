<?php

session_start();
require('CONNECTION.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in | NNHS System</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <header>
        <p>CENTER OF EXCELLENCE!</p>
        <p>GEARING TOWARDS SUSTAINABLE QUALITY EDUCATION.</p>
    </header>
    <img class="logo" src="images/logo.png">
    <form class="login-form" action="process.php" method="POST">
        <input type="text" name="id-number" placeholder="Enter Id Number">
        <input type="password" name="login-password" placeholder="Enter password">
        <input id="login-btn" type="submit" name="login-btn" value="LOG IN"> 
    </form>
    <div class="container">
<?php       if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])){
                foreach ($_SESSION['errors'] as $error){
                    echo "<p class ='error'>" . $error . "</p>";
                }
            unset($_SESSION['errors']);
}
?>            
    </div>
    
</body>
</html>