<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | NNHS System</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function (){
            $('.pop-up-bg').hide();

            $('form').click(function (e){
                e.preventDefault();
                $('.pop-up-bg').show();
            });

            $('.pop-up-bg').click(function(e) {
                if (e.target === this) {
                    $(this).hide();
                }
            });

            $('.pop-up, .pop-up-head, .container-a').click(function(e) {
                e.stopPropagation(); 
            });
        });
    </script>
</head>
<body>
    <!-- pop up-->
    <div class="pop-up-bg">
        <div class="pop-up">
            <p class="pop-up-head"></p>
            <div class="container-a">
                <a href="#">Fill in registration form</a>
                <a href="log-in.php">Log in</a>
                <a href="registration.php">Register</a>
            </div>
        </div>
    </div>
    
    <!-- main content -->
    <div class="back"></div>
    <div class="container">
        <nav>
            <img class="logo" src="images/logo.png">
            <div class="content">
                <form>
                    <input type="submit" value="GET STARTED">
                </form>
                <p>Center of Excellence! Gearing towards Sustainable Quality Education.</p>
            </div>
        </nav>
        <p class="nnhs">NAGUILIAN NATIONAL HIGH SCHOOL ENROLLMENT SYSTEM</p>
    </div>
    <p></p>
    
</body>
</html>