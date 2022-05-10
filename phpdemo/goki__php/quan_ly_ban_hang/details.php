<?php
    require_once('layouts/header.php');
    require_once('db/dbhelper.php');
    require_once('utils/utility.php');

    $id = getGet('id');
    $product = executeResult('SELECT * FROM products WHERE id = '.$id.'',true);
    if ($product == null) {
        header('Location: products.php');
        die();
    }
?>
        <!-- Body -->
        <div class="container">
            <div style="padding: 30px 0 0 0;" class="row">
                <div style="max-height: 500px" class="col-md-5">
                    <img style="width:100%; height:100%" src="<?php echo $product['thumbnail'] ?>">
                </div>
                <div style="max-height: 500px" class="col-md-7">
                    <h4><?php echo $product['title'] ?></h4>
                    <p style="font-size: 32px; color: red; font-weight: 700"><?php echo (number_format($product['price'], 0, ',', '.').'đ' ) ?></p>
                    <button class="btn btn-success" style="width: 100%; font-size: 30px" onclick="addToCart(<?=$id?>)">Add to cart</button>
                </div>
                <div style="margin-bottom: 400px" class="col-md-12">
                    <p style="width: 500px;line-height: 32px;margin-top: 24px; padding: 20px 10px 22px 25px; border: solid 1px #e9ecef; background: #f8f9fa"><?php echo $product['content'] ?></p>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function addToCart(id) {
                $.post('api/cookie.php',{
                    'action': 'add',
                    'id': id,
                    'num': 1
                },function(data) {
                    location.reload()
                })
            }
        </script>
<?php
    require_once('layouts/footer.php');
?>