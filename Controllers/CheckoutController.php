<?php

class CheckoutController extends BaseController{

    private $checkoutModel;
    private $cartModel;

    public function __construct(){

        $this->loadModel('CheckoutModel');
        $this->checkoutModel = new CheckoutModel;
        $this->loadModel('CartModel');
        $this->cartModel = new CartModel;

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
            return $this->view("frontend/cart/checkout",[
                'cartOfUser'=>$cartOfUser,
            ]);

        }else {
            return $this->view("frontend/cart/checkout",[
            ]);
        }
    }

    public function store(){
        echo __METHOD__;
    }
}

?>