<?php $this->start('head'); ?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php $this->end();?>


<?php $this->start('body'); ?>
<div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button w3-hide-large" onclick="w3_open();"><i class="fa fa-bars"></i> Menu</button>
    <a class="w3-bar-item w3-button w3-text-red w3-right" href=""><i class="fa fa-power-off"></i></a>
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
    <button class="w3-button w3-blue w3-round w3-margin-bottom w3-small" onclick="document.getElementById('hop_thoai_them').style.display='block'">
        <i class="fa fa-plus-square"></i> Thêm
    </button>
    <div class="w3-responsive" style="max-height:400px;">
        <table class="w3-table-all w3-tiny" style="min-width: 2000px;">
            <tr class="w3-teal" style="position: sticky;top:0px;left:0px;">
                <th>STT</th>
                <th>Họ tên bệnh nhân</th>
                <th>Năm Sinh</th>
                <th>Giới Tính</th>
                <th>Số nhập viện</th>
                <th>Khoa điều trị</th>
                <th>Chẩn đoán</th>
                <th>Phương pháp mổ</th>
                <th>Mã ICD</th>
                <th>Phẩu thuật viên chính</th>
                <th>Phẩu thuật viên phụ</th>
                <th>Phương pháp vô cảm</th>
                <th>Gây mê</th>
                <th>Nhóm máu</th>
                <th>Dự trù máu</th>
                <th>Ngày mổ</th>
                <th>Tùy chọn</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Nguyễn Văn A</td>
                <td>1945</td>
                <td>Nam</td>
                <td>21.014568</td>
                <td>NG2</td>
                <td>U Nấm Phổi (P)</td>
                <td>Cắt Thùy Trên Phổi Phải</td>
                <td>B40</td>
                <td>BSCKII.Hiền</td>
                <td>BSCKII.Hiệp</td>
                <td>BSCKII.Minh</td>
                <td>MNKQ</td>
                <td>AB+</td>
                <td>1 ĐV</td>
                <td>20/10/2021</td>
                <td>
                    <button class="w3-button w3-green w3-round" onclick="document.getElementById('hop_thoai_sua').style.display='block'">Sửa</button>
                    <button class="w3-button w3-red w3-round" onclick="document.getElementById('hop_thoai_xoa').style.display='block'">Xóa</button>
                </td>
            </tr>

        </table>
    </div>
</div>

