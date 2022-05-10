<?php
    // require_once('./db/refreshButtonBack.php');
    // require_once('./db/dbhelper.php');
    // require_once('./utils/utility.php');
    // require_once('./layouts/header.php');
    // require_once('./api/pageHandle.php');
    // require_once('./api/searchHandle.php');
    // require_once('./api/wishlistHandle.php');
    // $productList = executeResult("SELECT * FROM products WHERE TITLE LIKE '$search%' OR TYPE LIKE '$search%' LIMIT $begin,$productNumber" );
    $idList = $data["wishArray"];
    $result = $data["result"];
    $pages = $data["productPages"];
    $search = $data["search"];
    $productList = json_decode($data["product"],1);
    
?>

    <div class="container">
        <div class="main_search">
            <?php
                if ($result>0) {
                    echo '
                    <div class="title">
                        <h2> search result "'.$search.'" </h2>
                    </div>
                    <div class="search">
                    <div class="row">';
                            foreach($productList as $product) {
                                echo '
                                <div class="product">
                                    <div class="item">
                                        <a href="/phpdemo/eShopper/Detail/SayHi/'.$product['ID'].'" class="product_detail">
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
                                                <img src="/phpdemo/eShopper/public/img/product/'.$product['thumbnail'].'.webp">
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
                            echo '
                        </div>
                    </div>
                </div>
                    ';
                } else {
                    echo '
                    <div class="title active">
                        <h2> no result were found for the keyword "'.$search.'"</h2>
                    </div>
                    ';
                }
            ?>
            
             <div class="page">
                <ul>
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                    ?>
                        <li>
                            <?php
                            if ($i == $page) {
                                echo '
                                    <a class="active" href="search.php?search='.$search.'&page= '.$i.' "> '.$i.'</a>
                                ';
                            } else {
                                echo '
                                    <a class="page" href="search.php?search='.$search.'&page= '.$i.'">'.$i.'</a>
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
    </div>
