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
                <h2>Quản lý mượn sách</h2>
            </div>
    <form method="post" action="http://localhost/quanlithuvien/muonsach_ctrl/timkiem">
        <div class="form-inline">
            <label for="myMaDG" style="width: 150px;">Mã Thẻ Độc Giả:</label>
            <input type="text" class="form-control" id="myMaDG" name="txtMaDG" value="<?php if(isset($data['MaDG'])) echo $data['MaDG'] ?>">
            <button type="submit" class="btn btn-success" name="btnTimkiem">
                🔍 Tìm kiếm
            </button>
            <a href="http://localhost/quanlithuvien/trasach_ds_c" class="btn btn-success" name="btnthemsach">
                <i class="fa fa-minus"  style="color: blue;"></i>➖ Trả Sách
            </a>
            <a href="http://localhost/quanlithuvien/themmuonsach_ctrl" class="btn btn-success" name="btnthemsach">
                <i class="fa fa-mail-reply" style="color: blue;"></i>🔙 Quay Lại
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
    </form>
</div>
</body>
</html>
