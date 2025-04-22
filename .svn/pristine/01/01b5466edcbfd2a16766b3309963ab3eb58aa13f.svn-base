<?php 
class docgia_m extends connectDB{
    public function docgia_ins($TheDG,$TenDG,$MaLop,$NgaySinh,$GioiTinh,$SoDienThoai,$DiaChi,$NgayMuaThe,$NgayHetHan){
        $sql = "INSERT INTO docgia values ('$TheDG','$TenDG','$MaLop','$NgaySinh','$GioiTinh','$SoDienThoai','$DiaChi','$NgayMuaThe','$NgayHetHan') ";
        return mysqli_query($this->con,$sql);
    }
    public function docgia_checktrungma($TheDG){
        $sql = "select * from docgia where TheDG = '$TheDG'";
        $dl =  mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_num_rows($dl)>0){
            $kq = true;
        }
        return $kq;
    }
    public function docgia_upd($TheDG, $TenDG, $MaLop, $NgaySinh, $GioiTinh, $SoDienThoai, $DiaChi, $NgayMuaThe, $NgayHetHan) {
        $sql = "UPDATE docgia SET TenDG=?, MaLop=?, NgaySinh=?, GioiTinh=?, SoDienThoai=?, DiaChi=?, NgayMuaThe=?, NgayHetHan=? WHERE TheDG=?";
        
        if ($stmt = mysqli_prepare($this->con, $sql)) {
            mysqli_stmt_bind_param($stmt, 'sssssssss', $TenDG, $MaLop, $NgaySinh, $GioiTinh, $SoDienThoai, $DiaChi, $NgayMuaThe, $NgayHetHan, $TheDG);
            
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return true;
            } else {
                printf("Error: %s.\n", mysqli_stmt_error($stmt));
                mysqli_stmt_close($stmt);
                return false;
            }
        } else {
            printf("Error: %s.\n", mysqli_error($this->con));
            return false;
        }
    }    public function docgia_find($TheDG){
        $sql="SELECT * FROM docgia WHERE TheDG like '%$TheDG%'" ;
        return mysqli_query($this->con,$sql);
    }
    public function docgia_del($TheDG){
        $sql="DELETE FROM docgia WHERE TheDG = '$TheDG'" ;
        return mysqli_query($this->con,$sql);
    }
    


    public function layDanhSachLopHoc() {
        $sql = "SELECT MaLop, TenLop FROM lophoc";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($this->con));
            return false; // Xử lý lỗi nếu có
        }
        return $result;
    }
    public function docgia_ListAll(){
    $sql = "SELECT * FROM docgia";
    return mysqli_query($this->con,$sql);
}
}


           
        
?>
    