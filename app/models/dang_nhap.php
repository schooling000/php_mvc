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
                        'XEM_TRANG'=>$value['XEM_TRANG'],
                        'THEM_TRANG,       '=>$value['THEM_TRANG'],
                        'SUA_TRANG,        '=>$value['SUA_TRANG'],
                        'XOA_TRANG,        '=>$value['XOA_TRANG_TRANG'],
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
