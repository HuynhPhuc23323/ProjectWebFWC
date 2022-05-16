<?php
    class ContactModel extends BaseModel{

        const TABLE="";

        function GuiMailTo($to, $from, $from_name, $subject, $body, $username, $password, &$error){
            $error = "";
            // Load các thư viện (packages) do Composer quản lý vào chương trình

            require_once "class.phpmailer.php";      
            require_once "class.smtp.php";      
            $mail = new PHPMailer(true);  
            $mail -> IsSMTP(); 
            $mail -> SMTPDebug = 0;  //  1=errors and messages, 2=messages only
            $mail -> SMTPAuth = true;  
            $mail -> SMTPSecure = 'tls'; 
            $mail -> Host = 'smtp.gmail.com';
            $mail -> Port = 587; 
            $mail -> Username = $username;
            $mail -> Password = $password;           
            $mail -> SetFrom($from, $from_name);
            $mail -> Subject = $subject;
            $mail -> MsgHTML($body);// noi dung chinh cua mail
            $mail -> AddAddress($to);
            $mail -> CharSet="utf-8";
            $mail -> IsHTML(true);
            try {
                if( !$mail->send() ) {
                  echo $error = 'Loi:'.$mail->ErrorInfo;
                } else { 
                    $error = '';
                }
                
           } 
           catch (phpmailerException $e) { echo "<pre>".$e->errorMessage(); }     
         }
    }
?>