<?php
namespace app\models{
<<<<<<< HEAD

class Dang_nhap{
    
        public static function kiem_tra_dang_nhap($tai_khoan, $mat_khau)
        {
            global $db;
            try {
                $return_value = $db->select([
                    'select_table'=>['tnhan_vien'],
                    'select_field'=>['fma_nhan_vien','fho_ten_nhan_vien','fma_quyen_nhan_vien'],
                    'select_condition'=>[
                        'ftai_khoan_nhan_vien'=>':ftai_khoan_nhan_vien', 
                        'fmat_khau'=>':fma_khau_nhan_vien'
                    ],
                    'select_param'=>[
                        ':ftai_khoan_nhan_vien'=>$tai_khoan,
                        ':fma_khau_nhan_vien'=>$mat_khau
                    ]
                ]);
                return is_array($return_value) && !empty($return_value) ? $return_value : false;
            } catch (\Exception $e) {
                exit('Model Dang_nhap lổi: ' . $e->getMessage());
            }
            
        }

        public static function chuc_nang_cua_quyen($ma_quyen_nhan_vien)
        {
            global $db;
            try {
                $return_value = $db->select([
                    'select_table'=>['tchuc_nang_cua_quyen'],
                    'select_field'=>[
                        'fma_chuc_nang',
                        'ften_chuc_nang',
                        'fduoc_phep_them',
                        'fduoc_phep_sua',
                        'fduoc_phep_xoa',
                        'fduoc_phep_xem',
                        'fcode'
                    ],
                    'select_condition'=>[
                        'fma_quyen'=>':fma_quyen'
                    ],
                    'select_param'=>[
                        ':fma_quyen'=>$ma_quyen_nhan_vien
                    ]
                ]);
                return is_array($return_value) && !empty($return_value) ? $return_value : false;
            } catch (\Exception $e) {
                exit('Model Dang_nhap lổi: ' . $e->getMessage());
            }
=======
    class Dang_nhap extends \core\Models{
        public static function kiem_tra_tai_khoan($tai_khoan)
        {
           
>>>>>>> 1ce38ca0995e056527303faeefd6f92342d39dfa
        }
    }
}