<?php

/**
 * Class GoodsModel
 * 添加商品
 */
class GoodsModel extends BasicModel
{
    public function insertGoods($data)
    {
        $sql = "INSERT INTO `goods` VALUES (null, '{$data['goods_name']}', '{$data['shop_price']}', '{$data['goods_desc']}', '{$data['goods_number']}', '{$data['is_best']}', '{$data['is_new']}', '{$data['is_hot']}', '{$data['is_on_sale']}','{$data['image_ori']}', '{$data['admin_id']}', '{$data['create_time']}')";
        $result = $this->mysqli->query($sql);
        return $result;
    }
}
