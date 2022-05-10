
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->

    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
    <title>Products page</title>
    <style type="text/css">
        .container .row {
            min-height: 1200px;
        }
    </style>
</head>
<body>
    <!-- Header -->
        <!-- Grey with black text -->
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
            <div class="container">
                <ul style="font-size: 18px" class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="products.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Track order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                <?php
                    $cart = [];
                    if (isset($_COOKIE['cart'])) {
                        $json = $_COOKIE['cart'];
                        $cart = json_decode($json,true);
                    }
                    $count = 0;
                    foreach ($cart as $item) {
                        $count += $item['num'];
                    }
                ?>
                <a href="cart.php">
                    <button type="button" class="btn btn-primary">Carts 
                        <span class="badge badge-light"><?=$count?></span>
                    </button>
                </a>   
            </div>
        </nav>'