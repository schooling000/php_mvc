<?php

namespace core {

    class Models
    {
        private static $db = null;

        public function __construct(&$db)
        {
            self::$db = $db;    
        }

        public function select(array $data)
        {
            if(!empty($data['query'])){
                $stmt = self::$db->prepare($data['query']);
                $stmt->execute($data['query_value']);
                $result_value = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                return !empty($result_value) ? $result_value : array();
            }else{
                throw new \Exception("Dữ liệu đưa vào không đúng", ERRNO_DATA_INPUT);
                exit();
            }
        }

        public function insert(array $data)
        {
            
        }

        public function update(array $data)
        {
            
        }

        public function delete(array $data)
        {
            
        }

        public function __destruct()
        {
            self::$db = null;
        }
    }

}
