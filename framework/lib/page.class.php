<?php
namespace lib;
class page{
    private $rowscount; //总记录数
    private $pagecount; //总页数
    private $pageno;   //当前页
    public $pagesize;  //一页几条记录
    public $startno;  //开始页码
    public function __construct($rowscount,$pagesize=10){
        $this->initParam($rowscount,$pagesize);
    }
    private  function initParam($rowscount,$pagesize){
        $this->pagesize = $pagesize;
        $this->rowscount = $rowscount;
        $this->pagecount = ceil($this->rowscount/$this->pagesize);
        $this->pageno = isset($_GET['pageno'])?$_GET['pageno']:1;
        if($this->pageno < 1)
            $this->pageno = 1;
        if($this->pageno > $this->pagecount)
            $this->pageno = $this->pagecount;
        $this->startno = ($this->pageno-1)*$this->pagesize;
    }
    public function show($param=''){
        if($param=='')
            $url = 'index.php?pt='.PT.'&c='.CONTROLLER.'&p='.ACTION.'&pageno=';
        if(is_numeric($param))
            $url = 'index.php?cat_id='.$param.'&pt='.PT.'&c='.CONTROLLER.'&p='.ACTION.'&pageno=';
        else
            $url = 'index.php?label='.$param.'&pt='.PT.'&c='.CONTROLLER.'&p='.ACTION.'&pageno=';
        $str="<div class='pagebar' >";
        $str.='当前一共有'.$this->rowscount.'条记录，'.'当前每页显示'.$this->pagesize.'条记录，当前是第'.$this->pageno.'页&nbsp;';
        $str.="<a href='{$url}1'>首页</a>&nbsp;&nbsp;";
        $str.="<a href='{$url}".($this->pageno-1)."'>上一页</a>&nbsp;&nbsp;";
         for($i=1;$i <= $this->pagecount;$i++){
            $str.="<a href='{$url}{$i}'>$i</a>&nbsp;&nbsp;";
        }
        $str.="<a href='{$url}".($this->pageno+1)."'>下一页</a>&nbsp;&nbsp;";
        $str.="<a href='{$url}".($this->pagecount)."'>末页</a>";
        $str.='</div>';
        return $str;
    }
}
