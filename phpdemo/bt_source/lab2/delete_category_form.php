<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Xoá danh mục</h1>
    <form method="post" action="delete_category.php">
        <table>
            <tr>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
            </tr>
            <tr>
                <td><input type="text"name="txtmadm"
                value="<?php echo $madm;?>" readonly="true"></td>
            </tr>
        </table><br>
        <input type="submit" value="Xoá">
        <a href ="category_list.php"><input type="button" value="Quay về"></a>
    </form>
</body>
</html>