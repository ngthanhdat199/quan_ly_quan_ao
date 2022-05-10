<?php
    if(isset($_POST['fullName'])) {
        // var_dump($_POST);

    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "Fullname: ".$fullName."<br/>";
    echo "Email: ".$email."<br/>";
    echo "Password: ".$password."<br/>";
    }
?>