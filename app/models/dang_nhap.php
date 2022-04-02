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
                'query' =>  'CALL CHECK_LOGIN(:TAI_KHOAN, :MAT_KHAU);',
                'query_value' => [
                            ':TAI_KHOAN' => $acount,
                            ':MAT_KHAU' => $password
                ]
            ]);

            return !empty($tai_khoan )? $tai_khoan : array();
        }

        public function getPermissions(string $roleId)
        {
            if($roleId !== ''){
                $result = $this->select([
                    'query'=>'CALL GET_PERMISSIONS(:ROLE_ID)',
                    'query_value'=>[':ROLE_ID'=>$roleId]
                ]);

                foreach ($result as $key => $value) {
                    $permissions[$value['MA_NHIEM_VU_NHAN_VIEN']] = [
                        'TEN_NHIEM_VU_NHAN_VIEN'=>$value['TEN_NHIEM_VU_NHAN_VIEN'],
                        'DUOC_PHEP_XEM'=>$value['DUOC_PHEP_XEM'],
                        'DUOC_PHEP_THEM,       '=>$value['DUOC_PHEP_THEM'],
                        'DUOC_PHEP_SUA,        '=>$value['DUOC_PHEP_SUA'],
                        'DUOC_PHEP_XOA,        '=>$value['DUOC_PHEP_XOA'],
                        'DUOC_PHEP_MO_MODAL_SUA'=>$value['DUOC_PHEP_MO_MODAL_SUA'],
                        'DUOC_PHEP_MO_MODAL_XOA'=>$value['DUOC_PHEP_MO_MODAL_XOA'],
                        'HREF'=>$value['HREF']
                    ];
                }

                return !empty($permissions )? $permissions : array();
            }else{
                return array();
            }
        }
    }
}
