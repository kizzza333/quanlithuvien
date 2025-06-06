<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function confirmUpdate() {
            return confirm('Bạn có chắc chắn muốn sửa không?');
        }
    </script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: auto;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
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
<div class="form-container">
    <div class="header_form">
                <h2>Sửa Sách</h2>
            </div>
    <div class="container center-form">
        <div class="form-container">
            <form method="post" action="http://localhost/quanlithuvien/sach_ctrl/suadl">
                <div class="form-group">

                    <?php 
                        if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                            while($row=mysqli_fetch_array($data['dulieu'])){
                    ?>
                    <label for="masach">Mã sách:</label>
                    <input type="text" class="form-control" id="masach" placeholder="Nhập mã sách" name="txtMaSach" value="<?php echo $row['MaSach'] ?>" readonly>
                    <label for="tensach">Tên sách:</label>
                    <input type="text" class="form-control" id="tensach" style="margin-bottom: 10px;" placeholder="Nhập tên sách" name="txtTenSach" value="<?php echo $row['TenSach'] ?>" required>
                    <select name="cboTheLoai" id="myMaTheLoai" style="margin-bottom: 10px;" class="form-control" >
                        <option value="<?php echo $row['MaTheLoai'] ?>" style="margin-bottom: 10px;"><?php echo $row['MaTheLoai'] ?></option>
                        <?php 
                            if(isset($data['theloai'])){
                                while($theloaiRow = mysqli_fetch_array($data['theloai'])){
                                    $selected = (isset($data['TheLoai']) && $theloaiRow['MaTheLoai'] == $data['TheLoai']) ? 'selected' : '';
                                    echo "<option value='".$theloaiRow['MaTheLoai']."' ".$selected.">".$theloaiRow['MaTheLoai']."</option>";
                                }
                            }
                        ?>
                    </select>
            
                    <select name="cboMaTacGia" id="myMaTacGia" style="margin-bottom: 10px;" class="form-control" >
                        <option value="<?php echo $row['MaTacGia'] ?>" style="margin-bottom: 10px;"><?php echo $row['MaTacGia'] ?></option>
                        <?php 
                            if(isset($data['tacgia'])){
                                while($tacgiaRow = mysqli_fetch_array($data['tacgia'])){
                                    $selected = (isset($data['MaTacGia']) && $tacgiaRow['MaTacGia'] == $data['MaTacGia']) ? 'selected' : '';
                                    echo "<option value='".$tacgiaRow['MaTacGia']."' ".$selected.">".$tacgiaRow['MaTacGia']."</option>";
                                }
                            }
                        ?>
                    </select>
            
            <select name="cboMaNhaXuatBan" id="myMaNXB" class="form-control" style="margin-bottom: 10px;" value="<?php echo $row['MaNXB'] ?>" required>
                         <option value="<?php echo $row['MaNXB'] ?>" style="margin-bottom: 10px;"><?php echo $row['MaNXB'] ?></option>
                        <?php 
                            if(isset($data['nhaxuatban'])){
                                while($tacgiaRow = mysqli_fetch_array($data['nhaxuatban'])){
                                    $selected = (isset($data['MaNXB']) && $tacgiaRow['MaNXB'] == $data['MaNXB']) ? 'selected' : '';
                                    echo "<option value='".$tacgiaRow['MaNXB']."' ".$selected.">".$tacgiaRow['MaNXB']."</option>";
                                }
                            }
                        ?>
            </select>
            <label for="soluong">Số Lượng:</label>
            <input type="text" class="form-control" id="soluong" placeholder="Nhập số lượng" name="txtSoLuong" value="<?php echo $row['SoLuong'] ?>" required>
            <label for="noidung">Nội Dung:</label>
            <input type="text" class="form-control" id="noidung" placeholder="Nhập nội dung" name="txtNoiDung" value="<?php echo $row['NoiDung'] ?>" required>
            <label for="tinhtrang">Tình Trạng:</label>
            <input type="text" style="margin-bottom: 10px;" class="form-control" id="tinhtrang" placeholder="Nhập tình trạng" name="txtTinhTrang" value="<?php echo $row['TinhTrang'] ?>" required>
                    <?php            
                            }
                        }
                    ?>
                    <button type="submit" class="btn btn-primary" name="btnSua" onclick=" return confirmUpdate()">Sửa</button>
                    <a href="http://localhost/quanlithuvien/sach_ctrl/timkiem1" class="btn btn-danger">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
