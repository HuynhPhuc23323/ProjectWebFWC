<!doctype html>
<html lang="en">

<head>
  <?php require_once("Views/shared/head-title.php"); ?>
  <link rel="stylesheet" href="Public/frontend/css/cart.css">
  <script type="text/javascript" src="public/frontend/js/cart.js"> </script>
</head>

<body>
  <div class="container-fluid">
    <?php require_once("Views/shared/header.php"); ?>
    <!--End of NAVBAR-->

    <div class="shopping-cart">
            <!-- Title -->
            <div class="title">
                Shopping Bag
                <?php
                
                if(isset($messageSaveProduct)){
                    echo'
                    <div class="description">
                                <span>'.$messageSaveProduct.'</span>
                            </div>
                    ';
                }
                
                ?>
            </div>

            <!-- Product #1 -->
            <!-- <div class="item">
                <div class="buttons">
                    <span class="delete-btn"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                </div>

                <div class="image">
                    <img src="Public/frontend/img/son2.png" alt="" />
                </div>

                <div class="description">
                    <span>Common Projects</span>
                    <span>Bball High</span>
                    <span>White</span>
                </div>

                <div class="quantity">
                    <button class="plus-btn" type="button" name="button">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </button>
                    <input type="text" name="name" value="1">
                    <button class="minus-btn" type="button" name="button">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                  </button>
                </div>

                <div class="total-price">$549</div>
            </div> -->

            <!-- Product #2 -->
            <!-- <div class="item">
                <div class="buttons">
                    <span class="delete-btn"><i class="fa fa-trash-o" aria-hidden="true"></i></i></span>
                </div>

                <div class="image">
                    <img src="Public/frontend/img/macara.png" alt="" />
                </div>

                <div class="description">
                    <span>Maison Margiela</span>
                    <span>Future Sneakers</span>
                    <span>White</span>
                </div>

                <div class="quantity">
                    <button class="plus-btn" type="button" name="button">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </button>
                    <input type="text" name="name" value="1">
                    <button class="minus-btn" type="button" name="button">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                  </button>
                </div>

                <div class="total-price">$870</div>
            </div> -->

            <!-- Product #3 -->
            <!-- <div class="item">
                <div class="buttons">
                    <span class="delete-btn"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                </div>

                <div class="image">
                    <img src="Public/frontend/img/macara.png" alt="" />
                </div>

                <div class="description">
                    <span>Our Legacy</span>
                    <span>Brushed Scarf</span>
                    <span>Brown</span>
                </div>

                <div class="quantity">
                    <button class="plus-btn" type="button" name="button">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </button>
                    <input type="text" name="name" value="1">
                    <button class="minus-btn" type="button" name="button">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                  </button>
                </div>

                <div class="total-price">$349</div>
            </div> -->
            

                <?php
                
                if (isset($cartOfUser)){
                    foreach ($cartOfUser as $oneCartOfUser){
                        echo'
                        <form action="?controller=cart&action=saveProduct" method="post">
                        <div class="item">
                            <div class="buttons">
                                <a href="index.php?controller=cart&action=deleteProductInCart&id='.$oneCartOfUser['cart_id'].'" class="delete-btn"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </div>
    
                            <div class="image">
                                <img src="Public/frontend/img/product/'.$oneCartOfUser['product_image'].'" alt="Product Image" />
                            </div>
    
                            <div class="description">
                                <span>'.$oneCartOfUser['product_name'].'</span>
                                <span> </span>
                            </div>
    
                            <div class="quantity ml-5">
                                <button class="minus-btn" type="button" name="button">
                                    <i class="fa fa-minus " aria-hidden="true"></i>
                                </button>                            
                                <input type="text" name="quantity" value="'.$oneCartOfUser['quantity'].' "readonly>
                                <button class="plus-btn" type="button" name="button">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>                        
                            </div>
    
                            <div class="total-price ml-5">$'.$oneCartOfUser['product_price'].'/unit</div>
                            <div class="ml-5"> 
                            <input type="hidden" name="cart_id" value="'.$oneCartOfUser['cart_id'].' ">
                            <input type="hidden" name="product_name" value="'.$oneCartOfUser['product_name'].' ">
                            <input type="hidden" name="product_price" value="'.$oneCartOfUser['product_price'].' ">
                                <a class="nav-link text-uppercase font-weight-bold">
                                    <button class="checkout" type="submit">Save </button>
                                </a>
                            </div>
                        </div>   
                        </form> 
                            ';                        
                    }
                    
                        
                }
                
                ?>
                
            
            <div class="totals-item">
            <?php
            
            if(isset($_SESSION['email'])&isset($_SESSION['role'])&isset($_SESSION['idUser'])){
                
                echo'
                <a href="?controller=checkout" class="nav-link text-uppercase font-weight-bold">
                    <button class="checkout" type="submit">Checkout </button>
                </a>
                ';
            }
            
            ?>
            </div>
          
        </div>

    <!--Footer-->
    <?php require_once("Views/shared/footer.php"); ?>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php require_once("Views/shared/script-footer.php"); ?>

  <script type="text/javascript" src="Public/frontend/js/cart.js"></script>

</body>

</html>