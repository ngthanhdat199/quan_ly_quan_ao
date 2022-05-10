<?php
    require_once('db/refreshButtonBack.php');
    require_once('db/dbhelper.php');
    require_once('utils/utility.php');
    require_once('layouts/header.php');
    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $json = $_COOKIE['cart'];
        $cart = json_decode($json,true);
    }
    $idList = [];
    foreach ($cart as $item) {
        $idList[] = $item['id'];
    }
    if (count($idList) > 0) {
        $idList = implode(',',$idList);
        // [2,5,6] => 2,5,6
        $sql = "SELECT * FROM products WHERE ID IN ($idList)";
        $cartList = executeResult($sql);
    } else {
        $cartList = [];
    }
?>
     <?php
        $quantity = 0;
        foreach ($cart as $item) {
            $quantity += $item['quantity'];
        }
    ?>
    <div class="container">
        <div class="back_checkout">
            <a class="back" href="cart.php">
                    <button>
                        <i class="fas fa-long-arrow-alt-left"></i>
                    </button>
            </a>
        </div>
        <div class="main_checkout">
            <div class="ship_info">
                <div class="title">
                    <h2>identification</h2>
                </div>
                <form class="profile" action="index.php">
                    <div class="info">
                        <p class="part">Email:</p>
                        <input required="true" type="email" name="email" class="text">
                    </div>
                    <div class="info">
                        <p class="part">Phone Number:</p>
                        <input required="true" type="text" class="text">
                    </div>
                    <div class="info">
                        <p class="part">Address:</p>
                        <input required="true" type="text" class="text">
                    </div>
                    <div class="continue">
                        <a class="checkout-end">
                            <button class="button-primary ">Complete</button>
                        </a>
                    </div>
                </form>
            </div>

            <div class="pay">
                <div class="head">
                <h1 class="title">my shopping cart
                        <span><?='('.$quantity.')'?></span>
                    </h1>
                </div>
                <?php
                $total = 0;
                foreach ($cart as $value) {
                    $quantity = 0;
                    foreach ($cartList as $item) {
                        if ($value['id'] == $item['ID']) {
                            $quantity = $value['quantity'];
                            break;
                        }
                    }
                    $total += ($quantity*$item['price']);
                    echo '
                    <div class="product">
                        <div class="view">
                            <img src="'.$item['thumbnail'].'">
                        </div>
                        <div class="info">
                            <p class="name">'.$item['title'].'</p>
                            <p class="price">$'.(number_format($item['price'],2,'.',',')).'</p>
                        </div>
                    </div>
                    ';
                }
                ?>

                <ul class="total">
                    <li class="part">
                        <div class="price_info">
                            <span>Subtotal</span>
                            <span> <?='$'.number_format($total,2,'.',',') ?> </span>
                        </div>
                    </li>
                    <li class="part">
                        <div class="price_info">
                            <span>Shipping</span>
                            <span>$0.00</span>
                        </div>
                    </li>
                    <li class="part">
                        <div class="price_info">
                            <span>Tax</span>
                            <span>$0.00</span>
                        </div>
                    </li>
                    <p class="tax">Will be calculated according to your delivery address</p>
                    <li class="part_info">
                        <div class="price_info">
                            <span>Total</span>
                            <span> <?='$'.number_format($total,2,'.',',') ?></span>
                        </div>
                    </li>
                </ul>


            </div>

        </div>
    </div>


<?php
    require_once('layouts/footer.php');
?>