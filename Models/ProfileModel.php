<?php

class ProfileModel extends BaseModel{

    public function index(){
        echo __METHOD__;
    }

    public function saveEditUser($id,$name,$phone,$address){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanKhongTraVeDL($link,"UPDATE tbl_user
                                                SET name = '".$name."', phone = '".$phone."',address='".$address."'
                                                WHERE id='".$id."'");
        giaiPhongBoNho($link,$result);
        return "Edit saved!";
    }

    public function getDetailProduct($id){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanTraVeDL($link,"SELECT * FROM tbl_products WHERE id=${id}");
        $row=mysqli_fetch_assoc($result);
        giaiPhongBoNho($link,$result);
        return $row;
    }

    public function saveEditProductDetail($id,$catalog_id,$name,$price,$content,$discount,$image_link,$brand,$madeIn,$type,$capacity){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanKhongTraVeDL($link,"UPDATE tbl_products
                                                SET catalog_id='".$catalog_id."', 
                                                name='".$name."',
                                                price='".$price."',
                                                content='".$content."',
                                                discount='".$discount."',
                                                image_link='".$image_link."',
                                                brand='".$brand."',
                                                madeIn='".$madeIn."',
                                                type='".$type."',
                                                capacity='".$capacity."'
                                                WHERE id='".$id."'");
        giaiPhongBoNho($link,$result);
        return "Edit saved!";
    }

    public function addProductToDB($catalog_id, $name, $price, $content, $discount, $image_link, $brand, $madeIn, $type, $capacity){
        $link=null;
        taoKetNoi($link);
        $today=getdate();
        $ghiToday="".$today['mday']."/".$today['mon']."/".$today['year']."";
        $result=chayTruyVanKhongTraVeDL($link,"INSERT INTO tbl_products (id, catalog_id, name, price, content, discount, image_link, created, brand, madeIn, type, capacity) 
                                                            VALUES (null, '".$catalog_id."',
                                                                    '".$name."',
                                                                    '".$price."',
                                                                    '".$content."',
                                                                    '".$discount."',
                                                                    '".$image_link."',
                                                                    '".$ghiToday."',
                                                                    '".$brand."',
                                                                    '".$madeIn."',
                                                                    '".$type."',
                                                                    '".$capacity."'
                                                                    )");
        giaiPhongBoNho($link,$result);
        return "Add success!";
    }

    public function processChangePassword($id,$newPassword){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanKhongTraVeDL($link,"UPDATE tbl_user
                                                SET password='".$newPassword."'
                                                WHERE id='".$id."'");
        giaiPhongBoNho($link,$result);
        return "Change password success!";
    }

    public function processAddCategory($name){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanTraVeDL($link,"SELECT name FROM tbl_catalog WHERE name='${name}'");
        $data=[];
        while($rows=mysqli_fetch_assoc($result)){
            array_push($data,$rows);
        }
        giaiPhongBoNho($link,$result);
        if(!empty($data)){
            return "Category is exist!";
        } else {
            $linkAdd=null;
            taoKetNoi($linkAdd);
            $resultAdd=chayTruyVanKhongTraVeDL($linkAdd,"INSERT INTO tbl_catalog (id,name) VALUES(null,'${name}')");
            giaiPhongBoNho($linkAdd,$resultAdd);
            return "Add Success";
        }

    }

    public function getAllCategories(){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanTraVeDL($link,"SELECT * FROM tbl_catalog");
        $data=[];
        while($rows=mysqli_fetch_assoc($result)){
            array_push($data,$rows);
        }
        giaiPhongBoNho($link,$result);
        return $data;
    }

    public function processDeleteCategory($id){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanKhongTraVeDL($link,"DELETE FROM tbl_catalog WHERE id='${id}'");        
        giaiPhongBoNho($link,$result);
        return 'Delete success! Please refresh page to update database';

    }

    public function processUpLoadImage($nameImage,$forderPath){
        $target_dir = "Public/frontend/img/".$forderPath."/";
        $target_file = $target_dir . basename($_FILES[$nameImage]["name"]);
        $uploadOk = null;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Kiểm tra có đổi đuôi file thành ảnh k
        $check = getimagesize($_FILES[$nameImage]["tmp_name"]);
        if($check !== false) {
            $uploadOk = null;
        } else {
            $uploadOk= "File is not an image.";
        }
        

        // Ảnh đã tồn tại chưa?
        if (file_exists($target_file)) {
            $uploadOk= "Sorry, file already exists.";
        }

        // Kích cỡ ảnh
        if ($_FILES[$nameImage]["size"] > 500000) {
        $uploadOk = "Sorry, your file is too large.";
        }

        // Đuôi file cho phép
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk !=null) {
        return "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$nameImage]["tmp_name"], $target_file)) {
                return null;
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        }
    }

    
}

?>