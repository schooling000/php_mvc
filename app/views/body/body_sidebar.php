<?php
    $data['trang_chu'] = isset($_SESSION['user']['permissions']['LICH_MO']['TEN_NHIEM_VU_NHAN_VIEN']) && 
                         !empty($_SESSION['user']['permissions']['LICH_MO']['TEN_NHIEM_VU_NHAN_VIEN']) &&
                         isset($_SESSION['user']['permissions']['LICH_MO']['HREF']) &&
                         !empty($_SESSION['user']['permissions']['LICH_MO']['HREF'])? 
                         $_SESSION['user']['permissions']['LICH_MO']['TEN_NHIEM_VU_NHAN_VIEN'] : null;

    
?>

<div class="w3-bar w3-large w3-hide-large w3-display-block w3-black">
    <button onclick="controllSideBar()" class="w3-button"><i class="fa fa-align-justify"></i></button>
</div>

<!-------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->
<div id="sidebar" class="w3-sidebar w3-bar-block w3-hide-medium w3-hide-small w3-light-grey w3-card-4" style="width:250px;">

    <div class="w3-container w3-borderbar w3-padding w3-green">
        <h3><b>MY WEBSIDE</b></h3>
    </div>

    <button class="w3-bar-item w3-button w3-border w3-center w3-hide-large w3-grey" onclick="controllSideBar()">
        <b>Close</b>
    </button>
    <?php if($data['trang_chu'])){echo '<a href="" class="w3-bar-item w3-button w3-border-bottom w3-border-top w3-blue">Trang Chủ</a>';}?>
    
    <a href="" class="w3-bar-item w3-button w3-border-bottom">Trang Chủ</a>
    <a href="" class="w3-bar-item w3-button w3-border-bottom">Trang Chủ</a>
    <a href="" class="w3-bar-item w3-button w3-border-bottom">Trang Chủ</a>
    <a href="" class="w3-bar-item w3-button w3-border-bottom">Trang Chủ</a>
    <a href="" class="w3-bar-item w3-button w3-border-bottom">Trang Chủ</a>
    <a href="form_login.html" class="w3-bar-item w3-button w3-border-bottom">Login</a>

</div>