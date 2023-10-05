<?php

session_start();
require("CONNECTION.php");

    

    if(isset($_POST['register-btn'])){

        $_SESSION['errors'] = array();

    // Authentication for registration

        // first name
        if(empty($_POST['first-name'])){
            $_SESSION['errors'][] = "Please fill in first name.";
        }
        if(is_numeric($_POST['first-name'])){
            $_SESSION['errors'][] = "First name should not contain numbers or any other symbols .";
        }
        $length = strlen($_POST['first-name']);
        if(isset($_POST['first-name']) && $length <=2){
            $_SESSION['errors'][] = "First name should be longer that 2 characters.";
        }

        // last name
        if(empty($_POST['last-name'])){
            $_SESSION['errors'][] = "Please fill in last name.";
        }
        if(is_numeric($_POST['last-name'])){
            $_SESSION['errors'][] = "Last name should not contain numbers or any other symbols .";
        }
        $length = strlen($_POST['last-name']);
        if(isset($_POST['last-name']) && $length <=2){
            $_SESSION['errors'][] = "Last name should be longer that 2 characters.";
        }

        // gender
        if(empty($_POST['gender'])){
            $_SESSION['errors'][] = "Please fill in gender.";
        }
        if(is_numeric($_POST['gender'])){
            $_SESSION['errors'][] = "Gender should not contain numbers or any other symbols .";
        }
        if ($_POST['gender'] !== 'Female' && $_POST['gender'] !== 'Male') {
            $_SESSION['errors'][] = "Gender should be 'Female' or 'Male'.";
        }

        // email
        if(empty($_POST['email'])){
            $_SESSION['errors'][] = "Please fill in email.";
        }
        if(!empty($_POST['email'])){
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)==false){
                $_SESSION['errors'][] = "Email is not valid!";
            }
        }

        // id-number
        if(empty($_POST['id-num'])){
            $_SESSION['errors'][] = "Please fill in Id number.";
        }
        if(!empty($_POST['id-num'])){
            if(!is_numeric($_POST['id-num'])){
                $_SESSION['errors'][] = "Id number should only contain numbers.";
            }
        }


        // password
        // if(empty($_POST['pass'])){
        //     $_SESSION['errors'][] = "Please fill in password.";
        // }

        // confirm-password
        if(empty($_POST['confirm-pass'])){
            $_SESSION['errors'][] = "Please confirm your password.";
        }
        if(!empty($_POST['confirm-pass'])){
            if($_POST['confirm-pass'] != $_POST['password']){
                $_SESSION['errors'][] = "Password did not match.";
            }
        }


        // inserting data in database
        if (empty($_SESSION['errors'])){
            $_SESSION['first_name'] = $_POST['first-name'];
            $_SESSION['last_name'] = $_POST['last-name']; 
            $_SESSION['gender'] = $_POST['gender']; 
            $_SESSION['email'] = $_POST['email']; 
            $_SESSION['id-num'] = $_POST['id-num']; 
    
            $first_name = $_SESSION['first_name'];
            $last_name = $_SESSION['last_name'];
            $gender = $_SESSION['gender'];
            $email = $_SESSION['email'];
            $id_num = $_SESSION['id-num'];
    
            $password = md5($_POST['password']);
    
            $query = "INSERT INTO users(first_name, last_name, gender, email, id_number, password, created_at, updated_at)
                        VALUES('$first_name', '$last_name', '$gender', '$email', '$id_num', '$password', NOW(), NOW() )";
    
            $result = run_mysql_query($query);
        }

        header("Location:registration.php");
        exit();
    }

    // log in
    if(isset($_POST['login-btn'])){

        $_SESSION['errors'] = array();

        $id_number = $_POST['id-number'];
        $pass = $_POST['login-password'];

        if(empty($id_number) || empty($pass) ){
            $_SESSION['errors'][] = "Please fill in the fields.";
        }

        $query = "SELECT * FROM users WHERE id_number = '$id_number'";
        $user = fetch_record($query);

        $_SESSION['name'] = $user['first_name'] . " " . $user['last_name']; //for profile.php


        if(!empty($user)){
            $encrypted_pass = md5($pass);

            if($user['password'] == $encrypted_pass){
                header("Location: profile.php");
                exit();
            }else{
                $_SESSION['errors'][] = "Incorrect password.";
            }
        }
    header("Location: log-in.php");
    exit();
    }


?>