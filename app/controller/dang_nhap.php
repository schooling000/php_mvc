<?php

namespace app\controller {

    class Dang_nhap extends \core\Controller
    {
        
        public function xem_dang_nhap()
        {
            if (isset($_POST['data']['nut_dang_nhap'])) {
                if (isset($_POST['data']['tai_khoan']) && !empty($_POST['data']['tai_khoan'])) {
                    $tai_khoan =  $_POST['data']['tai_khoan'];
                } else {
                    header('location:/php_mvc/dang_nhap/xem_dang_nhap/Tài khoản không được bỏ trống');
                }

                if (isset($_POST['data']['mat_khau']) && !empty($_POST['data']['mat_khau'])) {
                    $tai_khoan =  $_POST['data']['mat_khau'];
                } else {
                    header('location:/php_mvc/dang_nhap/xem_dang_nhap/Mật khẩu không được bỏ trống');
                }

                $model = $this->_model->get_model('dang_nhap');
                $this->_model->get_data([
                    'select_field'=>['fho_ten_benh_nhan', 'fnam_sinh', 'fgioi_tinh'],
                    'select_table'=>['tbenh_nhan', 'tnhan_vien'],
                    'select_condition'=>[
                        'fma_benh_nhan'=>':fma_benh_nhan',
                        'fho_ten_benh_nhan'=>':fho_ten_benh_nhan'
                        ]
                ]);            }
            $this->_view->render('dang_nhap/dang_nhap');
        }
    }
}
