<?php $this->setWebTitle('Nhân viên');?>

<?php $this->start(self::WEB_ELEMENT_CONTENT);?>

<div class="w3-main w3-padding" style="margin-left:250px;">
        <!-------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------->
        <div class="w3-bar w3-border-bottom">
            <div class="w3-bar-item">
                <button onclick="document.getElementById('id01').style.display='block'"
                    class="w3-button w3-round w3-blue">Thêm</button>
            </div>
            <div class="w3-bar-item w3-right">
                <input type="text" name="" id="" class="w3-input w3-round w3-border w3-light-grey"
                    placeholder="Tìm Kiếm">
            </div>
        </div>

        <!-------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------->
        <div class="w3-container" style="padding-top:16px;">
            <div class="w3-responsive">
                <table class="w3-table-all">
                    <tr class="w3-green">
                        <th>#</th>
                        <th>Họ Tên</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th>Tài Khoản</th>
                        <th>Tùy Chọn</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nguyễn Thanh Hiền</td>
                        <td lable-name="Email">Nguyenthanhhien@gmail.com</td>
                        <td lable-name="Quyền">Phẩu Thuật Viên</td>
                        <td lable-name="Tài Khoản">HIENNT</td>
                        <td>
                            <a href="" class="w3-btn w3-round w3-teal">Sửa</a>
                            <a href="" class="w3-btn w3-round w3-red">Xóa</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nguyễn Thanh Hiền</td>
                        <td lable-name="Email">Nguyenthanhhien@gmail.com</td>
                        <td lable-name="Quyền">Phẩu Thuật Viên</td>
                        <td lable-name="Tài Khoản">HIENNT</td>
                        <td>
                            <a href="" class="w3-btn w3-round w3-teal">Sửa</a>
                            <a href="" class="w3-btn w3-round w3-red">Xóa</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nguyễn Thanh Hiền</td>
                        <td lable-name="Email">Nguyenthanhhien@gmail.com</td>
                        <td lable-name="Quyền">Phẩu Thuật Viên</td>
                        <td lable-name="Tài Khoản">HIENNT</td>
                        <td>
                            <a href="" class="w3-btn w3-round w3-teal">Sửa</a>
                            <a href="" class="w3-btn w3-round w3-red">Xóa</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------->

        <div id="id01" class="w3-modal">
            <div class="w3-modal-content">

                <div class="w3-container w3-blue">
                    <span onclick="document.getElementById('id01').style.display='none'"
                        class="w3-button w3-display-topright w3-large">&times;</span>
                    <h2>Modal Header</h2>
                </div>

                <div class="w3-container w3-margin-top w3-margin-bottom">
                    <form action="#" method="post">
                        <div class="w3-margin">
                            <input type="text" name="" placeholder="Họ Tên Nhân Viên"
                                class="w3-input w3-border w3-round">
                        </div>
                        <div class="w3-margin">
                            <select name="" class="w3-select w3-border">
                                <option value="" selected disabled hidden>Giới Tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="w3-margin">
                            <button type="submit" class="w3-bar-item w3-button w3-block w3-round w3-blue">Thêm</button>
                        </div>
                    </form>
                </div>

                <div class="w3-container w3-blue">
                    <p>Modal Footer</p>
                </div>

            </div>
        </div>

<?php $this->end();?>