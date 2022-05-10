<?php
    // require_once('./db/refreshButtonBack.php');
    // require_once('./layouts/header.php');
    // require_once('./db/dbhelper.php');
    // require_once('./utils/utility.php');
    // $wishlist = [];
    // if (isset($_COOKIE['wishlist'])) {
    //     $json = $_COOKIE['wishlist'];
    //     $wishlist = json_decode($json,true);
    // }
    // $idList = [];
    // foreach ($wishlist as $item) {
    //     $idList[] = $item['id'];
    // }
    // if (count($idList) > 0) {
    //     $idList = implode(',',$idList);
    //     // [2,5,6] => 2,5,6
    //     $sql = "SELECT * FROM products WHERE ID IN ($idList)";
    //     $wishArray = executeResult($sql);
    // } else {
    //     $wishArray = [];
    // }
    $wishlist = $data["productCookie"];
    $wishArray = $data["product"];


?>
    <div class="container">
        <div class="main_wishlist">
            <div class="wishlist">
                <div class="qnt">
                    <p>
                        <?php
                        $count = 0; 
                        foreach ($wishlist as $item) {
                            $count++;
                        }
                        if ($count === 0) {
                            echo 'Your wishlist is empty.';
                        }
                        if ($count === 1 ) {
                            echo $count .' item';
                            echo '
                            </p>
                            <button class="button-primary">
                                <i class="far fa-heart"></i>
                                Save
                            </button>
                            ';
                        } else if ($count > 1) {
                            echo $count .' items';
                            echo '
                            </p>
                            <button class="button-primary">
                                <i class="far fa-heart"></i>
                                Save
                            </button>
                            ';
                        }
                    ?>
                </div>
                <div class="row_wishlist">
                    <!-- PHP -->
                    <?php
                        foreach($wishlist as $item) {
                            foreach ($wishArray as $product) {
                                if ($product['ID'] == $item['id']) {
                                    echo '
                                    <div class="product">
                                        <div class="remove">
                                            <button onclick="removewishList('.$product['ID'].')"><i class="fas fa-times"></i></button>
                                        </div>
                                        <div class="item">
                                            <a href="/phpdemo/eShopper/Detail/SayHi/'.$product['ID'].'" class="product_detail">
                                                <div class="product_card">
                                                    <img src="/phpdemo/eShopper/public/img/product/'.$product['thumbnail'].'.webp">
                                                </div>
                                                <div class="about">
                                                    <p class="name">'.$product['title'].'</p>
                                                    <p  class="price">$'.(number_format($product['price'],2,'.',',')).'</p>
                                                </div>
                                                <div class="btn">
                                                    <a href="/phpdemo/eShopper/Detail/SayHi/'.$product['ID'].'" class="product-btn">
                                                        <i class="icon fas fa-eye"></i>
                                                        View Detail
                                                    </a>
                                                    <a onclick="addToCart('.$product['ID'].')" class="product-btn">
                                                        <i class="icon fas fa-shopping-cart"></i>
                                                        Add to cart
                                                    </a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    ';
                                }
                            }
                            
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
