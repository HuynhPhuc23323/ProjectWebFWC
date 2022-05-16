<!doctype html>
<html lang="en">

<head>
    <?php require_once("Views/shared/head-title.php"); ?>
    <link rel="stylesheet" href="Public/frontend/css/product_detail.css">
</head>

<body>
    <div class="container-fluid">
        <?php require_once("Views/shared/header.php"); ?>

        <!--End of NAVBAR-->
        <?php foreach($product as $productDetail): ?>
        <div class="wrapper row">
            <div class="preview col-5">
                <div class="preview-pic tab-content">
                    <div class="tab-pane active" id="pic-1"><img src="Public/frontend/img/product/<?=$productDetail['image_link']?>"alt="Product image" /></div>
                </div>
            </div>
            <div class="details col-7">
                <h3 class="product-title"><?=$productDetail['name']?> </h3>
                <div class="rating">                    
                    <span class="review-no"><?=$productDetail['catalog_name']?></span>
                </div>
                <p class="product-description">Description:<?=$productDetail['content']?></p>
                <h4 class="price">Current price: <span><?=$productDetail['price']?></span></h4>                
                <p class="Brand"> Brand: <?=$productDetail['brand']?></p>
                <p class="Madein"> Made In: <?=$productDetail['madeIn']?></p>
                <p class="Type"> Type: <?=$productDetail['type']?> </p>
                <p class="Capacity"> Capacity: <?=$productDetail['capacity']?> </p>
                <div class="action">
                    <a class="add-to-cart btn btn-default" href="index.php?controller=cart&action=addToCart&id=<?=$productDetail['id']?>">Add to cart</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php require_once("Views/shared/footer.php"); ?>
    </div>
    <?php require_once("Views/shared/script-footer.php"); ?>
</body>

</html>