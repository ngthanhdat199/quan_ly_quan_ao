<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang danh mục</title>
</head>
<?php 
    require_once("database.php");
    $sql="SELECT * from danhmuc order by madm";
    $bangdm=$db->query($sql);
?>
<body>
    <h1 class="text-primary">Quản lý danh mục</h1>
    <table border=1>
        <tr>
            <th>Tên</th>
            <th>Xoá</th>
            <th>Sửa</th>
        </tr>
        <?php foreach($bangdm as $d) { ?>
            <tr>
                <td><?php echo $d['tendm'];?></td>
                <td>
                    <form action="delete_category.php" method="post">
                        <input type="hidden" name="txtmadm" value="<?php echo $d["madm"];?>">
                        <input type="submit" value="Xoá">
                    </form>
                </td>
                <td>
                    <form action="update_category_form.php" method="post">
                        <input type="hidden" name="txtma" value="<?php echo $d["madm"]; ?>">
                        <input type="submit" value="Sửa">
                    </form>
                </td>
            </tr>
            <?php } ?>
    </table>
    <br/>
    <a href="add_category_form.php"><input type="button" value="Thêm danh mục"></a>
</body>
</html>