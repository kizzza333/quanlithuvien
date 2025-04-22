<?php 
class trasach_m extends connectDB{
    
    // public function id_all(){
    //     $sql = "SELECT MaPhieu FROM phieu";
    //     return mysqli_query($this->con,$sql);
    // }
    public function all(){
        $sql="SELECT phieu.*, docgia.TenDG, docgia.MaLop FROM phieu, docgia WHERE phieu.TheDG = docgia.TheDG";
        return mysqli_query($this->con,$sql);
    }
    // public function truyen_dl($MaPhieu) {
    //     $sql = "SELECT * FROM phieu WHERE MaPhieu = '$MaPhieu' and TrangThai='Chưa trả'";
    //     $result = mysqli_query($this->con, $sql);
    //     if ($result && mysqli_num_rows($result) > 0) {
    //         return mysqli_fetch_assoc($result);
    //     }
    //     return null;
    // }
    // public function update_tra($MaPhieu, $TrangThai) {
    //     $sql = "UPDATE phieu SET TrangThai = '$TrangThai' WHERE MaPhieu = '$MaPhieu'";
    //     return mysqli_query($this->con, $sql);
    // }
    public function chitiet($maphieu){
        $sql="SELECT chitietphieu.* , sach.TenSach
        FROM chitietphieu, sach 
        WHERE chitietphieu.MaSach = sach.MaSach and MaPhieu = N'$maphieu'";
        return mysqli_query($this->con,$sql);
    }
    function find($maphieu){
        $sql="SELECT phieu.*, docgia.TenDG, docgia.MaLop
         FROM phieu, docgia 
         WHERE phieu.TheDG = docgia.TheDG AND MaPhieu like N'%$maphieu%'  ";
        return mysqli_query($this->con,$sql);
    }
    function delete($maphieu){
        $sql="DELETE FROM phieu WHERE MaPhieu= N'$maphieu'";
        return mysqli_query($this->con,$sql);
    }
    //////////////
    //chitietphieu----trasach//
    public function all_chitiet($maphieu){
        $sql="SELECT chitietphieu.* , sach.TenSach
        FROM chitietphieu, sach 
        WHERE chitietphieu.MaSach = sach.MaSach and MaPhieu = N'$maphieu' and MaSach= N'$masach' ";
        return mysqli_query($this->con,$sql);
    }
    function delete_tra($maphieu,$masach,$machitietphieu){//tra one
        $sql="DELETE FROM chitietphieu WHERE MaPhieu= N'$maphieu' and MaSach= N'$masach'and chitietphieu.MaChiTietPhieu =N'$machitietphieu'  ";
        return mysqli_query($this->con,$sql);
    }
    function delete_tra_cuoi($maphieu,$masach){//tracuoi
        $sql="DELETE FROM chitietphieu WHERE MaPhieu= N'$maphieu' and MaSach= N'$masach'";
        return mysqli_query($this->con,$sql);
    }
    
