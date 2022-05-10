<?php
    require_once('database.php');
    if (isset($_POST['masp'])) {
        $masp = $_POST['masp'];
    }
    if (isset($_POST['tensp'])) {
        $tensp = $_POST['tensp'];
    }

    $sql = "INSERT INTO sanpham(masp,tensp) VALUES('$masp','$tensp')";
    $db = $conn -> query($sql);
    header('Location: index.php');

?>