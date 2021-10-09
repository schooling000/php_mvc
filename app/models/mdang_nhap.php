<?php
class MDang_nhap{

    public static function kiem_tra_ten_dang_nhap($tai_khoan)
    {
        global $db;
        $result = $db->prepare('SELECT fma_nhan_vien, fho_ten_nhan_vien, fmat_khau_nhan_vien, fma_quyen_nhan_vien FROM tnhan_vien WHERE ftai_khoan_nhan_vien = :tai_khoan_nhan_vien');
        $result->execute([':tai_khoan_nhan_vien'=>$tai_khoan]);
        $nhan_vien = $result->fetchAll();
        return !empty($nhan_vien) ? $nhan_vien[0] : false;
    }

    public static function lay_quyen_nhan_vien($ma_quyen_nhan_vien)
    {
        global $db;
        $result = $db->prepare('SELECT fma_tinh_nang, ften_tinh_nang, fduoc_phep_tao_moi, fduoc_phep_sua, fduoc_phep_xoa FROM ttinh_nang WHERE fma_quyen_nhan_vien = :ma_quyen_nhan_vien');
        $result->execute([':ma_quyen_nhan_vien'=>$ma_quyen_nhan_vien]);
        while($row = $result->fetchAll()){
            $tinh_nang[] = $row;
        }
        return !empty($tinh_nang) ? $tinh_nang[0] : false;
    }


}