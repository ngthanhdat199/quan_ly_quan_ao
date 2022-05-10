<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản lý bán hàng</title>
    </head>
    <body>
        <h1>Thêm sản phẩm</h1>
        <form method="POST" action="them.php">
            <table border = 1>
                <tr>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <td><input type="text" name="tensp" required="require"></td>
                    </tr>
                </tr>
            </table>
            <br>
            <input type="submit" value="Thêm">
            <a href="index.php"><input type="submit" value="Quay về"></a>
        </form>
    </body>
</html>