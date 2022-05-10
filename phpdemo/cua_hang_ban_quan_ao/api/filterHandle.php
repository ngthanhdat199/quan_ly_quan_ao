<?php
    require_once('C:\xampp\htdocs\phpdemo\cua_hang_ban_quan_ao\db\dbhelper.php');
    if (isset($_GET['type'])) {
        $type = $_GET['type'];
    } else {
        $type = '';
    }
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $productNumber = 2;
    if ($page == '' || $page == 1) {
        $begin = 0;
    } else {
        $begin = ($page*$productNumber) - $productNumber;
    }
    $pageList = execute("SELECT * FROM products WHERE TYPE = '$type'");
    $row_count = mysqli_num_rows($pageList);
    $pages = ceil($row_count/$productNumber);