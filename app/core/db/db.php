<?php

declare(strict_types=1);

namespace app\core\db {

    use \PDO;
    use \PDOException;
    use PDOStatement;
    use ReturnTypeWillChange;

    class DB
    {
        public static $DB;

        public function connect(
            string $hostServerName = 'localhost',
            string $user = 'root',
            String $password = '',
            String $databaseName = 'php_mvc',
            string $charset = 'UTF8'
        ) {
            $databaseInfo = array(
                'host' => $hostServerName,
                'dbname' => $databaseName
            );
            $dns = ('mysql:' . http_build_query($databaseInfo, '', ';'));
            try {
                self::$DB = new PDO($dns, $user, $password);
                self::$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$DB;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                return false;
            }
        }

        public function query(string $query): PDOStatement|false
        {
            try {
                return self::$DB->query($query);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                return false;
            }
        }

        public function __destruct()
        {
            self::$DB = !(self::$DB == false) ? NULL : NULL;
        }
    }
}
