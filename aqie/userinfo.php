<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        /*
        create table user_list(
           user_id int auto_increment primary key,
           user_name varchar(10),
           user_pass char(32),  # md5加密
           age tinyint unsigned,
           edu enum('小学','中学','大学','硕士','博士'),
           hobby set('排球','篮球','足球','橄榄球','棒球','乒乓球'),
           native enum('东北','华北','西北','华东','华南','华西'),
           reg_time datetime
        );
        */
        include "./common/conn2.php";
        mysqli_select_db($link,"product");

        //接收表单数据
        if(!empty($_POST)){     // 提交数据不为空
            $username = $_POST['username'];
            $password = $_POST['password'];
            $age = $_POST['age'];
            $edu = $_POST['edu'];
            $hobby = $_POST['hobby'];           // 数组结果array('aa','bb');
            $interest = '';
            for($i=0;$i<count($hobby);++$i){    // 数组中数据以逗号连接
                if($i = count($hobby)-1){
                    $interest .= $hobby[$i];
                }
                $interest .= $hobby[$i] .",";
            }
            // $interest = "aa,bb,cc,dd";
            $interest = implode(',',$hobby);     // 函数实现
            $native = $_POST['native'];

            //sql语句
            $sql = "insert into user_list (user_name,user_pass,age,edu,hobby,native,reg_time)";
            // 双引号里面单引号只是普通字符
            $sql .= " values ('$username',md5('$password'),'$age','$edu','$interest','$native',now())";
//            echo $sql;
            $result = mysqli_query($link,$sql);
            if($result ===false){
                echo "<br> 添加数据失败:".mysqli_error($link);
            }else{
                echo "添加成功";
            }
        }

        // 删除数据
        if(!empty($_GET['id'])){        // 注意这里接受值id
            $id = $_GET['id'];
            $sql = "delete from user_list where user_id = '$id'";
            $result = mysqli_query($link,$sql);
            if($result){
                echo "删除成功";

            }else{
                echo "删除失败";
            }
        }
    ?>
    <form action="" method="post">
        <h1>添加数据</h1>
        用户名： <input type="text" name="username" /><br>
        密码： <input type="password" name="password"><br>
        年龄： <input type="text" name="age"><br>
        学历： <select name="edu" id="">
            <option value="小学">小学</option>
            <option value="中学">中学</option>
            <option value="大学">大学</option>
            <option value="硕士">硕士</option>
            <option value="博士">博士</option>
        </select><br>
        兴趣爱好:
        <input type="checkbox" name="hobby[]" value="排球">排球
        <input type="checkbox" name="hobby[]" value="篮球">篮球
        <input type="checkbox" name="hobby[]" value="足球">足球
        <input type="checkbox" name="hobby[]" value="橄榄球">橄榄球
        <input type="checkbox" name="hobby[]" value="棒球">棒球
        <input type="checkbox" name="hobby[]" value="乒乓球">乒乓球
        <br>来自：
        <input type="radio" name="native" value="东北">东北
        <input type="radio" name="native" value="华北">华北
        <input type="radio" name="native" value="西北">西北
        <input type="radio" name="native" value="华东">华东
        <input type="radio" name="native" value="华南">华南
        <input type="radio" name="native" value="华西">华西
        <input type="hidden" name="code" value="">
        <br><input type="submit" value="提交">
    </form>

    <?php
        //显示输入数据
        $sql = "select * from user_list ";
        $result = mysqli_query($link,$sql);
        echo "<table border='1'>";
        echo "<tr>
            <th>用户名</th>
            <th>年龄</th>
            <th>学历</th>
            <th>爱好</th>
            <th>地区</th>
            <th>添加时间</th>
            <th>删除</th>
        </tr>";
        while($res = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$res['user_name']."</td>";
            echo "<td>".$res['age']."</td>";
            echo "<td>".$res['edu']."</td>";
            echo "<td>".$res['hobby']."</td>";
            echo "<td>".$res['native']."</td>";
            echo "<td>".$res['reg_time']."</td>";
            echo "<td><a href='userinfo.php?id={$res['user_id']}' onclick='return del()'>删除</a></td>";
            echo "<tr>";
        }

    ?>


    <script>
        function del(){
            var a = window.confirm("确认要删除吗");
            if(a===true){
                return true;
            }else{
                return false;
            }
        }
    </script>
</body>
</html>