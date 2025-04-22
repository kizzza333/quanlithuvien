<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Độc Giả</title>
    <link rel="stylesheet" href="http://localhost/quanlimuontra/Public/Css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/quanlimuontra/Public/Css/dinhdang7.css">
    <script src="http://localhost/quanlithuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/bootstrap.min.js"></script>
</head>
<body>
    <form method="post" action="http://localhost/quanlithuvien/themdocgia_ctrl/them" >
        <div class="form-group">
            <label for="myTheDG">Thẻ Độc Giả</label>
            <input type="text" id="myThedocgia" class="form-control dd1" placeholder="Thẻ Độc Giả" name="txtTheDG" value="<?php if(isset($data['TheDG'])) echo $data['TheDG']; ?>" required>
            
            <label for="myTenDG">Tên Độc Giả</label>
            <input type="text" id="myTenDG" class="form-control dd1" placeholder="Tên Độc Giả" name="txtTenDG" value="<?php if(isset($data['TenDG'])) echo $data['TenDG']; ?>" required>
            
            <label for="myMaLop">Mã Lớp</label>
            <select name="txtMaLop" class="form-control dd1">
                <?php
                // Lấy danh sách lớp học từ phương thức trong lớp docgia_m
                $docgiaModel = new docgia_m(); // Tạo đối tượng của lớp docgia_m
                $result = $docgiaModel->layDanhSachLopHoc();

                if($result && mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        echo "<option value='{$row['MaLop']}'";
                        if(isset($data['MaLop']) && $data['MaLop'] == $row['MaLop']) echo " selected";
                        echo ">{$row['TenLop']}</option>";
                    }
                } else {
                    echo "<option value=''>Không có lớp học</option>";
                }
                ?>
            </select>
            
            <label for="myNgaySinh">Ngày Sinh</label>
            <input type="Date" id="myNgaySinh" class="form-control dd1" placeholder="Ngày Sinh" name="dNgaySinh" value="<?php if(isset($data['NgaySinh'])) echo $data['NgaySinh']; ?>" required>
            
            <label for="myGioiTinh">Giới Tính</label>
            <input type="text" id="myGioiTinh" class="form-control dd1" placeholder="Giới Tính" name="txtGioiTinh" value="<?php if(isset($data['GioiTinh'])) echo $data['GioiTinh']; ?>" required>
            
            <label for="mySoDienThoai">Số Điện Thoại</label>
            <input type="number" id="mySoDienThoai" class="form-control dd1" placeholder="Số Điện Thoại" name="txtSoDienThoai" value="<?php if(isset($data['SoDienThoai'])) echo $data['SoDienThoai']; ?>" required>
            
            <label for="myDiaChi">Địa Chỉ</label>
            <input type="text" id="myDiaChi" class="form-control dd1" placeholder="Địa Chỉ" name="txtDiaChi" value="<?php if(isset($data['DiaChi'])) echo $data['DiaChi']; ?>" required>
            
            <label for="myNgayMuaThe">Ngày Mua Thẻ</label>
            <input type="Date" id="myNgayMuaThe" class="form-control dd1" placeholder="Ngày Mua Thẻ" name="dNgayMuaThe" value="<?php if(isset($data['NgayMuaThe'])) echo $data['NgayMuaThe']; ?>" required>
            
            <label for="myNgayHethan">Ngày Hết Hạn</label>
            <input type="Date" id="myNgayHetHan" class="form-control dd1" placeholder="Ngày Hết Hạn" name="dNgayHetHan" value="<?php if(isset($data['NgayHetHan'])) echo $data['NgayHetHan']; ?>" required>
            
            <br>
            <button type="submit" class="btn btn-primary" name="btnluu">Lưu</button>
            <a href="http://localhost/quanlithuvien/docgia_ctrl/timkiem1" class="btn btn-primary" name="btnQuayLai">Quay Lại</a>
        </div>
    </form>
</body>
</html>
