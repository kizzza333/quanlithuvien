<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xóa không?');
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
                <h2>Quản lý sách</h2>
            </div>
    <div class="container center-form">
        <form method="post" action="http://localhost/quanlithuvien/sach_ctrl/timkiem">
            <div class="form-inline">
                <label for="myMaSach" style="width: 100px;">Mã Sách</label>
                <input type="text" class="form-control dd2" id="myMaSach" name="txtMaSach" value="<?php if(isset($data['MaSach'])) echo $data['MaSach'] ?>">
                <label for="myTenSach" style="width: 100px;">Tên Sách</label>
                <input type="text" class="form-control dd2" id="myTenSach" name="txtTenSach" value="<?php if(isset($data['TenSach'])) echo $data['TenSach'] ?>">
                <button type="submit" class="btn btn-success" name="btnTimkiem">🔍 Tìm kiếm</button>
                <?php if ($isAdmin): ?>
                <a href="http://localhost/quanlithuvien/themsach_ctrl" class="btn btn-success " name = "btnthemsach"><i class="fa fa-plus" style="color: blue;"></i>➕ Thêm sách</a>
                <button type="submit" class="btn btn-success" name="btnXuat">📖 Xuất Excel</button>
                <?php endif; ?>
                
            </div>
            <table class="table table-striped">
                <thead>
                    <tr style="background: #e9e6e6;">
                        <th style="width: 100px;">Stt</th>
                        <th style="width: 150px;">Mã Sách</th>
                        <th style="width: 150px;">Tên Sách</th>
                        <th style="width: 150px;">Mã Thể Loại</th>
                        <th style="width: 150px;">Mã Tác Giả</th>
                        <th style="width: 150px;">Mã Nhà Xuất Bản</th>
                        <th style="width: 150px;">Số Lượng</th>
                        <th style="width: 150px;">Nội Dung</th>
                        <th style="width: 150px;">Tình Trạng</th>
                        <?php if ($isAdmin): ?>
                        <th>Thao Tác</th>
                        <?php endif; ?>
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
                               <td><?php echo $row['MaSach'] ?></td>
                               <td><?php echo $row['TenSach'] ?></td>
                               <td><?php echo $row['MaTheLoai'] ?></td>
                               <td><?php echo $row['MaTacGia'] ?></td>
                               <td><?php echo $row['MaNXB'] ?></td>
                               <td><?php echo $row['SoLuong'] ?></td>
                               <td><?php echo $row['NoiDung'] ?></td>
                               <td><?php echo $row['TinhTrang'] ?></td>
                               <?php if ($isAdmin): ?>
                               <td>
                                    <a href="http://localhost/quanlithuvien/sach_ctrl/sua/<?php echo $row['MaSach'] ?>" class="btn btn-primary">✏️ Sửa</a> &nbsp;
                                    <a href="http://localhost/quanlithuvien/sach_ctrl/xoa/<?php echo $row['MaSach'] ?>" onclick="return confirmDelete()" class="btn btn-danger">❌ Xóa</a>
                               </td>
                               <?php endif; ?>
                            </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
