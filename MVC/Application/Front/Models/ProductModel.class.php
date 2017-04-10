<?php
class ProductModel extends BasicModel
{
    function GetAllProduct ()
    {
        $rows = [];
        $sql = "select product.*,protype_name from product inner join product_type as t on t.protype_id=product.protype_id";
        $data = $this->mysqli->query($sql);
        while($row = $data->fetch_array()){
            $rows[] = $row;
        }
        return $rows;
    }
    function GetProductCount()
    {
        $sql = "select count(*) as 总数 from product";
        $data = $this->mysqli->query($sql);
        $res = $data->fetch_array();
        return $res[0];
    }
    function  DelProduct($id)      // 删除商品
    {
        $sql = "delete from product where pro_id = $id";
        return $this->mysqli->query($sql);      // 记得返回
    }


}