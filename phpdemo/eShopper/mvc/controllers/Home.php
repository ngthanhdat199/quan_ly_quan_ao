<?php
class Home extends Controller {
    public $productModel;

    public function __construct(){
        // Model
        $this->productModel = $this->model("ProductModel");
    }

    public function SayHi() {
        // $dat = $this->model("productModel");
        // echo $dat->GetProduct();
        $this->view("master1",[
            "page"=>"home",
            "productPages"=>$this->productModel->productPages(),
            "product"=> $this->productModel->listPage()
            // "pageHandle"=>$this->productModel->pageHandle()
        ]); 
    }

    public function Show($a, $b) {
        // Model
        $dat = $this->model("ProductsModel");
        $tong = $dat->tong($a, $b);

        // view
        $this->view("master1",[
            "number"=>$tong,
            "page"=>"news",
            "product"=> $dat->product()
        ]);   
    }
}
?>