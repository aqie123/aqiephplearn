<?php
// 空格使用 "&ensp";
$n = 5;
define("KONG","&ensp;");
echo "图形A<hr>";
for($i = 1;$i<=$n;++$i){            //
    for($j=1;$j<=$n;++$j){          //
        echo "*";
    }
    echo "<br>";
}
echo "图形B<hr>";
for($i = 1;$i<=$n;++$i){
    for($j=1;$j<=$i;++$j){
        echo "*";
    }
    echo "<br>";
}
echo "<br>图形C<hr>";
for($i = 1;$i<=$n;++$i){
    for($j=1;$j<=2*$i-1;++$j){      // 控制一行多少个
        echo "*";
    }
    echo "<br>";
}
echo "<br>图形D<hr>";
for($i = 1;$i<=$n;++$i){
    for($k=1;$k<=$n-$i;++$k){       // 空格越来越少
        echo KONG;
    }
    for($j=1;$j<=2*$i-1;++$j){      // 控制一行多少个*
        echo "*";
    }
    echo "<br>";
}
echo "<br>图形E<hr>";

for($i = 1;$i<=$n;++$i){
    for($k=1;$k<=$n-$i;++$k){       // 空格越来越少
        echo KONG;
    }
    for($j=1;$j<=2*$i-1;++$j){      // 控制一行多少个星星
        if($j==1 || $j==2*$i-1){           // 如果是第一个或是最后一个输星星
            echo "*";
        }else{
            echo KONG;
        }
    }
    echo "<br>";
}
echo "<br>图形F<hr>";
for($i = 1;$i<=$n;++$i){
    for($k=1;$k<=$n-$i;++$k){       // 空格越来越少
        echo KONG;
    }
    for($j=1;$j<=2*$i-1;++$j){      // 控制一行多少个星星
        if($i==$n){           // 如果是最后一行
            echo "*";
        }else{
            if($j==1 || $j==2*$i-1){           // 如果是第一个或是最后一个输星星
                echo "*";
            }else{
                echo KONG;
            }
        }

    }
    echo "<br>";
}
echo "<br>图形G<hr>";
for($i = 1;$i<=$n;++$i){
    for($k=1;$k<=$n-$i;++$k){       // 空格越来越少
        echo KONG;
    }
    for($j=1;$j<=2*$i-1;++$j){      // 控制一行多少个星星
        if($j==1 || $j==2*$i-1){           // 如果是第一个或是最后一个输星星
            echo "*";
        }else{
            echo KONG;
        }
    }
    echo "<br>";
}
for($i = $n-1;$i>=1;--$i){
    for($k=1;$k<=$n-$i;++$k){       // 空格越来越少
        echo KONG;
    }
    for($j=1;$j<=2*$i-1;++$j){      // 控制一行多少个星星
        if($j==1 || $j==2*$i-1){           // 如果是第一个或是最后一个输星星
            echo "*";
        }else{
            echo KONG;
        }
    }
    echo "<br>";
}
echo "<br>图形H<hr>";
for($i = $n;$i>=1;--$i){
    for($k=1;$k<=$n-$i;++$k){       // 空格越来越少
        echo KONG;
    }
    for($j=1;$j<=2*$i-1;++$j){      // 控制一行多少个星星
        if($j==1 || $j==2*$i-1){           // 如果是第一个或是最后一个输星星
            echo "*";
        }else{
            echo KONG;
        }
    }
    echo "<br>";
}
for($i = 1;$i<=$n;++$i){
    for($k=1;$k<=$n-$i;++$k){       // 空格越来越少
        echo KONG;
    }
    for($j=1;$j<=2*$i-1;++$j){      // 控制一行多少个星星
        if($j==1 || $j==2*$i-1){           // 如果是第一个或是最后一个输星星
            echo "*";
        }else{
            echo KONG;
        }
    }
    echo "<br>";
}

echo "<br>图形I<hr>";