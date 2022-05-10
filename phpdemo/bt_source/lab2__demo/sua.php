<?php
    require_once('database.php');
    if (isset($_POST['txtma'])) {
        $masp = $_POST['txtma'];
    }
    if (isset($_POST['txttensua'])) {
        $tensp = $_POST['txttensua'];
    }

    $sql = "UPDATE sanpham set tensp='$tensp' where masp=$masp";
    $db = $conn -> query($sql);
    header('Location: index.php');
?>

