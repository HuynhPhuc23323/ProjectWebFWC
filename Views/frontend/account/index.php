<?php
if(!empty($announcementSignUp)){
  echo '<script language="javascript">alert("'.$announcementSignUp.'"); window.location="index.php?controller=account";</script>';
}
?>
<!doctype html>
<html lang="en">

<head>
  <?php require_once("Views/shared/head-title.php"); ?>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
  <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="Public/frontend/css/account.css">
</head>

<body>
  <div class="container-fluid">
    <?php require_once("Views/shared/header.php"); ?>
      <div class="contai-cont">
        <div class="cont">
          <div class="form sign-in">
            <h2>Welcome back,</h2>
            <form method="post" action="index.php?controller=account&action=actionLogIn">

              <label>
                <span>Email</span>
                <input type="email" name="emailLogIn" />
              </label>
              <label>
                <span>Password</span>
                <input type="password" name="passwordLogIn" />
              </label>
              <p class="forgot-pass">Forgot password?</p>
              <button type="submit" class="submit" name="submitLogInPC">Sign In</button>
              <button type="button" class="fb-btn">Connect with <span>facebook</span></button>
            </form>
          </div>
          <div class="sub-cont">
            <div class="img">
              <div class="img__text m--up">
                <h2>New here?</h2>
                <p>Sign up and discover great amount of our new product!</p>
              </div>
              <div class="img__text m--in">
                <h2>One of us?</h2>
                <p>If you already has an account, just sign in. We've missed you!</p>
              </div>
              <div class="img__btn">
                <span class="m--up">Sign Up</span>
                <span class="m--in">Sign In</span>
              </div>
            </div>
            <div class="form sign-up">
              <h2>Get me now,</h2>
              <form method="post" action="index.php?controller=account&action=actionSignUp">

              <label>
                <span>Name</span>
                <input type="text" name="nameSignUp" />
              </label>
              <label>
                <span>Email</span>
                <input type="email" name="emailSignUp"/>
              </label>
              <label>
                <span>Password</span>
                <input type="password" name="passwordSignUp" />
              </label>
              <label>
                <span>ConfirmPassword</span>
                <input type="password" name="confirmPassword" />
              </label>
              <button type="submit" class="submit" name="submitSignUpPC">Sign Up </button>
            
              </form>
              <button type="button" class="fb-btn">Join with <span>facebook</span></button>
            </div>
          </div>
        </div>
        <div class="cont-1024">
          <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="co-card card" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
  
                      <div class="pb-4">
                        <form action="index.php?controller=account&action=actionLogIn" method="post">

                          <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                          <p class="text-black-50 mb-5">Please enter your login and password!</p>
    
                          <div class="form-outline form-white mb-4">
                            <label class="form-label" for="typeEmailX">Email</label>
                            <input type="email" id="typeEmailX" class="textholder form-control form-control-lg" placeholder="abc@example.com" name="emailLogIn" />
                          </div>
    
                          <div class="form-outline form-white mb-4">
                            <label class="form-label" for="typePasswordX">Password</label>
                            <input type="password" id="typePasswordX" class="textholder form-control form-control-lg" placeholder="abc***" name="passwordLogIn" required/>
                          </div>
    
                          <p class="small mb-5 pb-lg-2"><a class="text-black-50" href="#!">Forgot password?</a></p>
    
                          <button class="btnlog btn btn-outline-light btn-lg px-5" type="submit" name="submitLogInPC">Login</button>
    
                          <div class="d-flex justify-content-center text-center mt-4 pt-1">
                            <!-- <a href="#!" class="text-black"><i class="fab fa-facebook-f fa-lg"></i></a> -->
                            <button type="button" class="fb-btn">Join with <span>facebook</span></button>
                        </form>
                        </div>
                      </div>
  
                      <div>
                        <p class="mb-0">Don't have an account? <a href="?controller=account&action=viewSignUpMobile" class="text-black-50 fw-bold">Sign Up</a></p>
                      </div>
  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>

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