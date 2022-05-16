<?php
class ProductModel extends BaseModel {
    
    const TABLE = 'tbl_products';

    public function getAll($select=['*'], $orderBy=[],$limit=15) {
        return $this->all(ProductModel::TABLE, $select, $orderBy,$limit);
    }

    public function findById($id){
        $this->find(self::TABLE, $id);
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
        giaiPhongBoNho($link,$result);
        return $data;
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

    public function store($data){
        $this->create(self::TABLE, $data);
    }

    public function updateData($id, $data){
        $this->update(self::TABLE, $id, $data);
    }

    public function destroy($id){
        $this->delete(self::TABLE, $id);
    }
    
}
?>