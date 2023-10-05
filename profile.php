<?php

session_start();

require('CONNECTION.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | NNHS System</title>
</head>
<body>
    Welcome 
<?php
    if (isset($_SESSION['name'])){
        echo $_SESSION['name'];
    }
?>
</body>
</html>