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
        ini_set("error_log","my_error.txt");
        include "test.php";
        $v1 = 0;
        if(!$v1):
            echo "abcd";
        else:
            echo "defg";
        endif;

        while($v1<5):
            echo "<br>".$v1;
            $v1++;
        endwhile;
        echo "<p> 当前时间".Date("Y-m-d H:i:s");
        sleep(1);
        echo "<p> 当前时间".Date("Y-m-d H:i:s")."<br>";
//        die("<br>终止");
        include __DIR__ . '\note.php';
//        echo __DIR__;
        $root = $_SERVER['DOCUMENT_ROOT'];  //站点根目录
//        echo $root;
        $b = include $root . '/php/aqie' .'/note.php';
//        echo $c;            // 提示错误
//        include './ddd.php';   // 警告错误
//        $m = foo();   //致命错误
        echo $b;
        $age = 80;
        if($age >127 || $age <0){
            trigger_error("年龄不符合要求",E_USER_ERROR);
        }
        $arr = array("E_ERROR","E_WARNING","E_PARSE","E_NOTICE","E_CORE_ERROR","E_CORE_WARNING",            "E_COMPILE_ERROR", "E_COMPILE_WARNING","E_USER_ERROR","E_USER_WARNING","E_USER_NOTICE",              "E_STRICT","E_ALL");
        function transform($n) {
            $s = decbin($n);  //转换为二进制数字
            $s = str_pad($s,16,"0",STR_PAD_LEFT);//填充字符串
            $s = str_replace("1","<span style='color:#f00;'>1</span>",$s);
            return $s;
        }
        echo "<table border = '1'>";
        foreach($arr as $key =>$value){
            echo "<tr>";
                echo "<td>" . $value . "</td>";
                echo "<td>" . constant($value) . "</td>";
                echo "<td>" . transform(constant($value)) . "</td>";
            echo "<tr>";
        }
        echo "</tr>";
            echo "<td>E_ALL | E_STRICT</td>";
            echo "<td>" . (E_ALL | E_STRICT) . "</td>";
            echo "<td>" . transform(E_ALL | E_STRICT) . "</td>";
        echo "<tr>";
        echo "</table>";

        //判断是否是素数，只能被自己和1整除
        if(!empty($_POST['num'])){
            $num = $_POST['num'];
            $c = 0;
            for($i = 1;$i<=$num;++$i){
                if($num % $i ==0){
                    $c++;
                }
            }
            echo $c == 2 ? "{$num}是素数" : "{$num}不是素数";

        }

        // 函数调用
        $s1 = 3;$s2 = 4;
        function add($a=1, & $b){
            $a = $a*$a;
            $b = $b*$b;
            return $a+$b;
        }
        $v = add($s1,$s2);          // 必须接收
        echo "<br>v = $v";
        echo "<br>s1 = $s1,s2 = $s2";

    ?>
    <form action="" method="post" onsubmit = "return checkSubmit()">
        <input type="text" placeholder="请输入素数" name="num">
        <input type="submit" value="提交">
    </form>


    <script>
        var checkFlag = false;
        function checkSubmit(){
            if(checkFlag == true){
//                alert(checkFlag)
                return false;
            }

            checkFlag = true;
//            alert(checkFlag)
            return true;
        }
    </script>
</body>
</html>










