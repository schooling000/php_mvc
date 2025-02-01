<?php

declare(strict_types=1);

namespace app\core\db {

    use PDO;
    
    class Db
    {

        private static PDO $db;

        public static function connect(
            string $host = 'localhost',
            string $dbName = 'MVC_PHP',
            string $user = 'root',
            string $password = ''
        ): PDO {
            $db = null;
            try {
                self::$db = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$db;
            } catch (\PDOException $e) {
                Help::displayError(array(
                    'type' => 'error',
                    'message' => 'không thể kết nối với mysql ' . $e->getMessage()
                ));
                exit;
            }
        }


        public function __destruct()
        {
            self::$db = null;
        }
    }
}
