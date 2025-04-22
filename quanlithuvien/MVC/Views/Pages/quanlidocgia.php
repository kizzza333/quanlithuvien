<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            padding: 0 !important;
        }
         .dd2{width: 400px !important;}
    </style>
    <link rel="stylesheet" href="http://localhost/quanlimuontra/Public/Css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/quanlimuontra/Public/Css/dinhdang7.css">
    <script src="http://localhost/quanlithuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlithuvien/Public/Js/bootstrap.min.js"></script>
</head>
<body class="alert alert-warning">
    <div class="header">
    
    <i ><b><p> QUẢN LÍ ĐỘC GIẢ </p></b></i>
    </div>
 <form method = "post" action="http://localhost/quanlithuvien/docgia_ctrl/timkiem" enctype="multipart/form-data>">
        <div class="form-inline">
          <table class="table table-striped">
          <label style="width: 100px;">Thẻ Độc Giả</label>
            <input type="text" class="form-control dd2" name="txtTimkiem" value="<?php isset($data['TheDG']) ? isset($data['TheDG']) : '' ?>">
         
            <button type="submit" class="btn btn-success" name="btnTimkiem"><img src="http://localhost/quanlimuontra/Public/Pictures/search.png" alt="">Tìm kiếm</button> &nbsp &nbsp
            <?php if ($isAdmin): ?>
            <a href="http://localhost/quanlithuvien/themdocgia_ctrl" class="btn btn-primary" name="btnthem">➕Thêm</a> &nbsp &nbsp
                <button type="submit" class="btn btn-success" name="btnXuat">↗️Xuất Excel</button>
                <?php endif; ?>
         
          <thead>
            <tr><td></td><td></td></tr>
            <tr style="background: #e9e6e6;">
                <th>Stt</th>
                <th>Thẻ Độc Giả</th>
                <th>Tên Độc Giả</th>
                <th>Mã Lớp</th>
                <th>Ngày Sinh</th>
                <th>Giới Tính</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ </th>
                <th>Ngày Mua Thẻ</th>
                <th>Ngày Hết Hạn</th>
                <?php if ($isAdmin): ?>
                <th>Thao Tác</th>
                <?php endif; ?>
         
            </thead>
            <tbody>
                    <?php 
                        if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                            $i=0;
                            while($row=mysqli_fetch_assoc($data['dulieu'])){
                    ?>
                            <tr>
                               <td><?php echo (++$i) ?></td>
                               <td><?php echo $row['TheDG'] ?></td>
                               <td><?php echo $row['TenDG'] ?></td>
                               <td><?php echo $row['MaLop'] ?></td>
                               <td><?php echo $row['NgaySinh'] ?></td>
                               <td><?php echo $row['GioiTinh'] ?></td>
                               <td><?php echo $row['SoDienThoai'] ?></td>
                               <td><?php echo $row['DiaChi'] ?></td>
                               <td><?php echo $row['NgayMuaThe'] ?></td>
                               <td><?php echo $row['NgayHetHan'] ?></td>
                               <?php if ($isAdmin): ?>
                               <td>
                                    <a href="http://localhost/quanlithuvien/docgia_ctrl/sua/<?php echo $row['TheDG'] ?>" class="btn btn-primary">🛠️Sửa</a> &nbsp;
                                    <a href="http://localhost/quanlithuvien/docgia_ctrl/xoa/<?php echo $row['TheDG'] ?>" onclick="return confirmDelete()" class="btn btn-danger">❌Xóa</a>
                               </td>
                               <?php endif; ?>

                            </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
          </table> 
          
        </div>
    </form>
</body>
</html>