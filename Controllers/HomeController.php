<?php 
class HomeController extends BaseController{

    private $homeModel;

    public function __construct(){

        $this->loadModel('HomeModel');
        $this->homeModel = new HomeModel;
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

    }

    public function index(){    
        $selectColumns = [
            // '*'
            'id','name','catalog_id'
        ];
        $orders=[
            'column' => 'id',
            'order'=>'desc'
        ];
        $homes=$this->homeModel->getAll($selectColumns,$orders);
        $products=$this->productModel->getAll($selectColumns,$orders);
        return $this->view("frontend/homes/index",[
            'pageTitle'=> 'Danh mục',
            'Homes'=>$homes,
            'Product'=>$products,
        ]);
    }
}

?>