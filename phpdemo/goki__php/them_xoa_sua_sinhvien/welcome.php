<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <title>Welcome</title>
    </head>
    <body>
        <h1 style ="text-align: center; color: red; font-size: 40px">Welcome</h1>
        <div class="container-fluid">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>No</th>
                    <th>Full name</th>
                    <th>User name</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th></th>
                    <th></th>
                </tr>
                <tbody>
                    <?php
                        require_once('sql_connect.php');
                        $sql = "select * from student";
                        $result = mysqli_query($con,$sql);
                        while ($row = mysqli_fetch_array($result,1)) {
                            echo '
                            <tr>
                                <td>'.($row['ID']).'</td>
                                <td>'.($row['fullName']).'</td>
                                <td>'.($row['userName']).'</td>
                                <td>'.($row['password']).'</td>
                                <td>'.($row['email']).'</td>
                                <td>'.($row['phoneNumber']).'</td>
                                <td>
                                    <form method="POST" action="xoa.php">
                                        <input type="hidden" name="id" value=" '.$row['ID'].'">
                                        <input type="submit" value="Xóa">
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="sua_form.php">
                                        <input type="hidden" name="id" value="'.$row['ID'].'">
                                        <input type="submit" value="Sửa">
                                    </form>
                                </td>
                            </tr>';
                        }
                        require_once('sql_close.php');
                    ?>
                </tbody>
            </table>
            <a href="them_form.php">
                <input type="submit" value="Thêm">
            </a>
        </div>
    </body>
</html>