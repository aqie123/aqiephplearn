<?php
//require './UserModel.php';
//require './SingleModelFactory.class.php';
//require './BaseController.class.php';


class UserController extends BaseController{
    function IndexAction (){
        // 实例化模型类，并从中获取两份数据;
        //$user = new UserModel();
        $user = SingleModelFactory::M('UserModel');
        $data1 = $user->getAll();
        $data2 = $user->GetCount();

        // 引入视图模板
        include VIEW_PATH.'user.html';
    }
    function DetailAction(){            // 显示用户详细信息
        $id= $_GET['id'];
        $user = SingleModelFactory::M('UserModel');
        $data = $user->GetUserInfoById($id);

        // 引入视图文件
        include VIEW_PATH.'userInfo.html';
    }
    function showFormAction(){          //转到添加用户页面
        // 引入视图文件
        include VIEW_PATH.'addUser.html';
    }
    function delUserAction(){        // 删除用户
        $id= $_GET['id'];
        $user = SingleModelFactory::M('UserModel');
        $res = $user->delUserById($id);
        if($res){
            $this->GotoUrl('用户删除成功','?',3);
        }else{
            $this->GotoUrl('用户删除失败','?',3);
        }
    }
    function AddUserAction(){        //添加新用户
        // 接收表单数据
        $user_name = $_POST['username'];
        $user_pass = $_POST['password'];
        $age = $_POST['age'];
        $edu = $_POST['edu'];
        $hobby = $_POST['hobby'];           // 爱好单独处理
        $interest = array_sum($hobby);      //是数字传递到数据库数据
        $native = $_POST['native'];

        $user = SingleModelFactory::M('UserModel');
        $res = $user->AddUser($user_name,$user_pass,$age,$edu,$interest,$native);
        if($res){
            $this->GotoUrl('用户添加成功','?',3);
        }else{
            $this->GotoUrl('用户添加失败','?',3);
        }
    }
    function EditAction(){
        $id= $_GET['id'];
        // 从数据库取出所有数据
        $user = SingleModelFactory::M('UserModel');
        $data = $user->GetUserInfoById($id);
//        var_dump($data['hobby']);                           // 排球,篮球
        $data['interest']   = explode(",",$data['hobby']);  // array(2) { [0]=> string(6) "排球" [1]=> string(6) "篮球" }
//        var_dump($data['interest']);
        include VIEW_PATH.'editUser.html';
    }
    function UpdateUserAction(){
        // 更新用户信息
        $id = $_POST['id'];
        $user_name = $_POST['username'];
        $user_pass = $_POST['password'];
        $age = $_POST['age'];
        $edu = $_POST['edu'];
        $hobby = $_POST['hobby'];           // 爱好单独处理
        $interest = array_sum($hobby);      //是数字传递到数据库数据
        $native = $_POST['native'];

        $user = SingleModelFactory::M('UserModel');
        $res = $user->UpdateUser($id,$user_name,$user_pass,$age,$edu,$interest,$native);
        if($res){
            echo "<script> location.href='?'</script>";
        }else{
            echo "修改失败";
        }
    }
    function ShowAllProductAction(){

    }
}
//$obj = new UserController();
//$act = !empty($_GET['act']) ? $_GET['act'] : "Index";
//$action = $act."Action";
//$obj->$action();

//实现数据删除
/*
if(!empty($_GET['act'] && $_GET['act'] == 'del')){
   delUserAction();
}elseif(!empty($_GET['act'] && $_GET['act'] == 'showForm')) {
    showFormAction();
}elseif(!empty($_GET['act'] && $_GET['act'] == 'addUser')) {
    AddUserAction();
}elseif(!empty($_GET['act'] && $_GET['act'] == 'detail')) {
    DetailAction();

}else{                                                      // 显示全部信息
    IndexAction();
}
*/

/*
echo "<pre>";
var_dump($data1);
echo "</pre>";
while($row = $data1->fetch_row()){
    foreach($row as $key=>$val){
        echo "$val ";
    }
    echo "<br>";
}
var_dump($data2);

echo "<hr>";
foreach ($data1 as $data){
    echo $data['name'];
}
echo "<hr>";
echo $data2;
*/

// 判断是否是单例(下面两个对象是一个)
/*
echo "<pre>";
var_dump($user);
echo "</pre>";
echo "<br>";
$user2 = SingleModelFactory::M('UserModel');
var_dump($user);
*/
