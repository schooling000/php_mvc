<?php 
namespace core{
    
    class Controller{
        private $view           = null;
        private $model          = null;
        private static $db      = null;
        private static $message = null;

        public function __construct(&$db, &$message)
        {
            self::$db        = $db;   
            self::$message   = $message;
        }

        public function setModel($modelName, &$db)
        {
            $model = DS . 'app' . DS . 'models' . DS . ucwords($modelName);
            return new $model($db);
        }

        public function setView($contenName = '', $layoutName = DEFAULT_LAYOUT, $data = array())
        {
            return new \core\Views($contenName, $layoutName, $data);
        }
    }
}