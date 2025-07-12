<?php require_once ROOT_PATH . DS . 'app' . DS . 'view' . DS . 'header' . DS . 'header.php'; ?>
<div class="w3-container w3-light-grey" style="display:flex;
                                         height:100vh;
                                         justify-content:center;
                                         align-items: center;">
    <div class="w3-container w3-card-4 w3-border w3-round">
        <form action="/login" method="post">
            <div class="w3-container w3-center">
                <h4>Form đăng nhập</h4>
            </div>
            <div class="w3-container w3-padding">
                <lable style="font-size: small;">Tài khoản</lable>
                <input type="text" name="E_Account" class="w3-input w3-border w3-round">
                <span class="w3-text-red" style="font-size:small;">Trường này không được trống</span>
            </div>
            <div class="w3-container w3-padding">
                <lable style="font-size: small;">Mật khẩu</lable>
                <input type="Password" name="E_Password" class="w3-input w3-border w3-round">
                <span class="w3-text-red" style="font-size:small;">Trường này không được trống</span>
            </div>
            <div class="w3-container w3-padding">
                <button class="w3-button w3-border w3-round w3-blue w3-block">Đăng nhập</button>
            </div>
        </form>
    </div>
</div>




<?php require_once ROOT_PATH . DS . 'app' . DS . 'view' . DS . 'footer' . DS . 'footer.php'; ?>