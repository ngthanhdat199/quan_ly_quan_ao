<?php
    require_once('sql_connect.php');
    if(isset($_POST["id"])) {
        $id = $_POST['id'];
    }
    if(isset($_POST["fullName"])) {
        $fullName = $_POST['fullName'];
    }
    if(isset($_POST["userName"])) {
        $userName = $_POST['userName'];
    }
    if(isset($_POST["password"])) {
        $password = $_POST['password'];
    }
    if(isset($_POST["email"])) {
        $email = $_POST['email'];
    }
    if(isset($_POST["phoneNumber"])) {
        $phoneNumber = $_POST['phoneNumber'];
    }
    // echo $id .' '. $fullName .' '.$userName .' '.$password.' '.$email .' '.$phoneNumber;
    $sql = "UPDATE student set fullName = '$fullName', userName = '$userName', 
    password = '$password', email = '$email', phoneNumber = '$phoneNumber' WHERE ID = $id";
    mysqli_query($con,$sql);
    header('Location: welcome.php');
?>