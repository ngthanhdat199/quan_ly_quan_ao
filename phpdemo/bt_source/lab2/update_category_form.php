<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật</title>
</head>
<?php 
    require_once("database.php");
    $sql="SELECT * from danhmuc order by madm";
    $bangdm=$db->query($sql);
?>
<body>
    <h1>Sửa danh mục</h1>
    <form method="post" action="update_category.php">
        <table>
            <tr>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
            </tr>
            <?php foreach($bangdm as $d) { ?>
                <tr>
                    <td><input type="text" name="txtma" value="<?php echo $d['madm'];?>" readonly="true"></td>
                    <td><input type="text" name="txtten" value="<?php echo $d['tendm'];?>"</td>
                </tr>
            <?php } ?>
        </table><br>
        <input type="submit" value="Cập nhật">
        <a href="category_list.php"><input type="button" value="Quay về"></a>
    </form>
</body>
</html>