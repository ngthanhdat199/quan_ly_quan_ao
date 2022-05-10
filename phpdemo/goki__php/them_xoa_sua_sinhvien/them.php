<?php  
    require_once('sql_connect.php');
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
    require_once('sql_connect.php');
    $sql = "INSERT INTO student(fullName,userName,password,email,phoneNumber) VALUES
    ('$fullName','$userName','$password','$email','$phoneNumber')";
    mysqli_query($con,$sql);
    header('Location: welcome.php');
?>