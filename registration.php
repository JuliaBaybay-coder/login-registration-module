<?php

session_start();
require('CONNECTION.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | NNHS System</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.pop-up-bg').hide();

<?php         if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) { 
?>    
            $('.pop-up-bg').show();
<?php         } 
?>
            $('.pop-up-bg').click(function(event) {
                if ($(event.target).hasClass('pop-up-bg')) {
                    $(this).hide();
                }
            });
        });
    </script>
</head>
<body>

    <!-- pop up-->
    <div class="pop-up-bg">
        <div class="pop-up">
<?php       if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])){
                foreach ($_SESSION['errors'] as $error){
                    echo "<p class ='error'>" . $error . "</p>";
                }
            unset($_SESSION['errors']);
}
            ?>
        </div>
    </div>

    <header></header>
    <div class="container">
        <div class="container-form">
            <p class="container-head"></p>
            <form action="process.php" method="POST">
                <input type="text" name="first-name" placeholder="Enter first name">
                <input type="text" name="last-name" placeholder="Enter last name">
                <input type="text" name="gender" placeholder="Enter gender">
                <input type="text" name="email" placeholder="Enter email">
                <input type="text" name="id-num" placeholder="Enter ID number">
                <input type="password" name="password" placeholder="Enter password">
                <input type="password" name="confirm-pass" placeholder="Confirm password">
                <input class="register-btn" type="submit" name="register-btn" value="SUBMIT">
            </form>
            <a href="log-in.php">Already have an account? Log in here.</a>
        </div>
        <div class="content">
            <img src="images/logo.png">
            <p>Center of Excellence! Gearing Towards Sustainable Quality Education.</p></p>
        </div>
    </div>
    <footer></footer>
</body>
</html>