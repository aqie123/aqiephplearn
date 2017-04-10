<?php
// 允许其他方式传输
//ini_set('session.use_only_cookies ','0');
//ini_set('session.use_trans_sid','1');
//session_start();
?>
<form action="test.php" method="post">
    <input type="hidden" value="<?php echo "<script>alert(1);</script>";?>">
    <button>提交</button>
</form>
<a href="test.php">连接</a>

<?php //echo '<script>alert(1);</script>';?>

<script>
    var input = document.getElementsByTagName('input')[0];
    var span = document.getElementsByTagName('span')[0];
</script>

<?php
    echo "<br>";
    echo count('abc');
    echo "<br>";
    echo md5('1'.'AQIE');
    echo "<br>";
    echo md5(123 .'AQIE');
    echo "<br>";
    phpinfo();
?>
