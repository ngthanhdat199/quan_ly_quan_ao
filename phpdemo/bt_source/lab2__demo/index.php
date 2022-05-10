<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản lý bán hàng</title>
    </head>
    <?php
        require_once('database.php');
        $sql = "select * from sanpham";
        $db = $conn -> query($sql);
    ?>
    <body>
        <h1>Quản lý danh mục</h1>
        <table border=1>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
            <?php while($row = mysqli_fetch_array($db)) {?>
            <tr>
                <td style="min-width: 48px"><?php echo $row['masp'];?></td>
                <td style="min-width: 48px"><?php echo $row['tensp'];?></td>
                <td>
                    <form method="POST" action="xoa.php">
                        <input type="hidden" name="masp" value="<?php echo $row['masp'];?>">
                        <input type="submit" value="Xóa" style="min-width: 60px">
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <input id="updateId" type="hidden" name="masp" value="<?php echo $row['masp'];?>">
                        <input class="updateBtn" name="updateBtn" value="Sửa" readonly="true" style="min-width: 60px; cursor:pointer">
                    </form>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        <br> 
        <div>
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
        </div>
        <div id="update_form">

        </div>
    </body>
    
    <script>
        var updateBtns = document.querySelectorAll('.updateBtn');
        for (let btn of updateBtns) {
            btn.onclick = () => {
                var htmls = document.querySelector('#update_form');
                htmls.innerHTML = `
                <h1>Sửa danh mục</h1>
                <form method="post" action="sua.php">
                    <table border = 1>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên Sửa</th>
                        </tr>
                            <tr>
                                <td><input type="text" name="txtma" value="${parseInt(btn.parentElement.querySelector('#updateId').value)}"></td>
                                <td><input type="text" name="txttensua"</td>
                            </tr>
                    </table><br>
                    <input type="submit" value="Cập nhật">
                    <a href="index.php"><input type="button" value="Quay về"></a>
                </form>
                `
            }
        }  
    </script>
    <?php
        if (isset($_POST['updateBtn'])) {
            echo '
            <h1>Sửa danh mục</h1>
            <form method="post" action="sua.php">
                <table border = 1>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên Sửa</th>
                    </tr>
                    <?php while($row = mysqli_fetch_array($db)) {?>
                        <tr>
                            <td><input type="text" name="txtma" value='.$_POST['masp'].'></td>
                            <td><input type="text" name="txttensua"</td>
                        </tr>
                    <?php }?>
                </table><br>
                <input type="submit" value="Cập nhật">
                <a href="index.php"><input type="button" value="Quay về"></a>
            </form>
            ';
        }
    ?>

</html>