<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật</title>
</head>

    <?php
        require_once('database.php');
        $sql = "select * from sanpham where masp = $_POST[masp]";
        $db = $conn -> query($sql);
    ?>
<body>
    <h1>Sửa danh mục</h1>
    <form method="post" action="sua.php">
        <table border = 1>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên Sửa</th>
            </tr>
            <?php while($row = mysqli_fetch_array($db)) {?>
                <tr>
                    <td><input type="text" name="txtma" value="<?php echo $_POST['masp'];?>"></td>
                    <td><input type="text" name="txttensua"</td>
                </tr>
            <?php }?>
        </table><br>
        <input type="submit" value="Cập nhật">
        <a href="index.php"><input type="button" value="Quay về"></a>
    </form>
</body>
</html>