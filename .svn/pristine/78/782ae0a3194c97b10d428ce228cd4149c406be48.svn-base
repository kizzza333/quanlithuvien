<?php
class giahanmuon_m extends connectDB{
    public function giahanmuon_find($MaPhieu){
        $sql="SELECT 
              p.Maphieu,
              p.MaCanBo,
              p.NgayLap,
              ct.NgayHenTra,
              ct.MaPhieu,
              ct.MaSach,
              ct.MaChiTietPhieu,
              p.TheDG,
              s.MaSach,
               s.TenSach,
              ct.SoLuong
              FROM 
              phieu p
              JOIN 
              chitietphieu ct ON p.MaPhieu = ct.MaPhieu
              JOIN 
              sach s ON ct.MaSach = s.MaSach
              WHERE p.MaPhieu LIKE '%$MaPhieu%'
               ORDER BY 
                    p.MaPhieu;
              ";
        return mysqli_query($this->con,$sql);
    }
    public function giahanmuon_find1($MaChiTietPhieu){
        $sql="SELECT 
              p.Maphieu,
              p.MaCanBo,
              p.NgayLap,
              ct.NgayHenTra,
              ct.MaPhieu,
              ct.MaSach,
              ct.MaChiTietPhieu,
              p.TheDG,
              s.MaSach,
               s.TenSach,
              ct.SoLuong
              FROM 
              phieu p
              JOIN 
              chitietphieu ct ON p.MaPhieu = ct.MaPhieu
              JOIN 
              sach s ON ct.MaSach = s.MaSach
              WHERE ct.MaChiTietPhieu LIKE '%$MaChiTietPhieu%'
               ORDER BY 
                    p.MaPhieu;
              ";
        return mysqli_query($this->con,$sql);
    }
    public function giahanmuon_upd($MaChiTietPhieu,$ngayhentra){
        $sql = "UPDATE chitietphieu SET NgayHenTra='$ngayhentra' WHERE MaChiTietPhieu = '$MaChiTietPhieu'";
        return mysqli_query($this->con,$sql);
    } 
    public function phieu_ListAll(){
        $sql = "SELECT * FROM phieu";
        return mysqli_query($this->con,$sql);
    }
    public function sach_ListAll(){
        $sql = "SELECT * FROM sach";
        return mysqli_query($this->con,$sql);
    }
}
?>