<!-- modal thêm -->
<div id="hop_thoai_them" class="w3-modal w3-small">
    <div class="w3-modal-content" style="width:50%; border-radius: 5px;">

        <header class="w3-container w3-blue" style="border-radius: 5px 5px 0px 0px;">
            <span onclick="document.getElementById('hop_thoai_them').style.display='none'" class="w3-button w3-display-topright" style="border-radius: 0px 5px;">&times;</span>
            <h2>Thêm lịch mổ</h2>
        </header>

        <div class="w3-container">
            <form action="" method="post">
                <div class="w3-margin">
                    <label for="">Họ tên bệnh nhân</label>
                    <input type="text" class="w3-input w3-border w3-round" name="ho_ten_benh_nhan">
                </div>

                <div class="w3-margin">
                    <label for="">Giới tính</label>
                    <select class="w3-select w3-border w3-round" name="gioi_tinh">
                        <option value="" selected hidden disabled>Mời Bạn chọn</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>

                <div class="w3-margin">
                    <label for="">Năm sinh</label>
                    <select class="w3-select w3-border w3-round" name="nam_sinh">
                        <option value="" selected hidden disabled>Mời Bạn chọn</option>
                        <?php for ($i = 1900; $i < 3000; $i++) : ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="w3-margin">
                    <label for="">Số nhập viện</label>
                    <input type="text" class="w3-input w3-border w3-round" name="so_nhap_vien">
                </div>

                <div class="w3-margin">
                    <label for="">Khoa điều trị</label>
                    <input type="text" class="w3-input w3-border w3-round" name="khoa_dieu_tri">
                </div>

                <div class="w3-margin">
                    <label for="">Chẩn Đoán</label>
                    <input type="text" class="w3-input w3-border w3-round" name="chan_doan">
                </div>

                <div class="w3-margin">
                    <label for="">Phương pháp mổ</label>
                    <input type="text" class="w3-input w3-border w3-round" name="phuong_phap_mo">
                </div>

                <div class="w3-margin">
                    <label for="">Mã ICD</label>
                    <input type="text" class="w3-input w3-border w3-round" name="ma_icd">
                </div>

                <div class="w3-margin">
                    <label for="">Phẩu thuật viên chính</label>
                    <input type="text" class="w3-input w3-border w3-round" name="phau_thuật_vien_chinh">
                </div>

                <div class="w3-margin">
                    <label for="">Phẩu thuật viên phụ</label>
                    <input type="text" class="w3-input w3-border w3-round" name="phau_thuat_vien_phu">
                </div>

                <div class="w3-margin">
                    <label for="">Phương pháp gây mê</label>
                    <input type="text" class="w3-input w3-border w3-round" name="phuong_phap_gay_me">
                </div>

                <div class="w3-margin">
                    <label for="">Gây mê</label>
                    <input type="text" class="w3-input w3-border w3-round" name="gay_me">
                </div>

                <div class="w3-margin">
                    <label for="">Nhóm máu</label>
                    <select class="w3-select w3-border w3-round" name="nhom_mau">
                        <option value="" selected hidden disabled>Mời Bạn chọn</option>
                        <option value="A+">A+</option>
                        <option value="B+">B+</option>
                        <option value="AB+">AB+</option>
                        <option value="O+">O+</option>
                        <option value="A-">A-</option>
                        <option value="B-">B-</option>
                        <option value="AB-">AB-</option>
                        <option value="O-">O-</option>
                    </select>
                </div>

                <div class="w3-margin">
                    <label for="">Dự trù máu</label>
                    <select class="w3-select w3-border w3-round" name="nhom_mau">
                        <option value="" selected hidden disabled>Mời Bạn chọn</option>
                        <option value="1">1 ĐV</option>
                        <option value="2">2 ĐV</option>
                        <option value="3">3 ĐV</option>
                        <option value="4">4 ĐV</option>
                        <option value="5">5 ĐV</option>
                        <option value="6">6 ĐV</option>
                        <option value="7">7 ĐV</option>
                        <option value="8">8 ĐV</option>
                        <option value="9">9 ĐV</option>
                        <option value="10">10 ĐV</option>
                    </select>
                </div>

                <div class="w3-margin">
                    <label for="">Ngày mổ</label>
                    <input type="date" class="w3-input w3-border w3-round" name="ngay_mo">
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
            <h2>Thêm lịch mổ</h2>
        </header>

        <div class="w3-container">
            <form action="" method="post">
                <div class="w3-margin">
                    <label for="">Họ tên bệnh nhân</label>
                    <input type="text" class="w3-input w3-border w3-round" name="ho_ten_benh_nhan">
                </div>

                <div class="w3-margin">
                    <label for="">Giới tính</label>
                    <select class="w3-select w3-border w3-round" name="gioi_tinh">
                        <option value="" selected hidden disabled>Mời Bạn chọn</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>

                <div class="w3-margin">
                    <label for="">Năm sinh</label>
                    <select class="w3-select w3-border w3-round" name="nam_sinh">
                        <option value="" selected hidden disabled>Mời Bạn chọn</option>
                        <?php for ($i = 1900; $i < 3000; $i++) : ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="w3-margin">
                    <label for="">Số nhập viện</label>
                    <input type="text" class="w3-input w3-border w3-round" name="so_nhap_vien">
                </div>

                <div class="w3-margin">
                    <label for="">Khoa điều trị</label>
                    <input type="text" class="w3-input w3-border w3-round" name="khoa_dieu_tri">
                </div>

                <div class="w3-margin">
                    <label for="">Chẩn Đoán</label>
                    <input type="text" class="w3-input w3-border w3-round" name="chan_doan">
                </div>

                <div class="w3-margin">
                    <label for="">Phương pháp mổ</label>
                    <input type="text" class="w3-input w3-border w3-round" name="phuong_phap_mo">
                </div>

                <div class="w3-margin">
                    <label for="">Mã ICD</label>
                    <input type="text" class="w3-input w3-border w3-round" name="ma_icd">
                </div>

                <div class="w3-margin">
                    <label for="">Phẩu thuật viên chính</label>
                    <input type="text" class="w3-input w3-border w3-round" name="phau_thuật_vien_chinh">
                </div>

                <div class="w3-margin">
                    <label for="">Phẩu thuật viên phụ</label>
                    <input type="text" class="w3-input w3-border w3-round" name="phau_thuat_vien_phu">
                </div>

                <div class="w3-margin">
                    <label for="">Phương pháp gây mê</label>
                    <input type="text" class="w3-input w3-border w3-round" name="phuong_phap_gay_me">
                </div>

                <div class="w3-margin">
                    <label for="">Gây mê</label>
                    <input type="text" class="w3-input w3-border w3-round" name="gay_me">
                </div>

                <div class="w3-margin">
                    <label for="">Nhóm máu</label>
                    <select class="w3-select w3-border w3-round" name="nhom_mau">
                        <option value="" selected hidden disabled>Mời Bạn chọn</option>
                        <option value="A+">A+</option>
                        <option value="B+">B+</option>
                        <option value="AB+">AB+</option>
                        <option value="O+">O+</option>
                        <option value="A-">A-</option>
                        <option value="B-">B-</option>
                        <option value="AB-">AB-</option>
                        <option value="O-">O-</option>
                    </select>
                </div>

                <div class="w3-margin">
                    <label for="">Dự trù máu</label>
                    <select class="w3-select w3-border w3-round" name="nhom_mau">
                        <option value="" selected hidden disabled>Mời Bạn chọn</option>
                        <option value="1">1 ĐV</option>
                        <option value="2">2 ĐV</option>
                        <option value="3">3 ĐV</option>
                        <option value="4">4 ĐV</option>
                        <option value="5">5 ĐV</option>
                        <option value="6">6 ĐV</option>
                        <option value="7">7 ĐV</option>
                        <option value="8">8 ĐV</option>
                        <option value="9">9 ĐV</option>
                        <option value="10">10 ĐV</option>
                    </select>
                </div>

                <div class="w3-margin">
                    <label for="">Ngày mổ</label>
                    <input type="date" class="w3-input w3-border w3-round" name="ngay_mo">
                </div>

                <div class="w3-margin">
                    <button class="w3-button w3-green w3-round w3-block" type="submit">Sửa</button>
                </div>
            </form>
        </div>

        <footer class="w3-container w3-green" style="border-radius: 0px 0px 5px 5px;">
            <p>Modal Footer</p>
        </footer>

    </div>
</div>

<div id="hop_thoai_xoa" class="w3-modal w3-small">
    <div class="w3-modal-content" style="border-radius: 5px;">

        <header class="w3-container w3-red" style="border-radius: 5px 5px 0px 0px;">
            <span onclick="document.getElementById('hop_thoai_xoa').style.display='none'" class="w3-button w3-display-topright" style="border-radius: 0px 5px;">&times;</span>
            <h2>Xóa Lịch Mổ</h2>
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
<?php $this->start(); ?>