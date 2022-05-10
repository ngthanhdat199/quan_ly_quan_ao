<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopper</title>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/img/fontawesome-free-5.12.1-web/css/all.css"/>
</head>
<?php
    require_once('./api/filterHandle.php');
?>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="navbar_list">
                <div class="nav_left">
                    <div class="logo">
                        <a class="logo_link" href="./index.php">
                            <span class="shop_name">E</span>
                            <p class="shopper">Shopper</p>
                        </a>
                    </div>

                    <div class="search">
                        <div class="search_input">
                            <form action = "./search.php" method="get">
                                <input name="search" placeholder="Search for products" type="text" class="searching" id="searching">
                                <button type="submit" class="search_icon">
                                    <i class="color_search  fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <?php
                    $cart=[];
                    if(isset($_COOKIE['cart'])) {
                        $json = $_COOKIE['cart'];
                        $cart = json_decode($json,true);
                    }
                    $wishlist=[];
                    if(isset($_COOKIE['wishlist'])) {
                        $json = $_COOKIE['wishlist'];
                        $wishlist = json_decode($json,true);
                    }
                    $count = 0;
                    foreach ($cart as $item) {
                        $count += $item['quantity'];
                    }

                    $countWishlist = 0;
                    foreach ($wishlist as $item) {
                        $countWishlist ++;
                    }
                ?>

                <div class="cart">
                    <a href="./wishlist.php" class="heart">
                        <span><i class="color_cart fas fa-heart text-primary"></i></span>
                        <span class="num"><?=$countWishlist?></span>
                    </a>
                    <a href="./cart.php" class="heart">
                        <span><i class="color_cart fas fa-shopping-cart text-primary"></i></span>
                        <span class="num"><?=$count?></span>
                    </a>
                </div>
            </div>

            <div class="list_categories">
                <!-- <div class="navigate">
                    <button  class="dropBtn button-primary category">Categories
                        <i class="arrow_down fa fa-angle-down text-dark"></i>
                    </button>
                    <div id="myDropdown" class="dropdown_menu">
                        <div class="dropDownChild">
                            <button class="dropBtnChild">Dresses
                                <i class="arrow_down fa fa-angle-down text-dark"></i>
                            </button>
                            <div id="myDropDownMenu" class="dropDown__content">   
                                <a href="" class="dropDown__item">Men's Dresses</a>
                                <a href="" class="dropDown__item">Women's Dresses</a>
                                <a href="" class="dropDown__item">Baby's Dresses</a>
                            </div>  
                        </div>
                            <a class="cate_item" href="">Shirts</a>
                            <a class="cate_item" href="">Jeans</a>
                            <a class="cate_item" href="">Swimwear</a>
                            <a class="cate_item" href="">Sleepwear</a>
                            <a class="cate_item" href="">Sportswear</a>
                            <a class="cate_item" href="">Jumpsuits</a>
                            <a class="cate_item" href="">Blazers</a>
                            <a class="cate_item" href="">Jackets</a>
                            <a class="cate_item" href="">Shoes</a>                    
                    </div>
                </div> -->

                <div class="home">
                    <div class="home_nav">
                        <div class="home_shop">
                            <?php 
                            if ($type == 'highlights') {
                                echo '
                                <a href="filter.php?type=highlights" id="highlights" class="home_item active">Highlights</a>
                                ';
                            } else {
                                echo '
                                <a href="filter.php?type=highlights" id="highlights" class="home_item">Highlights</a>
                                ';
                            }
                            if ($type == 'bags') {
                                echo '
                                <a href="filter.php?type=bags" id="bags" class="home_item active">Bags</a>
                                ';
                            } else {
                                echo '
                                <a href="filter.php?type=bags" id="bags" class="home_item">Bags</a>
                                ';
                            }
                            if ($type == 'shoes') {
                                echo '
                                <a href="filter.php?type=shoes" id="shoes" class="home_item active">Shoes</a>
                                ';
                            } else {
                                echo '
                                <a href="filter.php?type=shoes" id="shoes" class="home_item">Shoes</a>
                                ';
                            }
                            if ($type == 'accessories') {
                                echo '
                                <a href="filter.php?type=accessories" id="accessories" class="home_item active">Accessories</a>
                                ';
                            } else {
                                echo '
                                <a href="filter.php?type=accessories" id="accessories" class="home_item">Accessories</a>
                                ';
                            }
                            ?>
                            <!-- <a href="filter.php?type=bags" id="bags" class="home_item">Bags</a>
                            <a href="filter.php?type=shoes" id="shoes" class="home_item">Shoes</a>
                            <a href="filter.php?type=accessories" id="accessories" class="home_item">Accessories</a> -->
                            <div class="home_dropDown">
                                <button class="home_dropBtn">Pages
                                    <i class="arrow_down fa fa-angle-down text-dark"></i>
                                </button>
                                <div id="home_drop_content" class="home_dropDown_content">
                                    <a href="" class="home_dropItem">Shopping Cart</a>
                                    <a href="" class="home_dropItem">Checkout</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="enter">
                            <a href="" class="login">Login</a>
                            <a href="" class="login">Register</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>