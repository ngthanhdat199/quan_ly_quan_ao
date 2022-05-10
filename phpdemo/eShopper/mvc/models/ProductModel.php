<?php
class ProductModel extends db{
    public function GetProduct(){
        return "Ngo Thanh Dat";
    }

    public function tong($m, $n) {
        return $m + $n;
    } 

    public function productPages() {
        $productNumber = 2;
        $pageList = mysqli_query($this->con,"SELECT * FROM products");
        $row_count = mysqli_num_rows($pageList);
        $pages = ceil($row_count/$productNumber);
        return $pages;
    }
    
    public function listPage(){
        // Page Handle
        $productNumber = 2;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        if ($page == '' || $page == 1) {
            $begin = 0;
        } else {
            $begin = ($page*$productNumber) - $productNumber;
        }

        // Product List
        $sql = "SELECT * FROM PRODUCTS LIMIT $begin,$productNumber";
        $rows = mysqli_query($this->con, $sql);
        $mang = array();
        while($row = mysqli_fetch_array($rows)){
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function listAll(){
        $sql = "SELECT * FROM PRODUCTS";
        $rows = mysqli_query($this->con, $sql);
        $mang = array();
        while($row = mysqli_fetch_array($rows)){
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function detail($id){
        $sql = "SELECT * FROM PRODUCTS WHERE id = $id";
        $row = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_array($row,1);
        return json_encode($data);
    }

    public function wishArray() {
        $wishlist = [];
        if (isset($_COOKIE['wishlist'])) {
            $json = $_COOKIE['wishlist'];
            $wishlist = json_decode($json,true);
        }
        $idList = [];
        foreach ($wishlist as $item) {
            $idList[] = $item['id'];
        }
        return $idList;
    }

    public function wishListCookie() {
        $wishlist = [];
        if (isset($_COOKIE['wishlist'])) {
            $json = $_COOKIE['wishlist'];
            $wishlist = json_decode($json,true);
        }
        return $wishlist;
    }

    public function wishlist() {
        $wishlist = [];
        if (isset($_COOKIE['wishlist'])) {
            $json = $_COOKIE['wishlist'];
            $wishlist = json_decode($json,true);
        }
        $idList = [];
        foreach ($wishlist as $item) {
            $idList[] = $item['id'];
        }
        if (count($idList) > 0) {
            $idList = implode(',',$idList);
            // [2,5,6] => 2,5,6
            $sql = "SELECT * FROM products WHERE ID IN ($idList)";
            $rows = mysqli_query($this->con, $sql);
            $mang = array();
            while($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            
            $wishArray = $mang;
        } else {
            $wishArray = [];
        }
        return $wishArray;
    }

    public function cartCookie() {
        $cart = [];
        if (isset($_COOKIE['cart'])) {
            $json = $_COOKIE['cart'];
            $cart = json_decode($json,true);
        }
        return $cart;
    }

    public function cart () {
        $cart = [];
        if (isset($_COOKIE['cart'])) {
            $json = $_COOKIE['cart'];
            $cart = json_decode($json,true);
        }
        $idList = [];
        foreach ($cart as $item) {
            $idList[] = $item['id'];
        }
        if (count($idList) > 0) {
            $idList = implode(',',$idList);
            // [2,5,6] => 2,5,6
            $sql = "SELECT * FROM products WHERE ID IN ($idList)";
            $rows = mysqli_query($this->con, $sql);
            $mang = array();
            while($row = mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            $cartList = $mang;
        } else {
            $cartList = [];
        }
        return $cartList;
    }

    public function getType() {
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        }
        return $type;
    }

    public function categoryProduct() {
        // Type Keyword
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        }
        
        // Page Handle
        $productNumber = 2;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        if ($page == '' || $page == 1) {
            $begin = 0;
        } else {
            $begin = ($page*$productNumber) - $productNumber;
        }

        // Product List
        $sql = "SELECT * FROM PRODUCTS WHERE TYPE = '$type' LIMIT $begin,$productNumber";
        $rows = mysqli_query($this->con, $sql);
        $mang = array();
        while($row = mysqli_fetch_array($rows)){
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function categoryPages() {
        // Type Keyword
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        }
        $productNumber = 2;
        $pageList = mysqli_query($this->con,"SELECT * FROM PRODUCTS WHERE TYPE = '$type'");
        $row_count = mysqli_num_rows($pageList);
        $pages = ceil($row_count/$productNumber);
        return $pages;
    }

    public function searchProduct() {
        // Search Key Word
        if (isset($_GET['search'])) {
            if (strlen(trim($_GET['search']))<=0){
                $search=' ';
            } else {
                $search = $_GET['search'];
                $search = trim($search);
            }
        }
        // Page Handle
        $productNumber = 2;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        if ($page == '' || $page == 1) {
            $begin = 0;
        } else {
            $begin = ($page*$productNumber) - $productNumber;
        }

        // Product List
        $sql = "SELECT * FROM products WHERE TITLE LIKE '$search%' LIMIT $begin,$productNumber";
        $rows = mysqli_query($this->con, $sql);
        $mang = array();
        while($row = mysqli_fetch_array($rows)){
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function searchPages() {
        // Search Key Word
        if (isset($_GET['search'])) {
            if (strlen(trim($_GET['search']))<=0){
                $search=' ';
            } else {
                $search = $_GET['search'];
                $search = trim($search);
            }
        }
        $productNumber = 2;
        $pageList = mysqli_query($this->con,"SELECT * FROM products WHERE TITLE LIKE '$search%'");
        $row_count = mysqli_num_rows($pageList);
        $pages = ceil($row_count/$productNumber);
        return $pages;
    }

    public function getSearch() {
        if (isset($_GET['search'])) {
            if (strlen(trim($_GET['search']))<=0){
                $search=' ';
            } else {
                $search = $_GET['search'];
                $search = trim($search);
            }
        }
        return $search;
    }

    public function countProduct() {
        if (isset($_GET['search'])) {
            if (strlen(trim($_GET['search']))<=0){
                $search=' ';
            } else {
                $search = $_GET['search'];
                $search = trim($search);
            }
        }
        // Page Handle
        $productNumber = 2;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        if ($page == '' || $page == 1) {
            $begin = 0;
        } else {
            $begin = ($page*$productNumber) - $productNumber;
        }
        $sql = "SELECT * FROM products WHERE TITLE LIKE '$search%' LIMIT $begin,$productNumber";
        $row = mysqli_query($this->con,$sql);
        $num_row = mysqli_num_rows($row);
        return $num_row;
    }
}

?>