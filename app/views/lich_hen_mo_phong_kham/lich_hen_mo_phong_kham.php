<?php $this->setTitle('LỊCH HẸN PHÒNG KHÁM');?>
<?php $this->start('body'); ?>
<div class="w3-sidebar w3-card-4" style="width:300px;">
    <div class="w3-container w3-blue w3-padding" style="font-weight: bold;">
        <h5>DASHBOARD</h5>
    </div>
    <div class="w3-bar-block">
        <?php foreach ($data as $key => $value) :?> 
        <a class="w3-bar-item w3-button w3-padding" href="http://"><?php echo $value['ften_tinh_nang'] ?></a>
        <?php endforeach; ?>
    </div>
</div>

<div class="w3-main" style="margin-left: 300px;">
    <span>klsdjflksdjflksdjflk</span>
</div>
<?php $this->end(); ?>