<?php
    require_once('database.php');
    if (isset($_POST['masp'])) {
        $masp = $_POST['masp'];
    }
    $sql = "delete from sanpham where masp = $masp";
    $db = $conn -> query($sql);
    header('Location: index.php');

?>