<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add new product</title>
    <link rel="stylesheet" href="Public/frontend/css/add_new_product.css">


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col mt-4">
                <form class="bshadow" enctype="multipart/form-data" action="index.php?controller=profile&action=addProductDetail" method="post">
                    <div class="card">
                        <div class="hder card-header text-center">
                            <h2>Add New Product</h2>
                            <?php
                            
                            if(isset($messageErrorAdd)){
                                echo"<p style='color:red;font-weight: bold;'>".$messageErrorAdd."</p>";
                            }
                            if(isset($messageSuccessAdd)){
                                echo"<p style='color:red;font-weight: bold;'>".$messageSuccessAdd."</p>";
                            }
                            
                            ?>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="brs2.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    <div class="form-group">
                                        <label for="image_link">Image File</label>
                                        <input type="file" class="form-control-file" name="image_link" id="productImage" placeholder="Product Image">

                                    </div>
                                </div>
                                <div class="col-md-9 ">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Tên sản phẩm" required>

                                    </div>
                                    <div class="input-group form-group">
                                        <span for="price" class="input-group-text">Unit Price</span>
                                        <input type="number" name="price" id="price" class="form-control" placeholder="Giá trên 1 sản phẩm" min="0">
                                        <span class="input-group-text">$</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="catalog_id">Category</label>
                                        
                                            <?php
                                            echo'<select name="catalog_id" class="form-control" required>';
                                            //lấy dl catalog_id đổ vào option
                                            $link=null;
                                            taoKetNoi($link);
                                            $result=chayTruyVanTraVeDL($link,"SELECT * FROM tbl_catalog");
                                            while($rows=mysqli_fetch_assoc($result)){
                                                echo '
                                                <option value="'.$rows['id'].'">'.$rows['name'].'</option>
                                                
                                                ';
                                            }
                                            echo'</select>';
                                            giaiPhongBoNho($link,$result);
                                            ?>
                                        
                                    </div>

                                    <div class="input-group form-group">
                                        <span for="discount" class="input-group-text">Discount</span>
                                        <input type="number" name="discount" id="discount" class="form-control" placeholder="Giảm giá" min="0">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control" name="content" id="content" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                        <input type="text" class="form-control" name="brand" id="name" placeholder="Tên nhà sản xuất" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="madeIn">Make In</label>
                                        <input type="text" class="form-control" name="madeIn" id="name" placeholder="Đến từ ..." required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <input type="text" class="form-control" name="type" id="name" placeholder="Type" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="capacity">Capacity</label>
                                        <input type="text" class="form-control" name="capacity" id="name" placeholder="capacity" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer text-muted">
                            <div class="row">
                                <div class="col-6 spa-btn">
                                    <button class="btn btn-outline-dark" name="submitAddProductDetail">Save</button>
                                </div>
                                <div class="col-6 spa-btn">
                                    <a href="index.php?controller=profile&action=manage" class="btn btn-outline-dark">Back, Manage!</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>