<?php
    require_once('define.php');
    // Tạo kết nối tới database
    $con = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    // Kiểm tra kết nối có thành công hay không
    if ($con->connect_error) {
        var_dump($con->connect_error);
        die();
    }
?>