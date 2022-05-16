<?php 
class AccountController extends BaseController{

    private $accountModel;

    public function __construct(){

        $this->loadModel('AccountModel');
        $this->accountModel = new AccountModel;

    }

    public function index(){  
        return $this->view("frontend/account/index",[]);
    }


    public function viewSignUpMobile(){
        return $this->view("frontend/account/signup_mobile",[]);
    }

    public function viewSignUpMobileWithMessage($message){
        return $this->view("frontend/account/signup_mobile",[
            "announcementSignUp"=>$message,
        ]);
    }

    public function viewSignUpPCWithMessage($message){
        return $this->view("frontend/account/index",[
            "announcementSignUp"=>$message,
        ]);
    }

    public function actionSignUp(){
        if(isset($_POST["submitSignUpMobile"])){
            if(isset($_POST["nameSignUp"])&isset($_POST["emailSignUp"])&isset($_POST["passwordSignUp"])&isset($_POST["confirmPassword"])){
                $name   = addslashes($_POST['nameSignUp']);
                $password   = addslashes($_POST['passwordSignUp']);
                $email      = addslashes($_POST['emailSignUp']);
                $repassword = addslashes($_POST["confirmPassword"]);
                if($password==$repassword){
                    $link=null;
                    taoKetNoi($link);
                    $result=chayTruyVanTraVeDL($link,"SELECT * FROM tbl_user WHERE email='".$email."'");
                    $rows=mysqli_fetch_assoc($result);
                    if($rows==null){
                        $this->accountModel->signUpUser($name,$email,$password);
                        $announcementSignUp="Đăng ký thành công";
                        return $this->view("frontend/account/signup_mobile",[
                            "announcementSignUp"=>$announcementSignUp,
                            ]);

                    } else{
                        $announcementSignUp="Mail đã tồn tại rồi í!";
                        return $this->view("frontend/account/signup_mobile",[
                            "announcementSignUp"=>$announcementSignUp,
                            ]);
                    }
                    giaiPhongBoNho($link,$result);
                } else {
                    $announcementSignUp="Hãy thử lại. Nhập lại mật khẩu không chính xác!";
                    $this->viewSignUpMobileWithMessage($announcementSignUp);
                }
                
            } else {
                $announcementSignUp="Vui lòng nhập đầy đủ và chính xác thông tin!";
                $this->viewSignUpMobileWithMessage($announcementSignUp);
            }
        
        }
        if(isset($_POST["submitSignUpPC"])){
            if(isset($_POST["nameSignUp"])&isset($_POST["emailSignUp"])&isset($_POST["passwordSignUp"])&isset($_POST["confirmPassword"])){
                $name   = addslashes($_POST['nameSignUp']);
                $password   = addslashes($_POST['passwordSignUp']);
                $email      = addslashes($_POST['emailSignUp']);
                $repassword = addslashes($_POST["confirmPassword"]);
                if($password==$repassword){
                    $link=null;
                    taoKetNoi($link);
                    $result=chayTruyVanTraVeDL($link,"SELECT * FROM tbl_user WHERE email='".$email."'");
                    $rows=mysqli_fetch_assoc($result);
                    if($rows==null){
                        $this->accountModel->signUpUser($name,$email,$password);
                        $announcementSignUp="Đăng ký thành công";
                        return $this->view("frontend/account/index",[
                            "announcementSignUp"=>$announcementSignUp,
                            ]);

                    } else{
                        $announcementSignUp="Mail đã tồn tại rồi í!";
                        return $this->view("frontend/account/index",[
                            "announcementSignUp"=>$announcementSignUp,
                            ]);
                    }
                    giaiPhongBoNho($link,$result);
                } else {
                    $announcementSignUp="Hãy thử lại. Nhập lại mật khẩu không chính xác!";
                    $this->viewSignUpPCWithMessage($announcementSignUp);
                }
                
            } else {
                $announcementSignUp="Vui lòng nhập đầy đủ và chính xác thông tin!";
                $this->viewSignUpPCWithMessage($announcementSignUp);
            }
        
        }
    }

    public function actionLogIn(){
        header('Content-Type: text/html; charset=UTF-8');
        if(isset($_POST["submitLogInPC"])){
            $email = isset($_POST['emailLogIn']) ? $_POST['emailLogIn'] : '';
            $password = isset($_POST['passwordLogIn']) ? $_POST['passwordLogIn'] : '';
            $password = md5($password);
            if (!$email || !$password) {
                echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu."; 
                exit;
            }
            $temporaryMemory=$this->accountModel->logInUser($email,$password);
            if(isset($_SESSION['email'])&isset($_SESSION['role'])){
                header("Location: index.php?controller=profile");
                
            } else{
                $announcementSignUp=$temporaryMemory;
                $this->viewSignUpPCWithMessage($announcementSignUp);
            }
        }
    }

}

?>