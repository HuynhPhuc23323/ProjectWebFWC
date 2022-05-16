<?php

class ProfileController extends BaseController{

    private $profileModel;
    private $productModel;
    public function __construct(){

        $this->loadModel('ProfileModel');
        $this->profileModel = new ProfileModel;
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

    }

    public function index(){
        $this->view("frontend/profile/index",[]);
    }

    public function actionLogOut(){
        session_start(); 
 
        if (isset($_SESSION['email'])){
            unset($_SESSION['email']); // xóa session login
        }
        if (isset($_SESSION['idUser'])){
            unset($_SESSION['idUser']);
        }
        if (isset($_SESSION['role'])){
            unset($_SESSION['role']);
        }
        header("Location: index.php?controller=account");
    }

    public function changeProfile(){
        $tinHieu=1;
        $this->view("frontend/profile/index",[
            'tinHieu'=>$tinHieu,
        ]);
    }

    public function saveProfile(){
        if (isset($_POST['submitSaveProfile'])){
            if (isset($_POST['name'])&isset($_POST['phone'])&isset($_POST['address'])){
                $name   = addslashes($_POST['name']);
                $phone   = addslashes($_POST['phone']);
                $address   = addslashes($_POST['address']);
                $messageSaveProfile=$this->profileModel->saveEditUser($_SESSION['idUser'],$name,$phone,$address);
                return $this->view("frontend/profile/index",[
                    'messageSaveProfile'=>$messageSaveProfile,
                ]);

            } else {
                $messageSaveProfile="Vui lòng điền đầy đủ thông tin";
                return $this->view("frontend/profile/index",[
                    'messageSaveProfile'=>$messageSaveProfile,
                ]);
            }
        } else{
            $messageSaveProfile="Lỗi chưa xác định";
                return $this->view("frontend/profile/index",[
                    'messageSaveProfile'=>$messageSaveProfile,
                ]);
        }
    }

    public function manage(){
        $selectColumns = [
            '*'
        ];
        $orders=[
            'column' => 'id',
            'order'=>'asc'
        ];        

       
        $products=$this->productModel->getAll($selectColumns,$orders);        
        $managerInterface=1;
        if(isset($messageDeleteProduct)){
            $this->view("frontend/profile/index",[
                'messageDeleteProduct'=>$messageDeleteProduct,
                'managerInterface'=>$managerInterface,
                'products'=>$products,
            ]);
        }else {

            $this->view("frontend/profile/index",[
                'managerInterface'=>$managerInterface,
                'products'=>$products,
            ]);
        }
    }

    public function editProduct(){
        if($_SESSION['role']==1){
            $idProduct=$_GET['id'];
            $productDetail=$this->profileModel->getDetailProduct($idProduct);
            $this->view("frontend/profile/index",[
                'productDetail'=>$productDetail,                
            ]);
        } else {
            echo '<script language="javascript">alert("You dont have performance!"); window.location=history.back(-1);;</script>';
        }
    }

    public function saveProduct(){
        if($_SESSION['role']==1){
            if(isset($_POST['submitSaveProduct'])){
                $idProduct=$_POST['idProduct'];
                $catalog_id=$_POST['catalog_id'];
                $name=$_POST['nameProduct'];
                $price=$_POST['price'];
                $content=$_POST['content'];
                $discount=$_POST['discount'];
                $image_link=$_POST['image_link'];
                $brand=$_POST['brand'];
                $madeIn=$_POST['madeIn'];
                $type=$_POST['type'];
                $capacity=$_POST['capacity'];
                $messageSaveProductDetail=$this->profileModel->saveEditProductDetail($idProduct,$catalog_id,$name,$price,$content,$discount,$image_link,$brand,$madeIn,$type,$capacity);
                $productDetail=$this->profileModel->getDetailProduct($idProduct);
                return $this->view("frontend/profile/index",[
                    'productDetail'=>$productDetail,
                    'messageSaveProductDetail'=>$messageSaveProductDetail,
                ]);
            }
        } else {
            echo '<script language="javascript">alert("You dont have performance!"); window.location=history.back(-1);</script>';
        }
    }

    public function deleteProductManage(){
        if($_SESSION['role']==1){
            $id=$_GET["id"];
            $this->productModel->destroy($id);
            echo '<script language="javascript">alert("Xóa thành công"); window.location="index.php?controller=profile&action=manage";</script>';

        } else {
            echo '<script language="javascript">alert("You dont have performance!"); window.location=history.back(-1);</script>';
        }
    }

    public function viewAddProduct(){
        if($_SESSION['role']==1){
            $this->view("frontend/profile/add_new_product",[
    
            ]);
        }else {
            echo '<script language="javascript">alert("You dont have performance!"); window.location=history.back(-1);</script>';
        }
    }

