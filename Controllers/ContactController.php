<?php 
class ContactController extends BaseController{

    private $contactModel;

    public function __construct(){

        $this->loadModel('ContactModel');
        $this->contactModel = new ContactModel;

    }

    public function index(){    

        $contacts=1;
        return $this->view("frontend/contact/index",[
            'contacts'=>$contacts,
        ]);
    }

    public function guiMail($name,$email,$subject,$message){
        //điền email nhận tại đây
        $to = "yyy@gmail.com";
        $subjectTitle = "Liên hệ từ $name";           
        $noidungthu = "
        <strong>Họ tên: </strong> $name<br/>
        <strong>Email: </strong> $email<br/>
        <strong>Tiêu đề: </strong> $subject<br/>
        <strong>Thông điệp: </strong> $message<br/>
        <i>Thư được gửi từ liên hệ của FWC COSMETIC</i>";
        
        //dùng mail test
        $from = "xxx@gmail.com";
        
        //pass email yahoo
        $p="czxczxcx";
        $this->contactModel -> GuiMailTo($to, $from, $from_name="FWC COSMETIC", $subjectTitle, $noidungthu, $from, $p, $error);
        
              
        
    }
}

?>