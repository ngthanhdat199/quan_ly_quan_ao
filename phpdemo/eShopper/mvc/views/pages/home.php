<?php
    // require_once('./db/refreshButtonBack.php');
    // require_once('./db/dbhelper.php');
    // require_once('./utils/utility.php');
    // require_once('api/pageHandle.php');
    require_once('api/wishlistHandle.php');
    require_once "./mvc/views/layouts/slider.php";
    $pages = $data["productPages"];
    $productList = json_decode($data["product"],1);    
?>
<div class="prefer">
    <div class="policies">
        <div class="policy">
            <i class="fas fa-check icon"></i>
            Quality Product
        </div>
        <div class="policy">
            <i class="fas fa-shipping-fast icon"></i>
            Free Shipping
        </div>
        <div class="policy">
            <i class="fas fa-exchange-alt icon"></i>
            14 - Day Return
        </div>
        <div class="policy">
            <i class="fas fa-phone-volume icon"></i>
            24/7 Support
        </div>
    </div>
</div>

<div class="products">
    <h2 class="middle">
        <span class="title">New Products</span>
    </h2>
    
    <div class="row">
    <?php
        foreach($productList as $product) {
            echo '
            <div class="product">
                <div class="item">
                    <a href="./Detail/SayHi/'.$product['ID'].'" class="product_detail">
                        <div class="product_card">
                            <div class="wishlist">
                                <button onclick="addwishList('.$product['ID'].')">
                                ';
                                if (in_array($product['ID'],$idList)) {
                                    echo '
                                    <i class="index_heart fas fa-heart"></i>
                                    ';
                                }
                                else {
                                    echo '
                                    <i class=" far fa-heart"></i>
                                    ';
                                }
                                echo '
                                </button>
                            </div>
                            <img src="./public/img/product/'.$product['thumbnail'].'.webp">
                        </div>
                        <div class="about">
                            <p class="name">'.$product['title'].'</p>
                            <p  class="price">$'.(number_format($product['price'],2,'.',',')).'</p>
                        </div>
                        <div class="btn">
                            <a href="details.php?id='.$product['ID'].'" class="product-btn">
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
    ?>
    </div>
    <div class="page">
        <ul>
            <?php
            for ($i = 1; $i <= $pages; $i++) {
            ?>
                <li>
                    <?php
                    if ($i == $page) {
                        echo '
                            <a class="active" href="index.php?page= '.$i.' "> '.$i.'</a>
                        ';
                    } else {
                        echo '
                            <a class="page" href="index.php?page= '.$i.'">'.$i.'</a>
                        ';
                    }
                    ?>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>