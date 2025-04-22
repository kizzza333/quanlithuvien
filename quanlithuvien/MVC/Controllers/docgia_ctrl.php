<?php
class docgia_ctrl extends controller{
    private $docgia;
    function __construct()
    {
        $this->docgia = $this->model('docgia_m');
    }
    function Get_data(){
        $dulieu = $this->docgia->docgia_ListAll();
        $this->view('Masterlayout',[
            'page'=>'quanlidocgia',
         'dulieu' => $dulieu]);
    }
    public function suadl() {
        if (isset($_POST['btnsua'])) {
            $TheDG = isset($_POST['txtTheDG']) ? trim($_POST['txtTheDG']) : '';
            $TenDG = isset($_POST['txtTenDG']) ? trim($_POST['txtTenDG']) : '';
            $MaLop = isset($_POST['txtMaLop']) ? trim($_POST['txtMaLop']) : '';
            $NgaySinh = isset($_POST['dNgaySinh']) ? trim($_POST['dNgaySinh']) : '';
            $GioiTinh = isset($_POST['txtGioiTinh']) ? trim($_POST['txtGioiTinh']) : '';
            $SoDienThoai = isset($_POST['txtSoDienThoai']) ? trim($_POST['txtSoDienThoai']) : '';
            $DiaChi = isset($_POST['txtDiaChi']) ? trim($_POST['txtDiaChi']) : '';
            $NgayMuaThe = isset($_POST['dNgayMuaThe']) ? trim($_POST['dNgayMuaThe']) : '';
            $NgayHetHan = isset($_POST['dNgayHetHan']) ? trim($_POST['dNgayHetHan']) : '';

            // Chuyển đổi định dạng ngày nếu cần thiết
            $NgaySinh = date('Y-m-d', strtotime($NgaySinh));
            $NgayMuaThe = date('Y-m-d', strtotime($NgayMuaThe));
            $NgayHetHan = date('Y-m-d', strtotime($NgayHetHan));

            // Cập nhật dữ liệu độc giả
            $dulieu = $this->docgia->docgia_upd($TheDG, $TenDG, $MaLop, $NgaySinh, $GioiTinh, $SoDienThoai, $DiaChi, $NgayMuaThe, $NgayHetHan);
            
            if ($dulieu) {
                echo "<script>alert('Sửa độc giả thành công!')</script>";
            } else {
                echo "<script>alert('Sửa độc giả thất bại!')</script>";
            }

            // Gọi view để hiển thị thông tin cập nhật
            $this->view('Masterlayout', [
                'page' => 'suadocgia',
                'dulieu' => $this->docgia->docgia_find($TheDG),
                'TheDG' => $TheDG,
                'TenDG' => $TenDG,
                'MaLop' => $MaLop,
                'NgaySinh' => $NgaySinh,
                'GioiTinh' => $GioiTinh,
                'SoDienThoai' => $SoDienThoai,
                'DiaChi' => $DiaChi,
                'NgayMuaThe' => $NgayMuaThe,
                'NgayHetHan' => $NgayHetHan
            ]);
        }
    }
    public function sua($TheDG){
        $this->view('Masterlayout',[
            'page'=>'suadocgia',
            'dulieu'=>$this->docgia->docgia_find($TheDG)
        ]);
    }
    public function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $TheDG = $_POST['txtTimkiem'];
            $dulieu=$this->docgia->docgia_find($TheDG);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'quanlidocgia',
                'dulieu'=>$dulieu,
                'TheDG' =>$TheDG
            ]);
        }
        if (isset($_POST['btnXuat'])) {
            $objExcel = new PHPExcel();
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('Danh sách độc giả');
    $rowCount = 1;

    // Tạo tiêu đề cho cột trong Excel
    $sheet->setCellValue('A'.$rowCount, 'STT');
    $sheet->setCellValue('B'.$rowCount, 'Thẻ Độc Giả');
    $sheet->setCellValue('C'.$rowCount, 'Tên Độc Giả');
    $sheet->setCellValue('D'.$rowCount, 'Mã Lớp');
    $sheet->setCellValue('E'.$rowCount, 'Ngày Sinh');
    $sheet->setCellValue('F'.$rowCount, 'Giới tính');
    $sheet->setCellValue('G'.$rowCount, 'Số Điện Thoại');
    $sheet->setCellValue('H'.$rowCount, 'Địa Chỉ');
    $sheet->setCellValue('I'.$rowCount, 'Ngày Mua Thẻ');
    $sheet->setCellValue('J'.$rowCount, 'Ngày Hết Hạn');

    // Định dạng cột tiêu đề
    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);

    // Gán màu nền
    $sheet->getStyle('A1:J1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
    // Căn giữa
    $sheet->getStyle('A1:J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    // Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
    $TheDG = $_POST['txtTimkiem'];
    $dulieu = $this->docgia->docgia_find($TheDG);

    if ($dulieu && mysqli_num_rows($dulieu) > 0) {
        while ($row = mysqli_fetch_array($dulieu)) {
            $rowCount++;
            $sheet->setCellValue('A'.$rowCount, $rowCount - 1); // sửa lại giá trị của STT cho đúng
            $sheet->setCellValue('B'.$rowCount, $row['TheDG']);
            $sheet->setCellValue('C'.$rowCount, $row['TenDG']);
            $sheet->setCellValue('D'.$rowCount, $row['MaLop']);
            $sheet->setCellValue('E'.$rowCount, $row['NgaySinh']);
            $sheet->setCellValue('F'.$rowCount, $row['GioiTinh']);
            $sheet->setCellValue('G'.$rowCount, $row['SoDienThoai']);
            $sheet->setCellValue('H'.$rowCount, $row['DiaChi']);
            $sheet->setCellValue('I'.$rowCount, $row['NgayMuaThe']);
            $sheet->setCellValue('J'.$rowCount, $row['NgayHetHan']);
        }
    } else {
        // Xử lý trường hợp không tìm thấy dữ liệu
        echo "<script>alert('Không có dữ liệu để xuất');</script>";
        return;
    }

    // Kẻ bảng 
    $styleArray = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    );
    $sheet->getStyle('A1:' . 'J' . ($rowCount))->applyFromArray($styleArray);

    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $fileName = 'Danh sách độc giả.xlsx';
    $objWriter->save($fileName);

    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Length: ' . filesize($fileName));
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: no-cache');
    readfile($fileName);
        }
        $dulieu = $this->docgia->docgia_ListAll();
        $this->view('Masterlayout',[
            'page'=>'quanlidocgia',
         'dulieu' => $dulieu]);
    }
    public function timkiem1(){
        $TheDG = '';
        $TenDG = isset($_POST['txtTenDG']) ? $_POST['txtTenDG'] : '';
        $MaLop = isset($_POST['txtMaLop']) ? $_POST['txtMaLop'] : '';
        $NgaySinh = isset($_POST['dNgaySinh']) ? $_POST['dNgaySinh'] : '' ;
        $GioiTinh = isset($_POST['txtGioiTinh']) ? $_POST['txtGioiTinh'] : '';
        $SoDienThoai = isset($_POST['txtSoDienThoai']) ? $_POST['txtSoDienThoai'] : '';
        $DiaChi = isset($_POST['txtDiaChi']) ? $_POST['txtDiaChi'] : '';
        $NgayMuaThe = isset($_POST['dNgayMuaThe']) ? $_POST['dNgayMuaThe'] : '';
        $NgayHetHan = isset($_POST['dNgayHetHan']) ? $_POST['dNgayHetHan'] : '';
        $dulieu = $this->docgia->docgia_find($TheDG);
        
        //Gọi lại giao diện và truyền $dulieu ra
        $this->view('Masterlayout',[
            'page'=>'quanlidocgia',
            'dulieu'=>$dulieu,
            'TheDG' =>$TheDG,
            'TenDG'=>$TenDG,
            'MaLop' =>$MaLop,
            'NgaySinh'=>$NgaySinh,
            'GioiTinh'=>$GioiTinh,
            'SoDienThoai' =>$SoDienThoai,
            'DiaChi' =>$DiaChi,
            'NgayMuaThe' =>$NgayMuaThe,
            'NgayHetHan' =>$NgayHetHan
        ]);
    }
    
    function xoa($TheDG){
        $dulieu = $this->docgia->docgia_del($TheDG);
        if($dulieu)
            echo "<script>alert('Xóa thành công!')</script>";
        else
            echo "<script>alert('Xóa thất bại!')</script>";

        //Gọi lại giao diện và truyền $dulieu ra
        $TheDG = '';
        $TenDG = isset($_POST['txtTenDG']) ? $_POST['txtTenDG'] : '';
        $MaLop = isset($_POST['txtMaLop']) ? $_POST['txtMaLop'] : '';
        $NgaySinh = isset($_POST['dNgaySinh']) ? $_POST['dNgaySinh'] : '' ;
        $GioiTinh = isset($_POST['txtGioiTinh']) ? $_POST['txtGioiTinh'] : '';
        $SoDienThoai = isset($_POST['txtSoDienThoai']) ? $_POST['txtSoDienThoai'] : '';
        $DiaChi = isset($_POST['txtDiaChi']) ? $_POST['txtDiaChi'] : '';
        $NgayMuaThe = isset($_POST['dNgayMuaThe']) ? $_POST['dNgayMuaThe'] : '';
        $NgayHetHan = isset($_POST['dNgayHetHan']) ? $_POST['dNgayHetHan'] : '';

        $dulieu = $this->docgia->docgia_find_multi($TheDG, $TenDG, $MaLop, $NgaySinh, $GioiTinh, $SoDienThoai, $DiaChi, $NgayMuaThe, $NgayHetHan);

        //Gọi lại giao diện và truyền $dulieu ra
        $this->view('Masterlayout',[
            'page'=>'quanlidocgia',
            'dulieu'=>$dulieu,
            'TheDG' =>$TheDG,
            'TenDG'=>$TenDG,
            'MaLop' =>$MaLop,
            'NgaySinh'=>$NgaySinh,
            'GioiTinh'=>$GioiTinh,
            'SoDienThoai' =>$SoDienThoai,
            'DiaChi' =>$DiaChi,
            'NgayMuaThe' =>$NgayMuaThe,
            'NgayHetHan' =>$NgayHetHan
        ]);
    }
}
?>
