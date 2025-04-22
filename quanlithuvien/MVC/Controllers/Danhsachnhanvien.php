<?php
class Danhsachnhanvien extends controller{
    private $dsnv;
    function __construct()
    {
        $this->dsnv = $this->model('Nhanvien_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'Danhsachnhanvien_v']);
    }   
    public function suadl(){
        if(isset($_POST['btnSua'])){
            $macanbo = $_POST['txtMaCanBo'];
            $tencanbo = $_POST['txtTenCanBo'];
            $taikhoan = $_POST['txtTaiKhoan'];
            $matkhau = $_POST['txtMatKhau'];
            $ngaysinh = $_POST['txtNgaySinh'];
            $gioitinh = $_POST['ddlGioiTinh'];
            $chucvu = $_POST['ddlChucVu'];
            $dienthoai = $_POST['txtDienThoai'];
            $email = $_POST['txtEmail'];
            $diachi = $_POST['txtDiaChi'];
            $dulieu = $this->dsnv -> nhanvien_upd($macanbo,$tencanbo,$taikhoan,$matkhau,$ngaysinh,$gioitinh,$chucvu,$dienthoai,$email,$diachi);
            if($dulieu){
                echo "<script>alert('Sửa thông tin nhân viên thành công!')</script>";
            }else{
                echo "<script>alert('Sửa thông tin nhân viên thất bại!')</script>";
            }
            $this->view('Masterlayout',[
                'page'=>'Nhanvien_sua_v',
                'dulieu'=> $this->dsnv -> nhanvien_find($macanbo,$tencanbo),
                'MaCanBo'=>$macanbo,
                'TenCanBo'=>$tencanbo,
                'Username'=>$taikhoan,
                'Password'=>$matkhau,
                'NgaySinh'=>$ngaysinh,
                'GioiTinh'=>$gioitinh,
                'ChucVu'=>$chucvu,
                'DienThoai'=>$dienthoai,
                'Email'=>$email,
                'DiaChi'=>$diachi
            ]);
        }
    }
    public function sua($macanbo){
        $this->view('Masterlayout',[
            'page'=>'Nhanvien_sua_v',
            'dulieu'=>$this->dsnv->nhanvien_find($macanbo,'')
        ]);
    }
    public function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $macanbo=$_POST['txtMaCanBo'];
            $tencanbo=$_POST['txtTenCanBo'];
            $taikhoan= isset($_POST['txtTaiKhoan']) ? $_POST['txtTaiKhoan'] : '';
            $matkhau= isset($_POST['txtMatKhau']) ? $_POST['txtMatKhau'] : '';
            $ngaysinh= isset($_POST['txtNgaySinh']) ? $_POST['txtNgaySinh'] : '';
            $gioitinh= isset($_POST['ddlGioiTinh']) ? $_POST['ddlGioiTinh'] : '';
            $chucvu= isset($_POST['ddlChucVu']) ? $_POST['ddlChucVu'] : '';
            $dienthoai= isset($_POST['txtDienThoai']) ? $_POST['txtDienThoai'] : '';
            $email= isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
            $diachi= isset($_POST['txtDiaChi']) ? $_POST['txtDiaChi'] : '';
            $dulieu=$this->dsnv->nhanvien_find($macanbo,$tencanbo);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'Danhsachnhanvien_v',
                'dulieu'=>$dulieu,
                'MaCanBo'=>$macanbo,
                'TenCanBo'=>$tencanbo,
                'Username'=>$taikhoan,
                'Password'=>$matkhau,
                'NgaySinh'=>$ngaysinh,
                'GioiTinh'=>$gioitinh,
                'ChucVu'=>$chucvu,
                'DienThoai'=>$dienthoai,
                'Email'=>$email,
                'DiaChi'=>$diachi
            ]);
        }
    
    if(isset($_POST['btnXuatExcel'])){
            
        // Code xuất Excel
        $objExcel = new PHPExcel();
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('Danh Sách Nhân Viên');
        $rowCount = 1;
    
        // Tạo tiêu đề cho cột trong Excel
        $sheet->setCellValue('A'.$rowCount, 'STT');
        $sheet->setCellValue('B'.$rowCount, 'Mã Nhân Viên');
        $sheet->setCellValue('C'.$rowCount, 'Tên Nhân Viên');
        $sheet->setCellValue('D'.$rowCount, 'Tài Khoản');
        $sheet->setCellValue('E'.$rowCount, 'Mật Khẩu');
        $sheet->setCellValue('F'.$rowCount, 'Ngày Sinh');
        $sheet->setCellValue('G'.$rowCount, 'Giới Tính');
        $sheet->setCellValue('H'.$rowCount, 'Chức Vụ');
        $sheet->setCellValue('I'.$rowCount, 'Điện Thoại');
        $sheet->setCellValue('J'.$rowCount, 'Email');
        $sheet->setCellValue('K'.$rowCount, 'Địa Chỉ');
    
        // Định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
    
        // Gán màu nền
        $sheet->getStyle('A1:K1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
        // Căn giữa
        $sheet->getStyle('A1:K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
        // Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
            $macanbo=$_POST['txtMaCanBo'];
            $tencanbo=$_POST['txtTenCanBo'];
            $taikhoan= isset($_POST['txtTaiKhoan']) ? $_POST['txtTaiKhoan'] : '';
            $matkhau= isset($_POST['txtMatKhau']) ? $_POST['txtMatKhau'] : '';
            $ngaysinh= isset($_POST['txtNgaySinh']) ? $_POST['txtNgaySinh'] : '';
            $gioitinh= isset($_POST['ddlGioiTinh']) ? $_POST['ddlGioiTinh'] : '';
            $chucvu= isset($_POST['ddlChucVu']) ? $_POST['ddlChucVu'] : '';
            $dienthoai= isset($_POST['txtDienThoai']) ? $_POST['txtDienThoai'] : '';
            $email= isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
            $diachi= isset($_POST['txtDiaChi']) ? $_POST['txtDiaChi'] : '';
            $dulieu=$this->dsnv->nhanvien_find($macanbo,$tencanbo);
    
        if ($dulieu && mysqli_num_rows($dulieu) > 0) {
            while ($row = mysqli_fetch_array($dulieu)) {
                $rowCount++;
                $sheet->setCellValue('A'.$rowCount, $rowCount - 1); // sửa lại giá trị của STT cho đúng
                $sheet->setCellValue('B'.$rowCount, $row['MaCanBo']);
                $sheet->setCellValue('C'.$rowCount, $row['TenCanBo']);
                $sheet->setCellValue('D'.$rowCount, $row['Username']);
                $sheet->setCellValue('E'.$rowCount, $row['Password']);
                $sheet->setCellValue('F'.$rowCount, $row['NgaySinh']);
                $sheet->setCellValue('G'.$rowCount, $row['GioiTinh']);
                $sheet->setCellValue('H'.$rowCount, $row['ChucVu']);
                $sheet->setCellValue('I'.$rowCount, $row['SoDienThoai']);
                $sheet->setCellValue('J'.$rowCount, $row['Email']);
                $sheet->setCellValue('K'.$rowCount, $row['DiaChi']);
            }
        } else {
            // Handle the case where no data is found
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
            $sheet->getStyle('A1:' . 'K' . ($rowCount))->applyFromArray($styleArray);
        
            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $fileName = 'Nhân Viên.xlsx';
            $objWriter->save($fileName);
        
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Length: ' . filesize($fileName));
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: no-cache');
            readfile($fileName);
            exit;      
        }
        // Nhập Excel
        if (isset($_POST['btnNhap'])) {
            if (empty($_FILES['txtfile']['name'])) {
                echo "<script>alert('Vui lòng chọn file!')</script>";
            } elseif ($_FILES['txtfile']['size'] == 0) {
                echo "<script>alert('File không được để trống!')</script>";
            } else {
                $file = $_FILES['txtfile']['tmp_name'];
                // require 'PHPExcel/IOFactory.php';  // Đảm bảo bạn đã bao gồm thư viện PHPExcel

                try {
                    $objReader = PHPExcel_IOFactory::createReaderForFile($file);
                    $objExcel = $objReader->load($file);
                    $sheetData = $objExcel->getActiveSheet()->toArray(null, true, true, true);
                    $highestRow = $objExcel->setActiveSheetIndex(0)->getHighestRow();
                    $importSuccess = true;

                    for ($i = 2; $i <= $highestRow; $i++) {
                        
                        $macanbo = $sheetData[$i]["A"];
                        $tencanbo = $sheetData[$i]["B"];
                        $taikhoan = $sheetData[$i]["C"];
                        $matkhau = $sheetData[$i]["D"];
                        $ngaysinh = $sheetData[$i]["E"];
                        $gioitinh = $sheetData[$i]["F"];
                        $chucvu = $sheetData[$i]["G"];
                        $dienthoai = $sheetData[$i]["H"];
                        $email = $sheetData[$i]["I"];
                        $diachi = $sheetData[$i]["J"];

                        if (empty($macanbo) || empty($tencanbo) || empty($taikhoan) || empty($matkhau) || empty($ngaysinh) || empty($gioitinh) || empty($chucvu) || empty($dienthoai) || empty($email) || empty($diachi)) {
                            echo "<script>alert('Vui lòng điền đầy đủ thông tin ở hàng {$i}!')</script>";
                            $importSuccess = false;
                            continue;
                        }

                        // Kiểm tra trùng mã tác giả
                        $kq1 = $this->dsnv->nhanvien_checktrungma($macanbo);
                        if ($kq1) {
                            echo "<script>alert('Mã nhân viên ở hàng {$i} đã tồn tại!')</script>";
                            $importSuccess = false;
                            continue;
                        } else {
                            // Gọi hàm thêm dữ liệu insert trong model
                            $kq = $this->dsnv->nhanvien_ins($macanbo, $tencanbo, $taikhoan, $matkhau, $ngaysinh, $gioitinh, $chucvu, $dienthoai, $email, $diachi);
                            if (!$kq) {
                                echo "<script>alert('Import thất bại ở hàng {$i}!')</script>";
                                $importSuccess = false;
                            }
                        }
                    }

                    if ($importSuccess) {
                        echo "<script>alert('Import thành công!')</script>";
                    } else {
                        echo "<script>alert('Có lỗi xảy ra khi import! Vui lòng kiểm tra lại.')</script>";
                    }
                } catch (Exception $e) {
                    echo "<script>alert('Có lỗi xảy ra khi xử lý file: ".$e->getMessage()."')</script>";
                }
            }
        }
        $dulieu = $this->dsnv->nhanvien_all();
        $this->view('MasterLayout', [
            'page' => 'Danhsachnhanvien_v',
            'dulieu' => $dulieu,
        ]);

    }
    
    public function timkiem1(){
            $macanbo='';
            $tencanbo='';
            $taikhoan= isset($_POST['txtTaiKhoan']) ? $_POST['txtTaiKhoan'] : '';
            $matkhau= isset($_POST['txtMatKhau']) ? $_POST['txtMatKhau'] : '';
            $ngaysinh= isset($_POST['txtNgaySinh']) ? $_POST['txtNgaySinh'] : '';
            $gioitinh= isset($_POST['ddlGioiTinh']) ? $_POST['ddlGioiTinh'] : '';
            $chucvu= isset($_POST['ddlChucVu']) ? $_POST['ddlChucVu'] : '';
            $dienthoai= isset($_POST['txtDienThoai']) ? $_POST['txtDienThoai'] : '';
            $email= isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
            $diachi= isset($_POST['txtDiaChi']) ? $_POST['txtDiaChi'] : '';
            $dulieu=$this->dsnv->nhanvien_find($macanbo,$tencanbo);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'Danhsachnhanvien_v',
                'dulieu'=>$dulieu,
                'MaCanBo'=>$macanbo,
                'TenCanBo'=>$tencanbo,
                'Username'=>$taikhoan,
                'Password'=>$matkhau,
                'NgaySinh'=>$ngaysinh,
                'GioiTinh'=>$gioitinh,
                'ChucVu'=>$chucvu,
                'DienThoai'=>$dienthoai,
                'Email'=>$email,
                'DiaChi'=>$diachi
            ]);
    }
    function xoa($macanbo){
        $dulieu=$this->dsnv->nhanvien_del($macanbo);
        if($dulieu)
            echo "<script>alert('Xóa thành công!')</script>";
        else
            echo "<script>alert('Xóa thất bại!')</script>";
        //Gọi lại giao diện và truyền $dulieu ra
            $macanbo='';
            $tencanbo='';
            $taikhoan= isset($_POST['txtTaiKhoan']) ? $_POST['txtTaiKhoan'] : '';
            $matkhau= isset($_POST['txtMatKhau']) ? $_POST['txtMatKhau'] : '';
            $ngaysinh= isset($_POST['txtNgaySinh']) ? $_POST['txtNgaySinh'] : '';
            $gioitinh= isset($_POST['ddlGioiTinh']) ? $_POST['ddlGioiTinh'] : '';
            $chucvu= isset($_POST['ddlChucVu']) ? $_POST['ddlChucVu'] : '';
            $dienthoai= isset($_POST['txtDienThoai']) ? $_POST['txtDienThoai'] : '';
            $email= isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
            $diachi= isset($_POST['txtDiaChi']) ? $_POST['txtDiaChi'] : '';
            $dulieu=$this->dsnv->nhanvien_find($macanbo,$tencanbo);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'Danhsachnhanvien_v',
                'dulieu'=>$dulieu,
                'MaCanBo'=>$macanbo,
                'TenCanBo'=>$tencanbo,
                'Username'=>$taikhoan,
                'Password'=>$matkhau,
                'NgaySinh'=>$ngaysinh,
                'GioiTinh'=>$gioitinh,
                'ChucVu'=>$chucvu,
                'DienThoai'=>$dienthoai,
                'Email'=>$email,
                'DiaChi'=>$diachi
            ]);
    }
}
?>