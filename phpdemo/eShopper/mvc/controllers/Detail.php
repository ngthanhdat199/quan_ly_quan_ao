<?php
class Detail extends Controller {
    public $productModel;

    public function __construct(){
        $this->productModel = $this->model("ProductModel");
    }

    public function SayHi($id){
        $this->view("master1", [
            "page"=>"detail",
            "wishArray"=>$this->productModel->wishArray(),
            "product"=>$this->productModel->detail($id),
            "productList"=>$this->productModel->listAll()
        ]);
    }
}

?>