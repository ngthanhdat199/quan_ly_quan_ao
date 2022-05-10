<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang thêm danh mục</title>
</head>
<body>
    <h1>Thêm danh mục</h1>
    <form  method="post" action="add_category.php">
    <table border=1>
        <tr>
            <th>Mã danh mục</th>
            <td><input type ="text" name="txtma" required="require"></td>
        </tr>
       
        <tr>
            <th>Tên danh mục</th>
            <td><input type ="text" name="txtten" maxlength="50"
        required="require"></td>
        </tr>
    </table><br>
    <input type="submit" value="Thêm">
    <a href="category_list.php"><input type="button" value="Quay về"></a>
    </form>
</body>
</html>