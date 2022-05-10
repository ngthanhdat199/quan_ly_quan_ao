<?php
    require_once('layouts/header.php');
    require_once('db/dbhelper.php');
    require_once('utils/utility.php');
    
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
        $sql = "SELECT * FROM products WHERE id IN ($idList)";
        $cartList = executeResult($sql);
    } else {
        $cartList = [];
    }
?>
        <!-- Body -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $count = 0;
                            $total = 0;
                            foreach ($cartList as $item) {
                                $num = 0;
                                foreach ($cart as $value) {
                                    if ($value['id'] == $item['id']) {
                                        $num = $value['num'];
                                        break;
                                    }
                                }
                                $total += ($num*$item['price']);
                                echo '
                                <tr>
                                    <th>'.(++$count).'</th>
                                    <th><img style="height: 100px" src="'.$item['thumbnail'].'"></th>
                                    <th>'.$item['title'].'</th>
                                    <th>'.$num.'</th>
                                    <th>'.number_format($item['price'], 0, ',', '.').'đ</th>
                                    <th>'.number_format($num*$item['price'], 0, ',', '.').'đ</th>
                                    <th style="text-align:center;"><button class="btn btn-danger" onclick="deleteCart('.$item['id'].')">Delete</button></th>
                                </tr>
                                ';
                            }
                        ?>
                        </tbody>
                    </table>
                    <p style="font-size: 30px; color: red; font-weight: 700; padding: 30px 0 0 0;">
                        Total: <?= number_format($total, 0, ',', '.') .'đ' ?>
                    </p>
                    <a href="checkout.php">
                        <button style="min-width: 278px; font-size: 24px; padding: 6px" class="btn btn-success">
                            Checkout
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function deleteCart(id) {
                $.post('api/cookie.php',{
                    'action': 'delete',
                    'id': id
                },function(data) {
                    location.reload()
                })
            }
        </script>
<?php
    require_once('layouts/footer.php');
?>