    public function addProductDetail(){
        if($_SESSION['role']==1){   
            $messageErrorAdd=null;
            //kiểm tra Image và tải ảnh về thư mục
            if(isset($_POST["submitAddProductDetail"])){
                $nameImage="image_link";
                if(isset($_FILES[$nameImage]["tmp_name"])){                    
                    $image_link=$_FILES[$nameImage]["name"];
                    $messageErrorAdd=$this->profileModel->processUpLoadImage($nameImage,'product'); // trả về null nếu đúng, trả về mess nếu sai 
                    if($messageErrorAdd!=null){
                        return $this->view("frontend/profile/add_new_product",[
                            'messageErrorAdd'=>$messageErrorAdd,
                        ]);
                        
                        exit();
                    }
                } 
                $name   = addslashes($_POST['name']);
                $price   = addslashes($_POST['price']);
                $catalog_id   = addslashes($_POST['catalog_id']);
                $discount   = addslashes($_POST['discount']);
                $content   = addslashes($_POST['content']);
                $brand   = addslashes($_POST['brand']);
                $madeIn   = addslashes($_POST['madeIn']);
                $type   = addslashes($_POST['type']);
                $capacity   = addslashes($_POST['capacity']);
                $messageSuccessAdd=$this->profileModel->addProductToDB($catalog_id,$name,$price,$content,$discount,$image_link,$brand,$madeIn,$type,$capacity);
                return $this->view("frontend/profile/add_new_product",[
                    'messageSuccessAdd'=>$messageSuccessAdd,
                ]);
            }         
            
        }else {
            echo '<script language="javascript">alert("You dont have performance!"); window.location=history.back(-1);</script>';
        }
    }

    public function viewChangePassword(){
        $flagChangePassword=1;
        return $this->view("frontend/profile/index",[
            'flagChangePassword'=>$flagChangePassword,
        ]);
    }

    public function actionChangePassword(){
        $messageChangePassword=null;
        $flagChangePassword=1;
        if(isset($_POST['submitChangePassword'])){
            if(isset($_POST['oldPassword'])){
                $link=null;
                taoKetNoi($link);
                $result=chayTruyVanTraVeDL($link,"SELECT password FROM tbl_user WHERE id='".$_SESSION['idUser']."'");
                $row=mysqli_fetch_assoc($result);
                giaiPhongBoNho($link,$result);
                $oldPassword=$row['password'];
            }
            if(isset($_POST['newPassword'])){
                $newPassword=md5($_POST['newPassword']);
                if($newPassword==$oldPassword){
                    $messageChangePassword="Old password and new password are the same";
                    return $this->view("frontend/profile/index",[
                        'flagChangePassword'=>$flagChangePassword,
                        'messageChangePassword'=>$messageChangePassword
                    ]);
                    exit();
                }
                
            }
            if($_POST['newPassword']!=$_POST['reNewPassword']){
                $messageChangePassword="Two new passwords are different";
                return $this->view("frontend/profile/index",[
                    'flagChangePassword'=>$flagChangePassword,
                    'messageChangePassword'=>$messageChangePassword
                ]);
                exit();
            } else {
                if(md5($_POST['oldPassword'])==$oldPassword){
                    $id=$_SESSION['idUser'];
                    $messageChangePassword=$this->profileModel->processChangePassword($id,$newPassword);
                    return $this->view("frontend/profile/index",[
                        'flagChangePassword'=>$flagChangePassword,
                        'messageChangePassword'=>$messageChangePassword
                    ]);

                }else {
                    $messageChangePassword="Old password incorrect";
                    return $this->view("frontend/profile/index",[
                        'flagChangePassword'=>$flagChangePassword,
                        'messageChangePassword'=>$messageChangePassword
                    ]);
                }
            }
        }
    }

    public function viewAddCatalog(){
        $flagAddCatalog=1;
        $categories=$this->profileModel->getAllCategories();
        return $this->view("frontend/profile/index",[
            'flagAddCatalog'=>$flagAddCatalog,
            'categories'=>$categories,
        ]);
    }

    public function saveCategory(){
        if($_SESSION['role']==1){
            $flagAddCatalog=1;
            $messsageAddCatalog=null;
            if(isset($_POST['submitSaveCategory'])){
                $name=$_POST['nameCategory'];
                $messsageAddCatalog=$this->profileModel->processAddCategory($name);
                $categories=$this->profileModel->getAllCategories();
                return $this->view("frontend/profile/index",[
                    'flagAddCatalog'=>$flagAddCatalog,
                    'categories'=>$categories,
                    'messsageAddCatalog'=>$messsageAddCatalog
                ]);
            }

        }else {
            echo '<script language="javascript">alert("You dont have performance!"); window.location=history.back(-1);</script>';
        }
    }

    public function deleteCategory(){
        
        if($_SESSION['role']==1){
            $flagAddCatalog=1;            
            $categories=$this->profileModel->getAllCategories();
            $id=$_GET['id'];
            $messsageDeleteCatalog=$this->profileModel->processDeleteCategory($id);
            return $this->view("frontend/profile/index",[
                'flagAddCatalog'=>$flagAddCatalog,
                'categories'=>$categories,
                'messsageAddCatalog'=>$messsageDeleteCatalog
            ]);

        }else {
            echo '<script language="javascript">alert("You dont have performance!"); window.location=history.back(-1);</script>';
        }
    }
}
