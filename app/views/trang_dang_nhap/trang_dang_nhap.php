<?php $this->start('body'); ?>
<div class="w3-card-4 w3-light-grey w3-round" style="margin: 15% auto 15% auto; max-width: 400px; padding-bottom:16px;">
    <header class="w3-container w3-blue w3-center" style="border-radius:5px 5px 0px 0px;">
        <h2>FORM ĐĂNG NHẬP</h2>
    </header>
    <main>
        <form action="/php_mvc/trang_dang_nhap/dang_nhap" method="post">
            <div class="w3-container w3-margin">
                <label for="">Tên Đăng Nhập</label>
                <input class="w3-input w3-border w3-round" type="text" name="tai_khoan">
            </div>
            <div class="w3-container w3-margin">
                <label for="">Mật Khẩu</label>
                <input class="w3-input w3-border w3-round" type="password" name="mat_khau">
            </div>
            <div class="w3-container w3-margin">
                <button class="w3-button w3-blue w3-block w3-round" type="submit" name="nut_dang_nhap">Đăng Nhập</button>
            </div>
        </form>
    </main>
    <footer>

    </footer>
</div>
<?php $this->end(); ?>