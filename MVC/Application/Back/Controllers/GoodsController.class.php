<?php
/**
 * 商品相关控制器
 */
class GoodsController extends PlatformController
{
    /**
     * 展示添加表单页面
     */
    public function addAction()
    {
        require VIEW_PATH .'goods_add.html';
    }

    public function InsertAction()
    {
        // 收集表单数据
        $data['goods_name'] = $_POST['goods_name'];
        $data['shop_price'] = $_POST['shop_price'];
        $data['goods_desc'] = $_POST['goods_desc'];
        $data['goods_number'] = $_POST['goods_number'];
        // 0非, 1是 checkbox
        $data['is_best'] = isset($_POST['is_best']) ? '1' : '0';
        $data['is_new'] = isset($_POST['is_new']) ? '1' : '0';
        $data['is_hot'] = isset($_POST['is_hot']) ? '1' : '0';
        $data['is_on_sale'] = isset($_POST['is_on_sale']) ? '1' : '0';

        // 处理上传图片,并设置属性
        $t_upload = new Upload();
        $t_upload->setUploadpath(ROOT . 'upload/goods/');
        $t_upload->setPrefix('goods_ori_');
        if($result=$t_upload->uploadFile($_FILES['goods_image_ori'])){
            $data['image_ori'] = $result;
        }else{
            $this->GotoUrl('文件上传失败，原因是' . $t_upload->getError(),'index.php?p=back&c=Goods&a=Add',100);
            die;
        }

            // 获取的数据
        $data['admin_id'] = $_SESSION['admin_info']['id'];
        $data['create_time'] = time();
        //通过模型插入数据表
        $model = SingleModelFactory::M('GoodsModel');
        $result = $model->insertGoods($data);
        if($result){
            //插入成功
            header('Location: index.php?p=back&c=Goods&a=list');
            die;
        }else{
            $this->GoToURL('失败， 失败原因', 'index.php?p=back&c=Goods&a=add');
            die;
        }
    }

    public function ListAction()
    {
        echo 'Goodslist';
    }

}