<?php
    if (isset($_GET['search'])) {
        if (strlen(trim($_GET['search']))<=0){
            $search=' ';
        } else {
            $search = $_GET['search'];
            $search = trim($search);
        }
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
    $pageList = execute("SELECT * FROM products WHERE TITLE LIKE '$search%' OR TYPE LIKE '$search%'");
    $row_count = mysqli_num_rows($pageList);
    $pages = ceil($row_count/$productNumber);
