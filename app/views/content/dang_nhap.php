<?php $this->set_web_title('Đăng Nhập'); ?>

<?php $this->start(\core\Views::WEB_ELEMENT_CONTENT); ?>
<div class="w3-login">
    <div class="w3-login-content">

        <div class="w3-container">
            <h3 class="w3-text-blue w3-center"><b>Form Đăng Nhập</b></h3>
        </div>

        <form action="index.php?controller=dang_nhap&method=dang_nhap" method="post" class="w3-container">
            <input type="text" name="tai_khoan_nhan_vien" id="" class="w3-input w3-border w3-round w3-light-grey w3-active-w3-active-white" placeholder="Tài Khoản">
            <br>
            <input type="password" name="mat_khau_nhan_vien" id="" class="w3-input w3-border w3-round w3-light-grey" placeholder="Mật Khẩu">
            <br>
            <button type="submit" name="btn_dang_nhap" value="true" class="w3-button w3-round w3-block w3-blue"><b>Đăng Nhập</b></button>
        </form>

        <div class="w3-container">
            <ul class="w3-border w3-border-red w3-text-red">
                <?php if(isset($data['tai_khoan_nhan_vien']['value'])){ echo '<li>' . $data['tai_khoan_nhan_vien']['value'] . '</li>'; }?></li>
                <?php if(isset($data['mat_khau_nhan_vien']['value'])){ echo '<li>' . $data['mat_khau_nhan_vien']['value'] . '</li>'; }?></li>
                <?php echo '<li>' . $this->selectData('dang_nhap') . '</li>';?></li>
            </ul>
        </div>

    </div>
</div>
<?php $this->end(); ?>
