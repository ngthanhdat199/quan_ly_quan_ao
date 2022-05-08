<?php
    require_once('./db/refreshButtonBack.php');
    require_once('./db/dbhelper.php');
    require_once('./utils/utility.php');
    require_once('./layouts/header.php');
    require_once('api/wishlistHandle.php');
    require_once('api/pageHandle.php');
   
    $productList = executeResult("SELECT * FROM products LIMIT $begin,$productNumber");
    
?>

    <div class="container">
        <div class="main">
            <div class="home">
                <div class="slide">
                    <div class="slides">
                        <img class="slideImage" src="https://us.louisvuitton.com/images/is/image/Iconic_Keepall_V4_HP_DI3.jpg?wid=2048" class="products">
                        <img class="slideImage" src="https://us.louisvuitton.com/images/is/image/Daybreak_HP_V2_DI3.jpg?wid=2048" class="products">
                        <img class="slideImage" src="https://us.louisvuitton.com/images/is/image/U_Ma_Brand_campaign_France_Mont_St_Michel_V4_HP_DI3.jpg?wid=2048" class="products">
                        <img class="slideImage" src="https://im.uniqlo.com/global-cms/spa/res47ff8618c9cf8a24cde3446f936b8b19fr.jpg" class="products">
                        <img class="slideImage" src="https://us.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--Women_FW_2022_Show_DI2.jpg?wid=824" class="products">
                    </div>

                    <div class="trans">
                        <div id="pre_btn" class="pre">
                            <i class="angle-left fas fa-angle-left"></i>
                        </div>

                        <div id="next_Btn" class="next ">
                            <i class="angle-right fas fa-angle-right"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
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
            <!-- PHP -->
            <?php
                foreach($productList as $product) {
                    echo '
                    <div class="product">
                        <div class="item">
                            <a href="details.php?id='.$product['ID'].'" class="product_detail">
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
                                    <img src="'.$product['thumbnail'].'">
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
    </div>

<?php
    require_once('./layouts/footer.php');
?>
<script>
    document.addEventListener("DOMContentLoaded", function(event) { 
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>