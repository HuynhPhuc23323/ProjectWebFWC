<?php 
class SearchController extends BaseController{

    private $searchModel;

    public function __construct(){

        $this->loadModel('SearchModel');
        $this->searchModel = new SearchModel();
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel();
    }

    public function index(){ 
        return $this->view("frontend/search/search",[]);
    }

    public function search(){
        $searchString= $_POST["searchString"];
        $products=$this->searchModel->findByNameAndContent($searchString);
        return $this->view("frontend/search/search",[
            'products'=>$products,
        ]);
    }

    public function searchCategory(){
        $messageCatetory=$this->searchModel->getByCategoryId($_POST['category']);
        return $this->view("frontend/search/search",[
            'messageCatetory'=>$messageCatetory,
        ]);
    }

    
}

?>