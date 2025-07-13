<?php

declare(strict_types=1);

namespace app\model {

    use \PDO;
    use app\core\db\DB;
    use app\core\models\Models;

    class User extends Models
    {
        private const GET_USER = 'SELECT MA_NGUOI_DUNG, HO_TEN_NGUOI_DUNG, MA_VAI_TRO 
                                  FROM T_NGUOI_DUNG 
                                  WHERE ACCOUNT = :ACCOUNT AND PASSWORD = :PASSWORD;';
        
        private $db;

        public function __construct()
        {
            $this->db = (new DB())->connect();
        }

        public function getUser(string $account, string $password) : array {
            $db = $this->db->prepare(self::GET_USER);
            $db->execute([':ACCOUNT'=>$account,':PASSWORD'=>$password]);
            return $db->fetch(PDO::FETCH_ASSOC);
        }

               
    }
}
