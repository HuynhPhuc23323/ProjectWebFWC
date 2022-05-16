<?php
    require_once ("./Modules/db_module.php");
class BaseModel{
    
    // Lấy ra hết dữ liệu
    public function all($table, $select= ['*'], $orderBys=[],$limit=15){
        $columns = implode(',',$select);
        $orderByString=implode(' ',$orderBys);
        $link=null;
        taoKetNoi($link);
        if($orderByString){
            $result=chayTruyVanTraVeDL($link,"select ${columns} from ${table} order by ${orderByString} limit ${limit}");
        } else{
            $result=chayTruyVanTraVeDL($link,"select ${columns} from ${table} limit ${limit}");
        }
        $data=[];
        while($rows=mysqli_fetch_assoc($result)){
            array_push($data,$rows);
        }
        giaiPhongBoNho($link,$result);
        return $data;
    }
    

    // Lấy ra 1 bản ghi trong bảng
    public function find($table,$id){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanTraVeDL($link,"select * from ${table} where id=${id} limit 1");
        $rows=mysqli_fetch_assoc($result);
        giaiPhongBoNho($link,$result);
        return $rows;
    }

    // Thêm dữ liệu
    public function create($table,$data = []){
        $columns= implode(',',array_keys($data));

        $newValues= array_map(function($value){
            return "'".$value."'";
        },array_values($data));
        $newValues=implode(',',$newValues);

        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanKhongTraVeDL($link,"INSERT INTO ${table} (${columns}) VALUES(${newValues})");
        giaiPhongBoNho($link,$result);
    }

    // Cập nhật dữ liệu
    public function update($table,$id,$data){
        $dataSets=[];

        foreach($data as $key=>$val){
            array_push($dataSets,"${key}='".$val."'");
        }
        $dataSetString=implode(',',$dataSets);

        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanKhongTraVeDL($link,"UPDATE ${table} SET ${dataSetString} WHERE id=${id}");
        giaiPhongBoNho($link,$result);
    }   

    // Xóa dữ liệu
    public function delete($table,$id){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanKhongTraVeDL($link,"DELETE FROM ${table} WHERE id=${id}");
        giaiPhongBoNho($link,$result);
    }

}
    
?>