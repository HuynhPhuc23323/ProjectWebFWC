<!doctype html>
<html lang="en">

<head>
    <?php require_once("Views/shared/head-title.php"); ?>
    <link rel="stylesheet" href="Public/frontend/css/product.css">
</head>

<body>
    <div class="container-fluid">
        <?php require_once("Views/shared/header.php"); ?>
        <!--End of NAVBAR-->
        <!-- banner -->
        <div class="p-banner w3-display-container">
            <img class="img-banner mySlides" src="Public/frontend/img/slideshow1.jpg" alt="">
            <img class="img-banner mySlides" src="Public/frontend/img/slideshow2.jpg" alt="">
            <img class="img-banner mySlides" src="Public/frontend/img/slideshow3.jpg" alt="">

            <!-- <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                <div class="w3-left " onclick="plusDivs(-1)">&#10094;</div>
                <div class="w3-right" onclick="plusDivs(1)">&#10095;</div>
                <h1>Lỗi 2 dấu mũi tên</h1>
            </div> -->
        </div>

        <!-- product gallery  -->
        <div class="gallery-header">
            <h1>Latest Product Range</h1>
            <p>UPTO 50% off on all products</p>
        </div>
        <div class="product-container">
            <div class="row">
                <?php foreach ($products as $product) : ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                        <a class="cont-pro" href="?controller=product&action=show&id=<?= $product['id'] ?>">
                            <div class="p-card">
                            
                                <img src="Public/frontend/img/product/<?= $product['image_link']; ?>" alt="">
                                <h1><?= $product['name']; ?></h1>
                                <h2>#3137</h2>
                                <h3><?= $product['price']; ?></h3>
                                <button>BUY NOW</button>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>            
        </div>
        <!--Footer-->
        <?php require_once("Views/shared/footer.php") ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require_once("Views/shared/script-footer.php") ?>
    <script type="text/javascript" src="Public/frontend/js/product.js"> </script>
</body>

</html>