<?php
    class TKmuonquahan_m extends connectDB{
        public function muonquahan_ListAll() {
            $sql = "
            SELECT docgia.MaDocGia, docgia.TenDocGia, sach.MaMuon, muonsach.NgayMuon, muonsach.HanTra
FROM muonsach
JOIN docgia ON muonsach.MaDocGia = docgia.MaDocGia
WHERE muonsach.NgayTra IS NULL AND muonsach.HanTra < CURDATE();
        ";
        return mysqli_query($this->con, $sql);
        }
        public function quahan_find($theDG, $tenDG) {
            $sql = "SELECT docgia.MaDocGia, docgia.TenDocGia, muonsach.MaMuon, muonsach.NgayMuon, muonsach.HanTra
FROM muonsach
JOIN docgia ON muonsach.MaDocGia = docgia.MaDocGia
WHERE muonsach.NgayTra IS NULL AND muonsach.HanTra < CURDATE();";
            return mysqli_query($this->con, $sql);
        }
    }
?>