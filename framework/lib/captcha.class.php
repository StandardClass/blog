<?php
namespace lib;
class captcha{
    private $len; //验证码长度
    private $font; //字体大小
    public function __construct($len=4,$font=5){
        $this->len=$len;
        $this->font=$font;
    }
    //生成验证码
    public function getStr(){
        $arr = array_merge(range(0,1),range('a', 'z'),range('A','Z'));
        $index = array_rand($arr,$this->len); //随机取出4个下标
        shuffle($index);
        $str = '';
        foreach($index as $i){
            $str .= $arr[$i];
        }
        $_SESSION['code'] = $str; //把生成的验证码放入session，以供后面的验证
        return $str;
    }
    //生成带有验证码的图片
    public function getCaptcha(){
        $str = $this->getStr();
        $img = imagecreate(80, 32);
        imagecolorallocate($img, 200, 200, 200);
        $color = imagecolorallocate($img, 255, 0, 0);
        $x = (imagesx($img)-imagefontwidth($this->font)*$this->len)/2;
        $y = (imagesy($img)-imagefontheight($this->font))/2;
        imagestring($img, $this->font, $x, $y, $str, $color);
        header('content-type:image/png');
        imagepng($img);
    }
    public function checkCaptcha($code){
        return strtolower($_SESSION['code'])==strtolower($code); 
    }
}
