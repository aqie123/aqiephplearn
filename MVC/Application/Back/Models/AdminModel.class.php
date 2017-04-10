<?php

class AdminModel extends BasicModel
{
    public function CheckAdmin($username,$password)     // 这个不用了
    {
        $sql = "select count(*) from admin_user where admin_name='$username' and admin_pass=md5('$password')";
        $data = $this->mysqli->query($sql);
        $res = $data->fetch_row(); //取一行数据
        if($res){
            $sql = "update admin_user set login_times = login_times+1,last_login_time=now()";
            $this->mysqli->query($sql);
        }
        return $res[0];             // 其实这行就一个数据
    }

    /**
     * @param $username 管理员名
     * @param $password 密码
     * @return mixed array:合法，管理员信息数组 false:非法
     */
    public function CheckAdminInfo($username,$password)
    {
        $sql = "select * from admin_user where admin_name='$username' and admin_pass=md5('$password')";
        $data = $this->mysqli->query($sql);
//        $res = $data->fetch_row();      // 取一行数据索引数组
        $res = $data->fetch_assoc();      // 取一行数据索引数组

        return $res;
    }

    /**
     * @param $id 加密后（AQIE）
     * @param $pwd 加密后
     * @return mixed array验证cookie存储的密码和id是否通过，或者false
     */
    public function CheckCookieInfo($id,$pwd)
    {
        // 加密方式进行比较
        $sql = "select * from admin_user where md5(concat(id, 'AQIE'))='$id' ";
        $sql .= "and md5(concat(admin_pass,'AQIE'))='$pwd'";
        $data = $this->mysqli->query($sql);
        return $data->fetch_assoc();

    }
}
