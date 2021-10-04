<?php
class MDang_nhap extends Models{

    public static function kiem_tra_ten_dang_nhap($tai_khoan)
    {
        global $db;
        $result = $db->prepare('SELECT fma_nhan_vien, fho_ten_nhan_vien, fmat_khau_nhan_vien FROM tnhan_vien WHERE ftai_khoan_nhan_vien = :tai_khoan_nhan_vien');
        $result->execute([':tai_khoan_nhan_vien'=>$tai_khoan]);
        $nhan_vien = $result->fetchAll();
        return !empty($nhan_vien);
    }


}