<?php

// Load các thư viện (packages) do Composer quản lý vào chương trình
require_once './vendor/autoload.php';

// Sử dụng thư viện PHP Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if( isset($_POST['submitMessage']) ) {
    if (isset($_POST['name'])&isset($_POST['email'])&isset($_POST['subject'])&isset($_POST['message'])){
        $name = trim( strip_tags( $_POST['name'] ) );
        $email = trim( strip_tags( $_POST['email'] ));
        $subject = trim( strip_tags( $_POST['subject'] ) );
        $message = trim( strip_tags( $_POST['message'] ) );
        $this->guiMail($name,$email,$subject,$message);
        header("Location: index.php?controller=contact&action=index&status=1");
    } else {$this->view("frontend/contact/index",[]);}
    
}
if(isset($_GET["status"])==1){
    $thanhcong['guimail']='Gửi thành công';
}

?>

<!doctype html>
<html lang="en">

<head>
    <?php require_once("Views/shared/head-title.php") ?>
    <link rel="stylesheet" href="Public/frontend/css/contact.css">
</head>

<body>
    <div class="container-fluid">
        <?php require_once("Views/shared/header.php"); ?>
        <!--Map & Contact Section-->
        <section class="contact mt-5">
            <div class="cont-content container">
                <div class="section-title">
                    <h2 class="text-center">
                        Contact
                    </h2>
                    <p class="text-center">
                        Thanks for your watching!
                    </p>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="fas fa-map-marker-alt"></i>
                                <h4>Loaction:</h4>
                                <p>279 Nguyen Tri Phuong, phuong 5, quan 10, TP.HCM</p>
                            </div>
                            <div class="open-hours">
                                <i class="far fa-clock"></i>
                                <h4>Open Hours:</h4>
                                <p>Monday-Saturday<br> 11:00Am-23:00PM
                                </p>
                            </div>
                            <div class="email">
                                <i class="fa fa-envelope"></i>
                                <h4>Email:</h4>
                                <p>FWC@example.com</p>
                            </div>
                            <div class="phone">
                                <i class="fas fa-phone"></i>
                                <h4>Call:</h4>
                                <p>+55 11 1234 56789</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <form method="post">
                         
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>

                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submitMessage" >Send message</button>
                                <?php echo isset($loi['guimail']) ? "<div class='loi'>".$loi['guimail']."</div>" : '' ?>
                                <?php echo isset($thanhcong['guimail']) ? "<div class='thanhcong'>".$thanhcong['guimail']."</div>" : '' ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--End of Contact Section-->
        <!--Footer-->
        <footer style="color: white">
            <img class="footer-logo mx-auto d-block" src="Public/frontend/img/logodark.jpg" alt="logo">
            <p>279 NGUYỄN TRI PHƯƠNG, PHƯỜNG 5, QUẬN 10,TP HCM</p>
            <div class="media-icons">
                <i href="https://www.facebook.com/" class="fa fa-facebook-square" aria-hidden="true" style="font-size: 36px"></i>
                <i href="https://www.twitter.com/" class="fa fa-twitter-square" aria-hidden="true" style="font-size: 36px"></i>
                <i href="https://www.instagram.com/" class="fa fa-instagram" aria-hidden="true" style="font-size: 36px"></i>
                <i href="https://www.youtube.com/" class="fa fa-youtube-play" aria-hidden="true" style="font-size:36px"></i>
            </div>
            <p>COPYRIGHT @2021<br>TERMS & CONDITIONS | PRIVACY | LEGAL NOTICE</p>
        </footer>
        <script type="text/javascript" src="Public/frontend/js/contact.js"> </script>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require_once("Views/shared/script-footer.php"); ?>
</body>

</html>