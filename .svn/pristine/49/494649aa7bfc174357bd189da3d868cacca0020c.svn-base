<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-wrapper {
            display: flex;
            justify-content: space-between;
            max-width: 1100px;
            margin: 0 auto;
        }
        .form-container {
            width: 48%;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px 0;
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
        .header_form {
            background-color: orange;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .header_form h2 {
            margin: 0;
            color: #fff;
        }
        .form-inline {
            text-align: center;
        }
        .form-inline .form-control {
            margin: 10px;
        }
        .form-inline .btn {
            margin: 10px;
        }
        table {
            margin-top: 20px;
        }
        table th, table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/css.css">
    <script src="http://localhost/quanlithuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="form-wrapper">
    <div class="form-container">
        <div class="header_form">
            <h2>Mượn Sách 📖</h2>
        </div>
        <form action="http://localhost/quanlithuvien/themmuonsach_ctrl/them" method="post">
            <div class="form-group">
                <label for="myMaPhieu">Mã Phiếu:</label>
                <input type="text" class="form-control" id="myMaPhieu" placeholder="Nhập mã phiếu" name="txtMaPhieu" value="<?php if(isset($data['MaPhieu'])) echo $data['MaPhieu'] ?>" required>
                <label for="myCanBo">Người Lập Phiếu:</label>
                <input type="text" class="form-control" id="myCanBo" placeholder="Cán Bộ" name="txtCanBo" value="<?php echo $_SESSION['username']; ?>" readonly>
                <label for="myDocGia">Thẻ Độc Giả:</label>
                <select name="cboTheDG" id="myDocGia" class="form-control" required>
                    <option value="">----Mời Bạn Chọn Thẻ Độc Giả ----</option>
                    <?php 
                        while($row = mysqli_fetch_array($data['docgia'])){
                            if(isset($data['TheDG'])){
                                if($row['TheDG'] == $data['TheDG']){
                                    echo "<option value=".$row['TheDG']." data-name='".$row['TenDG']."' data-quantity=".$row['TheDG']." selected>".$row['TheDG']."</option>";
                                } else {
                                    echo "<option value=".$row['TheDG']." data-name='".$row['TenDG']."' data-quantity=".$row['TheDG'].">".$row['TheDG']."</option>";
                                }
                            } else {
                                echo "<option value=".$row['TheDG']." data-name='".$row['TenDG']."' data-quantity=".$row['TheDG'].">".$row['TheDG']."</option>";
                            }
                        }
                    ?>
                </select>
                <label for="myTenDocGia">Tên Độc Giả:</label>
                <input type="text" class="form-control" id="myTenDocGia" value="<?php if(isset($data['TenDocGia'])) echo $data['TenDocGia'] ?>" placeholder="Tên Độc Giả" name="txtTenDocGia" readonly>
                <a href="http://localhost/quanlithuvien/themdocgia_ctrl">Thêm Độc Giả</a>
                <br>
                <label for="myNgayLap">Ngày Lập:</label>
                <input type="date" class="form-control" id="myNgayLap" name="dateNgayLap" value="<?php if(isset($data['NgayLap'])) echo $data['NgayLap'] ?>" required>
                <label for="myNgayHenTra">Ngày Hẹn Trả:</label>
                <input type="date" class="form-control" id="myNgayHenTra" name="dateNgayHenTra" value="<?php if(isset($data['NgayHenTra'])) echo $data['NgayHenTra'] ?>" required>
                <label for="myMaSach">Mã Sách:</label>
                <select name="cboMaSach" id="myMaSach" class="form-control" required>
                    <option value="">----Mời Bạn Chọn Sách----</option>
                    <?php 
                        while($row = mysqli_fetch_array($data['sach'])){
                            if(isset($data['MaSach'])){
                                if($row['MaSach'] == $data['MaSach']){
                                    echo "<option value=".$row['MaSach']." data-quantity=".$row['SoLuong']." selected>".$row['TenSach']."</option>";
                                } else {
                                    echo "<option value=".$row['MaSach']." data-quantity=".$row['SoLuong'].">".$row['TenSach']."</option>";
                                }
                            } else {
                                echo "<option value=".$row['MaSach']." data-quantity=".$row['SoLuong'].">".$row['TenSach']."</option>";
                            }
                        }
                    ?>
                </select>
                <label for="mySoLuongConLai">Số Lượng Còn Lại:</label>
                <input type="text" class="form-control" id="mySoLuongConLai" placeholder="Số lượng còn lại" name="txtSoLuongConLai" readonly>
                <label for="soluong">Số Lượng:</label>
                <input type="text" class="form-control" id="soluong" placeholder="Nhập số lượng" name="txtSoLuong" value="<?php if(isset($data['SoLuong'])) echo $data['SoLuong'] ?>" required>
                <label for="ghichu">Ghi Chú:</label>
                <input type="text" class="form-control" id="ghichu" placeholder="Nhập ghi chú" name="txtGhiChu" value="<?php if(isset($data['GhiChu'])) echo $data['GhiChu'] ?>" required>
                <label for="tinhtrang">Tình Trạng:</label>
                <input type="text" class="form-control" id="tinhtrang" placeholder="Nhập tình trạng" name="txtTinhTrang" value="Tốt" readonly>
            </div>
            <button type="submit" class="btn btn-primary" name="btnLuu">📗 Lưu</button>
            <a href="http://localhost/quanlithuvien/sach_ctrl/timkiem1" class="btn btn-danger">🔙 Quay Lại</a>
        </form>
        <script>
            $(document).ready(function(){
                $('#myMaSach').change(function(){
                    var quantity = $(this).find(':selected').data('quantity');
                    $('#mySoLuongConLai').val(quantity);
                });
                $('#myDocGia').change(function(){
                    var tenDocGia = $(this).find(':selected').data('name');
                    $('#myTenDocGia').val(tenDocGia);
                });
            });
        </script>
    </div>
    <div class="form-container">
        <div class="header_form">
            <h2>Quản lý mượn sách</h2>
        </div>
        <form action="http://localhost/quanlithuvien/themmuonsach_ctrl/timkiem" method="post">
            <div class="form-inline">
            <label for="myDocGia">Thẻ Độc Giả:</label>
            <input type="text" class="form-control" id="myMaDocGia" placeholder="Mã Độc Giả" name="txtMaDocGia" >
                <script>
            $(document).ready(function(){
                $('#myDocGia').change(function(){
                    var madocgia = $(this).find(':selected').data('quantity');
                    $('#myMaDocGia').val(madocgia);
                });
            });
        </script>
                <button type="submit" class="btn btn-success" name="btnTimkiem">
                    🔍 Tìm kiếm
                </button>
                <a href="http://localhost/quanlithuvien/trasach_ds_c" class="btn btn-success" name="btnthemsach">
                    <i class="fa fa-minus" style="color: blue;"></i>➖ Trả Sách
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Mã Phiếu</th>
                        <th>Mã Sách</th>
                        <th>Ngày Mượn</th>
                        <th>Ngày Hẹn Trả</th>
                        <th>Số Lượng</th>
                        <th>Ghi Chú</th>
                        <th>Tình Trạng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                            $i=0;
                            while($row=mysqli_fetch_assoc($data['dulieu'])){
                                ?>
                                    <tr>
                                        <td><?php echo (++$i) ?></td>
                                        <td><?php echo $row['MaPhieu'] ?></td>
                                        <td><?php echo $row['MaSach'] ?></td>
                                        <td><?php echo $row['NgayLap'] ?></td>
                                        <td><?php echo $row['NgayHenTra'] ?></td>
                                        <td><?php echo $row['SoLuong'] ?></td>
                                        <td><?php echo $row['GhiChu'] ?></td>
                                        <td><?php echo $row['TinhTrang'] ?></td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
    </div></form>
</div>
</body>
</html>
