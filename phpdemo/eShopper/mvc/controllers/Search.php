<?php
class Search extends Controller {
    public $productModel;

    public function __construct() {
        // Model
        $this->productModel = $this->model("ProductModel");
    }

    public function SayHi() {
        $this->view("master1",[
            "page"=>"search",
            "result"=>$this->productModel->countProduct(),
            "search"=>$this->productModel->getSearch(),
            "wishArray"=>$this->productModel->wishArray(),
            "productPages"=>$this->productModel->searchPages(),
            "product"=>$this->productModel->searchProduct()
        ]);
    }
}

?>