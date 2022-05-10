<?php
class Cart extends Controller {
    public $productModel;
    public function __construct() {
        // Model
        $this->productModel = $this->model("ProductModel");
    }

    public function SayHi() {
        $this->view("master1", [
            "page"=>"cart",
            "product"=>$this->productModel->cart(),
            "productCookie"=>$this->productModel->cartCookie()
        ]);
    }
} 

?>