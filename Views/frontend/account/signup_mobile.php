

<!doctype html>
<html lang="en">

<head>
  <?php require_once("Views/shared/head-title.php"); ?>  
  <link rel="stylesheet" href="Public/frontend/css/sign_up_mobile.css">
</head>

<body>
  <div class="container-fluid">
    <?php require_once("Views/shared/header.php"); ?>
    <form method="post" action="index.php?controller=account&action=actionSignUp">

        <div class="cont-1024">
                    <section class="vh-100 gradient-custom">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                    <div class="co-card card" style="border-radius: 1rem;">
                                        <div class="card-body p-5 text-center">
                            
                                            <div class="pb-4">
                                
                                                <h2 class="fw-bold mb-2 text-uppercase">Sign UP</h2>
                                                <p class="text-black-50 mb-5">Please fill in this form to create an account!</p>
                                                
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="typeNameX">Name</label>
                                                    <input type="text" id="typeNameX" class="textholder form-control form-control-lg" placeholder="abc" name="nameSignUp" required/>
                                                </div>
    
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="typeEmailX">Email</label>
                                                    <input type="email" id="typeEmailX" class="textholder form-control form-control-lg"  placeholder="abc@example.com"name="emailSignUp" required/>
                                                </div>
                                
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="typePasswordX">Password</label>
                                                    <input type="password" id="typePasswordX" class="textholder form-control form-control-lg" placeholder="abc***" name="passwordSignUp" required/>
                                                </div>
    
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="typeConfirmPasswordX">Confirm Password</label>
                                                    <input type="password" id="typeConfirmPasswordX" class="textholder form-control form-control-lg" placeholder="abc***" name="confirmPassword" required/>
                                                </div>
                                
                                                <button class="btnlog btn btn-outline-light btn-lg px-5" type="submit" name="submitSignUpMobile">Register</button>
                                                <?php 
                                                
                                                if(!empty($announcementSignUp)){
                                                    echo '<p class="text-black-50 mb-5">'.$announcementSignUp.'</p>';
                                                }
                                                
                                                ?>
                                                <div>
                                                    <p class="mt-4">Or</p>
                                                </div>
                                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                                <!-- <a href="#!" class="text-black"><i class="fab fa-facebook-f fa-lg"></i></a> -->
                                                    <button type="button" class="fb-btn">Join with <span>facebook</span></button>
                                                </div>
    
                                            </div>
                                            <div>
                                                <p class="mb-0">Already have an acount?<a class="text-black-50 fw-bold" href="?controller=account">Login here</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
        </div>
    </form>
    
    <!--Footer-->
    <footer style="color: white">
      <img class="footer-logo" src="Public/frontend/img/logodark.jpg" alt="logo">
      <p>279 NGUYỄN TRI PHƯƠNG, PHƯỜNG 5, QUẬN 10,TP HCM</p>
      <div class="media-icons">
        <i href="https://www.facebook.com/" class="fa fa-facebook-square" aria-hidden="true" style="color: white; font-size: 36px"></i>
        <i href="https://www.twitter.com/" class="fa fa-twitter-square" aria-hidden="true" style="color: white;font-size: 36px"></i>
        <i href="https://www.instagram.com/" class="fa fa-instagram" aria-hidden="true" style="color: white; font-size: 36px"></i>
        <i href="https://www.youtube.com/" class="fa fa-youtube-play" aria-hidden="true" style="color:white;font-size:36px"></i>
      </div>
      <p>COPYRIGHT @2021<br>TERMS & CONDITIONS | PRIVACY | LEGAL NOTICE</p>
    </footer>

  </div>
  <script type="text/javascript" src="Public/frontend/js/account.js"> </script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php require_once("Views/shared/script-footer.php"); ?>
</body>

</html>