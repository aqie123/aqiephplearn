<?php
/**
 * Class UserModel
 * 模型层作用
 * 处理数据存取操作,表的增删改查
 */

//　后面文件依赖引入文件 require
class UserModel extends BasicModel {
    function getAll()       // 返回数据表中所有数据
    {
        $rows = [];
        $sql = "select * from user_list";
        $data = $this->mysqli->query($sql); // 获取全部数据(二维数组)
        while($row = $data->fetch_array()){
            $rows[] = $row;
        }
        return $rows;
    }
    function GetCount()     // 返回数据表中数据个数(一个值)
    {
        $sql = "select count(*) as 总数 from user_list";
        $data = $this->mysqli->query($sql);
        $res = $data->fetch_array();
        return $res[0];
    }
    function delUserById($id)       // 根据id删除用户
    {
        $sql = "delete from user_list where user_id= $id";
        $data = $this->mysqli->query($sql);
        return $data;           // 返回真假
    }
    function GetUserInfoById($id)       // 根据id获取用户信息(一维数组)
    {
        $sql = "select * from user_list where user_id= $id";
        $data = $this->mysqli->query($sql);
        $row = $data->fetch_array();
        return $row;
    }
    function AddUser($username,$password,$age,$edu,$interest,$native)       // 添加用户
    {
        $sql = "insert into user_list (user_name,user_pass,age,edu,hobby,native,reg_time)";
        // 双引号里面单引号只是普通字符
        $sql .= " values ('$username',md5('$password'),'$age','$edu','$interest','$native',now())";
        $data = $this->mysqli->query($sql);
        return $data;                       // 返回一定是真，失败不会返回
    }
    function UpdateUser($id,$username,$password,$age,$edu,$interest,$native)       // 修改用户信息
    {
        $sql = "update user_list set ";
        $sql .= "user_name='$username'";
        if(!empty($password)){         // 空的话为真。  不是空的就是假
            $sql .= ",user_pass = md5('$password')";
        }
        $sql .=",age='$age'";
        $sql .=",edu='$edu'";
        $sql .= ",hobby='$interest',native='$native'";
        $sql .= "where user_id = $id";
        $data = $this->mysqli->query($sql);
        return $data;

    }
}