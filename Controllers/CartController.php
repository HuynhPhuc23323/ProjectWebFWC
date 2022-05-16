<?php

class CartController extends BaseController{

    private $cartModel;

    public function __construct(){

        $this->loadModel('CartModel');
        $this->cartModel = new CartModel;

    }

    public function saveProduct(){
        if(isset($_SESSION['idUser'])){
            $link=null;
            taoKetNoi($link);
            $result=chayTruyVanTraVeDL($link,"SELECT * FROM tbl_cart WHERE idUser='".$_SESSION['idUser']."'");
            $cartOfUser=[];
            while($rows=mysqli_fetch_assoc($result)){
                array_push($cartOfUser,$rows);
            }
            giaiPhongBoNho($link,$result);
            if(isset($_POST['cart_id'])&isset($_POST['product_price'])&isset($_POST['product_name'])&isset($_POST['quantity'])){
                $cartId=$_POST['cart_id'];
                $productName=$_POST['product_name'];
                $quantity=$_POST['quantity'];
                $total_price=(int)$quantity*(int)($_POST['product_price']);
                $messageSaveProduct=$this->cartModel->saveProductToCart($cartId,$_SESSION['idUser'],$productName,$quantity,$total_price);
                header("Location: index.php?controller=cart");
            } else {
                $messageSaveProduct="Something is wrong in process";
                return $this->view("frontend/cart/index",[
                    'cartOfUser'=>$cartOfUser,
                    'messageSaveProduct'=>$messageSaveProduct,
                ]);
            }  
        }else {
            return $this->view("frontend/cart/index",[
            ]);
        }
    }

    public function index(){
        if(isset($_SESSION['idUser'])){
            $link=null;
            taoKetNoi($link);
            $result=chayTruyVanTraVeDL($link,"SELECT * FROM tbl_cart WHERE idUser='".$_SESSION['idUser']."'");
            $cartOfUser=[];
            while($rows=mysqli_fetch_assoc($result)){
                array_push($cartOfUser,$rows);
            }
            giaiPhongBoNho($link,$result);
            return $this->view("frontend/cart/index",[
                'cartOfUser'=>$cartOfUser,
            ]);

        }else {
            return $this->view("frontend/cart/index",[
            ]);
        }
    }

    public function addToCart(){
        $idProduct=$_GET['id'];
        if ($_SESSION['idUser']){
            //lay thong tin san pham
            $link=null;
            taoKetNoi($link);
            $result=chayTruyVanTraVeDL($link,"SELECT name,price,image_link FROM tbl_products WHERE id='".$idProduct."'");
            $row=mysqli_fetch_assoc($result);
            $productName=$row['name'];
            $productImage=$row['image_link'];
            $productPrice=(int)$row['price'];
            $idUser=$_SESSION['idUser'];
            $quantity=1;
            $total_price=intval($quantity)*intval($productPrice);
            
            $this->cartModel->add1ProductToCart($idUser,$productName,$productPrice,$productImage,$quantity,$total_price);
            header("Location: index.php?controller=cart");
        }else{
            echo '<script language="javascript">alert("You need login first!"); window.location="index.php?controller=account";</script>';
        }
    }

    public function deleteProductInCart(){
        
        if ($_SESSION['idUser']){
            $idCart=$_GET['id'];
            $idUser=$_SESSION['idUser'];
            $this->cartModel->actionDelete1ProductInCart($idCart,$idUser);
            header("Location: index.php?controller=cart");
        }else{
            echo '<script language="javascript">alert("You need login first!"); window.location="index.php?controller=account";</script>';
        }
    }
}

?>