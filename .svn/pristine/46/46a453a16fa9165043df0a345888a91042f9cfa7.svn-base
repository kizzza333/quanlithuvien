<?php 
class trasach_ds_c extends controller{
    private $ds;

    function __construct()
    {
        $this->ds = $this->model('trasach_m');
    }

    function Get_data() {
        // if (isset($_POST['txtMaphieu'])) {
        //     $maphieu = $_POST['txtMaphieu'];
        //     $dulieu = $this->ds->all();
        //     $dulieu2 = $this->ds->chitiet($maphieu);

        //     $this->view('Masterlayout', [
        //         'page' => 'trasach_tra_v',
        //         'dulieu' => $dulieu,
        //         'dulieu2' => $dulieu2
        //     ]);
        // } else {
            $dulieu = $this->ds->all();
            $this->view('Masterlayout', [
                'page' => 'trasach_ds_v',
                'dulieu' => $dulieu,
            ]);
        // }
    }

    function timkiem() {
        if (isset($_POST['btnTimkiem'])) {
            $maphieu = $_POST['txtTimkiem'];
            $dulieu = $this->ds->find($maphieu);

            // Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout', [
                'page' => 'trasach_ds_v',
                'dulieu' => $dulieu,
                'MaPhieu' => $maphieu,
            ]);
        }
    }

    function tra_one($maphieu,$masach,$machitietphieu) {

            $ket_hop = $this->ds->ket_hop($maphieu,$masach,$machitietphieu);

            $soluongconlai = $this->ds->sach_soluong($masach);
            $soluong = $this->ds-> select_tra($maphieu,$masach);
            $kq2 = $soluongconlai + $soluong;
            $kq3 = $this->ds -> sach_updsach($masach,$kq2);
                //
                // lưu về bảng sách trả
                $ngayketthuc = date('Y-m-d');
                while ($row = mysqli_fetch_assoc($ket_hop)) {
                    $masach = $row['MaSach'];
                    $thedg = $row['TheDG'];
                    $soluong =$row['SoLuong'];
                    $maphieu=$row['MaPhieu'];
                    $ngayhentra = $row['NgayHenTra'];
                    $ngaylap = $row['NgayLap'];
                    $tinhtrang = $row['TinhTrang'];
                    $kq1 = $this->ds->insert($masach,$thedg, $soluong,$maphieu,$ngaylap,$ngayhentra, $ngayketthuc,$tinhtrang);
                }
            //
            $kq = $this->ds->delete_tra($maphieu, $masach,$machitietphieu);
            if ($kq && $kq3) {
                echo "<script>alert('Đã xác nhận mã sách $masach!')</script>";
            } else {
                echo "<script>alert('Gặp lỗi với mã sách $masach!')</script>";
            }

            $dulieu = $this->ds->find2($maphieu);
            $dulieu2 = $this->ds->chitiet($maphieu);

            $this->view('Masterlayout', [
                'page' => 'trasach_tra_v',
                'dulieu' => $dulieu,
                'dulieu2' => $dulieu2
            ]);
        
    }
    function tra_cuoi($maphieu) {
        $masach_list = $this->ds->chitiet($maphieu);
            //xóa
            while ($row = mysqli_fetch_assoc($masach_list)) {
                $masach = $row['MaSach'];
                $soluongconlai = $this->ds->sach_soluong($masach);
                $soluong = $this->ds-> select_tra($maphieu,$masach);
                $kq2 = $soluongconlai + $soluong;
                $kq3 = $this->ds -> sach_updsach($masach,$kq2);
                $ket_hop_cuoi = $this->ds->ket_hop_cuoi($maphieu,$masach);
                $kq = $this->ds->delete_tra_cuoi($maphieu, $masach);
            
            // lưu về bảng sách trả
                $ngayketthuc = date('Y-m-d');
                while ($row = mysqli_fetch_assoc($ket_hop_cuoi)) {
                    $masach = $row['MaSach'];
                    $thedg = $row['TheDG'];
                    $soluong =$row['SoLuong'];
                    $maphieu=$row['MaPhieu'];
                    $ngaylap = $row['NgayLap'];
                    $ngayhentra = $row['NgayHenTra'];
                    $tinhtrang = $row['TinhTrang'];
                    $kq1 = $this->ds->insert($masach,$thedg, $soluong,$maphieu,$ngaylap,$ngayhentra, $ngayketthuc,$tinhtrang);
                }
            }
            // xóa phiếu
            $kq3 = $this->ds->delete($maphieu);
            if ($kq3)
                echo "<script>alert('Hoàn tất trả phiếu $maphieu!')</script>";
            else
                echo "<script>alert('Gặp lỗi!')</script>";

            $dulieu = $this->ds->all();
            $this->view('Masterlayout', [
                'page' => 'trasach_ds_v',
                'dulieu' => $dulieu,
            ]);
    }
    function truyen($maphieu) {
        $dulieu = $this->ds->find2($maphieu);
        $dulieu2 = $this->ds->chitiet($maphieu);

        $this->view('Masterlayout', [
            'page' => 'trasach_tra_v',
            'dulieu' => $dulieu,
            'dulieu2' => $dulieu2
        ]);
    }
    function sua($machitietphieu){
        $dulieu3 = $this->ds->chitiet_sua($machitietphieu);

        $this->view('Masterlayout', [
            
            'page' => 'trasach_sua_v',
            'dulieu3' => $dulieu3
        ]);
    }
    public function suadl(){
        if(isset($_POST['btnLuu'])){
            $masach = $_POST['txtMaSach'];
            $tensach = $_POST['txtTenSach'];
            $ngayhentra = $_POST['txtNgayHenTra'];
            $soluong = $_POST['txtSoLuong'];
            $machitietphieu = $_POST['txtMaChiTietPhieu'];
            $tinhtrang = $_POST['txtTinhTrang'];
            $dulieu3 = $this->ds->chitiet_sua($machitietphieu);
            $dulieu = $this->ds -> tinhtrang_upd($machitietphieu,$tinhtrang);
            if($dulieu3){
                echo "<script>alert('Sửa tình trạng thành công!')</script>";
            }else{
                echo "<script>alert('Sửa tình trạng thất bại!')</script>";
            }
            $this->view('Masterlayout',[
                'page' => 'trasach_sua_v',
                'dulieu3' => $dulieu3,
                'MaSach'=>$masach,
                'TenSach'=>$tensach,
                'NgayHenTra' => $ngayhentra,
                'SoLuong' => $soluong,
                'TinhTrang' => $tinhtrang
            ]);
        }
    }
    function phat($maphieu) {
        $dulieu = $this->ds->find2($maphieu);

        $this->view('Masterlayout', [
            'page' => 'trasach_phat_v',
            'dulieu' => $dulieu,
        ]);
    }
    // function xuatphieu() {
        
    //     $objExcel = new PHPExcel();
    //     $objExcel->setActiveSheetIndex(0);
    //     $sheet = $objExcel->getActiveSheet()->setTitle('Phiếu phạt');

    //     $rowCount = 1;
    //     $sheet->setCellValue('C'.$rowCount, 'Phiếu phạt');

    //     $rowCount2 = 2;
    //     $sheet->setCellValue('A'.$rowCount2, 'Mã phiếu');
       
    //     $sheet->setCellValue('D'.$rowCount2, 'Thẻ độc giả');
       

    //     $rowCount3 = 3;
    //     $sheet->setCellValue('A'.$rowCount3, 'Tên độc giả');
       
    //     $sheet->setCellValue('D'.$rowCount3, 'Lớp');
       

    //     $rowCount4 = 4;
    //     $sheet->setCellValue('A'.$rowCount4, 'Mức phạt');
    //     // $sheet->setCellValue('B'.$rowCount4, $_POST['txtMucphat']);

    //     $rowCount5 = 5;
    //     $sheet->setCellValue('A'.$rowCount5, 'Ngày in phiếu');
    //     // $sheet->setCellValue('B'.$rowCount5, $_POST['txtNgayketthuc']);

    //     $maphieu = $_POST['txtTimkiem'];
    //     $dulieu = $this->ds->find($maphieu);
    
    //     if ($dulieu && mysqli_num_rows($dulieu) > 0) {
    //         while ($row = mysqli_fetch_array($dulieu)) {
    //             $sheet->setCellValue('B'.$rowCount2,  $row['MaPhieu']);
                
    //             $sheet->setCellValue('E'.$rowCount2, $row['TheDG']);
               
    //             $sheet->setCellValue('B'.$rowCount3, $row['TenDG']);
                
    //             $sheet->setCellValue('E'.$rowCount3, $row['Lop']);
    //         }
    //     } else {
    //         // Handle the case where no data is found
    //         echo "<script>alert('Không có dữ liệu để xuất');</script>";
    //         return;
    //     }
        
    
    //     // Xuất file Excel
    //     $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    //     $fileName = 'In_phieu.xlsx';
    //     $objWriter->save($fileName);
    
    //     header('Content-Disposition: attachment; filename="' . $fileName . '"');
    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Length: ' . filesize($fileName));
    //     header('Content-Transfer-Encoding: binary');
    //     header('Cache-Control: must-revalidate');
    //     header('Pragma: no-cache');
    //     readfile($fileName);
    //     exit;
    // }


//
}
?>
