<?php
class Category extends Controller {
    public $productModel;

    public function __construct() {
        // Model
        $this->productModel = $this->model("ProductModel");
    }

    public function SayHi() {
        $this->view("master1",[
            "page"=>"category",
            "wishArray"=>$this->productModel->wishArray(),
            "type"=>$this->productModel->getType(),
            "productPages"=>$this->productModel->categoryPages(),
            "product"=>$this->productModel->categoryProduct()
        ]);
    }
}
?>