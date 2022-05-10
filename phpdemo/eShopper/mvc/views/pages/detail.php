
<?php
    // require_once('db/refreshButtonBack.php');
    // require_once('layouts/header.php');
    // require_once('db/dbhelper.php');
    // require_once('utils/utility.php');
    // require_once('api/wishlistHandle.php');
    // $id = getGet('id');
    // $productList = executeResult('SELECT * FROM products');
    // $product = executeResult('SELECT * FROM products WHERE id = '.$id.'',true);
    $idList = $data["wishArray"];
    $productList = json_decode($data["productList"],1);
    $product = json_decode($data["product"],1);
?>
    <div class="container">
        <div class="main_details">
            <div class="box_details">
                <div class="details">
                    <div class="view">
                        <a href="javascript:history.go(-1)">
                            <button>
                                <i class="back fas fa-long-arrow-alt-left"></i>
                            </button>
                        </a>
                        <div class="overview">
                            <img src="/phpdemo/eShopper/public/img/product/<?php echo $product['thumbnail'] ?>.webp">
                        </div>
                        <!-- ./public/img/product/'.$product['thumbnail'].'.web -->
                    </div>

                    <div class="content">
                        <div class="star_box">
                            <p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                        </div>
                        <div class="product_details">
                            <div class="info">
                            
                                <div class="name_box">
                                    <div class="name"><?php echo $product['title'] ?></div>
                                    <div class="heart">
                                        <button onclick="addwishList(<?php echo $product['ID']?>)">
                                            <?php
                                            if (in_array($product['ID'],$idList)) {
                                                echo '
                                                <i class="showIcon fas fa-heart"></i>
                                                ';
                                            } else {
                                                echo '
                                                <i class="far fa-heart"></i>
                                                ';
                                            }
                                            ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="colors">
                                    <span class="title">Colors</span>
                                    <div class="pick">
                                        <span>Blue</span>
                                        <p class="color_pick"></p>
                                        <span>
                                            <i class="fas fa-angle-right"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="size">
                                    <span class="title">Size</span>
                                    <div class="pick">
                                        <span >50</span>
                                        <span class="arrow">
                                            <i class="fas fa-angle-right"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="price_box">
                                    <p class="price"><?php echo '$'.(number_format($product['price'],2,'.',',')) ?></p>
                                    <p class="online">
                                        <span></span>
                                        In stock
                                    </p>
                                </div>
                            </div>
                            <button class="addBtn" onclick="addToCart(<?=$id?>)">Place in Cart</button>
                        </div>

                        <div class="info">
                            <p class="design"><?php echo $product['content'] ?></p>
                        </div>

                        <div class="features">
                            <h4>Detailed Features</h4>
                            <ul>
                                <li><?php echo $product['more'] ?></li>
                            </ul>
                        </div>
                    </div>

                    
                    
                </div>
            </div>
            

            <div class="comment">
                <div class="left">
                    <p>Overall Satisfaction Rating</p>
                    <h1>4.5</h1>
                    <div class="star">
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half"></i>
                        </p>
                    </div>
                    <ul>
                        <li>
                            <span>5 stars</span>
                            <div class="length">
                                <div class="actual" style="width: 53.33%"></div>
                            </div>
                        </li>
                        <li>
                            <span>4 stars</span>
                            <div class="length">
                                <div class="actual" style="width: 43.33%"></div>
                            </div>
                        </li>
                        <li>
                            <span>3 stars</span>
                            <div class="length">
                                <div class="actual" style="width: 33.33%"></div>
                            </div>
                        </li>
                        <li>
                            <span>2 stars</span>
                            <div class="length">
                                <div class="actual" style="width: 23.33%"></div>
                            </div>
                        </li>
                        <li>
                            <span>1 stars</span>
                            <div class="length">
                                <div class="actual" style="width: 13.33%"></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="center">
                    <div class="cmt">
                        <div class="avatar">
                            <img src="/phpdemo/eShopper/public/img/more/avatar.png">
                        </div>
                        <div class="user">
                            <p class="name">John</p>
                            <p class="num_star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <span>March 25, 2022</span>
                            <p class="facts">
                                Quick delivery and item is working!
                            </p>
                        </div>
                    </div>
                    <div class="cmt">
                        <div class="avatar">
                            <img src="/phpdemo/eShopper/public/img/more/avatar.png">
                        </div>
                        <div class="user">
                            <p class="name">Alex</p>
                            <p class="num_star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <span>April 6, 2022</span>
                            <p class="facts">
                            You were responsive to my urgent shipping needs. Thank you.
                            </p>
                        </div>
                    </div>
                    <div class="cmt">
                        <div class="avatar">
                            <img src="/phpdemo/eShopper/public/img/more/avatar.png">
                        </div>
                        <div class="user">
                            <p class="name">Peter</p>
                            <p class="num_star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <span>June 25, 2021</span>
                            <p class="facts">
                            Bought LV bumbag for good price, great communication and fast shipping !!</p>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <h4>Share your feedback</h4>
                    <textarea name="" cols="32" rows="3"></textarea>
                    <div class="send">
                        <button class="button-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="related">
            <p>Related product</p>
            <div class="trans">
                <div id="pre_product" class="pre">
                    <i class="angle-left fas fa-angle-left"></i>
                </div>

                <div id="next_product" class="next ">
                    <i class="angle-right fas fa-angle-right"></i>
                </div>
            </div>
            <div class="cover">
                <div class="row_details">
                    <!-- PHP -->
                    <?php
                        foreach($productList as $product) {
                            echo '
                            <div class="product">
                                <div class="item">
                                    <a href="/phpdemo/eShopper/Detail/SayHi/'.$product['ID'].'" class="product_detail">
                                        <div class="product_card">
                                            <div class="details">
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
                    ?>
                    </div>
                </div>
            </div>
    </div>