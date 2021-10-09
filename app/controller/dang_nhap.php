<?php
class Dang_nhap extends Controller{

    public function __construct()
    {
        $this->_model = new MDang_nhap();
        $this->_view = new Views();   
    }

    public function xem_dang_nhap()
    {        
        if(isset($_POST['data']['nut_dang_nhap'])){

            $tai_khoan = isset($_POST['data']) ? $_POST['data']['tai_khoan'] : '' ;

            $mat_khau = isset($_POST['data']) ? $_POST['data']['mat_khau'] : '' ;

            $nhan_vien = $this->_model::kiem_tra_ten_dang_nhap($tai_khoan);

            if(is_array($nhan_vien) && !empty($nhan_vien)){
                if($nhan_vien['fmat_khau_nhan_vien'] == $mat_khau){
                    
                    unset($_SESSION);
                    $_SESSION = null;
                    $_SESSION['nguoi_dung']= [
                        "ho_ten_nguoi_dung" => $nhan_vien['fho_ten_nguoi_dung'],
                        "quyen_nguoi_dung" => $nhan_vien['fquyen_nguoi_dung']
                    ];
                }else{
                    header('location:/php_mvc/dang_nhap/xem_dang_nhap/Mật khẩu của bạn không đúng');
                }

            }else{
                header('location:/php_mvc/dang_nhap/xem_dang_nhap/Tài khoản của bạn không đúng');
            }

        }
        $this->_view->render('trang_dang_nhap/trang_dang_nhap');
    }


}