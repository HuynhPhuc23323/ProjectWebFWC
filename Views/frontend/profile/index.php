<!doctype html>
<html lang="en">

<head>
    <?php require_once("Views/shared/head-title.php"); ?>
    <link rel="stylesheet" href="Public/frontend/css/profile.css">
</head>

<body>
    <div class="container-fluid">

        <?php require_once("Views/shared/header.php"); ?>
        <section class="py-5 header">
            <div class="container py-4">
                <header class="text-center mb-5 text-white">
                    <h1 class="display-4">My Account</h1>
                    <img src="Public/frontend/img/account/bg.jpeg" class="rounded-circle" alt="Avatar User" width="100" height="100">


                </header>


                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            <?php
                            if ($_SESSION['role'] == 1) {
                                if (isset($managerInterface) || isset($productDetail) || isset($flagAddCatalog)) {
                                    echo '
                                    <a class="nav-link mb-3 p-3 shadow " id="v-pills-infor-tab" data-toggle="pill" href="index.php?controller=profile" role="tab" aria-controls="v-pills-infor" aria-selected="true">
                                        <i class="fas fa-user mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Thông Tin Cá Nhân</span>
                                    </a>
                                    <a class="nav-link mb-3 p-3 shadow active" id="v-pills-history-tab" data-toggle="pill" href="index.php?controller=profile&action=manage" role="tab" aria-controls="v-pills-history" aria-selected="false">
                                        <i class="far fa-calendar-plus mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Manager</span>
                                    </a>
                                    
                                    ';
                                } else
                                    echo '
                                <a class="nav-link mb-3 p-3 shadow  active" id="v-pills-infor-tab" data-toggle="pill" href="index.php?controller=profile" role="tab" aria-controls="v-pills-infor" aria-selected="true">
                                    <i class="fas fa-user mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Thông Tin Cá Nhân</span>
                                </a>
                                <a class="nav-link mb-3 p-3 shadow" id="v-pills-history-tab" data-toggle="pill" href="index.php?controller=profile&action=manage" role="tab" aria-controls="v-pills-history" aria-selected="false">
                                <i class="far fa-calendar-plus mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Manager</span>
                                </a>
                                ';
                            } else {
                                echo '
                                <a class="nav-link mb-3 p-3 shadow active" id="v-pills-infor-tab" data-toggle="pill" href="index.php?controller=profile" role="tab" aria-controls="v-pills-infor" aria-selected="true">
                                    <i class="fas fa-user mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Thông Tin Cá Nhân</span>
                                </a>
                                ';
                            }
                            ?>




                            <!-- <a class="logout mb-3 p-3 shadow bg-white" data-toggle="pill" role="tab" style="text-decoration: none;">
                                <i class="fa fa-sign-out mr-2"></i>
                                <span class="font-weight-bold small text-uppercase"> Log out -->
                            <!-- <a href="index.php?controller=profile&action=actionLogOut">Log out</a>  BỊ XUỐNG DÒNG K CÒN CSS-->
                            <!-- </span>
                            </a> -->
                        </div>
                    </div>


                    <div class="col-md-9">
                        <!-- Tabs content -->
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-infor" role="tabpanel" aria-labelledby="v-pills-infor-tab">
                                <!-- <h4 class="font-italic mb-4">Thông Tin Cá Nhân</h4> -->
                                <?php
                                if (!isset($tinHieu) & !isset($managerInterface) & !isset($productDetail) & !isset($messageSaveProductDetail) & !isset($flagChangePassword) & !isset($flagAddCatalog)) {
                                    echo '<h4 class="font-italic mb-4">Thông Tin Cá Nhân</h4>';
                                    $link = null;
                                    taoKetNoi($link);
                                    $result = chayTruyVanTraVeDL($link, "SELECT name,email,phone,address,created FROM tbl_user WHERE id='" . $_SESSION['idUser'] . "'");
                                    while ($row = mysqli_fetch_assoc($result)) { //Only 1 user
                                        echo '<p class="font-italic text-muted mb-2">
                                            Name: ' . $row['name'] . '<br> 
                                            Email: ' . $row['email'] . '<br> 
                                            Address: ' . $row['address'] . '<br> 
                                            Phone number: ' . $row['phone'] . '<br>
                                            Created: ' . $row['created'] . '</p><br>
    
    
                                           
                                            ';
                                    }
                                    if (isset($messageSaveProfile)) {
                                        echo "
                                            <p style='color:#cda45e;'>" . $messageSaveProfile . "</p>
                                            ";
                                    }
                                    echo '
                                        <br>
                              
                                        <div class="row">
                                            <div class="col-6 spa-btn">
                                                <a href="index.php?controller=profile&action=changeProfile" class="btn btn-outline-dark">Change profile</a>
                                            </div>
                                            <div class="col-6 spa-btn">
                                                <a href="index.php?controller=profile&action=actionLogOut" class="btn btn-outline-dark">Log out</a>
                                            </div>
                                        </div>
                                        ';
                                    giaiPhongBoNho($link, $result);
                                }
                                if (isset($tinHieu)) {
                                    echo '<h4 class="font-italic mb-4">Thông Tin Cá Nhân</h4>';
                                    $link = null;
                                    taoKetNoi($link);
                                    $result = chayTruyVanTraVeDL($link, "SELECT name,email,phone,address,created FROM tbl_user WHERE id='" . $_SESSION['idUser'] . "'");
                                    while ($row = mysqli_fetch_assoc($result)) { //Only 1 user
                                        echo ' <br>
                                            <form action="index.php?controller=profile&action=saveProfile" method="post">
                                            <div class="form-outline form-white mb-4">
                                            <p class="font-italic text-muted mb-2">
                                            Name:
                                            </p>
                                                <input type="text" class="textholder form-control form-control-lg" value="' . $row['name'] . '" name="name" />
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                            <p class="font-italic text-muted mb-2">
                                            Email (Username):
                                            </p>
                                                <input type="email" readonly class="textholder form-control form-control-lg" value="' . $row['email'] . '" name="email" />
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                            <p class="font-italic text-muted mb-2">
                                            Phone:
                                            </p>
                                                <input type="text" class="textholder form-control form-control-lg" value="' . $row['phone'] . '" name="phone" />
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                            <p class="font-italic text-muted mb-2">
                                            Address:
                                            </p>
                                                <input type="text" class="textholder form-control form-control-lg" value="' . $row['address'] . '" name="address" />
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                            <p class="font-italic text-muted mb-2">
                                            Created:
                                            </p>
                                                <input type="text" readonly class="textholder form-control form-control-lg" value="' . $row['created'] . '" name="created" />
                                            </div>
    
    
                                           
                                            ';
                                    }
                                    echo '
                                           
                                            <br>
                              
                                            <div class="row">
                                                <div class="col-4 spa-btn">
                                                    <button class="btn btn-outline-dark" name="submitSaveProfile">Save</button>
                                                </div>
                                                <div class="col-4 spa-btn">
                                                    <a href="index.php?controller=profile&action=viewChangePassword" class="btn btn-outline-dark">Change Password</a>
                                                </div>
                                                <div class="col-4 spa-btn">
                                                    <a href="index.php?controller=profile&action=actionLogOut" class="btn btn-outline-dark">Log out</a>
                                                </div>
                                            </div>
                                            </form>
                                        ';
                                    giaiPhongBoNho($link, $result);
                                }
                                if (isset($flagAddCatalog) & isset($categories)) {
                                    echo '
                                        
                                        <h4 class="font-italic mb-4">All categories</h4><br>';
                                    if (isset($messsageAddCatalog)) {
                                        echo '<p class="font-italic text-muted mb-2" style="color:red;font-weight: bold;">' . $messsageAddCatalog . '</p>';
                                    }
                                    if (isset($messsageDeleteCatalog)) {
                                        echo '<p class="font-italic text-muted mb-2" style="color:red;font-weight: bold;">' . $messsageDeleteCatalog . '</p>
                                                    <a href="index.php?controller=profile&action=viewAddCatalog">Click here to reload!</a>';
                                    }
                                    echo '
                                        <form action="index.php?controller=profile&action=saveCategory" method="post">
                                            <div class="form-outline form-white mb-4">
                                                <p class="font-italic text-muted mb-2">
                                                Name category:
                                                </p>
                                                <input type="text" class="textholder form-control form-control-lg" value="" placeholder="Son" name="nameCategory" required/>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-12 spa-btn">
                                                    <button class="btn btn-outline-dark" name="submitSaveCategory">Save</button>
                                                </div>
                                                
                                            </div>

                                        </form>
                                        <br>
                                        <table style="width:100%;">
                                            <tr>
                                                <th>Category ID</th>
                                                <th>Category Name</th>                                                
                                                <th>Action</th>
                                            </tr>';
                                    foreach ($categories as $category) {
                                        echo '
                                                <tr>
                                                    <td>' . $category['id'] . '</td>
                                                    <td>' . $category['name'] . '</td>
                                                    
                                                    <td>
                                                        <div class="row">                                                            

                                                            <div class="col-6 spa-btn">
                                                                <a href="index.php?controller=profile&action=deleteCategory&id=' . $category['id'] . '" class="btn btn-outline-dark">Delete</a>
                                                            </div>

                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                ';
                                    }
                                    echo '
                                            
                                            </table>
                                        ';
                                }
                                if (isset($products)) { 
                                    echo '
                                        <h4 class="font-italic mb-4">All products</h4>
                                        <div class="table-responsive">
                                        <table class="table table-md">
                                            <tr>
                                                <th>Image</th>
                                                <th>CataLog ID</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Content</th>
                                                <th>Brand</th>
                                                <th>Action</th>
                                            </tr>';
                                    $link = null;
                                    taoKetNoi($link);
                                    $result = chayTruyVanTraVeDL($link, "SELECT count(id) AS total FROM tbl_products");
                                    $row = mysqli_fetch_assoc($result);
                                    $total_records = $row['total']; // tổng sản phẩm

                                    //xác định trang
                                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $limit = 4;
                                    $total_page = ceil($total_records / $limit);

                                    // Giới hạn current_page trong khoảng 1 đến total_page
                                    if ($current_page > $total_page) {
                                        $current_page = $total_page;
                                    } else if ($current_page < 1) {
                                        $current_page = 1;
                                    }
                                    $linkProduct=null;
                                    taoKetNoi($linkProduct);
                                    $start = ($current_page - 1) * $limit;
                                    $resultProduct=chayTruyVanTraVeDL($linkProduct,"SELECT * FROM tbl_products LIMIT ${start}, ${limit}");
                                    while ($row = mysqli_fetch_assoc($resultProduct)){
                                        echo '
                                                <tr>
                                                    <td><img src="Public/frontend/img/product/' . $row['image_link'] . '" class="rounded-circle" alt="Image Product" width="48px" height="48px"></td>
                                                    <td>' . $row['catalog_id'] . '</td>
                                                    <td>' . $row['name'] . '</td>
                                                    <td>' . $row['price'] . '</td>
                                                    <td>' . $row['content'] . '</td>
                                                    <td>' . $row['brand'] . '</td>
                                                    <td>
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <a  href="index.php?controller=profile&action=editProduct&id=' . $row['id'] . '" class="btn btn-outline-dark">Edit</a>
                                                            </div>

                                                            

                                                            <div class="col-md-6">
                                                                <a  href="index.php?controller=profile&action=deleteProductManage&id=' . $row['id'] . '" class="btn btn-outline-dark">Delete</a>
                                                            </div>

                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                ';

                                    }
                                    echo '
                                            
                                        </table>
                                        </div>
                                            <br>
                                            <div class="row">
                                                
                                                <div class="col-6 spa-btn">
                                                    <a href="index.php?controller=profile&action=viewAddProduct" class="btn btn-outline-dark">Add Product</a>
                                                </div>

                                                <div class="col-6 spa-btn">
                                                    <a href="index.php?controller=profile&action=viewAddCatalog" class="btn btn-outline-dark">Add Category</a>
                                                </div>
                                            </div> 
                                        ';
                                    if ($current_page > 1 && $total_page > 1){
                                        echo '<a class="btn btn btn-outline-dark mt-2 total_page_button" href="index.php?controller=profile&action=manage&page='.($current_page-1).'">Prev</a> ';
                                    }
                                    for ($i = 1; $i <= $total_page; $i++){
                                        //Nếu là trang hiện tại thì thẻ span, kp là thẻ a
                                        if ($i == $current_page){
                                            echo '<span class="btn btn-outline-dark mt-2 total_page_button">'.$i.'</span> ';
                                        }
                                        else{
                                            echo '<a class="btn btn btn-outline-dark mt-2 total_page_button" href="index.php?controller=profile&action=manage&page='.$i.'">'.$i.'</a> ';
                                        }
                                    }
                        
                                    // hiển thị nút prev
                                    if ($current_page < $total_page && $total_page > 1){
                                        echo '<a class="btn btn-outline-dark mt-2 total_page_button" href="index.php?controller=profile&action=manage&page='.($current_page+1).'">Next</a> ';
                                    }
                                    
                                    
                                    
                                }
                                if (isset($productDetail)) {
                                    echo '<h4 class="font-italic mb-4">Edit Product Detail</h4>';
                                    echo '
                                        
                                        <form action="index.php?controller=profile&action=saveProduct" method="post">
                                            <div class="form-outline form-white mb-4">
                                                <p class="font-italic text-muted mb-2">
                                                Product Name:
                                                </p>
                                                <input type="text" class="textholder form-control form-control-lg" value="' . $productDetail['name'] . '" name="nameProduct" />
                                                <input type="hidden" class="textholder form-control form-control-lg" value="' . $productDetail['id'] . '" name="idProduct" />
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                                <p class="font-italic text-muted mb-2">
                                                Catalog ID:
                                                </p>
                                                <input type="text" readonly class="textholder form-control form-control-lg" value="' . $productDetail['catalog_id'] . '" name="catalog_id" />
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                                <p class="font-italic text-muted mb-2">
                                                Price:
                                                </p>
                                                <input type="text" class="textholder form-control form-control-lg" value="' . $productDetail['price'] . '" name="price" />
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                            <p class="font-italic text-muted mb-2">
                                            Content:
                                            </p>
                                                <input type="text" class="textholder form-control form-control-lg" value="' . $productDetail['content'] . '" name="content" />
                                            </div>  
                                            <div class="form-outline form-white mb-4">
                                            <p class="font-italic text-muted mb-2">
                                            Discount:
                                            </p>
                                                <input type="text" class="textholder form-control form-control-lg" value="' . $productDetail['discount'] . '" name="discount" />
                                            </div>  
                                            <div class="form-outline form-white mb-4">
                                            <p class="font-italic text-muted mb-2">
                                            Image Product:
                                            </p>
                                                <input type="text" readonly class="textholder form-control form-control-lg" value="' . $productDetail['image_link'] . '" name="image_link" />
                                            </div>  
                                            <div class="form-outline form-white mb-4">
                                            <p class="font-italic text-muted mb-2">
                                            Brand Of Product:
                                            </p>
                                                <input type="text" class="textholder form-control form-control-lg" value="' . $productDetail['brand'] . '" name="brand" />
                                            </div>  
                                            <div class="form-outline form-white mb-4">
                                            <p class="font-italic text-muted mb-2">
                                            Make In:
                                            </p>
                                                <input type="text" class="textholder form-control form-control-lg" value="' . $productDetail['madeIn'] . '" name="madeIn" />
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                            <p class="font-italic text-muted mb-2">
                                            Type:
                                            </p>
                                                <input type="text" class="textholder form-control form-control-lg" value="' . $productDetail['type'] . '" name="type" />
                                            </div>  
                                            <div class="form-outline form-white mb-4">
                                            <p class="font-italic text-muted mb-2">
                                            Capacity:
                                            </p>
                                                <input type="text" class="textholder form-control form-control-lg" value="' . $productDetail['capacity'] . '" name="capacity" />
                                            </div>  ';
                                    if (isset($messageSaveProductDetail)) {
                                        echo '<script language="javascript">alert("' . $messageSaveProductDetail . '"); window.location="index.php?controller=profile&action=manage";</script>';
                                    }
                                    echo ' 
                                            
                                            <br>
                                            <div class="row">
                                                <div class="col-6 spa-btn">
                                                    <button type="submit" class="btn btn-outline-dark" name="submitSaveProduct">Save</button>
                                                </div>
                                                <div class="col-6 spa-btn">
                                                    <a href="index.php?controller=profile&action=manage" class="btn btn-outline-dark">Go back</a>
                                                </div>
                                            </div> 
                                        </form>
                                        ';
                                }

                                if (isset($flagChangePassword)) {
                                    if ($_SESSION['idUser']) {
                                        echo '<h4 class="font-italic mb-4">Change Password</h4><br>';
                                        if (isset($messageChangePassword)) {
                                            echo '<p class="font-italic text-muted mb-2" style="color:red;font-weight: bold;">' . $messageChangePassword . '</p>';
                                        }
                                        echo '
                                            
                                            <form action="index.php?controller=profile&action=actionChangePassword" method="post">
                                                <div class="form-outline form-white mb-4">
                                                <p class="font-italic text-muted mb-2">
                                                Old Password:
                                                </p>
                                                    <input type="password" class="textholder form-control form-control-lg" value="" name="oldPassword" required/>
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                <p class="font-italic text-muted mb-2">
                                                New Password:
                                                </p>
                                                    <input type="password" class="textholder form-control form-control-lg" value="" name="newPassword" required/>
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                <p class="font-italic text-muted mb-2">
                                                Repeat New Password:
                                                </p>
                                                    <input type="password" class="textholder form-control form-control-lg" value="" name="reNewPassword" required/>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-12 spa-btn">
                                                        <button type="submit" class="btn btn-outline-dark" name="submitChangePassword">Change</button>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                            ';
                                    } else {
                                        echo '<script language="javascript">alert("' . $messageSaveProductDetail . '"); window.location="index.php?controller=home";</script>';
                                    }
                                }

                                ?>
                            </div>

                            <!-- <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
                                <h4 class="font-italic mb-4">Lịch sử mua hàng</h4>
                                <p class="font-italic text-muted mb-2">
                                    Không có lịch sử mua hàng. Bởi vì dịch bệnh nhiều quá phải ở nhà nên không có tiền mua đồ
                                </p>
                            </div>
    
                            <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab">
                                <h4 class="font-italic mb-4">Địa chỉ</h4>
                                <p class="font-italic text-muted mb-2">
                                    Ấp Cành Lá, xã Cành Cây, huyện Trên Mây, tỉnh Ngất Ngây
                                </p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php require_once("Views/shared/footer.php"); ?>
    </div>
</body>