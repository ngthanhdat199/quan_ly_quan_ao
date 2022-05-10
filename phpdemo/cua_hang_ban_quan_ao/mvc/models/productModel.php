<?php
class productModel extends db{
    public function GetProduct(){
        return "Ngo Thanh Dat";
    }

    public function tong($m, $n) {
        return $m + $n;
    } 

    public function product() {
        $sql = "SELECT * FROM PRODUCTS";
        return mysqli_query($this->con, $sql);
    }
}

?>