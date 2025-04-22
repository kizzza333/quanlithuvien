<!DOCTYPE html>
<html lang="en">
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra xem người dùng có phải là admin không
if ($_SESSION['username'] == 'admin') {
    $isAdmin = isset($_SESSION['username']) && $_SESSION['username'];
} else {
    $isAdmin = '';
}

// Sau đó, sử dụng điều kiện để hiển thị hoặc ẩn liên kết trên navbar
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/css.css">
    <script src="http://localhost/quanlithuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        .center-form {
            display: flex; 
            justify-content: center; /* căn giữa các mục tiêu theo chiều ngang */
            align-items: center; /* căn giữa các mục tiêu theo chiều dọc */
            flex-direction: column; /* sắp xếp theo chiều dọc từ trên xuống */
            margin: 0 auto; /* Căn giữa phần tử này trong phần tử cha của nó */
            background: #fff;
            padding: 20px;
            border-radius: 10px; /* Làm tròn các góc của phần tử */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Thêm hiệu ứng đổ bóng với mức độ mờ 10 pixel và màu sắc là đen với độ trong suốt 10% (0.1) */
        }

        .form-inline {
            margin-bottom: 20px;
            justify-content: space-between;
            flex-wrap: wrap; /* Cho phép các mục bên trong phần tử tự động xuống hàng nếu không đủ chỗ. */
            margin-bottom: 20px;
        }

        .form-inline .form-group {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .form-inline .form-control {
            margin: 10px;
        }

        .form-inline .btn {
            margin: 10px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        table th,
        table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background: #343a40;
            color: #fff;
        }

        .btn-primary,
        .btn-danger {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary i,
        .btn-danger i {
            margin-right: 5px;
        }

        .btn-success i {
            margin-right: 5px;
        }

        .header-title {
            text-align: center;
            margin-bottom: 20px;
            color: #d8527a;
            font-size: 2.5em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 2px solid #d8527a;
            padding-bottom: 10px;
        }

        @media (max-width: 768px) {
            .form-inline {
                flex-direction: column;
            }

            .form-inline .form-group {
                width: 100%;
                justify-content: space-between;
            }

            .form-inline .btn {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
    <script>
        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xóa?');
        }
    </script>
</head>

<body>
    <div class="center-form">
        <h2 class="header-title">Danh Sách Nhân Viên</h2>
        <form method="post" action="http://localhost/quanlithuvien/Danhsachnhanvien/timkiem" enctype="multipart/form-data">
            <div class="form-inline">
                <label for="txtMaCanBo">Mã nhân viên</label>
                <input type="text" class="form-control" id="txtMaCanBo" name="txtMaCanBo" value="<?php if (isset($data['MaCanBo'])) echo $data['MaCanBo'] ?>">
                <label for="txtTenCanBo">Tên nhân viên</label>
                <input type="text" class="form-control" id="txtTenCanBo" name="txtTenCanBo" value="<?php if (isset($data['TenCanBo'])) echo $data['TenCanBo'] ?>">
                <button type="submit" class="btn btn-success" name="btnTimkiem">🔍Tìm kiếm</button>
                <br>
            </div>
            <div class="row" style="width: 100%; margin: 0;">
                <div class="col-md-6" style="padding: 0;">
                    <?php if ($isAdmin) : ?>
                        <a href="http://localhost/quanlithuvien/Nhanvien" class="btn btn-success" style="margin-bottom: 10px;">➕Thêm nhân viên</a>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 text-right" style="padding: 0;">
                    <input type="file" id="myFile2" name="txtfile">
                    <button type="submit" name="btnNhap" class="btn btn-primary">📥</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 50px;">STT</th>
                            <th style="width: 200px;">Mã nhân viên</th>
                            <th style="width: 150px;">Tên nhân viên</th>
                            <?php if ($isAdmin) : ?>
                                <th style="width: 200px;">Tài khoản</th>
                            <?php endif; ?>
                            <?php if ($isAdmin) : ?>
                                <th style="width: 150px;">Mật khẩu</th>
                            <?php endif; ?>
                            <th style="width: 200px;">Ngày sinh</th>
                            <th style="width: 150px;">Giới tính</th>
                            <th style="width: 300px;">Chức vụ</th>
                            <th style="width: 100px;">Điện thoại</th>
                            <th style="width: 150px;">Email</th>
                            <?php if ($isAdmin) : ?>
                                <th style="width: 150px;">Thao Tác</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0) {
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($data['dulieu'])) {
                        ?>
                                <tr>
                                    <td><?php echo (++$i) ?></td>
                                    <td><?php echo $row['MaCanBo'] ?></td>
                                    <td><?php echo $row['TenCanBo'] ?></td>
                                    <?php if ($isAdmin) : ?>
                                        <td><?php echo $row['Username'] ?></td>
                                    <?php endif; ?>
                                    <?php if ($isAdmin) : ?>
                                        <td><?php echo $row['Password'] ?></td>
                                    <?php endif; ?>
                                    <td><?php echo $row['NgaySinh'] ?></td>
                                    <td><?php echo $row['GioiTinh'] ?></td>
                                    <td><?php echo $row['ChucVu'] ?></td>
                                    <td><?php echo $row['SoDienThoai'] ?></td>
                                    <td><?php echo $row['Email'] ?></td>
                                    <td>
                                        <?php if ($isAdmin) : ?>
                                            <a href="http://localhost/quanlithuvien/Danhsachnhanvien/sua/<?php echo $row['MaCanBo'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                                            <a href="http://localhost/quanlithuvien/Danhsachnhanvien/xoa/<?php echo $row['MaCanBo'] ?>" onclick="return confirmDelete()" class="btn btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <br>
                <button type="submit" class="btn btn-success" name="btnXuatExcel">↗️Xuất Excel</button>
            </div>
        </form>
    </div>
</body>

</html>