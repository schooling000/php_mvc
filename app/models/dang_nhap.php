<?php

namespace app\models {

    class Dang_nhap extends \core\Models
    {

        public function __construct(&$db)
        {
            parent::__construct($db);
        }

        public function checkLogin($acount, $password)
        {
            $tai_khoan = $this->select([
                'query' =>  'CALL CHECK_DANG_NHAP(:TAI_KHOAN, :MAT_KHAU);',
                'query_value' => [
                            ':TAI_KHOAN' => $acount,
                            ':MAT_KHAU' => $password
                ]
            ]);

            return !empty($tai_khoan )? $tai_khoan : array();
        }
    }
}