    //lq cập nhật số lượng//
    public function select_tra($maphieu, $masach) {
        $sql = "SELECT SoLuong FROM chitietphieu WHERE MaPhieu = '$maphieu' AND MaSach = '$masach'";
        $result = mysqli_query($this->con, $sql);
    
        if(mysqli_num_rows($result) > 0) {
            // Lấy số lượng từ kết quả truy vấn
            $soluong = mysqli_fetch_assoc($result)['SoLuong'];
            return $soluong;
        } else {
            // Không tìm thấy chi tiết phiếu có MaPhieu và MaSach như vậy
            return 0; // hoặc return false; tùy theo yêu cầu của bạn
        }
    }
    //update
    public function chitiet_sua($machitietphieu){//truyền sua tinh trạng
        $sql="SELECT chitietphieu.* , sach.TenSach
        FROM chitietphieu, sach 
        WHERE chitietphieu.MaSach = sach.MaSach and MaChiTietPhieu = '$machitietphieu'";
        return mysqli_query($this->con,$sql);
    }
    function tinhtrang_upd($machitietphieu,$tinhtrang){
        $sql = "UPDATE chitietphieu SET TinhTrang='$tinhtrang' WHERE MaChiTietPhieu = '$machitietphieu'";
        return mysqli_query($this->con,$sql);
    }
    public function sach_soluong($masach){
        $sql = "SELECT SoLuong FROM sach WHERE MaSach = '$masach'";
        $result = mysqli_query($this->con, $sql);
    
        if(mysqli_num_rows($result) > 0) {
            // Lấy số lượng từ kết quả truy vấn
            $soluong = mysqli_fetch_assoc($result)['SoLuong'];
            return $soluong;
        } else {
            // Không tìm thấy sách có mã sách như vậy
            return 0; // hoặc return false; tùy theo yêu cầu của bạn
        }
    }
    public function sach_updsach($masach,$soluongconlai){
        $sql = "UPDATE sach SET SoLuong='$soluongconlai' WHERE MaSach = '$masach'";
        return mysqli_query($this->con,$sql);
    }
    // 
    //bang sach tra//
    public function insert($masach,$thedg, $soluong,$maphieu,$ngaylap,$ngayhentra, $ngayketthuc,$tinhtrang){
        $sql="INSERT INTO sachtra (MaSach, TheDG, SoLuong, MaPhieu, NgayLap, NgayHenTra, NgayKetThuc, TinhTrang) VALUES ('$masach','$thedg','$soluong','$maphieu','$ngaylap','$ngayhentra','$ngayketthuc','$tinhtrang')";
        return mysqli_query($this->con,$sql);
    }
    public function ket_hop($maphieu,$masach,$machitietphieu){//trả one
        $sql="SELECT chitietphieu.*, sach.TenSach, phieu.NgayLap, phieu.TheDG
            FROM chitietphieu
            JOIN sach ON chitietphieu.MaSach = sach.MaSach
            JOIN phieu ON chitietphieu.MaPhieu = phieu.MaPhieu
            WHERE chitietphieu.MaPhieu = N'$maphieu' and chitietphieu.MaSach =N'$masach'and chitietphieu.MaChiTietPhieu =N'$machitietphieu' ";
        return mysqli_query($this->con,$sql);
    }
    public function ket_hop_cuoi($maphieu,$masach){//trả cuối
        $sql="SELECT chitietphieu.*, sach.TenSach, phieu.NgayLap, phieu.TheDG
            FROM chitietphieu
            JOIN sach ON chitietphieu.MaSach = sach.MaSach
            JOIN phieu ON chitietphieu.MaPhieu = phieu.MaPhieu
            WHERE chitietphieu.MaPhieu = N'$maphieu' and chitietphieu.MaSach =N'$masach'";
        return mysqli_query($this->con,$sql);
    }
    public function all_sachtra(){
        $sql="SELECT sachtra.* , sach.TenSach, docgia.TenDG
        FROM sachtra, sach , docgia
        WHERE sachtra.MaSach = sach.MaSach and sachtra.TheDG= docgia.TheDG ";
        return mysqli_query($this->con,$sql);
    }
    function find_sachtra($masach,$tensach){
        $sql="SELECT sachtra.*, sach.TenSach, docgia.TenDG
            FROM sachtra
            JOIN sach ON sachtra.MaSach = sach.MaSach
            JOIN docgia on sachtra.TheDG= docgia.TheDG
            WHERE sachtra.MaSach LIKE N'%$masach%' OR sach.TenSach LIKE N'%$tensach%'";
        return mysqli_query($this->con,$sql);
    }
    //
    //
    //trả muộn//
    function find2($maphieu){//truyen phat
        $sql="SELECT phieu.*, docgia.TenDG, docgia.MaLop 
        FROM phieu, docgia 
        WHERE phieu.TheDG = docgia.TheDG and MaPhieu = N'$maphieu' ";
        return mysqli_query($this->con,$sql);
    }
    public function muon(){
        $sql="SELECT phieu.*, chitietphieu.*, docgia.TenDG, docgia.MaLop 
            FROM phieu
            JOIN docgia ON phieu.TheDG = docgia.TheDG
            JOIN chitietphieu ON phieu.MaPhieu = chitietphieu.MaPhieu
            WHERE chitietphieu.NgayHenTra < CURDATE();";
        return mysqli_query($this->con,$sql);
    }
    public function find_muon($maphieu,$thedg){
        $sql="SELECT phieu.*, chitietphieu.*, docgia.TenDG, docgia.MaLop 
            FROM phieu
            JOIN docgia ON phieu.TheDG = docgia.TheDG
            JOIN chitietphieu ON phieu.MaPhieu = chitietphieu.MaPhieu
            WHERE  chitietphieu.NgayHenTra < CURDATE() and ( phieu.MaPhieu like N'%$maphieu%' AND phieu.TheDG like N'%$thedg%') ";
        return mysqli_query($this->con,$sql);
    }
}
?>