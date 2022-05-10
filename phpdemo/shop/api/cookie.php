<?php
    require_once('../utils/utility.php');
    if (!empty($_POST)) {
        $action = getPost('action');
        $id = getPost('id');
        $quantity = getPost('quantity');
        $actionwishList = getPost('actionwishList');
    }
    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $json = $_COOKIE['cart'];
        $cart = json_decode($json,true);
    }

    $wishlist= [];
    if (isset($_COOKIE['wishlist'])) {
        $json = $_COOKIE['wishlist'];
        $wishlist = json_decode($json,true);
    }

    switch ($action) {
        case 'add':
            $isFind = false;
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['id'] == $id) {
                    $cart[$i]['quantity'] += $quantity;
                    $isFind = true;
                    break;
                }
            }
            if (!$isFind) {
                $cart[] = [
                    'id' => $id,
                    'quantity' => $quantity
                ];
            }
            setcookie('cart',json_encode($cart),time() + 30*24*3600, '/');
            break;
        case 'plus':
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['id'] == $id) {
                    $cart[$i]['quantity']++;
                    break;
                }
            }
            setcookie('cart',json_encode($cart),time() + 30*24*3600, '/');
            break;
        case 'minus':
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['quantity'] > 1) {
                    if ($cart[$i]['id'] == $id) {
                        $cart[$i]['quantity']--;
                        break;
                    }
                }
            }
            setcookie('cart',json_encode($cart),time() + 30*24*3600, '/');
            break;
    
        case 'delete':
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['id'] == $id) {
                    array_splice($cart,$i,1);
                }
            }
            setcookie('cart',json_encode($cart), time() + 30*24*3600, '/');
            break;
    }
    
    switch ($actionwishList) {
        case 'add':
            $wishlist[] = [
                'id' => $id
            ];
            setcookie('wishlist',json_encode($wishlist), time() + 30*24*3600, '/');
        break;
        case 'remove':
            for ($i = 0; $i < count($wishlist); $i++) {
                if ($wishlist[$i]['id'] == $id) {
                    array_splice($wishlist,$i,1);
                }
            } setcookie('wishlist',json_encode($wishlist), time() + 30*24*3600, '/');
        break;
        case 'show': 
            $wishlist[] = [
                'id' => $id
            ];
            setcookie('wishlist',json_encode($wishlist), time() + 30*24*3600, '/');
        break;
    }

?>