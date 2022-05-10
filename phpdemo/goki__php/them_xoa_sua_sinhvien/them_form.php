
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
        <div class="container-fluid">
            <form action="them.php" method="POST">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Full name</th>
                        <th>User name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="fullName"></td>
                        <td><input type="text" name="userName"></td>
                        <td><input type="text" name="password"></td>
                        <td><input type="text" name="email"></td>
                        <td><input type="text" name="phoneNumber"></td>   
                    </tr>
                </table>
                <input type="submit" value="Xác nhận">
            </form>
        </div>
    </body>
</html>