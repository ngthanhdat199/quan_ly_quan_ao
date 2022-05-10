<?php
    if (!empty($_POST)) {
        $cart = [];
        if (isset($_COOKIE['cart'])) {
            $json = $_COOKIE['cart'];
            $cart = json_decode($json,true);
        }
        if ($cart == null || count($cart) == 0) {
            header('Location: products.php');
            die();
        }

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $orderDate = date('Y-m-d H:i:s');
        // echo $fullname.'-'.$email.'-'.$phone_number.'-'.$address;

        // Add order
        $sql = "INSERT INTO orders(fullname,phone_number,email,address,order_date)
        VALUES('$fullname','$phone_number','$email','$address','$orderDate')
        ";        
        execute($sql);
        $sql = "SELECT * FROM orders WHERE order_date = '$orderDate'";
        $order = executeResult($sql, true);
        $orderId = $order['id'];

        
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
        foreach ($cartList as $item) {
            $num = 0;
            foreach ($cart as $value) {
                if ($value['id'] == $item['id']) {
                    $num = $value['num'];
                    break;
                }
            }
            $sql = "INSERT INTO order_details(order_id,product_id,num,price)
            VALUES('$orderId',".$item['id'].",'$num',".$item['price'].")";
            execute($sql);
        }

        header('Location: complete.php');
        setcookie('cart', [], time() - 10, '/');
    }

?>