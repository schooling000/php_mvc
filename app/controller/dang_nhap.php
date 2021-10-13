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
                $result = $this->_model->get_data([
                    'select_field' => ['*'],
                    'select_table' => ['bang_nhan_vien'],
                    'select_condition' => ['ma_nhan_vien' => ':ma_nhan_vien'],
                    'select_param' => [':ma_nhan_vien' => 1]
                ]);

                dnd($result);
            }
            $this->_view->render('dang_nhap/dang_nhap');
        }
    }
}
