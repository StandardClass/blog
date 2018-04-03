<?php
namespace lib;
class upload{
    private $type;
    private $size;
    private $path;
    private $error;
    public function __construct($type,$size,$path) {
        $this->type = $type;
        $this->size = $size;
        $this->path = $path;
    }
    public function getError(){
        return $this->error;
    }
    public function uploadOne($file){
        if($file['error']!=0){
            switch($file['error']){
                case '1':
                    return "上传文件大小超过限制";
                case '2':
                    return "表单上传超过限制";
                case '3':
                    return "只有部分文件上传";
                case '4':
                    return "没有文件上传";
                case '6':
                    return "找不到临时文件";
                case '7':
                    return "文件写入临时文件夹失败";
                default :
                    return "未知错误";
            }
        }
        $finfo = finfo_open(FILEINFO_MIME);
        $info = finfo_file($finfo, $file['tmp_name']);
        $arr = explode(';', $info);
        if(!in_array($arr[0], $this->type)){
            $this->error = '上传类型错误，正确的类型有'.implode(',', $this->type);
            return false;
        }
        if($file['size']>$this->size){
            $this->error = '文件大小超过限制，最大为'.number_format($this->size/1024,2).'KB';
            return false;
        }
        if(!is_uploaded_file($file['tmp_name'])){
            $this->error = '非法上传';
            return false;
        }
       //创建文件夹
        $flodername = date('Y-m-d');
        $floderpath = $this->path.$flodername.'/'; 
        if(!is_dir($floderpath)){
            mkdir($floderpath);
        }
        //上传文件
        $filename = uniqid().strrchr($file['name'],'.');
        $filepath = $floderpath.$filename;
        if(move_uploaded_file($file['tmp_name'], $filepath))
            return "{$flodername}/{$filename}";
        else{
            $this->error = '上传失败';
            return false;
        }
    }
}
