<?php

class AccountModel extends BaseModel{
    const TABLE = "tbl_user";
    public function index(){
        echo __METHOD__;
    }

    public function logInUser($email,$password){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanTraVeDL($link,"SELECT * FROM tbl_user WHERE email='$email'");
        $rows=mysqli_fetch_assoc($result);
        if ($rows==null) {
            return "Email này không tồn tại. Vui lòng kiểm tra lại.";
            exit;
        }
        if ($password != $rows['password']) {
            return "Mật khẩu không đúng. Vui lòng nhập lại.";
            exit;
        }
        giaiPhongBoNho($link,$result); 
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['role']=$rows['role'];
        $_SESSION['idUser']=$rows['id'];
    }

    public function signUpUser($name,$email,$password){  
        $linkSignUp=null;
        taoKetNoi($linkSignUp);
        $password = md5($password);
        $today=getdate();
        $ghiToday="".$today['mday']."/".$today['mon']."/".$today['year']."";
        $resultSignUp=chayTruyVanKhongTraVeDL($linkSignUp,"INSERT INTO tbl_user (id,role,name,email,password,created)  
                                                                        VALUES (null,2,'".$name."','".$email."','".$password."','".$ghiToday."')");
        giaiPhongBoNho($linkSignUp,$resultSignUp);
    }
    
}

?>