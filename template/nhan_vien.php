<!DOCTYPE html>
<html>

<head>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="w3-bar w3-black">
        <button class="w3-bar-item w3-button w3-hide-large" onclick="w3_open();"><i class="fa fa-bars"></i> Menu</button>
        <div class="w3-item-bar w3-right w3-row w3-padding" style="line-height: 25px;">
            <span>LOCHT</span>
            <a class="w3-text-red" href=""><i class="fa fa-power-off"></i></a>
        </div>

    </div>

    <div class="w3-sidebar w3-card-4 w3-hide-small w3-hide-medium w3-animate-left" id="sidebar" style="width:200px;">
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-list-ul"></i>  Lịch mổ</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list-ul"></i>  Hẹn mổ</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list-ul"></i>  Duyệt mổ</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list-ul"></i>  Tiền Mê</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list-ul"></i>  Nhân viên</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list-ul"></i>  Quyền nhân viên</a>
        </div>
    </div>
    <div class="w3-main w3-padding" style="margin-left: 200px;">

        <div class="w3-row w3-margin-bottom">

            <div class="w3-third w3-right">
                <form class="w3-row" action="" method="post">
                    <input class="w3-col l9 m9 s7 w3-input w3-border w3-small" type="search" name="" id="" placeholder="Thông tin tìm kiếm">
                    <button class="w3-col l3 m3 s5 w3-button w3-blue w3-right w3-small" style="min-height:36px;" type="submit"><i class="fa fa-search"></i> Tìm</button>
                </form>
            </div>

        </div>


        <!-- table  -->
        <div class="w3-responsive" style="max-height:400px;">
            <table class="w3-table-all w3-small" style="min-width: 1500px;">
                <tr class="w3-teal" style="position: sticky;top:0px;left:0px;">
                    <th>STT</th>
                    <th>Họ tên bệnh nhân</th>
                    <th>Năm Sinh</th>
                    <th>Giới Tính</th>
                    <th>Địa chỉ</th>
                    <th>Xã phường</th>
                    <th>Quận huyện</th>
                    <th>Tỉnh thành</th>
                    <th>Chẩn đoán</th>
                    <th>Người hẹn</th>
                    <th>Ngày hẹn</th>
                    <th>Ghi chú</th>
                    <th style="width:200px;">Tùy chọn</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>1945</td>
                    <td>Nam</td>
                    <td></td>
                    <td></td>
                    <td>Quận 12</td>
                    <td>TP.HCM</td>
                    <td>U phổi phải</td>
                    <td>BSCKII.Hiền</td>
                    <td>12/10/2021</td>
                    <td></td>
                    <td class="w3-tiny">
                        <button class="w3-button w3-green w3-round" onclick="document.getElementById('hop_thoai_sua').style.display='block'">Sửa</button>
                        <button class="w3-button w3-red w3-round" onclick="document.getElementById('hop_thoai_xoa').style.display='block'">Xóa</button>
                        <button class="w3-button w3-blue w3-round" onclick="document.getElementById('hop_thoai_duyet').style.display='block'">Duyệt</button>
                    </td>
                </tr>

            </table>
        </div>
    </div>

    <!-- modal thêm -->
    <div id="hop_thoai_duyet" class="w3-modal w3-small">
        <div class="w3-modal-content" style="width:50%; border-radius: 5px;">

            <header class="w3-container w3-blue" style="border-radius: 5px 5px 0px 0px;">
                <span onclick="document.getElementById('hop_thoai_duyet').style.display='none'" class="w3-button w3-display-topright" style="border-radius: 0px 5px;">&times;</span>
                <h2>Duyệt mổ</h2>
            </header>

            <div class="w3-container">
                <form action="" method="post">
                    <div class="w3-margin">
                        <label for="">Họ tên bệnh nhân</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['ho_ten_benh_nhan']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Giới tính</label>
                        <select class="w3-select w3-border w3-round" name="data['goi_tinh']">
                            <option value="" selected hidden disabled>Mời Bạn chọn</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>

                    <div class="w3-margin">
                        <label for="">Năm sinh</label>
                        <select class="w3-select w3-border w3-round" name="data['nam_sinh']">
                            <option value="" selected hidden disabled>Mời Bạn chọn</option>
                            <?php for ($i = 1900; $i < 3000; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="w3-margin">
                        <label for="">Địa chỉ</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['dia_chi']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Xã phường</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['xa_phuong']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Quận huyện</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['quan_huyen']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Tỉnh thành</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['tinh_thanh']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Chẩn đoán</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['chan_doan']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Người Hẹn</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['nguoi_hen']">
                    </div>

                    <div class="w3-margin">
                        <input type="hidden" class="w3-input w3-border w3-round" value="<?php echo date('d/m/Y'); ?>" name="data['ngay_hen']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Ngày mổ dự kiến</label>
                        <input type="date" class="w3-input w3-border w3-round" name="data['ngay_mo']">
                    </div>

                    <div class="w3-margin">
                        <button class="w3-button w3-blue w3-round w3-block" type="submit">Thêm</button>
                    </div>
                </form>
            </div>

            <footer class="w3-container w3-blue" style="border-radius: 0px 0px 5px 5px;">
                <p>Modal Footer</p>
            </footer>

        </div>
    </div>

    <!-- modal sửa -->
    <div id="hop_thoai_sua" class="w3-modal w3-small">
        <div class="w3-modal-content" style="width:50%; border-radius: 5px;">

            <header class="w3-container w3-green" style="border-radius: 5px 5px 0px 0px;">
                <span onclick="document.getElementById('hop_thoai_sua').style.display='none'" class="w3-button w3-display-topright" style="border-radius: 0px 5px;">&times;</span>
                <h2>Sửa lịch hẹn</h2>
            </header>

            <div class="w3-container">
                <form action="" method="post">
                    <div class="w3-margin">
                        <label for="">Họ tên bệnh nhân</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['ho_ten_benh_nhan']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Giới tính</label>
                        <select class="w3-select w3-border w3-round" name="data['goi_tinh']">
                            <option value="" selected hidden disabled>Mời Bạn chọn</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>

                    <div class="w3-margin">
                        <label for="">Năm sinh</label>
                        <select class="w3-select w3-border w3-round" name="data['nam_sinh']">
                            <option value="" selected hidden disabled>Mời Bạn chọn</option>
                            <?php for ($i = 1900; $i < 3000; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="w3-margin">
                        <label for="">Địa chỉ</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['dia_chi']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Xã phường</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['xa_phuong']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Quận huyện</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['quan_huyen']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Tỉnh thành</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['tinh_thanh']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Chẩn đoán</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['chan_doan']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Người Hẹn</label>
                        <input type="text" class="w3-input w3-border w3-round" name="data['nguoi_hen']">
                    </div>

                    <div class="w3-margin">
                        <input type="hidden" class="w3-input w3-border w3-round" value="<?php echo date('d/m/Y'); ?>" name="data['ngay_hen']">
                    </div>

                    <div class="w3-margin">
                        <label for="">Ngày mổ dự kiến</label>
                        <input type="date" class="w3-input w3-border w3-round" name="data['ngay_mo']">
                    </div>

                    <div class="w3-margin">
                        <button class="w3-button w3-blue w3-round w3-block" type="submit">Thêm</button>
                    </div>
                </form>
            </div>

            <footer class="w3-container w3-green" style="border-radius: 0px 0px 5px 5px;">
                <p>Modal Footer</p>
            </footer>

        </div>
    </div>

    <!-- Modal xóa -->
    <div id="hop_thoai_xoa" class="w3-modal w3-small">
        <div class="w3-modal-content" style="width:50%;border-radius: 5px;">

            <header class="w3-container w3-red" style="border-radius: 5px 5px 0px 0px;">
                <span onclick="document.getElementById('hop_thoai_xoa').style.display='none'" class="w3-button w3-display-topright" style="border-radius: 0px 5px;">&times;</span>
                <h2>Xóa Lịch hẹn</h2>
            </header>

            <div class="w3-container">
                <form action="" method="post">
                    <div class="w3-margin w3-center">
                        <h3>Bạn có muốn xóa thông tin này không</h3>
                    </div>

                    <div class="w3-margin w3-small w3-row-padding">
                        <div class="w3-half">
                            <button class="w3-button w3-grey w3-round w3-block" onclick="document.getElementById('hop_thoai_xoa').style.display='none'">Thoát</button>
                        </div>
                        <div class="w3-half">
                            <button class="w3-button w3-red w3-round w3-block" type="submit">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>

            <footer class="w3-container w3-red" style="border-radius: 0px 0px 5px 5px;">
                <p>Modal Footer</p>
            </footer>

        </div>
    </div>

    <script>
        sidebar = document.getElementById('sidebar');

        console.log(sidebar.classList.contains('w3-hide-small'));

        function w3_open() {
            if (sidebar.classList.contains('w3-hide-small') || sidebar.classList.contains('w3-hide-medium')) {
                sidebar.classList.remove('w3-hide-small');
                sidebar.classList.remove('w3-hide-medium');
            } else {
                sidebar.classList.add('w3-hide-small');
                sidebar.classList.add('w3-hide-medium');
            }
        }
    </script>
</body>

</html>