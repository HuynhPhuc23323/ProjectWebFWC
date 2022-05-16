<!doctype html>
<html lang="en">

<head>
    <?php require_once("Views/shared/head-title.php"); ?>
    <link rel="stylesheet" href="Public/frontend/css/home.css">


    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    
</head>

<body>
    <div class="container-fluid">
        <!-- Begin of Navbar -->
        <?php require_once("Views/shared/header.php"); ?>
        <!--End of NAVBAR-->
        <!--Hero Section-->
        <!--Hero Section-->
        <div class="content-banner">
                <div class="site-blocks-cover">
                  <div class="img-wrap">
                      <div class="slide">
                        <img src="Public/frontend/img/2.jpg" alt="FWC Cosmetic - Friend with cosmetic">
                      </div>
                  </div>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6 ml-auto align-self-center">
                        <div class="intro">
                          <div class="heading">
                            <h1 class="text-content font-weight-bold">FWC COSMETIC</h1>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="p">
                  <a href="index.php?controller=product" class="fancy-btn">Buy now</a>
                  </div>
                
                </div> <!-- END .site-blocks-cover -->
              </div>
             <!---End of Hero Section-->
            
            <!--Second Section ( Featured Colletions)-->

            <div class="featuredContainer">
                <div class="featuredHeading">
                    <p>Hot selling products of this month</p>
                    <h1>Featured <span>Collections</span></h1>
                    <hr>
                </div>
                <div class="featuredcards">
                    <div class="row-card row">
                        <div class="co-card col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                            <div class="f-card">
                                <div class="f-img">
                                    <img src="Public/frontend/img/foundation.jpg" alt="foundation">
                                </div>
                                <div class="f-text">
                                    <h1>Foundation</h1>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis esse doloribus tempora quia
                                        maxime.</p>
                                        <!-- <a href="index.php?controller=product" class="button">Buy now</a> -->
                                </div>
        
                            </div>
                        </div>
                    
                        <div class="co-card col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">                            
                            <div class="f-card f-card2">
                                <div class="f-img">
                                    <img src="Public/frontend/img/350.jpg" alt="cream">
                                </div>
                                <div class="f-text">
                                    <h1>Eye shadow</h1>
                                    <hr>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis esse doloribus tempora quia
                                        maxime.</p>
                                        <!-- <a href="index.php?controller=product" class="button">Buy now</a> -->
                                </div>        
                            </div>
                        </div>
                    

                   
                        <div class="co-card col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                            <div class="f-card">
                                <div class="f-img">
                                    <img src="Public/frontend/img/lipstic.jpg" alt="compact">
                                </div>
                                <div class="f-text">
                                    <h1>Lipstick</h1>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis esse doloribus tempora quia
                                        maxime. </p>
                                        <!-- <a href="index.php?controller=product" class="button">Buy now</a> -->
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
            <!--About Section-->
            <section class="about mt-5">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-6 col-md-10">
                            <div class="about-des mb-50">
                                <!--title-->
                                <div class="section-title mb-35">
                                    <h2>Who We Are?</h2>
                                </div>
                                <!---End of the title-->
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus vitae corporis expedita voluptatem. Beatae labore autem sed cum quas optio, officia saepe numquam doloribus rerum.</p>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus vitae corporis expedita voluptatem. Beatae labore autem sed cum quas optio, officia saepe numquam doloribus rerum.</p>
                            </div>
                            <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="experience">
                                    <span>6,069</span>
                                    <p> Variety of Cosmetic</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="experience">
                                    <span>3,039</span>
                                    <p> Latest Cosmetic</p>
                                </div>
                            </div>
                            </div>

                        </div>
                        <!---->
                        <div class="col-xl-5 col-lg-6 col-md-9 offset-md-1 offset-sm-1">
                            <div class="about-right-sec">
                                <div class="about-right-image">
                                    <img src="Public/frontend/img/product-banner2.jpg"alt=""class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End of About Section-->
            <!---Selling Section-->
            <section class="selling-section mt-5">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase pb-3">
                            Most Selling Cosmetic
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="cover cover1">
                                    <div class="content">
                                        <h3>ARTISTRY PALETTE</h3>
                                        <img src="Public/frontend/img/350.jpg"class="img-fluid"
                                        alt="">
                                    </div>
                                </div>
                                <div class="cover cover2">
                                    <h2>Morphe</h2>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="col-lg-4">
                        <div class="card">
                            <div class="cover cover1">
                                <div class="content">
                                    <h3>Eyesbrown Pencil</h3>
                                    <img src="Public/frontend/img/pencil.jpg"class="img-fluid"
                                    alt="">
                                </div>
                            </div>
                            <div class="cover cover2">
                                <h2>Ofelia</h2>
                            </div>
                        </div>
                    </div>
                    <!---->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="cover cover1">
                                <div class="content">
                                    <h3>Foundation/Cream</h3>
                                    <img src="Public/frontend/img/creams.jpg"class="img-fluid"
                                    alt="">
                                </div>
                            </div>
                            <div class="cover cover2">
                                <h2>ORDINARY</h2>
                            </div>
                        </div>
                    </div>
                    <!---->
                    </div>
                </div>
            </section>
            <!---End of Selling Section-->
            <!-- Video section -->
            <section class="row slide">
                <div class="owl-carousel owl-theme">

                    <div class="item">
                        <a href="index.php?controller=product">
                            <img src="Public/frontend/img/brs1.jpg" alt="">
                        </a>
                    </div>

                    <div class="item">
                        <a href="index.php?controller=product">
                            <img src="Public/frontend/img/brs12.jpg" alt="">
                        </a>
                    </div>

                    <div class="item">
                        <a href="index.php?controller=product">
                            <img src="Public/frontend/img/brs2.jpg" alt="">
                        </a>
                    </div> 

                    <div class="item">
                        <a href="index.php?controller=product">
                            <img src="Public/frontend/img/brs11.jpg" alt="">
                        </a>
                    </div>

                    <div class="item">
                        <a href="index.php?controller=product">
                            <img src="Public/frontend/img/brs3.jpg" alt="">
                        </a>
                    </div>

                    <div class="item">
                        <a href="index.php?controller=product">
                            <img src="Public/frontend/img/brs10.jpg" alt="">
                        </a>
                    </div>
                    
                    <div class="item">
                        <a href="index.php?controller=product">
                            <img src="Public/frontend/img/brs4.jpg" alt="">
                        </a>
                    </div> 
                    
                    <div class="item">
                        <a href="index.php?controller=product">
                            <img src="Public/frontend/img/brs9.jpg" alt="">
                        </a>
                    </div>

                    <div class="item">
                        <a href="index.php?controller=product">
                            <img src="Public/frontend/img/brs5.jpg" alt="">
                        </a>
                    </div>

                    <div class="item">
                        <a href="index.php?controller=product">
                            <img src="Public/frontend/img/brs8.jpg" alt="">
                        </a>
                    </div> 

                    <div class="item">
                        <a href="index.php?controller=product">
                            <img src="Public/frontend/img/brs6.jpg" alt="">
                        </a>
                    </div>

                    <div class="item">
                        <a href="index.php?controller=product">
                            <img src="Public/frontend/img/brs7.jpg" alt="">
                        </a>
                    </div>

                </div>
            </section>

            

            <!--end video-->
            <!--Tabs Section-->
            <section class=" row new background pt-5 pb-5">
                <div class="container">
                    <div class="section-title">
                        <h2 class="text-center text-white">
                            FWC COSMETIC
                        </h2>
                        <p class="text-center text-white">
                            co-founder
                        </p>
                    </div>
                    <!----->
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav nav-tabs flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active show"
                                    data-toggle="tab"href="#tab-1">
                                Pham Ly Thai Ngan</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link"data-toggle="tab"
                                href="#tab-2">
                                Nguyen Thi Kieu My</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"data-toggle="tab"
                                    href="#tab-3">
                                    Le Nguyen Kim Ngan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"data-toggle="tab"
                                        href="#tab-4">
                                        Huynh Huu Phuc</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"data-toggle="tab"
                                            href="#tab-5">
                                            Le Bao Quoc</a>
                                            </li>
                            </ul>

                        </div>
                        <!----->
                        <div class="col-lg-9 mt-4 mt-lg-0">
                            <div class="tab-content">
                                <div class="tab-pane active show"id="tab-1">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3 class="text-white">Pham Ly Thai Ngan</h3>
                                            <p class="font-italic">
                                                Hi, i'm single! <br> Contact with me : 089604xxxx <br> Moazz !
                                            </p>
                                        </div>
                                        <div class="col-lg-4 text-center order-1 order-lg-2">
                                            <img src="Public/frontend/img/thaingan1.jpg"alt=""
                                            class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <!----->
                                <div class="tab-pane"id="tab-2">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3 class="text-white">Nguyen Thi Kieu My</h3>
                                            <p class="font-italic">
                                                Hi, i'm Mi! <br> Call me baby: 079789xxxx <br> Luv u!
                                            </p>
                                        </div>
                                        <div class="col-lg-4 text-center order-1 order-lg-2">
                                            <img src="Public/frontend/img/home/my.jpg"class="img-fluid"alt="">
                                        </div>
                                    </div>
                                </div>
                                <!----->
                                <div class="tab-pane"id="tab-3">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3 class="text-white">Le Nguyen Kim Ngan</h3>
                                            <p class="font-italic">
                                               Hi, em dung day tu chieu!<br> Call me maybe: 038618xxxx <br> Love!
                                            </p>
                                        </div>
                                        <div class="col-lg-4 text-center order-1 order-lg-2">
                                            <img src="Public/frontend/img/kimngan.jpg"class="img-fluid"alt="">
                                        </div>
                                    </div>
                                </div>
                                <!-----><div class="tab-pane"id="tab-4">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3 class="text-white">Huynh Huu Phuc</h3>
                                            <p class="font-italic">
                                                Hi, Dip trung thu an banh gi cung duoc, mien la NHAN GIONG em!<br> Babe call me: 091677xxxx <br> Heart!  
                                            </p>
                                        </div>
                                        <div class="col-lg-4 text-center order-1 order-lg-2">
                                            <img src="Public/frontend/img/home/muc.jpg"class="img-fluid"alt="">
                                        </div>
                                    </div>
                                </div>
                                <!----->
                                <div class="tab-pane"id="tab-5">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3 class="text-white">Le Bao Quoc</h3>
                                            <p class="font-italic">
                                                Who wanna play 3D with me?<br> CALL ME: 093740xxxx <br> Waitingforu!
                                            </p>
                                        </div>
                                        <div class="col-lg-4 text-center order-1 order-lg-2">
                                            <img src="Public/frontend/img/quoc.jpg"class="img-fluid"alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!---End of Tabs Section-->
            <!-- This section includes comapny info -->
            <div class="c-info row">

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 w3-panel w3-border" style="text-align: center;">
                    <div class="icon"><span class="material-icons"> local_shipping </span></div>
                    <div class="text">
                        <h3>FREE SHIPPING</h3>
                        <p>Free Shipping $50+</p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 w3-panel w3-border" style="text-align: center;">
                    <div class="icon"> <span class="material-icons"> attach_money </span> </div>
                    <div class="text">
                        <h3>MONEY BACK</h3>
                        <p>100% Money Back Guarantee</p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 w3-panel w3-border" style="text-align: center;">
                    <div class="icon"> <span class="material-icons"> headset_mic </span> </div>
                    <div class="text">
                        <h3>24H SUPPORT</h3>
                        <p>Customer Support Service 24 x 7</p>
                    </div>
                </div>
            </div>

        <!--Footer-->
        <?php require_once("Views/shared/footer.php"); ?>
        <!-- End of Footer -->
    </div>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require_once("Views/shared/script-footer.php"); ?>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script type="text/javascript" src="OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
    <script type="text/javascript" src="OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        });
    </script>

</body>

</html>