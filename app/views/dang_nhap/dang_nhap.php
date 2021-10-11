<?php $this->start('body'); ?>
<div class="w3-display-container w3-light-grey" style="position: fixed; top:0px; left:0px; width:100%; height:100%;">
    <div class="w3-display-middle w3-light-grey" style="min-width:390px;">
        <header class="w3-container w3-blue">
            <h3>FORM ĐĂNG NHẬP</h3>
        </header>
        <form action="/php_mvc/dang_nhap/xem_dang_nhap" method="post" class="w3-container">
            <div class="w3-margin">
                <label for="">Tên đăng nhập</label>
                <input type="text" class="w3-input w3-border w3-round" name="data[tai_khoan]">
            </div>
            <div class="w3-margin">
                <label for="">Mật khẩu đăng nhập</label>
                <input type="text" class="w3-input w3-border w3-round" name="data[mat_khau]">
            </div>
            <div class="w3-margin">
                <button class="w3-button w3-round w3-blue w3-block" name="data[nut_dang_nhap]">Đăng nhập</button>
            </div>
        </form>
        <div class="w3-container w3-grey">
            <h4>Footer</h4>
        </div>
    </div>
    <?php $this->end(); ?>
</div>