<?php
class HomeModel extends BaseModel {
    
    const TABLE = 'tbl_products';
    const OopName = 'Products';

    public function getAll($select=['*'], $orderBy=[],$limit=15) {
        $this->all(HomeModel::TABLE, $select, $orderBy,$limit);
    }

    public function findById($id){
        $this->find(self::TABLE, $id);
    }
    public function getByCategoryId($categoryId){
        $link=null;
        taoKetNoi($link);
        $result=chayTruyVanTraVeDL($link,"SELECT * FROM ${self::TABLE} WHERE category_id = ${categoryId}");
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