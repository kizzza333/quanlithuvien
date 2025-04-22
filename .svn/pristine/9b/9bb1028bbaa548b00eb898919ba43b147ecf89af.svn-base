<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trả sách</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanh.css">
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/thanhtable.css">
    <style>
        input[type="text"], input[type="date"],input[type="number"] {
            border: none;
        }
        
    </style>
</head>
<body>
<?php
        // Lấy ngày hiện tại
        $ngayhientai = date('Y-m-d');
    ?>
<form method="post" action="">
    <div class="form-in1" style="max-width: 1000px">
        <!-- <div class="header_form">
            <h2>Phiếu phạt</h2>
        </div> -->
        <br>
        <div>
            <div>
            <?php
            if(isset($data['dulieu'])&& mysqli_num_rows($data['dulieu'])>0){
                while($row=mysqli_fetch_array($data['dulieu'])){
                    
            ?>   
                <div style="padding-left: 145px">
                    <label  for="txtMaphieu">Mã phiếu:</label> 
                    <input type="text"  name="txtMaphieu" value="<?php echo $row['MaPhieu'] ?> "  readonly>
                    <!--  -->
                    <label  for="txtTheDG">Thẻ độc giả:</label> 
                    <input type="text" name="txtTheDG" value="<?php echo $row['TheDG'] ?>"  readonly>
                    <!--  -->
                    <br>
                    <label  for="txtTenDG">Tên độc giả:</label> 
                    <input type="text" name="txtTenDG" value="<?php echo $row['TenDG'] ?>"  readonly>
                    <!--  -->
                    <label  for="txtLop">Lớp:</label> 
                    <input type="text" name="txtLop" value="<?php echo $row['MaLop'] ?>"  readonly>
                    <!--  -->
                    <br>
                    <label  for="txtNgaylap">Ngày mượn:</label> 
                    <input type="date" name="txtNgaylap" value="<?php echo $row['NgayLap'] ?>" readonly >
                    <!--  -->
                    <label  for="txtNgayhentra">Ngày hẹn trả:</label> 
                    <input type="date" name="txtNgayhentra" value="<?php echo $row['NgayHenTra'] ?>" readonly > 
                    <!--  -->
                    <label  for="txtMucphat">Mức phạt:</label> 
                    <input type="text" name="txtMucphat" value="50.000 VNĐ" readonly > 
                    
                    <!--  -->
                </div>
                <?php  
                }
            }
            ?>
                    <!--  -->
            </div>
            <label  for="txtNgayketthuc">Ngày in:</label> 
                    <input type="date" name="txtNgayketthuc" value="<?php echo $ngayhientai ?>" readonly > 
            
            <br>
            <br>
            <br>
            <a class="link" href="javascript:history.go(-1);">↩ Trở về</a>
            <!-- <a class="link" href="http://localhost/quanlithuvien/trasach_ds_c/xuatphieu/">💾 In</a> -->
        </div>
    </div>
</form>
</body>
</html>