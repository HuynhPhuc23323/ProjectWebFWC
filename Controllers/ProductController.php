<?php 
class ProductController extends BaseController{

    private $productModel;
    

    public function __construct(){

        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
        

    }

    public function index(){    
        $selectColumns = [
            '*'
            // 'id','name','catalog_id'
        ];
        $orders=[
            'column' => 'id',
            'order'=>'desc'
        ];
        $products=$this->productModel->getAll($selectColumns,$orders);
        return $this->view("frontend/products/index",[
            'products'=>$products,
        ]);
    }

    public function store(){        
        $data=[
            'name'          =>'Iphone 13',
            'catalog_id'    => 2,
            'price'         => 1.0003,
            'content'       => 3,
            'discount'      => 3,
            'image_link'    => 3,
            'image_list'    => 3,
            'created'       => 3,
            'view'          => 3,
        ];
        $this->productModel->store($data);
    }

    public function update(){
        $id=$_GET["id"];
        $product =[
            'name'          =>'Iphone 14',
            'catalog_id'    => 2,
            'price'         => 1.0003,
            'content'       => 3,
            'discount'      => 3,
            'image_link'    => 3,
            'image_list'    => 3,
            'created'       => 3,
            'view'          => 3,
        ];
        
        $this->productModel->updateData($id, $product);
    }

    public function delete(){
        $id=$_GET["id"];
        $this->productModel->destroy($id);
        echo 'Xóa thành công!';
    }    
 
    public function show(){
        $id=$_GET["id"]??null;

        $product = $this->productModel->getDetail($id);
        
        return $this->view("frontend/products/product_detail",[
            'product' =>$product,
        ]);
        
    }
}

?>