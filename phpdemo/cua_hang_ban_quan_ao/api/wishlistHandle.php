<?php

    $wishlist = [];
    if (isset($_COOKIE['wishlist'])) {
        $json = $_COOKIE['wishlist'];
        $wishlist = json_decode($json,true);
    }
    $idList = [];
    foreach ($wishlist as $item) {
        $idList[] = $item['id'];
    }