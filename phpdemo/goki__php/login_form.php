<?php
    require_once('login.php');
    login();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <title>PHP tutorial</title>
    </head>
    <body>
        <div class="container">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-default btn-success">Submit</button>
            </form>
        </div>
    </body>
</html>