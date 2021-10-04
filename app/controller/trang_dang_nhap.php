<?php
class Trang_dang_nhap extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function dang_nhap()
    {
        if(isset($_POST['nut_dang_nhap'])){
            
            if (isset($_POST['tai_khoan']) && !empty($_POST['tai_khoan'])){
                $tai_khoan =  $_POST['tai_khoan'];    
            }else{
                header('location:/php_mvc/trang_dang_nhap/dang_nhap/Tài khoản của bạn không tồn tại');
            }

            if (isset($_POST['mat_khau']) && !empty($_POST['mat_khau'])){
                $mat_khau =  $_POST['mat_khau'];    
            }else{
                header('location:/php_mvc/trang_dang_nhap/dang_nhap/Mật khẩu không được bỏ trống');
            }

            if( MDang_nhap::kiem_tra_ten_dang_nhap($tai_khoan) ) {

            }else{

            }
        
            unset($_POST);
        }

       $this->_view->render('trang_dang_nhap/trang_dang_nhap');
    }

}