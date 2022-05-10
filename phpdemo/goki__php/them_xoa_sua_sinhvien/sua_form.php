<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <title>Welcome</title>
    </head>
    <?php
        require_once('sql_connect.php');
        $sql = "select * from student where ID = $_POST[id]";
        $result = mysqli_query($con,$sql);
    ?>
    <body>
        <div class="container-fluid">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>No</th>
                    <th>Full name</th>
                    <th>User name</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($result,1)) {
                            echo '
                            <tr>
                                <td readonly="true">'.($row['ID']).'</td>
                                <td>'.($row['fullName']).'</td>
                                <td>'.($row['userName']).'</td>
                                <td>'.($row['password']).'</td>
                                <td>'.($row['email']).'</td>
                                <td>'.($row['phoneNumber']).'</td>
                            </tr>';
                        }
                        require_once('sql_close.php');
                    ?>
                </tbody>
            </table >
            <br>
            <h1>Sửa thông tin</h1>
            <form action="sua.php" method="POST">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>No</th>
                        <th>Full name</th>
                        <th>User name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="id" value="<?php echo $_POST["id"] ?>"></td>
                        <td><input type="text" name="fullName"></td>
                        <td><input type="text" name="userName"></td>
                        <td><input type="text" name="password"></td>
                        <td><input type="text" name="email"></td>
                        <td><input type="text" name="phoneNumber"></td>   
                    </tr>
                </table>
                <br>
                <input type="submit" value="Xác nhận">
            </form>
        </div>
    </body>
</html>