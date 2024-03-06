<?php
session_start();
include('myfunctions.php');
include("../config/dbcon.php");
if (isset($_POST["register_btn"])) {
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $cpassword = mysqli_real_escape_string($con, $_POST["cpassword"]);

    $email_query = "SELECT email FROM users WHERE email='$email' ";
    $email_query_run = mysqli_query($con, $email_query) or die(mysqli_error($con));
    if (mysqli_num_rows($email_query_run) > 0) {
        redriect("../register.php", "Email Already Registered!");
    } else {
        if ($password == $cpassword) {
            // insert user data 
            $insert_query = "INSERT INTO users (name,email,phone,password) VALUES ('$name' , '$email' , '$phone', '$password')";
            $insert_query_run = mysqli_query($con, $insert_query) or die(mysqli_error($con));
            if ($insert_query_run) {
                redriect("../login.php", "Register Successfully!");
            } else {
                redriect("../register.php", "Something Went Wrong!");
            }
        } else {
            redriect("../register.php", "Password Do Not Match!");
        }
    }
} else if (isset($_POST["login_btn"])) {
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $login_query = "SELECT * FROM users where email='$email' AND password = '$password'";
    $login_query_run = mysqli_query($con, $login_query) or die(mysqli_error($con));

    if (mysqli_num_rows($login_query_run) > 0) {

        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['role_as'] = $role_as;
        if ($role_as == 1) {
            redriect("../admin/index.php", "Welcome To Dashboard!");
        } else {
            redriect("../index.php", "Login Successfully!");
        }
    } else {
        redriect("../login.php", "Invalid Credentials!");
    }
}
