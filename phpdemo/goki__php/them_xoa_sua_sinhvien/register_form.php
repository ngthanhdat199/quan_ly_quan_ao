<?php
    session_start();
    require_once('register.php');
    register();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <title>Form register</title>
    </head>
    <body>
        <div class="container">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="fullName">Họ và tên: </label>
                    <input type="text" class="form-control" name="fullName">
                </div>
                <div class="form-group">
                    <label for="userName">User Name: </label>
                    <input type="text" class="form-control" name="userName">
                </div>
                <div class="form-group">
                    <label for="pwd">Password: </label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="email">Email address: </label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone number: </label>
                    <input type="text" class="form-control" name="phoneNumber">
                </div>
                <button type="submit" class="btn btn-default btn-success">Register</button>
            </form>
        </div>
    </body>
</html>