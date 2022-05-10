<?php 
    require_once("database.php");
    try{
        //Lấy mã danh mục trong trường hidden
        if(isset($_POST["txtmadm"]))
            $madm=$_POST["txtmadm"];
        //xoá danh mục khỏi csdl
        $sql="DELETE FROM danhmuc WHERE madm=$madm";
        $db->exec($sql);
    }
    catch(PDOException $e)
    {
        $error_message=$e->getMessage();
        include("database_error.php");
        exit();
    }
    //Quay về trang quản lý danh mục chính
    header("Location: category_list.php");
?>