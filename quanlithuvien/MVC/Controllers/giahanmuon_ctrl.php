<?php
class giahanmuon_ctrl extends controller {
    private $giahan;

    function __construct() {
        $this->giahan = $this->model('giahanmuon_m');
    }

    function Get_data() {
        // $dulieu = $this->giahan->giahanmuon_find($MaPhieu);
        $this->view('Masterlayout', ['page' => 'quanligiahan']);
    }

    public function suadl() {
        if (isset($_POST['btnsua'])) {
            $NgayHenTra = isset($_POST['dateNgayHenTra']) ? trim($_POST['dateNgayHenTra']) : '';
            $MaChiTietPhieu = isset($_POST['txtMaChiTietPhieu']) ? trim($_POST['txtMaChiTietPhieu']) : '';
            // Cập nhật dữ liệu độc giả
            $dulieu = $this->giahan->giahanmuon_upd($MaChiTietPhieu, $NgayHenTra);
            if ($dulieu) {
                echo "<script>alert('Gia hạn mượn thành công!')</script>";
            } else {
                echo "<script>alert('Gia hạn mượn thất bại!')</script>";
            }
            // Gọi view để hiển thị thông tin cập nhật
            $this->view('Masterlayout', [
                'page' => 'giahanmuon',
                'dulieu' => $this->giahan->giahanmuon_find1($MaChiTietPhieu),
                'NgayHenTra' => $NgayHenTra
            ]);
        }
    }

    public function sua($MaChiTietPhieu) {
        $this->view('Masterlayout', [
            'page' => 'giahanmuon',
            'dulieu' => $this->giahan->giahanmuon_find1($MaChiTietPhieu),
        ]);
    }

    public function timkiem() {
        if (isset($_POST['btnTimkiem'])) {
            $MaPhieu = $_POST['txtMaPhieu'];
            $MaCanBo = isset($_POST['txtMaCanBo']) ? $_POST['txtMaCanBo'] : '';
            $TheDG = isset($_POST['txtTheDG']) ? $_POST['txtTheDG'] : '';
            $NgayLap = isset($_POST['dateNgayLap']) ? $_POST['dateNgayLap'] : '';
            $NgayHenTra = isset($_POST['dateNgayHenTra']) ? $_POST['dateNgayHenTra'] : '';
            $MaSach = isset($_POST['txtMaSach']) ? $_POST['txtMaSach'] : '';
            $TenSach = isset($_POST['txtTenSach']) ? $_POST['txtTenSach'] : '';
            $SoLuong = isset($_POST['txtSoLuong']) ? $_POST['txtSoLuong'] : '';
            $dulieu = $this->giahan->giahanmuon_find($MaPhieu);
            // Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout', [
                'page' => 'quanligiahan',
                'dulieu' => $dulieu,
                'MaPhieu' => $MaPhieu,
                'MaCanBo' => $MaCanBo,
                'TheDG' => $TheDG,
                'NgayLap' => $NgayLap,
                'NgayHenTra' => $NgayHenTra,
                'MaSach' => $MaSach,
                'TenSach' => $TenSach,
                'SoLuong' => $SoLuong,
            ]);
        }
    }

    public function timkiem1() {
        $MaPhieu = '';
        $MaCanBo = isset($_POST['txtMaCanBo']) ? $_POST['txtMaCanBo'] : '';
        $TheDG = isset($_POST['txtTheDG']) ? $_POST['txtTheDG'] : '';
        $NgayLap = isset($_POST['dateNgayLap']) ? $_POST['dateNgayLap'] : '';
        $NgayHenTra = isset($_POST['dateNgayHenTra']) ? $_POST['dateNgayHenTra'] : '';
        $MaSach = isset($_POST['txtMaSach']) ? $_POST['txtMaSach'] : '';
        $TenSach = isset($_POST['txtTenSach']) ? $_POST['txtTenSach'] : '';
        $SoLuong = isset($_POST['txtSoLuong']) ? $_POST['txtSoLuong'] : '';
        $dulieu = $this->giahan->giahanmuon_find($MaPhieu);
        // Gọi lại giao diện và truyền $dulieu ra
        $this->view('Masterlayout', [
            'page' => 'quanligiahan',
            'dulieu' => $dulieu,
            'MaPhieu' => $MaPhieu,
            'MaCanBo' => $MaCanBo,
            'TheDG' => $TheDG,
            'NgayLap' => $NgayLap,
            'NgayHenTra' => $NgayHenTra,
            'MaSach' => $MaSach,
            'TenSach' => $TenSach,
            'SoLuong' => $SoLuong,
        ]);
    }
}
?>
