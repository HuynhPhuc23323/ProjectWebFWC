<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container">
            <a href="?controller=home" class="navbar-brand text-uppercase font-weight-bold">FWC

                <span>COSMETIC</span>
                <small class="text-dark">
                    FRIEND WITH COSMETIC
                </small>
            </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item h-active"><a href="?controller=home" class="nav-link text-uppercase font-weight-bold">Home</a></li>
                    <li class="nav-item p-active"><a href="?controller=product" class="nav-link text-uppercase font-weight-bold">Product</a></li>
                    <li class="nav-item c-active"><a href="?controller=contact" class="nav-link text-uppercase font-weight-bold">Contact</a></li>
                    <li class="nav-item s-active"><a href="?controller=search" class="nav-link text-uppercase font-weight-bold"><i class="fa fa-search"></i></a></li>
                    <li class="nav-item ca-active"><a href="?controller=cart" class="nav-link text-uppercase font-weight-bold"><i class="fa fa-shopping-basket"></i></a></li>
                    <?php 
                    
                    if(isset($_SESSION["email"])){
                        echo'<li class="nav-item acc-active"><a href="?controller=profile" class="nav-link text-uppercase font-weight-bold"><i class="fa fa-user-circle"></i></a></li>';
                    } else {
                        echo '<li class="nav-item acc-active"><a href="?controller=account" class="nav-link text-uppercase font-weight-bold"><i class="fa fa-user-circle"></i></a></li>';
                    }

                    ?>
                    
                </ul>
            </div>
        </div>
    </nav>
</header>

