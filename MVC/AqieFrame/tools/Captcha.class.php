<?php
/**
 * 验证码工具类
 */

class Captcha
{
    /**
     * 验证码验证
     */
    public function checkCode($value)
    {
        @session_start();
        // 存在且相等
        $result = isset($value) && isset($_SESSION['code']) && strtoupper($value) == strtoupper($_SESSION['code']);
        // 验证码用完一定要销毁
        unset($_SESSION['code']);
        return $result;
    }


    /**
     * 生成验证码
     * @param int $code_len 码值长度，默认为4
     */

    public function makeImage($code_len = 4) {
        // 获取四位随机数
        $char_list = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
        $char_list_len = strlen($char_list);
        $code = '';
        for($i=1;$i<=$code_len;++$i){
            // 随机下标
            $rand_index = mt_rand(0,$char_list_len-1);
            // 字符串支持下标操作$str[0]
            $code .= $char_list[$rand_index];
        }

        //存进session
        @session_start();       // 考虑重复开启session
        $_SESSION['code'] = $code;

        // 处理验证码图片
        $bg_file = FRAMEWORK .'tools/captcha/captcha_bg'.mt_rand(1,5).'.jpg';

        //基于背景图片创建画布
        $image = imagecreatefromjpeg($bg_file);

        // 操作画布，将字符串写到画布
        // imagestring(画布，字体大小，相对画布位置x,y,字符串内容，字体颜色)  函数使用内置字体5大

        //随机分配字体
        if(mt_rand(1,5) >=3){       //  3/5概率
            $str_color = imagecolorallocate($image,255,255,255);
        }else{
            $str_color = imagecolorallocate($image,0,0,0);
        }

        // 图片宽高减去字符串宽高
        $font = 5;
        $x = (imagesx($image)-imagefontWidth($font)*4)/2;
        $y = (imagesy($image)-imagefontHeight($font))/2;
        imagestring($image,$font,$x,$y,$code,$str_color);

        $expires = gmdate('D, d M Y H:i:s',time()-1) . 'GMT';  // 告知浏览器不要缓存(比如验证码)
        header('Expires:'.$expires);

        // 输出导出
        header('Content-Type:image/jpeg');
        imagejpeg($image);

        // 销毁
        imagedestroy($image);
    }

}