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
                    $mat_khau =  $_POST['data']['mat_khau'];
                } else {
                    header('location:/php_mvc/dang_nhap/xem_dang_nhap/Mật khẩu không được bỏ trống');
                }

                $model = $this->_model->get_model('dang_nhap');


                $nhan_vien = $model::kiem_tra_dang_nhap($tai_khoan, $mat_khau);
                if ($nhan_vien !== false) {
                    $_SESSION['nhan_vien'] = [
                        'ma_nhan_vien' => $nhan_vien[0]['fma_nhan_vien'],
                        'ho_ten_nhan_vien' => $nhan_vien[0]['fho_ten_nhan_vien'],
                        'quyen_nhan_vien' => $nhan_vien[0]['fma_quyen_nhan_vien']
                    ];
                } else {
                    header('location:\php_mvc\dang_nhap\xem_dang_nhap\tài khoản không đúng');
                }

                $chuc_nang = $model::chuc_nang_cua_quyen($_SESSION['nhan_vien']['quyen_nhan_vien']);
                if ($chuc_nang !== false) {
                    $_SESSION['nhan_vien']['chuc_nang'] = $chuc_nang;
                } else {
                    header('location:\php_mvc\dang_nhap\xem_dang_nhap\tài khoản của bạn không có quyền truy cập');
                }

                header('location:\php_mvc\lich_mo\xem_lich_mo');
            }
            $this->_view->render('dang_nhap\dang_nhap');
        }

        public function xem_dang_xuat()
        {
            session_unset();
            session_destroy();
            $_SESSION = array();
            header('location:\php_mvc\dang_nhap\xem_dang_nhap\Bạn đăng xuất thành công');
        }
    }
}
