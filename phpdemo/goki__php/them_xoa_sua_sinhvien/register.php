<?php
    function register() {
      if (!empty($_POST)) {
        $fullName = $_POST['fullName'];
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];

        require_once('sql_connect.php');

        // Thực hiện truy vấn dữ liệu - thêm dữ liệu vào db
        $sql = "INSERT INTO student(fullName,userName,password,email,
        phoneNumber) VALUES('".$fullName."','".$userName."','".$password."','".$email."','".$phoneNumber."')";
        mysqli_query($con,$sql);

        require_once('sql_close.php');

        header('Location: welcome.php');
      }
    }
?>
