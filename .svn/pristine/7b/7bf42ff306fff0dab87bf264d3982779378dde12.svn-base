<?php 
class tacgia_them_c extends controller {
    public $them; 

    public function __construct() {
        $this->them = $this->model('tacgia_m'); // ✅ Khởi tạo đối tượng model đúng cách
    }
    
    function Get_data() {
        $this->view('Masterlayout', [
            'page' => 'tacgia_them_v'
        ]);
    }
    
    function themmoi() {
        // Lấy dữ liệu từ request
        $data = $_POST;
    
        if (!$data) {
            http_response_code(400); // Bad Request
            echo "<script>alert('Không nhận được dữ liệu!'); window.history.back();</script>";
            exit;
        }
    
        // Lấy giá trị từ request, nếu không có thì để trống
        $matacgia  = trim($data['txtMatacgia'] ?? '');
        $tentacgia = trim($data['txtTentacgia'] ?? '');
        $ngaysinh  = trim($data['txtNgaysinh'] ?? '');
        $gioitinh  = trim($data['txtGioitinh'] ?? '');
        $dienthoai = trim($data['txtDienthoai'] ?? '');
        $diachi    = trim($data['txtDiachi'] ?? '');
    
        // ⚠️ Kiểm tra các trường dữ liệu rỗng
        if (empty($matacgia) || empty($tentacgia) || empty($ngaysinh) || empty($gioitinh) || empty($dienthoai) || empty($diachi)) {
            http_response_code(400); // Bad Request
            echo "<script>alert('Không được để trống dữ liệu!'); window.history.back();</script>";
            exit;
        }
    
        // ⚠️ Kiểm tra mã tác giả có bị trùng không
        if ($this->them->checkTrungMa($matacgia)) {
            http_response_code(409); // Conflict
            echo "<script>alert('Mã tác giả đã tồn tại!'); window.history.back();</script>";
            exit;
        }
    
        // ⚠️ Kiểm tra số điện thoại chỉ chứa số
        if (!ctype_digit($dienthoai)) {
            http_response_code(400); // Bad Request
            echo "<script>alert('Số điện thoại chỉ được chứa số!'); window.history.back();</script>";
            exit;
        }
    
        // ⚠️ Kiểm tra định dạng ngày sinh (YYYY-MM-DD)
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $ngaysinh)) {
            echo "<script>alert('Ngày sinh phải có định dạng YYYY-MM-DD!'); window.history.back();</script>";
            exit;
        }

        // ⚠️ Kiểm tra giới tính (chỉ cho phép "Nam" hoặc "Nữ")
        if ($gioitinh !== "Nam" && $gioitinh !== "Nữ") {
            echo "<script>alert('Giới tính chỉ được chọn Nam hoặc Nữ!'); window.history.back();</script>";
            exit;
        }
    
        // ✅ Tiến hành thêm mới vào database
        $kq = $this->them->insert($matacgia, $tentacgia, $ngaysinh, $gioitinh, $dienthoai, $diachi);
    
        if ($kq) {
            http_response_code(201); // Created
            echo "<script>alert('Thêm tác giả thành công!'); window.location.href = 'your_redirect_page.php';</script>";
        } else {
            http_response_code(500); // Internal Server Error
            echo "<script>alert('Thêm mới thất bại, vui lòng thử lại!'); window.history.back();</script>";
        }
    
        exit;
    }
    
}
?>
