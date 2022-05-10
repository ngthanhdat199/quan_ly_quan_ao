<?php
class Home extends Controller {
    function SayHi() {
        $dat = $this->model("productModel");
        echo $dat->GetProduct();
    }

    function Show($a, $b) {
        // Model
        $dat = $this->model("productModel");
        $tong = $dat->tong($a, $b);

        // view
        $this->view("aodep",[
            "number"=>$tong,
            "page"=>"news",
            "product"=> $dat->product()
        ]);   
    }
}
?>