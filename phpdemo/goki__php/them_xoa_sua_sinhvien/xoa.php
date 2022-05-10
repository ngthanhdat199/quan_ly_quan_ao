<?php
    require_once('sql_connect.php');
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    $sql = "DELETE FROM student where ID = $id";
    $result = mysqli_query($con, $sql);
    header('Location: welcome.php');
?>