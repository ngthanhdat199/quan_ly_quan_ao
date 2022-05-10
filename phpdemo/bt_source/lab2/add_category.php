<?php 
    require_once("database.php");
    try
    {
        //lấy tên danh mục do người dùng nhập từ form
        if(isset($_POST["txtma"]))
            $madm=$_POST["txtma"];
        if(isset($_POST["txtten"]))
            $tendm=$_POST["txtten"];
        //Thêm mới danh mục vào csdl
        $sql ="INSERT INTO danhmuc(madm,tendm) VALUES('$madm','$tendm')";      
            $db->exec($sql);    
    }
    catch(PDOException $e)
    {
        $error_message=$e->getMessage();
        include("database_error.php");
        exit();
    }
    header("Location: category_list.php");
?>