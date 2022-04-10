<?php 
namespace core{
    
    class Controller{
        private $view           = null;
        private $model          = null;
        private static $db      = null;
        protected $message      = null;
        protected $user         = null;

        public function __construct(&$db, &$message, &$user)
        {
            self::$db       = $db;   
            $this->message  = $message;
            $this->user     = $user;
        }

        public function setModel($modelName, &$db)
        {
            $model = DS . 'app' . DS . 'models' . DS . ucwords($modelName);
            if(class_exists($model)){
                return new $model($db);
            }else{
                throw new \Exception('Không Tìm Thấy File Chứa Class: ' . $model, ERRNO_NOT_FOUND);
            }
        }

        public function setView($contenName = '', $layoutName = DEFAULT_LAYOUT, $data = array())
        {
            return new \core\Views($contenName, $layoutName, $data);
        }
    }
}