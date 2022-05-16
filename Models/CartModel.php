<?php

class CartModel extends BaseModel{

    public function index(){
        echo __METHOD__;
    }

    public function store(){
        echo __METHOD__;
    }
    public function saveProductToCart($cartId,$idUser,$productName,$quantity,$total_price){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanKhongTraVeDL($link,"UPDATE tbl_cart
                                                SET quantity = '".$quantity."', total_price = '".$total_price."'
                                                WHERE (cart_id='".$cartId."') 
                                                AND(idUser='".$idUser."')
                                                AND(product_name='".$productName."')
                                                ");        
        giaiPhongBoNho($link,$result);
        return "Save success!";

    }
    public function add1ProductToCart($idUser,$productName,$productPrice,$productImage,$quantity,$totalPrice){
        //kiểm tra có P chưa nếu có update sl và total
        $linkCheck=null;
        taoKetNoi($linkCheck);
        $resultCheck=chayTruyVanTraVeDL($linkCheck,"SELECT cart_id,idUser,product_name,product_price,quantity,total_price FROM tbl_cart WHERE (idUser='".$_SESSION['idUser']."' AND product_name='".$productName."')");
        $row=mysqli_fetch_assoc($resultCheck);//Lúc này chỉ có 1 cart id
        giaiPhongBoNho($linkCheck,$resultCheck);
        $nameCheck=$row['product_name'];
        $quantity=(int)$row['quantity']+1;
        $price=(int)$row['product_price'];
        $totalPrice=(int)$quantity*$price;
        if($nameCheck==$productName){
            $linkUpdateCart=null;
            taoKetNoi($linkUpdateCart);
            $resultUpdateCart=chayTruyVanKhongTraVeDL($linkUpdateCart,"UPDATE tbl_cart
                                                                        SET quantity='".$quantity."' ,
                                                                        total_price='".$totalPrice."'
                                                                        WHERE cart_id='".$row['cart_id']."'");
            giaiPhongBoNho($linkUpdateCart,$resultUpdateCart);

        } else {
            if($totalPrice==0){
                $totalPrice=$productPrice;
            }
            //thêm vào csdl
            $link=null;
            taoKetNoi($link);
            $result=chayTruyVanKhongTraVeDL($link,"INSERT INTO tbl_cart 
                                                    VALUES (null,'".$idUser."', '".$productName."','".$productPrice."','".$productImage."','".$quantity."','".$totalPrice."')");
            
            giaiPhongBoNho($link,$result);

        }
    }

    public function actionDelete1ProductInCart($id,$idUser){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanKhongTraVeDL($link,"DELETE FROM tbl_cart WHERE (cart_id='".$id."' AND idUser='".$idUser."')");        
        giaiPhongBoNho($link,$result);
    }
}

?>