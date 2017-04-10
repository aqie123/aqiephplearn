<?php
$a = 1;
//$b =$a++ + ++$a;  //  b=2+2  此时a=3;
$b = $a++;      // b=1,a=2
echo $b;        // 1
$b = ++$a;      // b=3,a=3
echo "<br>";
echo $b;        //3
echo "<br>";
echo $a;        //3

echo "<hr>";
$c = 1;
//$d = ++$c + $c++;  // d=3+1
$d= ++$c;   // d=2 c=2
echo $d;
$d= $c++;   // d=2,c=3
echo $d;        //2+2  3+1
echo "<br>";
echo $c;

echo "<hr>";
$e = 10;
$f = $e++;      // f=10,e=11
$g = ++$f;      // f=11,g=11
echo $e;
echo $f;
echo $g;