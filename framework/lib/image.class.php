<?php
namespace lib;
class image{
    private $error;
    public function getError(){
       return $this->error;
    }
    public function thumb($src_path,$dst_w,$dst_h,$prefix='small-'){
    	$type = strtolower(strrchr($src_path,'.'));
    	switch ($type) {
    		case '.png':
    			$type='png';
                            break;
    		case '.jpg':
    			$type='jpeg';
                            break;
    		case '.gif':
    			$type='gif';
                            break;
    		default:
    			$this->error = '错误类型';
    			return false;
    	}
    	//生成缩略图
    	$img_open_fun = 'imagecreatefrom'.$type; 
    	$src = $img_open_fun($src_path); //源文件
    	$dst = imagecreatetruecolor($dst_w,$dst_h); //目标文件
    	$src_w =imagesx($src);
    	$src_h = imagesy($src);
    	imagecopyresampled($dst, $src, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
    	//保存缩略图
    	$dirname = dirname($src_path);
    	$basename = basename($src_path);
    	$save_path = $dirname.'/'.$prefix.$basename; //拆分原图地址，命名缩略图地址
    	$img_save_fun = 'image'.$type;
    	$img_save_fun($dst,$save_path);//保存缩略图
    	$flodername = substr($dirname, -10);
    	unlink($src_path);
    	return $flodername.'/'.$prefix.$basename;
}
}