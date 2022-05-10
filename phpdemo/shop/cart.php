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
        <div class="main_cart">
            <div class="shopping">
                <?php
                    $total = 0;
                    if ($quantity < 1) {
                        echo '
                        <div class="empty">
                            <div class="bag">
                                <img src="https://us.louisvuitton.com/static_lvfront/cart/empty-large.png">                
                            </div>
                            <p class="title">YOUR SHOPPING BAG IS EMPTY</p>
                            <div class="shop">
                                <a href="index.php">
                                    <button>START SHOPPING</button>
                                </a>
                            </div>
                        </div>
                        ';
                    } else {
                    echo '
                    <div class="head">
                        <h1 class="title">my shopping cart
                            <span>'.'('.$quantity.')'.'</span>
                        </h1>
                        <a href="index.php" class="continue">Continue Shopping</a>
                    </div>
                    ';
                    
                        foreach ($cart as $value) {
                            $quantity = 0;
                            foreach ($cartList as $item) {
                                $subtotal = 0;
                                if ($value['id'] == $item['ID']) {
                                    $quantity = $value['quantity'];
                                    $subtotal += ($quantity*$item['price']);
                                    break;
                                }
                            }
                            $total += $subtotal;
                            echo '
                            <div class="info">
                                <div class="cart_product">
                                    <img class="view" src="'.$item['thumbnail'].'">
                                </div>
        
                                <div class="detail">
                                    <p class="name">
                                        <a href="details.php?id='.$item['ID'].'">
                                            '.$item['title'].'
                                        </a>
                                    </p>
                                    
                                    <div class="detail_price">
                                        <span class="item-quantity">
                                            <button onclick="minusQuantity('.$item['ID'].')">-</button>
                                            <input type="number" value="'.$quantity.'">
                                            <button onclick="plusQuantity('.$item['ID'].')">+</button>
                                        </span>
                                        <span class="price">$'.(number_format($subtotal,2,'.',',')).'</span>
                                    </div>
        
                                    <div class="btn">
                                        <a href="details.php?id='.$item['ID'].'" class="product-btn">
                                            <i class="icon fas fa-eye"></i>
                                            View Detail</a>
                                            
                                        <a onclick="deleteCart('.$item['ID'].')" class="product-btn">
                                            <i class="icon far fa-times-circle"></i>
                                            Remove
                                        </a>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    }
                ?>
            </div>
            <?php
            if ($quantity >= 1) {
                echo '
                <div class="pay">
                    <ul class="total">
                        <li class="part">
                            <div class="price_info">
                                <span>Subtotal</span>
                                <span>$'.number_format($total,2,'.',',').'</span>
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
                                <span>$'.number_format($total,2,'.',',').'</span>
                            </div>
                        </li>
                        
                        <div class="action">
                            <a href="checkout.php">
                                <button class="button-primary checkout">Proceed to checkout</button>    
                            </a>
                        </div>
                    </ul>
                </div>
                    ';
            }
            ?>
        </div>
    </div>
<?php
    require_once('layouts/footer.php');
?>