<?php
    require_once('layouts/header.php');
    require_once('db/dbhelper.php');
    require_once('utils/utility.php');
    require_once('api/checkout-form.php');
    
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
        <form method="post">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 style="text-align:center; color: red">Shipping Infomation</h3>
                        <div class="form-group">
                            <label for="fullname">Name:</label>
                            <input required="true" type="text" class="form-control" id="usr" name="fullname">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input required="true" type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone number:</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="note">Note:</label>
                            <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                        </div>
                        <h3 style="text-align:center; color: red">Cart</h3>
                        <table style="margin: 40px 0 0 0" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
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
                                    </tr>   
                                    ';
                                }
                            ?>
                            </tbody>
                        </table>
                        <p style="font-size: 30px; color: red; font-weight: 700; padding: 30px 0 0 0;">
                            Total: <?= number_format($total, 0, ',', '.') .'đ' ?>
                        </p>
                        <a href="checkout-form.php">
                            <button style="width: 100%; font-size: 24px; padding: 8px; margin: 12px 0 0 0" class="btn btn-success">
                                Complete
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
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