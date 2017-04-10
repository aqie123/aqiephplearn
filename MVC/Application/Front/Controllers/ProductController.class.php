<?php
class ProductController extends BaseController
{
    function IndexAction()
    {
        echo "ii啊切";
    }
    function ShowAllProductAction()             // 显示商品列表
    {
        $product = SingleModelFactory::M('ProductModel');
        $data1 = $product->GetAllProduct();
        $data2 = $product->GetProductCount();

        // 引入视图文件
        include VIEW_PATH.'Product_list.html';

    }
    function DetailAction()
    {
        echo "bb啊切";

    }
    function DelAction()                // 删除商品
    {
        $id = $_GET['id'];
        $product = SingleModelFactory::M('ProductModel');
        $data = $product->DelProduct($id);
        if($data){
            $this->GotoUrl('产品删除成功','?c=Product&a=ShowAllProduct',1);
        }else{
            $this->GotoUrl('产品删除失败','?c=Product&a=ShowAllProduct',1);
        }
    }

}
