<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tác giả</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanh.css">
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanhtable.css">
</head>
<body>
<form method="post" action="http://localhost/quanlithuvien/trasach_muon_c/timkiem">
    <div class="form-in1" style="max-width: 1100px">
        <div class="header_form">
            <h2>Danh sách mượn quá hạn</h2>
        </div>
            <br>
            <br>
            <div style="text-align: center" class="form-in">
                <input type="text" name="txtMaPhieu" placeholder="🔍 Tìm kiếm theo mã phiếu " value="<?php if(isset($data['MaPhieu'])) echo $data['MaPhieu'] ?>">
                <input type="text" name="txtTheDG" placeholder="🔍 Tìm kiếm theo thẻ độc giả " value="<?php if(isset($data['TheDG'])) echo $data['TheDG'] ?>">
                <input type="submit" name="btnTimkiem" value="Tìm kiếm">
            </div>
            
            <table >
                    <tr style="background: #facc6afd">
                        <th>STT</th>
                        <th>Mã sách</th>
                        <th>Mã phiếu</th>
                        <th>Thẻ độc giả</th>
                        <th>Tên độc giả</th>
                        <th>Mã lớp</th>
                        <th>Ngày lập</th>
                        <th>Ngày hẹn trả</th>
                        <th>Trạng thái</th>
                        <th>Thực hiện</th>
                    </tr>
                    <?php
                    if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu'])>0){
                        $i=1;
                        while($row=mysqli_fetch_array($data['dulieu'])){
                            if($i%2==0){
                    ?>
                                <tr>
                                    <td style="text-align: center"><?php echo ($i++) ?></td>
                                    <td><?php echo $row['MaSach'] ?></td>
                                    <td><?php echo $row['MaPhieu'] ?></td>
                                    <td><?php echo $row['TheDG'] ?></td>
                                    <td><?php echo $row['TenDG'] ?></td>
                                    <td><?php echo $row['MaLop'] ?></td>
                                    <td><?php echo $row['NgayLap'] ?></td>
                                    <td><?php echo $row['NgayHenTra'] ?></td>
                                    <td><?php echo $row['TrangThai'] ?></td>
                                    <td class="tacvu">
                                        <a href="http://localhost/quanlithuvien/trasach_muon_c/truyen/<?php echo $row['MaPhieu'] ?>" >📝 Phiếu phạt</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                    </td>
                                </tr>
                    <?php
                            }else{
                    ?>
                    <tr style="background: rgb(255, 252, 248)">
                        <td style="text-align: center"><?php echo ($i++) ?></td>
                        <td><?php echo $row['MaSach'] ?></td>
                        <td><?php echo $row['MaPhieu'] ?></td>
                        <td><?php echo $row['TheDG'] ?></td>
                        <td><?php echo $row['TenDG'] ?></td>
                        <td><?php echo $row['MaLop'] ?></td>
                        <td><?php echo $row['NgayLap'] ?></td>
                        <td><?php echo $row['NgayHenTra'] ?></td>
                        <td><?php echo $row['TrangThai'] ?></td>
                        <td class="tacvu">
                        <a href="http://localhost/quanlithuvien/trasach_muon_c/truyen/<?php echo $row['MaPhieu'] ?>" >📝 Phiếu phạt</a> &nbsp;&nbsp;&nbsp;&nbsp;
                            
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>   
    </div>
</form>
</body>
</html>