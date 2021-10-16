<?php $this->set_title('Lịch mổ khoa ngoại'); ?>

<?php $this->start('body'); ?>
<div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button w3-hide-large" onclick="w3_open();"><i class="fa fa-bars"></i> Menu</button>
    <a class="w3-bar-item w3-button w3-right" href="\php_mvc\dang_nhap\xem_dang_xuat">
        <?=$_SESSION['nhan_vien']['ho_ten_nhan_vien']?>
        <i class="fa fa-power-off w3-text-red"></i>
    </a>
</div>

<div class="w3-sidebar w3-card-4 w3-hide-small w3-hide-medium w3-animate-left" id="sidebar" style="width:200px;">
    <div class="w3-bar-block">

        <a href="<?php echo ($_SESSION['nhan_vien']['chuc_nang'][0]['fcode']); ?>" class="w3-bar-item w3-button w3-padding w3-blue">
            <i class="fa fa-list-ul"></i> 
            <?php echo ($_SESSION['nhan_vien']['chuc_nang'][0]['ften_chuc_nang']); ?>
        </a>
        <?php for ($index = 1; $index <= count($_SESSION['nhan_vien']['chuc_nang']) - 1; $index++) : ?>
            <a href="<?php echo $_SESSION['nhan_vien']['chuc_nang'][$index]['fcode']; ?>" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-list-ul"></i> 
                <?php echo ($_SESSION['nhan_vien']['chuc_nang'][$index]['ften_chuc_nang']); ?>
            </a>
        <?php endfor ?>
    </div>
</div>
<?php $this->end(); ?>