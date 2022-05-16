<!doctype html>
<html lang="en">

<head>
    <?php require_once("Views/shared/head-title.php") ?>
    <link rel="stylesheet" href="Public/frontend/css/search.css">
</head>

<body>
    <div class="container-fluid">
        <?php require_once("Views/shared/header.php"); ?>
        <!--End of NAVBAR-->
        <div class="container-search">
            <div class="container-seabar">
                <div class="search-bar">
                    <form class="form-searchbar" method="Post" action="index.php?controller=search&action=search">
                        <div class="search-input">
                            <span class="icon-search fa fa-search"></span>
                            <input type="text" class="text-search" name="searchString" placeholder=" What are you looking for?...">
                            
                        </div>                        
                    </form>                   
                                  
                </div>
                
               
            </div>
            <div class="container-seabar category">
                <div class="search-bar">
                    <form class="form-searchbar" method="Post" action="index.php?controller=search&action=searchCategory">
                        <select class="selectCategory" name="category" >
                            <?php
                            $link=null;
                            taoKetNoi($link);
                            $result=chayTruyVanTraVeDL($link,"SELECT * FROM tbl_catalog");
                            while($rows=mysqli_fetch_assoc($result)){
                                echo '
                                <option value="'.$rows['id'].'">'.$rows['name'].'</option>
                                ';
                            }
                            giaiPhongBoNho($link,$result);
                            ?>
                        </select>
                        <button class="btn-search btn-outline-dark" name="submitSearchCategory">Search</button>                      
                    </form>      
                </div>
            </div>
            <div class="container-searesult">
                <div class="search-result">
                    <h1>Search Results</h1>
                    <div class="result row">
                        <?php
                        if (isset($products)) :
                            foreach ($products as $product) :
                        ?>
                                <div class="concol col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-img-actions">
                                                <img src="Public/frontend/img/product/<?= $product['image_link'];?>" class="card-img img-fluid" alt="Product Image">
                                            </div>
                                            <div class="mb-2">
                                                <span><?php print_r($product["name"]); ?></span>
                                                <span><?= $product["content"]; ?></span>
                                            </div>
                                            <h3 class="mb-0"><?= $product["price"] ?></h3>
                                            <a href="?controller=product&action=show&id=<?=$product['id']?>" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endforeach;
                        else : "1";
                        endif;
                        if(isset($messageCatetory)){
                            foreach($messageCatetory as $messageCatetories){
                                echo '
                                
                                <div class="concol col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-img-actions">
                                                    <img src="Public/frontend/img/product/'.$messageCatetories['image_link'].'" class="card-img img-fluid" alt="Product Image">
                                                </div>
                                                <div class="mb-2">
                                                    <span>'.$messageCatetories["name"].'</span>
                                                    <span>'.$messageCatetories["content"].'</span>
                                                </div>
                                                <h3 class="mb-0">$'.$messageCatetories["price"].'</h3>
                                                <a href="?controller=product&action=show&id='.$messageCatetories['id'].'" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                
                                ';

                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="container-popularproducts">
                <div class="search-content">
                    <h1>Popular Products</h1>
                    <div class="product row">
                            <?php
                            $link=null;
                            taoKetNoi($link);
                            $result=chayTruyVanTraVeDL($link,"SELECT * FROM tbl_products WHERE (id='25'or id='26' or id='27' or id='28')");
                            while($rows=mysqli_fetch_assoc($result)){
                                echo '
                                <div class="concol col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-img-actions">
                                                <img src="Public/frontend/img/product/'.$rows['image_link'].'" class="card-img img-fluid" alt="Product Image">
                                            </div>
                                            <div class="mb-2">
                                                <span>'.$rows["name"].'</span>
                                                <span>'.$rows["content"].'</span>
                                            </div>
                                            <h3 class="mb-0">$'.$rows["price"].'</h3>
                                            <a href="?controller=product&action=show&id='.$rows['id'].'" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                            giaiPhongBoNho($link,$result);
                            ?>
                            
                        <!-- <div class="concol col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-img-actions">
                                        <img src="/Public/frontend/img/product/HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN REFILL.jpg" class="card-img img-fluid" alt="Product Image">
                                    </div>
                                    <div class="mb-2">
                                        <span>HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN REFILL</span>
                                        <span>Mô tả</span>
                                    </div>
                                    <h3 class="mb-0">$30.00</h3>
                                    <a href="?controller=product&action=show&id=26" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="concol col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-img-actions">
                                        <img src="/Public/frontend/img/product/HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN.jpg" class="card-img img-fluid" alt="Product Image">
                                    </div>
                                    <div class="mb-2">
                                        <span>HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN</span>
                                        <span>Mô tả</span>
                                    </div>
                                    <h3 class="mb-0">$30.00</h3>
                                    <a href="?controller=product&action=show&id=27" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="concol col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-img-actions">
                                        <img src="/Public/frontend/img/product/KILLAWATT FOIL FREESTYLE HIGHLIGHTER DUO.jpg" class="card-img img-fluid" alt="Product Image">
                                    </div>
                                    <div class="mb-2">
                                        <span>KILLAWATT FOIL FREESTYLE HIGHLIGHTER DUO</span>
                                        <span>Mô tả</span>
                                    </div>
                                    <h3 class="mb-0">$30.00</h3>
                                    <a href="?controller=product&action=show&id=25" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="concol col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-img-actions">
                                        <img src="/Public/frontend/img/product/SUN STALK'R INSTANT WARMTH BRONZER.jpg" class="card-img img-fluid" alt="Product Image">
                                    </div>
                                    <div class="mb-2">
                                        <span>SUN STALK'R INSTANT WARMTH BRONZER</span>
                                        <span>Mô tả</span>
                                    </div>
                                    <h3 class="mb-0">$30.00</h3>
                                    <a href="?controller=product&action=show&id=28" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <!--Footer-->
    </div>
    <?php require_once("Views/shared/footer.php"); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require_once("Views/shared/script-footer.php"); ?>
</body>

</html>