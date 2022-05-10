<?php
class Wishlist extends Controller {
    public $productModel;

    public function __construct() {
        // Model 
        $this->productModel = $this->model("ProductModel");
    }

    public function SayHi() {
        $this->view("master1", [
            "page"=>"wishlist",
            "product"=>$this->productModel->wishlist(),
            "productCookie"=>$this->productModel->wishListCookie()
        ]);
    }
}
?>