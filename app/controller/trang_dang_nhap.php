<?php
class Trang_dang_nhap extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function dang_nhap()
    {
        if (isset($_POST['nut_dang_nhap'])) {

            if (isset($_POST['tai_khoan']) && !empty($_POST['tai_khoan'])) {
                $tai_khoan =  $_POST['tai_khoan'];
            } else {
                header('location:/php_mvc/trang_dang_nhap/dang_nhap/Tài khoản không được trống');
            }

            if (isset($_POST['mat_khau']) && !empty($_POST['mat_khau'])) {
                $mat_khau =  $_POST['mat_khau'];
            } else {
                header('location:/php_mvc/trang_dang_nhap/dang_nhap/Mật khẩu không được bỏ trống');
            }

            $nhan_vien = MDang_nhap::kiem_tra_ten_dang_nhap($tai_khoan);

            if (is_array($nhan_vien) && !empty($nhan_vien)) {

                if ($nhan_vien['fmat_khau_nhan_vien'] == $mat_khau) {   
                    $tinh_nang = MDang_nhap::lay_quyen_nhan_vien($nhan_vien['fma_quyen_nhan_vien']);
                    $this->_view->render('lich_hen_mo_phong_kham/lich_hen_mo_phong_kham', $tinh_nang);
                } else {
                    header('location:/php_mvc/trang_dang_nhap/dang_nhap/Mật khẩu của bạn không tồn tại');
                }
            } else {
                header('location:/php_mvc/trang_dang_nhap/dang_nhap/Tài khoản của bạn không tồn tại');
            }

            unset($_POST);
        }

        $this->_view->render('trang_dang_nhap/trang_dang_nhap');
    }
}
