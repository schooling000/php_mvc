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
                'query' => 'SELECT MA_NHAN_VIEN, HO_TEN_NHAN_VIEN, EMAIL_NHAN_VIEN, TAI_KHOAN_NHAN_VIEN FROM NHAN_VIEN WHERE TAI_KHOAN_NHAN_VIEN = :TAI_KHOAN  AND MAT_KHAU_NHAN_VIEN = :MAT_KHAU LIMIT 1',
                'query_value' => [
                    ':TAI_KHOAN' => $acount,
                    ':MAT_KHAU'=> $password
                ]
            ]);
        }
    }
}
