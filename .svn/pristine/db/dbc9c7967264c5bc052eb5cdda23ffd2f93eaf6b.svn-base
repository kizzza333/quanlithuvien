<?php
    class Nhanvien_m extends connectDB{
        public function nhanvien_ins($mcb,$tcb,$user,$pass,$ns,$gt,$cv,$sdt,$email,$dc){
            $sql="INSERT INTO nhanvien VALUES ('$mcb','$tcb','$user','$pass','$ns','$gt','$cv','$sdt','$email','$dc')";
            return mysqli_query($this->con,$sql);
        }
        public function nhanvien_all(){
            $sql="Select * From nhanvien";
            return mysqli_query($this->con,$sql);
        }
        function nhanvien_checktrungma($mcb){
            $sql="Select * From nhanvien Where MaCanBo='$mcb'";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0){
                $kq=true;  //trùng mã
            }
            return $kq;
        }
        function nhanvien_find($mcb,$tcb){
            $sql="SELECT * FROM nhanvien WHERE MaCanBo like '%$mcb%' 
            AND TenCanBo like '%$tcb%'";
            return mysqli_query($this->con,$sql);
        }
        function nhanvien_del($mcb){
            $sql="DELETE FROM nhanvien WHERE MaCanBo='$mcb'";
            return mysqli_query($this->con,$sql);
        }
        function nhanvien_upd($mcb,$tcb,$user,$pass,$ns,$gt,$cv,$sdt,$email,$dc){
            $sql="UPDATE nhanvien SET TenCanBo='$tcb',Username='$user',Password='$pass',NgaySinh='$ns',GioiTinh='$gt',
            ChucVu='$cv',SoDienThoai='$sdt',Email='$email',DiaChi='$dc'
            WHERE MaCanBo='$mcb'";
            return mysqli_query($this->con,$sql);
        }
    }
?>