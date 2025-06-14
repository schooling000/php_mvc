<?php
$messageAccount = !empty($data['messageAccount']) ? $data['messageAccount'] : '';
$messagePassword = !empty($data['messagePassword']) ? $data['messagePassword'] : '';
$messageForm = !empty($data['messageForm']) ? $data['messageForm'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>

<body>
    <form action="/login" method="post">
        <h4>Form đăng nhập</h4>
        <div class="w3-container w3-margin-top w3-margin-bottom">
            <lable>Tài khoản</lable>
            <input type="text" name="account" class="w3-input w3-border w3-round">
            <span class="w3-small w3-text-red"><?php echo $messageAccount; ?></span>
        </div>
        <div class="w3-container w3-margin-top w3-margin-bottom">
            <lable>Mật khẩu</lable>
            <input type="password" name="password" class="w3-input w3-border w3-round">
            <span class="w3-small w3-text-red"><?php echo $messagePassword; ?></span>
        </div>
        <div class="w3-container w3-margin-top w3-margin-bottom">
            <button class="w3-button w3-border w3-round">Đăng nhập</button>
        </div>
        <?php if (!empty($messageForm)): ?>
            <div class="w3-container w3-margin-top w3-margin-bottom">
                <span class="w3-small w3-text-red"><?php echo $messageForm; ?></span>
            </div>
        <?php endif; ?>
    </form>
</body>

</html>