<?php
    function register() {

        if(!empty($_POST)) {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];

            $_SESSION['fullname'] = $fullname;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
            $_SESSION['phoneNumber'] = $phoneNumber;

            // setcookie("fullname", $fullname, time()+24*7*60*60, "/");
            // setcookie("username", $username, time()+24*7*60*60, "/");
            // setcookie("password", $password, time()+24*7*60*60, "/");
            // setcookie("email", $email, time()+24*7*60*60, "/");
            // setcookie("phoneNumber", $phoneNumber, time()+24*7*60*60, "/");
            header('Location: login.php');
        }
    }
?>