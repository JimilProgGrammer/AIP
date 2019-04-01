<?php

    session_start();

    // Initializing variables
    $id = "";
    $pwd = "";
    $fname = "";
    $lname = "";
    $address = "";
    $state = "";
    $city = "";
    $pincode = 0;
    $errors = array();

    //Connecting to database
    $db = mysqli_connect('localhost','phpmyadmin','root','aip');

    /*
     * REGISTER USER
     */
    if(isset($_POST['reg_user'])) {
        // receive all input values from form
        $fname = mysqli_real_escape_string($db, $_POST['fnameField']);
        $lname = mysqli_real_escape_string($db, $_POST['lnameField']);
        $address = mysqli_real_escape_string($db, $_POST['addressField']);
        $state = mysqli_real_escape_string($db, $_POST['stateField']);
        $city = mysqli_real_escape_string($db, $_POST['cityField']);
        $pincode = mysqli_real_escape_string($db, $_POST['pinCodeField']);
        $id = mysqli_real_escape_string($db, $_POST['unameField']);
        $pwd = mysqli_real_escape_string($db, $_POST['passwordField']);

        // first check the database to make sure 
        // a user does not already exist with the same email
        $user_check_query = "SELECT * FROM users WHERE id='$id' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        if ($user) { // if user exists
            if ($user['id'] === $id) {
              array_push($errors, "User already exists!");
            }
        }

        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($pwd); //encrypt the password before saving in the database

            $query = "INSERT INTO users 
                    VALUES('$fname', '$lname', '$address', '$state', '$city', '$pincode', '$id', '$password')";
            mysqli_query($db, $query);
            $_SESSION['username'] = $id;
            $_SESSION['success'] = "You are now logged in";
            header('location: welcome.php');
        }
    }

?>