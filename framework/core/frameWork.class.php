<?php
namespace core;
class frameWork{
    //入口文件调用
    public static function run(){
        self::initConst();
        self::initConfig();
        self::initError();
        self::initRoutes();
        self::initRegisterLoadClass();
        self::initDispatch();
    }
    /**
     * 定义路由
     * @const  DS
     * @const  ROOT_PAT
     * @const  APP_PATH
     * @const  CONFIG_PATH
     * @const  CONTROLLER_PATH
     * @const  MODEL_PATH
     * @const  VIEW_PATH
     * @const  FRAME_PATH
     * @const  CORE_PATH
     * @const  LIB_PATH
     * @const  VIEWC_PATH
     */
    private static function initConst(){
        define('DS',DIRECTORY_SEPARATOR);
        define('ROOT_PATH',  getcwd().DS);
        define('APP_PATH',  ROOT_PATH.'application'.DS);
        define('CONFIG_PATH',  APP_PATH.'config'.DS);
        define('CONTROLLER_PATH',  APP_PATH.'controller'.DS);
        define('MODEL_PATH',  APP_PATH.'model'.DS);
        define('VIEW_PATH',  APP_PATH.'view'.DS);
        define('FRAME_PATH',ROOT_PATH.'framework'.DS);
        define('CORE_PATH',FRAME_PATH.'core'.DS);
        define('LIB_PATH',FRAME_PATH.'lib'.DS);
        define('VIEWC_PATH',APP_PATH.'viewc'.DS);
    }
    //实例化配置
    private static function initConfig(){
        $GLOBALS['config']=require CONFIG_PATH.'config.php';
    }
    //设置错误信息
    private static  function initError(){
        ini_set('error_reporting',E_ALL);
        $flag = $GLOBALS['config']['param']['debug'];
        if($flag){ 
            ini_set('display_errors','on');
            ini_set('log_errors', 'off');
        }else{ 
            ini_set('display_errors','off');
            ini_set('log_errors','on');
            $log = date('Y-m-d').'.log';
            $path = APP_PATH.'log'.DS.$log;
            ini_set('error_log',$path);
        }
    }
    /**
     * 定义平台、控制器、方法路由
     * @const  DS
     * @const  ROOT_PAT
     * @const  APP_PATH
     * @const  CONFIG_PATH
     * @const  CONTROLLER_PATH
     * @const  MODEL_PATH
     * @const  VIEW_PATH
     * @const  FRAME_PATH
     * @const  CORE_PATH
     * @const  LIB_PATH
     * @const  VIEWC_PATH
     */
    private static function initRoutes(){
        $c = isset($_GET['c'])?$_GET['c']:$GLOBALS['config']['param']['c'];
        $p = isset($_GET['p'])?$_GET['p']:$GLOBALS['config']['param']['p'];
        $pt = isset($_GET['pt'])?$_GET['pt']:$GLOBALS['config']['param']['pt'];
        define('CONTROLLER',$c);
        define('ACTION',$p);
        define('PT',$pt);
        define('__URL__',CONTROLLER_PATH.PT.DS);
        define('__VIEW__',VIEW_PATH.PT.DS);
        define('__VIEWC__',VIEWC_PATH.PT.DS);
    }
    /**
     * 设置自动加载
     * @static  LoadClass
     * @param  string $name
     * @return  string 
     */
    private static function LoadClass($name){
           echo 111;die;
        $map = array(
            'Smarty'=>CORE_PATH.'smarty'.DS.'Smarty.class.php'
        );
        if(isset($map[$name])){
            $path = $map[$name];
        }else{
            $namespace = dirname($name);
            $class = basename($name);
            $arr = array('core','lib');
            if(in_array($namespace, $arr))
                $path = FRAME_PATH.$namespace.DS.$class.'.class.php';
            elseif($namespace=='model')
                $path = MODEL_PATH.$class.'.class.php';
            else
                $path = __URL__.$class.'.class.php';
            }
            if(isset($path) && file_exists($path))
                require $path;
        }
        //注册自动加载类(激活)
        private static function initRegisterLoadClass(){
            spl_autoload_register('self::LoadClass');
        }
        //拼接平台、控制器、方法
        private static function initDispatch(){
           $p = ACTION.'Action';
           $c = '\controller\\'.PT.'\\'.CONTROLLER.'Controller';
           $model = new $c;
           $model->$p();
        }
}
