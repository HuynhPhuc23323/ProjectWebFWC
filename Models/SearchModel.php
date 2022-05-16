<?php
class SearchModel extends BaseModel {
    
    const TABLE = 'tbl_products';

    public function getAll($select=['*'], $orderBy=[],$limit=15) {
        return $this->all(ProductModel::TABLE, $select, $orderBy,$limit);
    }

    public function findByNameAndContent($string){
        $table = self::TABLE;
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanTraVeDL($link,"SELECT *
                                         FROM ${table}                                         
                                         WHERE name like '%${string}%' or
                                               content like '%${string}%' or
                                               brand like '%${string}%' or
                                               madeIn like '%${string}%' or
                                               type like '%${string}%' or
                                               capacity like '%${string}%'
                                               ");
        $data=[];
        while ($rows=mysqli_fetch_assoc($result)){
            array_push($data,$rows);
        }
        giaiPhongBoNho($link,$result);
        return $data;
    }

    public function getDetail($id){
        $table = self::TABLE;
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanTraVeDL($link,"SELECT ${table}.*,tbl_catalog.name as catalog_name
                                         FROM ${table}
                                         JOIN tbl_catalog ON tbl_catalog.id = ${table}.catalog_id 
                                         WHERE ${table}.id = ${id}");
        $data=[];
        while ($rows=mysqli_fetch_assoc($result)){
            array_push($data,$rows);
        }
        return $rows;
    }

    public function getByCategoryId($categoryId){
        $table = self::TABLE;
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanTraVeDL($link,"SELECT * FROM ${table} WHERE catalog_id = ${categoryId}");
        $data=[];
        while ($rows=mysqli_fetch_assoc($result)){
            array_push($data,$rows);
        }
        
        giaiPhongBoNho($link,$result);
        return $data;
    }

}
?>