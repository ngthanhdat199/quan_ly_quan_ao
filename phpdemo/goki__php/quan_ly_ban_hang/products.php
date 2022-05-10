<?php
    require_once('layouts/header.php');
    require_once('db/dbhelper.php');
    require_once('utils/utility.php');
    $productList = executeResult('SELECT * FROM products');
?>
        <!-- Body -->
        <div class="container">
            <div class="row">
                <?php
                    foreach($productList as $item) {
                        echo '
                        <div class="col-md-3 col-6">
                            <a href="details.php?id='.$item['id'].'">
                                <img src="'.$item['thumbnail'].'"style="width: 100%">
                                <p>'.$item['title'].'</p>
                            </a>
                            <p style="color: red">'.number_format($item['price'], 0, ',', '.').'đ</p>
                        </div>
                        ';
                    }
                ?>
            </div>
        </div>
<?php
    require_once('layouts/footer.php');
?>