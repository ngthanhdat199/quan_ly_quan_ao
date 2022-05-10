

<?php
   require_once("database.php");
    try{
        //Lấy mã và tên danh mục từ form
        if(isset($_POST['txtten']))
            $tendm=$_POST['txtten'];
        if(isset($_POST['txtma']))
            $madm=$_POST['txtma'];
        echo $tendm.'-'.$madm;
        //Cập nhật danh mục vào csdl
        $sql="UPDATE danhmuc SET tendm='$tendm' WHERE madm=$madm";
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

