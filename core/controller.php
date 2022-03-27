<?php 
namespace core{
    
    class Controller{
        private $view       = null;
        private $model     = null;
        private static $db  = null;

        public function __construct(&$db)
        {
            self::$db = $db;   
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